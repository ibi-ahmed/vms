<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Tag;
use App\Models\Visit;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function all()
    {
        $appointments = Appointment::orderByDesc('updated_at')->paginate(5);
        $tags = Tag::where('status', 0)->get();
        return view('appointments.all', compact('appointments', 'tags'));
    }

    public function schedule()
    {
        $departments = Department::all();
        return view('appointments.schedule', compact('departments'));
    }

    public function recent()
    {
        $appointments = Appointment::orderByDesc('updated_at')->paginate(5);
        $tags = Tag::where('status', 0)->get();
        return view('appointments.recent', compact('appointments', 'tags'));
    }

    public function storeAppointment(Request $request)
    {
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:appointments'],
        ]);

        if ($request->email) {
            $email = $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:appointments']
            ]);
        }

        $appointment = new Appointment();
        $appointment->first_name = $input['first_name'];
        $appointment->last_name = $input['last_name'];
        $appointment->company = $input['company'];
        if ($request->email) {
            $appointment->email = $email;
        }
        $appointment->phone = $input['phone'];
        $appointment->department_id = $request->department_id;
        $appointment->staff_id = Auth::user()->id;
        $appointment->save();

        return redirect()->route(Auth::user()->type . '.dashboard')->with('success', 'Appointment Created!');
    }

    public function storeExistingVisitorAppointment(Request $request)
    {
        $visitor = Visitor::where('id', $request->vis_id)->first();

        $appointment = new Appointment();
        $appointment->first_name = $visitor->first_name;
        $appointment->last_name = $visitor->last_name;
        $appointment->company = $visitor->company;
        if ($visitor->email) {
            $appointment->email = $visitor->email;
        }
        $appointment->phone = $visitor->phone;
        $appointment->department_id = $request->department_id;
        $appointment->staff_id = Auth::user()->id;
        $appointment->save();

        return redirect()->route(Auth::user()->type . '.dashboard')->with('success', 'Appointment Created!');
    }

    public function myAppointments()
    {
        $appointments = Appointment::where('staff_id', Auth::user()->id)
            ->orderByDesc('updated_at')
            ->paginate(5);
        return view('appointments.my', compact('appointments'));
    }

    public function cancel($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 2;
        $appointment->save();
        return redirect()->action([AppointmentController::class, 'myAppointments'])->with('success', 'Appointment Canceled!');
    }

    public function approveAppointment(Request $request, $id)
    {
        if ($request->photo) {
            $request->validate([
                'photo' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:5120']
            ]);
        }

        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->save();

        $visitor = Visitor::where('phone', $appointment->phone)->first();

        if ($visitor == null) {
            $visitor = new Visitor;
            $visitor->first_name = $appointment->first_name;
            $visitor->last_name = $appointment->last_name;
            
            if ($appointment->email) {
                $visitor->email = $appointment->email;
            }

            if ($request->photo) {
                $photoName = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images/avatar'), $photoName);
                $visitor->photo = $photoName;
            }

            $visitor->phone = $appointment->phone;
            $visitor->company = $appointment->company;
            $visitor->status = 1;
            $visitor->save();
        } else {
            $visitor->status = 1;
            $visitor->save();
        }

        $visitor_id = Visitor::where('phone', $visitor->phone)->first()->id;

        $visit = new Visit;
        $visit->visitor_id = $visitor_id;
        $visit->user_id = $appointment->staff_id;
        $visit->tag_id = $request->tag_id;
        $visit->department_id = $appointment->department_id;
        $visit->status = 1;
        $visit->save();

        $tag = Tag::find($request->tag_id);
        $tag->status = 1;
        $tag->save();

        return redirect()->route(Auth::user()->type . '.dashboard')->with('success', 'Visit Added');
    }

    public function staffApproveAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 4;
        $appointment->save();

        return redirect()->route('appointments.my')->with('success', 'Appointment Approved!');
    }
}

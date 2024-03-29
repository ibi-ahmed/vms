<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Visit;
use App\Models\Visitor;
use App\Models\Location;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function all(Request $request)
    {
        $this->authorize('allAppointments', Appointment::class);
        $appointments = Appointment::where('updated_at', '>=', Carbon::now()->subHours(12))
            ->where(function ($query) use ($request) {
                $query->where('email', 'LIKE', '%' . $request->query->get('query') . '%')
                    ->orWhere('phone', 'LIKE', '%' . $request->query->get('query') . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->query->get('query') . '%');
            })
            ->orderByDesc('updated_at')
            ->paginate(10);
        $tags = Tag::where('status', 0)->get();
        return view('appointments.all', compact('appointments', 'tags'));
    }

    public function schedule()
    {
        $this->authorize('schedule', Appointment::class);
        $departments = Department::all();
        $locations = Location::all();
        return view('appointments.schedule', compact('departments', 'locations'));
    }

    public function recent()
    {
        $this->authorize('recentAppointments', Appointment::class);
        $appointments = Appointment::whereDate('appointment_date', Carbon::today())
            ->orderByDesc('updated_at')->paginate(10);
        $tags = Tag::where('status', 0)->get();
        return view('appointments.recent', compact('appointments', 'tags'));
    }

    public function storeAppointment(Request $request)
    {
        $this->authorize('schedule', Appointment::class);
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'department_id' => ['required', 'exists:departments,id'],
            'location_id' => ['required', 'exists:locations,id'],
        ]);

        if ($request->email) {
            $email = $request->validate([
                'email' => ['string', 'email', 'max:255']
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
        $appointment->location_id = $request->location_id;
        $appointment->staff_id = Auth::user()->id;
        $appointment->created_by = Auth::user()->id;
        $appointment->appointment_date = $input['date'];
        $appointment->save();

        return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard')->with('success', 'Appointment Created!');
    }

    public function storeExistingVisitorAppointment(Request $request)
    {
        $input = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'department_id' => ['required', 'exists:departments,id'],
            'location_id' => ['required', 'exists:locations,id'],
        ]);

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
        $appointment->location_id = $request->location_id;
        $appointment->staff_id = Auth::user()->id;
        $appointment->created_by = Auth::user()->id;
        $appointment->appointment_date = $input['date'];
        $appointment->save();

        return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard')->with('success', 'Appointment Created!');
    }

    public function myAppointments()
    {
        $this->authorize('myAppointments', Appointment::class);
        $appointments = Appointment::where('staff_id', Auth::user()->id)
            ->orderByDesc('updated_at')
            ->paginate(10);
        return view('appointments.my', compact('appointments'));
    }

    public function cancel($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 2;
        $appointment->save();
        return redirect()->action([AppointmentController::class, 'myAppointments'])->with('success', 'Appointment Canceled!');
    }

    // public function approveAppointment(Request $request, $id)
    // {
    //     $request->validate([
    //         'tag_id' => [
    //             'required', 'numeric',
    //             Rule::exists('tags', 'number')->where('status', 0),
    //         ],
    //     ]);

    //     if ($request->has('photo')) {
    //         $request->validate([
    //             'photo' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:5120']
    //         ]);
    //     }

    //     $appointment = Appointment::find($id);
    //     $appointment->status = 1;
    //     $appointment->save();

    //     $visitor = Visitor::where('phone', $appointment->phone)->first();

    //     if ($visitor == null) {
    //         $visitor = new Visitor;
    //         $visitor->first_name = $appointment->first_name;
    //         $visitor->last_name = $appointment->last_name;

    //         if ($appointment->email) {
    //             $visitor->email = $appointment->email;
    //         }

    //         if ($request->has('photo')) {
    //             $photoName = time() . '.' . $request->photo->extension();
    //             $request->photo->move(public_path('images/avatar'), $photoName);
    //             $visitor->photo = $photoName;
    //         }

    //         $visitor->phone = $appointment->phone;
    //         $visitor->company = $appointment->company;
    //         $visitor->status = 1;
    //         $visitor->save();
    //     } else {
    //         if ($request->has('photo')) {
    //             $photoName = time() . '.' . $request->photo->extension();
    //             $request->photo->move(public_path('images/avatar'), $photoName);
    //             $visitor->photo = $photoName;
    //         }
    //         $visitor->status = 1;
    //         $visitor->save();
    //     }

    //     $visitor_id = Visitor::where('phone', $visitor->phone)->first()->id;

    //     $visit = new Visit;
    //     $visit->visitor_id = $visitor_id;
    //     $visit->user_id = $appointment->staff_id;
    //     $visit->tag_id = $request->tag_id;
    //     $visit->department_id = $appointment->department_id;
    //     $visit->location_id = $appointment->location_id;
    //     $visit->status = 1;
    //     $visit->created_by = Auth::user()->id;
    //     $visit->save();

    //     $tag = Tag::find($request->tag_id);
    //     $tag->status = 1;
    //     $tag->save();

    //     return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard')->with('success', 'Visit Added');
    // }

    public function approveAppointment(Request $request, $id)
    {
        $request->validate([
            'tag_id' => [
                'required', 'numeric',
                Rule::exists('tags', 'number')->where('status', 0),
            ],
        ]);

        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->save();

        $visitor = Visitor::where('phone', $appointment->phone)->first();

        if ($visitor == null) {
            $visitor = new Visitor;
            $visitor->first_name = $appointment->first_name;
            $visitor->last_name = $appointment->last_name;
            $visitor->phone = $appointment->phone;
            $visitor->company = $appointment->company;
        }
        
        if ($appointment->email) {
            $visitor->email = $appointment->email;
        }
        
        // Call function to handle photo upload
        $visitor = $this->handlePhotoUpload($request, $visitor);
        
        $visitor->status = 1;
        $visitor->save();

        $visitor_id = $visitor->id;

        $visit = new Visit;
        $visit->visitor_id = $visitor_id;
        $visit->user_id = $appointment->staff_id;
        $visit->tag_id = $request->tag_id;
        $visit->department_id = $appointment->department_id;
        $visit->location_id = $appointment->location_id;
        $visit->status = 1;
        $visit->created_by = Auth::user()->id;
        $visit->save();

        $tag = Tag::find($request->tag_id);
        $tag->status = 1;
        $tag->save();

        return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard')->with('success', 'Visit Added');
    }

    private function handlePhotoUpload(Request $request, Visitor $visitor)
    {
        if ($request->has('photo')) {
            $request->validate([
                'photo' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:5120']
            ]);

            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/avatar'), $photoName);
            $visitor->photo = $photoName;
        }

        return $visitor;
    }


    public function staffApproveAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 4;
        $appointment->save();

        return redirect()->route('appointments.my')->with('success', 'Appointment Approved!');
    }

    public function staffSearch()
    {
        $this->authorize('staffSearch', Appointment::class);
        return view('appointments.staff-search');
    }
    
    public function staffView(Request $request)
    {
        $staff = User::where('azure_id', $request->staff_id)->first();
        
        if ($staff !=null ) {
            $staff->name = $request->staff_name;
            $staff->email = strtolower($request->staff_email);
        }else{
            $staff = new User();
            $staff->name = $request->staff_name;
            $staff->email = strtolower($request->staff_email);
            $staff->role_id = 3;
            $staff->azure_id = $request->staff_id;
        }
        
        $staff->save();

        $appointments = Appointment::where('staff_id', $staff->id)
            ->orderByDesc('appointment_date')
            ->paginate(10);

            $tags = Tag::where('status', 0)->get();

        return view('appointments.staff-appointments', compact('appointments', 'staff', 'tags'));
    }
}

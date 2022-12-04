<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function all()
    {   
        $appointments = Appointment::where('status', 0)->get();
        return view('appointments.all', compact('appointments'));
    }
    
    public function schedule() 
    {
        $departments = Department::all();
        return view('appointments.schedule', compact('departments'));
    }

    public function storeAppointment(Request $request) 
    {
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
        ]);
        
        $appointment = new Appointment();
        $appointment->first_name = $input['first_name'];
        $appointment->last_name = $input['last_name'];
        $appointment->company = $input['company'];
        $appointment->department_id = $request->department_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->staff_id = Auth::user()->id;
        $appointment->save();
        
        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'Appointment Created!');
    }
    
    public function myAppointments() 
    {
        $appointments = Appointment::where('staff_id', Auth::user()->id)
                            ->whereNot('status', 2)    
                            ->get();
        return view('appointments.my', compact('appointments'));
    }

    public function cancel($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 2;
        $appointment->save();
        return redirect()->action([AppointmentController::class, 'myAppointments'])->with('success', 'Appointment Canceled!');
    }

    public function approveAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->save();
        return redirect()->route('visitor.add')->with('success', 
            'Appointment for '.$appointment->first_name.' '.$appointment->last_name.' to '.
            $appointment->staff->first_name.' '.$appointment->staff->last_name.
            ' ('.$appointment->department->name.')');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function all()
    {
        return view('appointments.all');
    }
    
    public function schedule() 
    {
        return view('appointments.schedule');
    }
    
    public function myAppointments() 
    {
        return view('appointments.my');
    }
}

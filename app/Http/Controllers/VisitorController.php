<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function add()
    {
        return view('visitor.add-visitor');
    }
    
    public function edit()
    {
        return view('visitor.edit-visitor');
    }

    public function all()
    {
        return view('visitor.all-visitor');
    }

    public function single()
    {
        return view('visitor.single-visitor');
    }
}

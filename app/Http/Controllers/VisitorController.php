<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function add()
    {
        $departments = Department::all();
        $tags = Tag::where('status', 0)->get();
        // return view('visitor.add-visitor', [$departments, $tags]);
        return view('visitor.add-visitor', compact('departments', 'tags'));
    }
    
    public function storeVisitor(Request $request)
    {
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        // dd(Auth::user()->type.'.dashboard');
        // User::create($input);
        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'New User Created!');
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

    public function addVisit()
    {
        return view('visitor.add-visit');
    }
}

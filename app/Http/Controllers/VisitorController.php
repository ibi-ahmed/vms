<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function add()
    {
        $departments = Department::all();
        $tags = Tag::where('status', 0)->get();
        return view('visitor.add-visitor', compact('departments', 'tags'));
    }
    
    public function storeVisitor(Request $request)
    {   
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'company' => ['required', 'string', 'max:255'],
        ]);

        $visitor = new Visitor;
        $visitor->first_name = $input['first_name'];
        $visitor->last_name = $input['last_name'];
        $visitor->email = $input['email'];
        $visitor->phone = $input['phone'];
        $visitor->company = $input['company'];
        $visitor->save();

        $visitor_id = Visitor::where('email', $input['email'])->first()->id;

        $visit = new Visit;
        $visit->visitor_id = $visitor_id;
        $visit->user_id = User::where('email', $request->staff_email)->first()->id;
        $visit->tag_id = $request->tag_id;
        $visit->department_id = $request->department_id;
        $visit->save();

        $tag = Tag::find($request->tag_id);
        $tag->status = 1;
        $tag->save();

        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'Visitor Registered!');
    }

    public function storeVisit(Request $request)
    {
        $visit = new Visit;
        $visit->visitor_id = Visitor::where('email', $request->visitor_email)->first()->id;
        $visit->user_id = User::where('email', $request->staff_email)->first()->id;
        $visit->tag_id = $request->tag_id;
        $visit->department_id = $request->department_id;
        $visit->save();

        $tag = Tag::find($request->tag_id);
        $tag->status = 1;
        $tag->save();

        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'Visit Added!');
    }

    public function getVisitor(Request $request)
    {
        $visitor = Visitor::where('email', 'LIKE', '%'.$request->keyword.'%')
        ->where('status', 0)
        ->get();
        return response()->json($visitor);
    }
    
    public function edit()
    {
        return view('visitor.edit-visitor');
    }

    public function all()
    {
        $visitors = Visitor::all();
        return view('visitor.all-visitor', compact('visitors'));
    }

    public function taggedVisitors()
    {
        $visitors = Visitor::where('status', 1)->get();
        return view('visitor.tagged-visitors', compact('visitors'));
    }

    public function single($id)
    {
        $visitor = Visitor::find($id);
        $visits = $visitor->visits;
        return view('visitor.single-visitor', compact('visits', 'visitor'));
    }

    public function addVisit()
    {
        return view('visitor.add-visit');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'phone' => ['required', 'string', 'max:15', 'unique:visitors'],
            'company' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email) {
            $email = $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:visitors']
            ]);
        }

        $visitor = new Visitor;
        $visitor->first_name = $input['first_name'];
        $visitor->last_name = $input['last_name'];
        if ($request->email) {
            $visitor->email = $email;
        }
        $visitor->phone = $input['phone'];
        $visitor->company = $input['company'];
        $visitor->save();

        $visitor = Visitor::where('phone', $input['phone'])->first();

        $appointment = new Appointment();
        $appointment->first_name = $visitor->first_name;
        $appointment->last_name = $visitor->last_name;
        $appointment->company = $visitor->company;
        if ($visitor->email) {
            $appointment->email = $visitor->email;
        }
        $appointment->phone = $visitor->phone;
        $appointment->department_id = $request->department_id;
        $appointment->staff_id = $request->staff_id;
        $appointment->status = 3;
        $appointment->save();

        // $visit = new Visit;
        // $visit->visitor_id = $visitor->id;
        // $visit->user_id = $request->staff_id;
        // $visit->tag_id = $request->tag_id;
        // $visit->department_id = $request->department_id;
        // $visit->save();

        // $tag = Tag::find($request->tag_id);
        // $tag->status = 1;
        // $tag->save();

        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'Appointment Created!');
    }

    public function storeVisit(Request $request)
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
        $appointment->staff_id = $request->staff_id;
        $appointment->status = 3;
        $appointment->save();

        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'Appointment Created!');
    }

    public function getVisitor(Request $request)
    {
        $visitor = Visitor::where('email', 'LIKE', '%'.$request->keyword.'%')
            ->orWhere('phone', 'LIKE', '%'.$request->keyword.'%')
            ->where('status', 0)
            ->get();
        return response()->json($visitor);
    }
    
    // public function getVisitorByPhone(Request $request)
    // {
    //     $visitor = Visitor::where('phone', 'LIKE', '%'.$request->keyword.'%')
    //     ->where('status', 0)
    //     ->get();
    //     return response()->json($visitor);
    // }
    
    public function edit($id)
    {
        $visitor = Visitor::find($id);
        return view('visitor.edit-visitor', compact('visitor'));
    }
    
    public function editVisitor(Request $request, $id)
    {
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'company' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email) {
            $email = $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users']
            ]);
        }

        $visitor = Visitor::find($id);

        $visitor->first_name = $input['first_name'];
        $visitor->last_name = $input['last_name'];
        if ($request->email) {
            $visitor->email = $email;
        }
        // $visitor->email = $input['email'];
        $visitor->phone = $input['phone'];
        $visitor->company = $input['company'];
        $visitor->save();

        return redirect()->route('visitor.edit', $id)->with('success', 'Visitor profile edited!');
    }

    public function all()
    {
        $visitors = Visitor::all();
        return view('visitor.all-visitor', compact('visitors'));
    }

    public function taggedVisitors()
    {
        $visits = Visit::where('status', 1)->get();
        return view('visitor.tagged-visitors', compact('visits'));
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

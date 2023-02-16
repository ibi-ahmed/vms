<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Visit;
use App\Models\Visitor;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function __construct()
    {

    }

    public function add()
    {
        $this->authorize('add', Visitor::class);
        $departments = Department::all();
        $locations = Location::all();
        $tags = Tag::where('status', 0)->get();
        return view('visitor.add-visitor', compact('departments', 'locations', 'tags'));
    }

    public function recent()
    {
        $this->authorize('recentVisits', Visit::class);
        $visits = Visit::orderByDesc('updated_at')->where('status', 1)->paginate(5);
        $tags = Tag::where('status', 0)->get();
        return view('visitor.recent', compact('visits', 'tags'));
    }
    
    public function storeVisitor(Request $request)
    {   
        $this->authorize('add', Visitor::class);
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:visitors'],
            'company' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email) {
            $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:visitors']
            ]);
        }

        if ($request->photo) {
            $request->validate([
                'photo' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:5120']
            ]);
        }

        $visitor = new Visitor;
        $visitor->first_name = $input['first_name'];
        $visitor->last_name = $input['last_name'];
        
        if ($request->email) {
            $visitor->email = $request->email;
        }

        if ($request->photo) {
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/avatar'), $photoName);
            $visitor->photo = $photoName;
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
        $appointment->location_id = $request->location_id;
        $appointment->staff_id = $request->staff_id;
        $appointment->status = 3;
        $appointment->created_by = Auth::user()->id;
        $appointment->save();

        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard')->with('success', 'Appointment Created!');
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
        $appointment->location_id = $request->location_id;
        $appointment->staff_id = $request->staff_id;
        $appointment->status = 3;
        $appointment->created_by = Auth::user()->id;
        $appointment->save();

        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard')->with('success', 'Appointment Created!');
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
        $this->authorize('editVisitor', $visitor);
        return view('visitor.edit-visitor', compact('visitor'));
    }
    
    public function editVisitor(Request $request, $id)
    {
        $visitor = Visitor::find($id);
        $this->authorize('editVisitor', $visitor);
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'phone' => ['required', 'string', 'max:15', 'unique:visitors'],
            'phone' => ['required', 'string', 'max:15', Rule::unique('visitors')->ignore(Visitor::find($id))],
            'company' => ['required', 'string', 'max:255'],
        ]);
        
        if ($request->email) {
            $request->validate([
                'email' => ['string', 'email', 'max:255', Rule::unique('visitors')->ignore(Visitor::find($id))]
            ]);
        }

        if ($request->photo) {
            $request->validate([
                'photo' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:5120']
            ]);
        }

        // $visitor = Visitor::find($id);

        $visitor->first_name = $input['first_name'];
        $visitor->last_name = $input['last_name'];
        
        if ($request->email) {
            $visitor->email = $request->email;
        }
        
        if ($request->photo) {
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/avatar'), $photoName);
            $visitor->photo = $photoName;
        }

        $visitor->phone = $input['phone'];
        $visitor->company = $input['company'];
        $visitor->save();

        return redirect()->route('visitor.edit', $id)->with('success', 'Visitor profile edited!');
    }

    public function all(Request $request)
    {
        $this->authorize('allVisitors', Visitor::class);
        $query = $request->get('query');
        $visitors = Visitor::where('email', 'LIKE', '%'.$query.'%')
            ->orWhere('phone', 'LIKE', '%'.$query.'%')
            ->orWhere('last_name', 'LIKE', '%'.$query.'%')
            ->paginate(10);
            
        return view('visitor.all-visitor', compact('visitors'));

        // $visitors = Visitor::whereNotNull('status')
        //     ->orWhere('email', 'LIKE', '%'.$request->keyword.'%')
        //     ->orWhere('phone', 'LIKE', '%'.$request->keyword.'%')
        //     ->orWhere('last_name', 'LIKE', '%'.$request->keyword.'%')
        //     ->paginate(5);
        // return response()->json($visitors);
    }

    public function my()
    {
        $this->authorize('myVisitors', Visit::class);
        $visits = Visit::orderByDesc('updated_at')->where('user_id', Auth::user()->id)->paginate(5);
        return view('visitor.my', compact('visits'));
    }

    public function taggedVisitors()
    {
        $this->authorize('taggedVisitors', Visit::class);
        $visits = Visit::orderByDesc('updated_at')->where('status', 1)->paginate(10);
        return view('visitor.tagged-visitors', compact('visits'));
    }

    public function single($id)
    {
        $visitor = Visitor::find($id);
        $visits = $visitor->visits()->paginate(3);
        return view('visitor.single-visitor', compact('visits', 'visitor'));
    }

    // public function addVisit()
    // {
    //     return view('visitor.add-visit');
    // }
}

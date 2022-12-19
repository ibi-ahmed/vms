<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Tag;
use App\Models\Visit;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function scan($tag_no)
    {
        $tag_id = Tag::where('number', $tag_no)->first()->id;
        $visit = Visit::where('tag_id', $tag_id)->first();
        // $visitor = Visitor::where('id', $visitor_id)->first();
        // dd($visitor);
        // return view('tags.scan');
        return view('tags.scan', compact('visit'));
    }

    public function tagAssign(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->save();

        $visitor = Visitor::where('phone', $appointment->phone)->first();
        $visitor->status = 1;
        $visitor->save();

        $tag = Tag::find($request->tag_id);
        $tag->status = 1;
        $tag->save();

        $visit = new Visit;
        $visit->visitor_id = $visitor->id;
        $visit->user_id = $appointment->staff_id;
        $visit->tag_id = $request->tag_id;
        $visit->department_id = $appointment->department_id;
        $visit->status = 1;
        $visit->save();

        return redirect()->route(Auth::user()->type . '.dashboard')->with('success', 'Tag Assigned!');
    }
}

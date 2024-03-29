<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Visit;
use App\Models\Visitor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('scan');
    }

    public function scan($tag_no)
    {
        $tag_id = Tag::where('number', $tag_no)->first()->id;
        $visit = Visit::where('tag_id', $tag_id)
            ->where('status', 1)
            ->first();
        return view('tags.scan', compact('visit'));
    }

    public function tagAssign(Request $request, $id)
    {
        $request->validate([
            'tag_id' => [
                'required', 'numeric',
                Rule::exists('tags', 'number')->where('status', 0),
            ],
        ]);

        $tag = Tag::find($request->tag_id);
        $this->authorize('tagAssign', $tag);

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
        $visit->location_id = $appointment->location_id;
        $visit->status = 1;
        $visit->created_by = Auth::user()->id;
        $visit->save();

        return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard')->with('success', 'Tag Assigned!');
    }

    public function tagDeactivate($id)
    {
        $visitor = Visitor::find($id);
        $visit = Visit::where('visitor_id', $visitor->id)
            ->where('status', 1)
            ->first();
        $tag = Tag::find($visit->tag_id);
        $this->authorize('tagDeactivate', $tag);

        // $visitor = Visitor::find($id);
        $visitor->status = 0;
        $visitor->save();

        // $visit = Visit::where('visitor_id', $visitor->id)->first();
        $visit->status = 2;
        $visit->save();

        // $tag = Tag::find($visit->tag_id);
        $tag->status = 0;
        $tag->save();

        return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard')->with('success', 'Tag Deactivated!');
    }

    public function addTagView()
    {
        // $this->authorize('addTag', [$user, $tag]);
        $tags = Tag::all();
        return view('tags.add', compact('tags'));
    }

    public function addTag(Request $request)
    {
        // Get the last tag's number or start at 0 if no tags exist yet
        $lastTagNumber = Tag::max('number') ?? 0;

        // Create and save new tags
        for ($i = 0; $i < $request->number_tags; $i++) {
            $tag = new Tag;
            $tag->number = $lastTagNumber + $i + 1; // increment the number column
            $tag->save();
        }

        return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard')->with('success', $request->number_tags . ' Tag(s) Added!');
    }
}

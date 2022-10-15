<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(20);

        return view('pages.events.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('edit-events')) {
            return redirect()->route('events.index');
        }

        $startTime = date("m/d/Y") . " 8:00 AM";
        $endTime = date("m/d/Y") . " 3:00 PM";
        return view('pages.events.create', [
            'start_time' => $startTime,
            'end_time' => $endTime
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('edit-events')) {
            return redirect()->route('events.index');
        }

        // Save image
        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/events', 'public');
        }

        // Save input
        $input = $request->except(['image']);
        if (isset($input['start_time'])) {
            $input['start_time'] = date('Y-m-d H:i:s', strtotime($input['start_time']));
        }
        if (isset($input['end_time'])) {
            $input['end_time'] = date('Y-m-d H:i:s', strtotime($input['end_time']));
        }
        if ($imagePath != '') {
            $input['image_path'] = $imagePath;
        }
        $event = new Event();
        $event->fill($input)->save();

        return redirect()->route('events.show', ['event' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $attending = false;
        if ($user_id = Auth::id()) {
            $attending = $event->users->contains($user_id);
        }
        $event['attending'] = $attending;

        return view('pages.events.show', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if (Gate::denies('edit-events')) {
            return redirect()->route('events.index');
        }

        $startTime = date("m/d/Y h:i A", strtotime($event->start_time));
        $endTime = date("m/d/Y h:i A", strtotime($event->end_time));
        return view('pages.events.create', [
            'event' => $event,
            'start_time' => $startTime,
            'end_time' => $endTime
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if (Gate::denies('edit-events')) {
            return redirect()->route('events.index');
        }

        // Save image
        $imagePath = '';
        if ($request->hasFile('image')) {
            if (isset($event->image_path) && Storage::disk('public')->exists($event->image_path)) {
                Storage::disk('public')->delete($event->image_path);
            }
            $imagePath = $request->file('image')->store('images/events', 'public');
        }

        // Save input
        $input = $request->except(['image']);
        if (isset($input['start_time'])) {
            $input['start_time'] = date('Y-m-d H:i:s', strtotime($input['start_time']));
        }
        if (isset($input['end_time'])) {
            $input['end_time'] = date('Y-m-d H:i:s', strtotime($input['end_time']));
        }
        if ($imagePath != '') {
            $input['image_path'] = $imagePath;
        }

        $event->fill($input)->save();

        return redirect()->route('events.show', ['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function attend(Event $event) {
        if ($user_id = Auth::id()) {
            $event->users()->attach($user_id);
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Un-authenticated!'
            ], 401);
        }
    }

    public function unattend(Event $event) {
        if ($user_id = Auth::id()) {
            $event->users()->detach([$user_id]);
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Un-authenticated!'
            ], 401);
        }
    }
}

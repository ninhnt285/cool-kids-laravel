<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EventCollection;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Resources\Event as EventResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EventController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $query = Event::query();
        if ($q = $request->get('q')) {
            $query->where('name', 'LIKE', "%{$q}%");
        }
        $pagination = $query->orderBy('start_time', 'DESC')
            ->paginate(10);

        $collection = new EventCollection($pagination);
        $collection->additional(['success' => true, 'message' => "All events fetched successfully!"]);

        return $collection;
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
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorized']);
        }

        // Save image
        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/events', 'public');
        }

        $input = $request->all();
        if ($imagePath != '') {
            $input['image_path'] = $imagePath;
        }

        $event = new Event();
        $event->fill($input)->save();

        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event) {
        return new EventResource($event);
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
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorized']);
        }

        // Save image
        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/events', 'public');
        }

        $input = $request->except(['image']);
        if ($imagePath != '') {
            $input['image_path'] = $imagePath;
        }

        $event->fill($input)->save();

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event) {
        if (Gate::denies('edit-events')) {
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorized']);
        }

//        DB::table('event_user')->where('event_id', $event->id)->delete();
        Event::where('id', $event->id)->delete();

        return $this->sendResponse($event, 'Event deleted successfully!');
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

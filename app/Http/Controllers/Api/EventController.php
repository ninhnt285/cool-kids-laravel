<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EventCollection;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Resources\Event as EventResource;
use Illuminate\Support\Facades\Auth;

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
        //
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
    public function update(Request $request, $id)
    {
        //
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

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = new UserCollection(User::all());
        $collection->additional(['success' => true, 'message' => "All users fetched successfully!"]);

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
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Gate::denies('edit-users')) {
            return $this->sendError('Only admin can edit user information.', ['error'=>'Only admin can edit user information.']);
        }

        $input = $request->only('role');

        $user->role = $input['role'];
        $user->save();

        return new UserResource($user);
    }

    public function getMe(Request $request) {
        $user = Auth::user();

        return new UserResource($user->load('events'));
    }

    public function updateMe(Request $request) {
        if ($me = Auth::user()) {
            $user = User::where('id', $me->id)->first();

            $input = $request->only(['name']);
            $user->fill($input)->save();

            return new UserResource($user);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Un-authenticated!'
            ], 401);
        }
    }
}

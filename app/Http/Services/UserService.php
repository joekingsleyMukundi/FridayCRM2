<?php

namespace App\Http\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUsers = User::paginate();

		return UserResource::collection($getUsers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        $user = new User;
		$user->name = $request->input("name");
		$user->email = $request->input("email");
		$user->phone = $request->input("phone");
		$user->password = Hash::make($request->input("email"));

		$saved = $user->save();

		$message = $user->name . " created successfully";

		return [$saved, $message, $user];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

		return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $user = User::find($id);

		if ($request->filled("name")) {
			$user->name = $request->input("name");
		}
		
		if ($request->filled("phone")) {
			$user->phone = $request->input("phone");
		}

		$saved = $user->save();

		$message = $user->name . " updated successfully";

		return [$saved, $message, $user];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getUser = User::find($id);

		$deleted = $getUser->delete();

		$message = $getUser->name . " deleted successfully";

		return [$deleted, $message, $getUser];
    }
}
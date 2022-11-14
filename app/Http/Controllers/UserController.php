<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.users.index", [
            "title" => "Manage Users",
            "users" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("users.show", [
            "title" => "User $user->name",
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.users.edit", [
            "title" => "Edit $user->name",
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            "name" => "required|max:255"
        ];

        if ($request->email != $user->email) {
            $rules["email"] = "required|unique:users";
        }
        if ($request->password) {
            $rules["password"] = "required";
        }

        if ($request->has("image")) {
            $rules["image"] = "required";
        }
        
        $data = $request->validate($rules);
        
        if ($request->has("image")) {
            if (Storage::disk("public")->exists($user->image)) {
                Storage::disk("public")->delete($user->image);
            }
            $data["image"] = $request->file("image")->store("/images", "public");
        }

        if ($user->update($data)) {
            return back()->with("success", "Success Update User");
        }
        return back()->with("error", "Error Update User");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return back()->with("success", "Success Delete User");
        }
        return back()->with("error", "Error Delete User");
    }
}

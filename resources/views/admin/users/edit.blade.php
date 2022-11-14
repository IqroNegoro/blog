@extends('layouts.container')
@section('content')
<div class="w-full mt-16 p-4">
    <h3 class="font-medium text-3xl my-2">Edit User</h3>
    <form action="{{ asset("administrator/users/$user->id") }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        @method("put")
        <div class="w-full mt-4">
            <label for="name" class="text-2xl">Name</label>
            <input type="text" id="name" name="name" class="w-full border rounded-sm outline-none p-2" placeholder="Name..." value="{{ $user->name }}">
        </div>
        <div class="w-full mt-4">
            <label for="image" class="text-2xl">Image</label>
            <input type="file" name="image" id="image" class="w-full">
            <img src="{{ asset("$user->image") }}" alt="{{ $user->name }}" class="w-32 h-32 mt-4">
        </div>
        <div class="w-full mt-4">
            <label for="email" class="text-2xl">Email</label>
            <input type="text" id="email" name="email" class="w-full border rounded-sm outline-none p-2" placeholder="Email..." value="{{ $user->email }}">
        </div>
        <div class="w-full mt-4">
            <label for="password" class="text-2xl">Password</label>
            <input type="text" id="password" name="password" class="w-full border rounded-sm outline-none p-2" placeholder="Password...">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-1 px-4 text-xl mt-2">
            Edit
        </button>
    </form>
</div>
@endsection
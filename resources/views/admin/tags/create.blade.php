@extends('layouts.container')
@section('content')
<div class="w-full mt-16 p-4">
    <h3 class="font-medium text-3xl my-2">Create New Tag</h3>
    <form action="{{ asset('administrator/tags') }}" method="POST">
        @csrf
        <div class="w-full mt-4">
            <label for="name" class="text-2xl">Name</label>
            <input type="text" id="name" name="name" class="w-full border rounded-sm outline-none p-2" placeholder="Name...">
        </div>
        <div class="w-full mt-4">
            <label for="color" class="text-2xl">Color</label>
            <input type="color" id="color" name="color" class="w-full rounded-sm outline-none">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-1 px-4 text-xl mt-2">
            Create
        </button>
    </form>
</div>
@endsection
@extends('layouts.container')
@section('content')
<div class="w-full mt-16 p-4">
    <h3 class="font-medium text-3xl my-2">Edit {{ $tag->name }} Tag</h3>
    <form action="{{ asset("administrator/tags/$tag->id") }}" method="POST">
        @method("put")
        @csrf
        <div class="w-full mt-4">
            <label for="name" class="text-2xl">Name</label>
            <input type="text" id="name" name="name" class="w-full border rounded-sm outline-none p-2" placeholder="Name..." value="{{ $tag->name }}">
        </div>
        <div class="w-full mt-4">
            <label for="color" class="text-2xl">Color</label>
            <input type="color" id="color" name="color" class="w-full rounded-sm outline-none" value="{{ $tag->color }}">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-1 px-4 text-xl mt-2">
            Edit
        </button>
    </form>
</div>
@endsection
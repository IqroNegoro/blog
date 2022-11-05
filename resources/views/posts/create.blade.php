@extends('layouts.container')
@section("head")
<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
<script type="text/javascript" src="{{ asset('js/trix.js') }}" href="{{ asset('js/trix.js') }}"></script>
@endsection
@section('content')
<style>
    span[data-trix-button-group='file-tools'] {
        display: none;
    }
    </style>
<div class="w-full mt-16 p-4">
    <h3 class="font-medium text-3xl my-2">Create New Post</h3>
    <form action="{{ asset('me/posts') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full mt-4">
            <label for="image" class="text-2xl">Image</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>
        <div class="w-full mt-4">
            <label for="title" class="text-2xl">Title</label>
            <input type="text" id="title" name="title" class="w-full border rounded-sm outline-none p-2" placeholder="Title...">
        </div>
        <div class="w-full mt-4">
            <label for="excerpt" class="text-2xl">Excerpt</label>
            <input type="text" id="excerpt" name="excerpt" class="w-full border rounded-sm outline-none p-2" placeholder="Excerpt...">
        </div>
        <div class="w-full mt-4 hidden">
            <label for="slug" class="text-2xl">Slug</label>
            <input type="text" id="slug" name="slug" class="w-full border rounded-sm outline-none p-2" placeholder="Slug...">
        </div>
        <div class="w-full mt-4">
            <label for="body" class="text-2xl">Content</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-1 px-4 text-xl mt-2">
            Create
        </button>
    </form>
</div>
@endsection
@section('script')
<script>
    const title = document.getElementById("title");
    const slug = document.getElementById("slug");

    title.addEventListener("change", () => {
        fetch(`{{ asset('me/posts/getSlug?title=${title.value}') }}`).then(resp => resp.json()).then(resp => slug.value = resp);
    });
</script>
@endsection
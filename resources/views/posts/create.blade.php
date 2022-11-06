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
    <form action="{{ asset('me/posts') }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        <div class="w-full mt-4">
            <label for="image" class="text-2xl">Image</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>
        <div class="w-full mt-4">
            <label for="title" class="text-2xl">Title</label>
            <input type="text" id="title" name="title" class="w-full border rounded-sm outline-none p-2" placeholder="Title..." value="{{ old("title") }}">
        </div>
        <div class="w-full mt-4">
            <label for="excerpt" class="text-2xl">Excerpt</label>
            <input type="text" id="excerpt" name="excerpt" class="w-full border rounded-sm outline-none p-2" placeholder="Excerpt..." value="{{ old("excerpt") }}">
        </div>
        <div class="w-full mt-4 hidden">
            <label for="slug" class="text-2xl">Slug</label>
            <input type="text" id="slug" name="slug" class="w-full border rounded-sm outline-none p-2" placeholder="Slug..." value="{{ old("slug") }}">
        </div>
        <div class="w-full mt-4">
            <label for="tag" class="text-2xl block">Tags</label>
            <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" id="tagsInput">
                <option selected>Select tags</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <div id="tagsContainer" class="grid grid-cols-12 grid-flow-row"></div>
            <input type="hidden" name="tags[]" class="w-full border rounded-sm outline-none p-2" id="tagInput">
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
    $(document).ready(function() {
        const title = document.getElementById("title");
        const slug = document.getElementById("slug");

        title.addEventListener("change", () => {
            fetch(`{{ asset('me/posts/getSlug?title=${title.value}') }}`).then(resp => resp.json()).then(resp => slug.value = resp);
        });

        let arr = [];
        $("#tagsInput").on("change", e => {
            if (!isNaN(e.currentTarget.value) && arr.indexOf(e.currentTarget.value) == -1) {
                arr.push(e.currentTarget.value)
                let text = `
                <button class="tag bg-blue-500" value="${e.currentTarget.value}" type="button">
                    ${e.currentTarget.options[e.currentTarget.options.selectedIndex].textContent}
                </button>
                `;
                $("#tagsContainer").append(text);
            }
        });

        $(window).on("click", e => {
            if (e.target.classList.contains("tag")) {
                arr.splice(arr.indexOf(e.target.value), 1);
                e.target.style.display = "none";
            }
        })

        $("#form").on("submit", e => {
            $("#tagInput").val(arr);
        });
    });
</script>
@endsection
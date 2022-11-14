@extends('layouts.container')
@section('content')
<div class="w-full mt-16">
    <div class="w-full h-80 border bg-center bg-cover bg-no-repeat flex justify-center items-center" style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.5)), url('{{ asset("$user->image") }}')">
        <div class="text-center">
            <img src="{{ asset("$user->image") }}" alt="{{ $user->name }}" class="rounded-full w-48 h-48">
            <p class="text-white font-semibold text-2xl">{{ $user->name }}</p>
        </div>
    </div>
    <h3 class="font-medium text-3xl mt-4 mb-2 ml-4">Posts</h3>
    <div class="w-full grid md:grid-cols-3 grid-rows-[repeat(auto-fit,1fr)] gap-4 p-4">
        @foreach ($user->posts as $post)
            <div>
                <a href="{{ asset("post/$post->slug") }}">
                    <img src="{{ asset("$post->image") }}" alt="" class="rounded-md w-full h-64" loading="lazy">
                </a>
                <div class="p-2">
                    @foreach ($post->tag as $tag)
                        <a href="{{ asset("?tag=" . $tag->tag->name) }}" class="tag" style="background-color: {{ $tag->tag->color }}">{{ $tag->tag->name }}</a>
                    @endforeach
                    <h1 class="font-medium text-3xl">{{ $post->title }}</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset($post->user->image) }}" alt="" loading="lazy" class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a href="{{ asset("user/" . $post->user->id) }}">&nbsp; {{ $post->user->name }} </a>
                        <span>&nbsp; - {{ date("d M Y", strtotime($post->published_at)) }}</span>
                    </div>
                    <p>{{ $post->excerpt }}</p>
                    <a href="{{ asset("post/$post->slug") }}" class="text-blue-400">Read More</a>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection
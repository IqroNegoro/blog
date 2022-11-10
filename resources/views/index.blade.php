@extends('layouts.container')
@section('content')
    <h3 class="font-medium text-3xl p-4 mt-16">Highlight Posts</h3>
    @if ($posts->count() >= 5)
    <div
        class="w-full p-4 grid grid-cols-1 md:grid-cols-3 grid-rows-[repeat(4,250px)] md:grid-rows-[repeat(2,250px)] gap-4">
            @foreach ($posts->take(5) as $post)
            <a href="{{ asset("post/$post->slug") }}" class="rounded-sm items-end bg-no-repeat bg-center bg-cover hidden md:flex @if ($loop->iteration == 2) md:row-span-2 @endif"
                style="background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0)), url('{{ asset("$post->image") }}')">
                <div class="p-2">
                    <h1 class="text-white text-2xl">{{ $post->title }}</h1>
                    <span class="text-white">{{ date("d M Y", strtotime($post->published_at)) }}</span>
                </div>
            </a>
            @endforeach
    </div>
    @endif
    {{-- recent posts --}}
    <div class="w-full p-4 mt-4">
        <h3 class="font-medium text-3xl mb-12">Recent Posts</h3>
        <div class="w-full grid md:grid-cols-3 grid-rows-[repeat(auto-fit,1fr)] gap-4">
            @foreach ($posts as $post)
            <div>
                <a href="{{ asset("post/$post->slug") }}">
                    <img src="{{ asset("$post->image") }}" alt="" class="rounded-md w-full h-64" loading="lazy">
                </a>
                <div class="p-2">
                    @foreach ($post->tag as $tag)
                        <a href="" class="tag" style="background-color: {{ $tag->tag->color }}">{{ $tag->tag->name }}</a>
                    @endforeach
                    <h1 class="font-medium text-3xl">{{ $post->title }}</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/' . $post->user->image) }}" alt="" loading="lazy" class="w-10 h-10 rounded-full mr-4">
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

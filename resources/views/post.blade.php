@extends('layouts.container')
@section('content')
        {{-- header --}}
        <div class="w-full min-h-screen bg-cover bg-no-repeat bg-center flex justify-center items-center" style="background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0)), url('{{ asset("$post->image") }}')">
            <div class="flex justify-center items-center flex-col w-1/2">
                <a href="" class="tag">
                    Travel
                </a>
                <h1 class="text-5xl text-white tracking-wider text-center">{{ $post->title }}</h1>
                <div class="flex items-center my-3">
                    <img src="{{ asset("images/" . $post->user->image) }}" alt="" loading="lazy" class="w-10 h-10 rounded-full mr-4">
                    <span class="text-white">By</span>
                    <a class="text-white" href="{{ asset("user/" . $post->user->id) }}">&nbsp; {{ $post->user->name }} </a>
                    <span class="text-white">&nbsp; - {{ date("d M Y", strtotime($post->published_at)) }} </span>
                </div>
            </div>
        </div>
        {{-- body --}}
        <div class="grid grid-cols-[2fr,1fr] p-16 w-full mt-8">
            <div>
                {!! $post->body !!}
                <p class="my-10">Tags : <a href="" class="text-blue-500">Travel</a></p>
                <h1 class="text-5xl mt-10">Leave A Comment</h1>
                {{-- comment --}}
                @foreach ($post->comment as $comment)
                    <div class="my-10">
                        <img src="{{ asset("images/" . $comment->user->image) }}" alt="" class="w-12 h-12 rounded-full">
                        <a class="inline-block text-blue-500 cursor-pointer mt-2" href="{{ asset("user/" . $comment->user->id) }}">{{ $comment->user->name }}</a>
                        <span class="mt-2">{{ date("d M Y", strtotime($post->created_at)) }}</span>
                        <p class="text-left my-2">{{ $comment->comment }}</p>
                        <button class="bg-blue-500 text-md py-1 px-4 rounded-sm hover:bg-blue-400 transition-all duration-500 text-white reply">
                            Reply
                        </button>
                    </div>
                        @foreach ($comment->replies as $reply)
                        <div class="my-3 translate-x-16">
                            <img src="{{ asset("images/" . $reply->user->image) }}" alt="" class="w-12 h-12 rounded-full">
                            <a class="inline-block text-blue-500 cursor-pointer mt-2" href="{{ asset("user/" . $reply->user->id) }}">{{ $reply->user->name }}</a>
                            <span class="mt-2">{{ date("d M Y", strtotime($post->created_at)) }}</span>
                            <p class="text-left my-2">{{ $reply->comment }}</p>
                            <button class="bg-blue-500 text-md py-1 px-4 rounded-sm hover:bg-blue-400 transition-all duration-500 text-white replied">
                                Reply
                            </button>
                        </div>
                        @endforeach
                @endforeach
            </div>
            {{-- profile --}}
            <div class="flex items-center flex-col w-2/3 mx-auto">
                <img src="{{ asset("images/" . $post->user->image) }}" alt="" class="w-48 h-48 rounded-full">
                <h1 class="mt-6 text-4xl">{{ $post->user->name }}</h1>
                <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas, dicta.</p>
                <a href="" class="bg-blue-500 px-5 py-2 text-white rounded-md mt-2">Profile</a>
            </div>
        </div>
@endsection
@section("script")
<script>
    $(document).ready(function() {
        $(".reply").on("click", e => {

        });
    });
</script>
@endsection
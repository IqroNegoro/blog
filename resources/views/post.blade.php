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
                {{-- comment --}}
                <h1 class="text-5xl mt-10">Leave A Comment</h1>
                <button class="bg-blue-500 py-1 px-3 text-white rounded-sm mt-4" id="replyBtn">Comment</button>
                <div id="replyContainer">
                @foreach ($post->comment as $comment)
                    <div class="my-10">
                        <img src="{{ asset("images/" . $comment->user->image) }}" alt="" class="w-12 h-12 rounded-full">
                        <a class="inline-block text-blue-500 cursor-pointer mt-2" href="{{ asset("user/" . $comment->user->id) }}">{{ $comment->user->name }}</a>
                        <span class="mt-2">{{ date("d M Y", strtotime($post->created_at)) }}</span>
                        <p class="text-left my-2">{{ $comment->comment }}</p>
                        <button class="bg-blue-500 text-md py-1 px-4 rounded-sm hover:bg-blue-400 transition-all duration-500 text-white reply" value="{{ $comment->id }}">
                            Reply
                        </button>
                    </div>
                        @foreach ($comment->replies as $reply)
                        <div class="my-3 translate-x-16">
                            <img src="{{ asset("images/" . $reply->user->image) }}" alt="" class="w-12 h-12 rounded-full">
                            <a class="inline-block text-blue-500 cursor-pointer mt-2" href="{{ asset("user/" . $reply->user->id) }}">{{ $reply->user->name }}</a>
                            <span class="mt-2">{{ date("d M Y", strtotime($post->created_at)) }}</span>
                            <p class="text-left my-2">{{ $reply->comment }}</p>
                            <button class="bg-blue-500 text-md py-1 px-4 rounded-sm hover:bg-blue-400 transition-all duration-500 text-white replied" value="{{ $comment->id }}">
                                Reply
                            </button>
                        </div>
                        @endforeach
                @endforeach
                </div>
            </div>
            {{-- profile --}}
            <div class="flex items-center flex-col w-2/3 mx-auto">
                <img src="{{ asset("images/" . $post->user->image) }}" alt="" class="w-48 h-48 rounded-full">
                <h1 class="mt-6 text-4xl">{{ $post->user->name }}</h1>
                <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas, dicta.</p>
                <a href="" class="bg-blue-500 px-5 py-2 text-white rounded-md mt-2">Profile</a>
            </div>
        </div>
        <div class="fixed left-0 bottom-0 w-full h-16 border flex justify-center items-center px-4 translate-y-16 transition-all duration-500 bg-white" id="replyElement">
            <i class="bx bx-chevron-down text-3xl p-1 mr-1 text-black cursor-pointer hover:bg-slate-200 rounded-sm" id="replyDown"></i>
            <input type="text" class="w-full outline-none bg-slate-200 p-2 rounded-full text-black placeholder:text-black" placeholder="Reply ..." id="replyInput">
            <i class="bx bx-send text-3xl p-1 ml-1 text-black cursor-pointer hover:bg-slate-200 rounded-sm" id="sendComment"></i>
        </div>
@endsection
@section("script")
<script>
    $(document).ready(function() {
        let reply = "";
        let element = "";
        $(".reply").on("click", e => {
            $("#replyElement").removeClass("translate-y-16")
            reply = e.currentTarget.value;
            element = e.currentTarget.id;
            console.log(reply)
            console.log(element)
        });

        $(".replied").on("click", e => {
            $("#replyElement").removeClass("translate-y-16")
            reply = e.currentTarget.value;
            element = e.currentTarget.parentElement.id;
            console.log(reply)
            console.log(element)
        });

        $("#replyBtn").on("click", e => {
            $("#replyElement").removeClass("translate-y-16")
            reply = "";
            element = e.currentTarget.parentElement.id;
            console.log(reply)
            console.log(element)
        });

        $("#replyDown").on("click", e => {
            $("#replyElement").addClass("translate-y-16")
        });

        $("#sendComment").on("click", e => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ asset("post/$post->slug") }}",
                method: "PUT",
                data: {
                    post: "{{ $post->slug }}",
                    comment: $("#replyInput").val(),
                    reply: reply
                },
                dataType: "json",
                success: res => {
                    if (res) {
                        if (!reply) {
                            let text = `
                            <div class="my-10">
                                <img src="{{ asset("images/" . auth()->user()->image) }}" alt="" class="w-12 h-12 rounded-full">
                                <a class="inline-block text-blue-500 cursor-pointer mt-2" href="{{ asset("user/" . auth()->user()->id) }}">{{ auth()->user()->name }}</a>
                                <span class="mt-2">0 second</span>
                                <p class="text-left my-2">${$("#replyInput").val()}</p>
                                <button class="bg-blue-500 text-md py-1 px-4 rounded-sm hover:bg-blue-400 transition-all duration-500 text-white reply" value="${res}">
                                    Reply
                                </button>
                            </div>
                            `;
                            $("#replyContainer").append(text);
                        } else {
                            let text = `
                            <div class="my-3 translate-x-16">
                                <img src="{{ asset("images/" . auth()->user()->image) }}" alt="" class="w-12 h-12 rounded-full">
                                <a class="inline-block text-blue-500 cursor-pointer mt-2" href="{{ asset("user/" . auth()->user()->id) }}">{{ auth()->user()->name }}</a>
                                <span class="mt-2">0 second</span>
                                <p class="text-left my-2">${$("#replyInput").val()}</p>
                                <button class="bg-blue-500 text-md py-1 px-4 rounded-sm hover:bg-blue-400 transition-all duration-500 text-white replied" value="${res}">
                                    Reply
                                </button>
                            </div>
                            `;
                            $(text).insertAfter(`.${element}`)
                            //reply comment error
                        }
                        $("#replyInput").val("")
                    } else {
                        alert("Error When Sending Comment")
                    }
                }
            });
        });
    });
</script>
@endsection
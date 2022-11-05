@extends('layouts.container')
@section('content')
    <div
        class="w-full p-4 grid grid-cols-1 md:grid-cols-3 grid-rows-[repeat(4,250px)] md:grid-rows-[repeat(2,250px)] gap-4 mt-16">
        <a href="" class="rounded-sm flex items-end"
            style="background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0)), url('{{ asset('images/anime.webp') }}')">
            <div class="p-2">
                <h1 class="text-white text-2xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur,
                    adipisci?</h1>
                <span class="text-white">19 Jul, 2022</span>
            </div>
        </a>
        <a href="" class="rounded-sm items-end hidden md:flex md:row-span-2"
            style="background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0)), url('{{ asset('images/anime.webp') }}')">
            <div class="p-2">
                <h1 class="text-white text-2xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur,
                    adipisci?</h1>
                <span class="text-white">19 Jul, 2022</span>
            </div>
        </a>
        <a href="" class="rounded-sm flex items-end"
            style="background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0)), url('{{ asset('images/anime.webp') }}')">
            <div class="p-2">
                <h1 class="text-white text-2xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur,
                    adipisci?</h1>
                <span class="text-white">19 Jul, 2022</span>
            </div>
        </a>
        <a href="" class="rounded-sm flex items-end"
            style="background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0)), url('{{ asset('images/anime.webp') }}')">
            <div class="p-2">
                <h1 class="text-white text-2xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur,
                    adipisci?</h1>
                <span class="text-white">19 Jul, 2022</span>
            </div>
        </a>
        <a href="" class="rounded-sm flex items-end"
            style="background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0)), url('{{ asset('images/anime.webp') }}')">
            <div class="p-2">
                <h1 class="text-white text-2xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur,
                    adipisci?</h1>
                <span class="text-white">19 Jul, 2022</span>
            </div>
        </a>
    </div>
    <div class="w-full p-4 mt-4">
        <h3 class="font-medium text-3xl mb-12">Recent Posts</h3>
        <div class="w-full grid md:grid-cols-3 grid-rows-[repeat(auto-fit,1fr)] gap-4">
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/anime.webp') }}" alt="" class="rounded-md" loading="lazy">
                <div class="p-2">
                    <a href="" class="tag">Travel</a>
                    <h1 class="font-medium text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('images/anime.webp') }}" alt="" loading="lazy"
                            class="w-10 h-10 rounded-full mr-4">
                        <span>By</span>
                        <a>&nbsp; Iqro </a>
                        <span>&nbsp; - July 2022</span>
                    </div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat nemo eos repudiandae mollitia
                        itaque aut odit praesentium a labore error, sapiente amet maiores maxime quidem, totam et. Debitis,
                        nam.</p>
                    <a href="" class="text-blue-400">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

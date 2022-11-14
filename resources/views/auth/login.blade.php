<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="image" href="{{ asset("images/login.jpg") }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')  
</head>
<body>
    <div class="container-fluid">
        @if (session()->has("success") || session()->has("error"))
        <div class="fixed bottom-0 right-0 m-2 py-1 px-4 @if (session()->has('success')) bg-green-500 @else bg-red-500 @endif text-white -translate-y-16 animate-notif z-10">
            <p>{{ session("success") ?? session("error") }}</p>
        </div>
        @endif
        <div class="fixed top-0 left-0 w-full h-16 flex justify-between items-center p-4">
            <span class="font-bold text-white text-2xl">Mini Blog</span>
        </div>
        <div class="bg-cover bg-center bg-no-repeat w-full min-h-screen flex justify-center items-center" style="background-image: linear-gradient(to top, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/login.jpg') }}')">
            <div class="w-full lg:w-1/3 lg:h-96">
                <form action="{{ asset('login') }}" method="POST" class="text-center" id="form" enctype="multipart/form-data">
                    @csrf
                    <i class="bx bx-user text-white text-4xl my-3"></i>
                    <input type="text" id="name" name="name" class="hidden w-full p-4 rounded-xl bg-opacity-25 outline-none text-white bg-white my-3 placeholder:text-white" placeholder="Name" value="{{ old('name') }}">
                    <input type="file" id="image" name="image" class="hidden w-full cursor-pointer p-4 rounded-xl bg-opacity-25 outline-none text-white bg-white my-3 placeholder:text-white file:bg-transparent file:text-white file:outline-none file:border-0">
                    <input type="text" id="email" name="email" class="w-full p-4 rounded-xl bg-opacity-25 outline-none text-white bg-white my-3 placeholder:text-white" placeholder="Email" value="{{ old('email') }}">
                    <input type="password" name="password" class="w-full p-4 rounded-xl bg-opacity-25 outline-none text-white bg-white my-3 placeholder:text-white" placeholder="Password">
                    <button class="w-full rounded-full p-4 bg-red-400 hover:bg-red-500 my-2 h-16 text-md cursor-pointer text-white font-semibold">
                        GET STARTED
                    </button>
                    <div class="w-full flex justify-center items-center my-3">
                        <span class="mx-3 text-sm font-medium text-gray-900 dark:text-gray-300">Login</span>
                        <label for="default-toggle" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" value="" id="default-toggle" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-500"></div>
                        </label>
                        <span class="mx-3 text-sm font-medium text-gray-900 dark:text-gray-300">Register</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const toggle = document.getElementById("default-toggle");
        const form = document.getElementById("form");
        const name = document.getElementById("name");
        const image = document.getElementById("image");
        toggle.addEventListener("change", e => {
            if (e.target.checked) {
                form.action = "{{ asset('register') }}"
                name.classList.toggle("hidden")
                image.classList.toggle("hidden")
            } else {
                name.classList.toggle("hidden")
                image.classList.toggle("hidden")
                form.action = "{{ asset('login') }}"
            }
        })
    </script>
</body>
</html>
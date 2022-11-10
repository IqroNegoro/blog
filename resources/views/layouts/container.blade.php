<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    @yield("head")
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')  
</head>
<body>
    <div class="container-fluid">
        @if (session()->has("success") || session()->has("error"))
        <div class="fixed bottom-0 right-0 m-2 py-1 px-4 @if (session()->has('success')) bg-green-500 @else bg-red-500 @endif text-white translate-y-16 animate-notif z-10">
            <p>{{ session("success") ?? session("error") }}</p>
        </div>
        @endif
        @if ($errors->any())
        <div class="fixed bottom-0 right-0 m-2 py-1 px-4 @if (session()->has('success')) bg-green-500 @else bg-red-500 @endif text-white translate-y-16 animate-notif z-10">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <div class="fixed top-0 left-0 w-full h-16 backdrop-blur-sm bg-white bg-opacity-50 flex justify-between items-center p-4">
            <span class="font-bold">Mini Blog</span>
            <i class="bx bx-menu text-2xl cursor-pointer" id="menuBtn"></i>
        </div>
        <div class="block fixed top-0 transition-all duration-500 right-0 w-0 min-h-screen bg-white drop-shadow-lg shadow-black" id="menu">
            <div class="w-full text-right">
                <i class="bx bx-x text-2xl font-semibold cursor-pointer" id="closeBtn"></i>
            </div>
            <ul>
                <li class="mt-4">
                    <a href="{{ asset('/') }}">Home</a>
                </li>
                <li class="mt-4">
                    <a href="">Contact</a>
                </li>
                <li class="mt-4">
                    <a href="">About</a>
                </li>
                @auth
                <li class="mt-4">
                    <a href="{{ asset('me') }}">Me</a>
                </li>
                <li class="mt-4">
                    <form action="{{ asset('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @else
                <li class="mt-4">
                    <a href="{{ asset('login') }}">Login</a>
                </li>
                @endauth
            </ul>
            @auth
            <hr class="my-4">
            <h2 class="font-semibold text-xl">Manage</h2>
            <ul>
                <li class="mt-4">
                    <a href="{{ asset('me/posts') }}">Posts</a>
                </li>
            </ul>
            @if (auth()->user()->admin == "Y")
            <hr class="my-4">
            <h2 class="font-semibold text-xl">Administrator</h2>
            <ul>
                <li class="mt-4">
                    <a href="{{ asset('administrator/tags') }}">Tags</a>
                </li>
                <li class="mt-4">
                    <a href="{{ asset('administrator/posts') }}">Posts</a>
                </li>
                <li class="mt-4">
                    <a href="{{ asset('administrator/comments') }}">Comments</a>
                </li>
            </ul>
            @endif
            @endauth
        </div>
        @yield("content")
    </div>
    <script>
        const menuBtn = document.getElementById("menuBtn");
        const closeBtn = document.getElementById("closeBtn");
        const menu = document.getElementById("menu");
        menuBtn.addEventListener("click", () => {
            menu.classList.replace("w-0", "w-1/3")
            menu.classList.remove("p-0")
            menu.classList.toggle("p-4");
        });

        closeBtn.addEventListener("click", () => {
            menu.classList.replace("w-1/3", "w-0")
            menu.classList.toggle("p-4");
        });
        window.addEventListener("click", e => {
            if (!e.target.id.includes("menu")) {
                menu.classList.replace("w-1/3", "w-0")
                menu.classList.replace("p-4", "p-0");
            }
        })
    </script>
    @yield("script")
</body>
</html>
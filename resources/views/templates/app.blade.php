<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{isset($title) ? $title : "Page en cours"}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
    </head>
        <body class="bg-white text-noir">
        <header class="flex items-center justify-around p-3 bg-stone-800 text-white border-b-2 border-amber-400">
            <img src="{{Vite::asset('resources/images/logo_01.svg')}}" alt="Logo du site" class="w-[10rem]">
        <nav class="flex gap-4">
            <a href="{{route('index')}}" class="hover:text-zinc-300">Accueil</a>
            <a href="{{route('histoire.index')}}" class="hover:text-zinc-300">Histoires</a>
        @auth
                <a href="{{ route('dashboard') }}" class="hover:text-zinc-300">{{Auth::user()->name}}</a>
                <a href="{{route("logout")}}" class="hover:text-zinc-300"
                onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                <form id="logout" action="{{route("logout")}}" method="post">
                    @csrf
                </form>
            @else
                <a href="{{route("login")}}" class="hover:text-zinc-300">Login</a>
                <a href="{{route("register")}}" class="hover:text-zinc-300">Register</a>
            @endauth
        </nav>
    </header>

        <main class="bg-stone-800 text-white">
            @yield("content")
        </main>

        <footer  class="bg-stone-800 text-white flex justify-center">
            IUT de Lens - Groupe 1 - Les indécis.
        </footer>
        </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{isset($title) ? $title : "Page en cours"}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script defer src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
    </head>
        <body class="bg-white text-noir">
        <header class="flex items-center justify-around p-3 bg-noir text-white border-b-2 border-gold">
            <img src="{{Vite::asset('resources/images/logo_01.svg')}}" alt="Logo du site" class="w-[10rem]">
        <nav class="flex gap-4">
            <a href="{{route('index')}}" class="p-1 hover:border hover:border-gold hover:rounded-lg">Accueil</a>
            <a href="{{route('histoire.index')}}" class="p-1 hover:border hover:border-gold hover:rounded-lg">Histoires</a>
        @auth
                <a href="{{ route('dashboard') }}" class="p-1 hover:border hover:border-gold hover:rounded-lg">{{Auth::user()->name}}</a>
                <a href="{{route("logout")}}" class="p-1 hover:border hover:border-gold hover:rounded-lg"
                onclick="document.getElementById('logout').submit(); return false;">Logout</a>
                <form id="logout" action="{{route("logout")}}" method="post">
                    @csrf
                </form>
            @else
                <a href="{{route("login")}}" class="p-1 hover:border hover:border-gold hover:rounded-lg">Login</a>
                <a href="{{route("register")}}" class="p-1 hover:border hover:border-gold hover:rounded-lg">Register</a>
            @endauth
        </nav>
    </header>

        <main class="bg-noir text-white">
            @yield("content")
        </main>

        <footer class="bg-noir text-white flex justify-center border-t-2 border-gold p-2 h-auto">
                <div class="flex justify-center p-2">
                <p class="text-center">© {{date("Y")}} - Tous droits réservés - Les indécis</p>
                </div>
        </footer>
        </body>
</html>

@extends("templates.app")

@section('content')

    <div class="flex flex-col justify-center gap-6 p-6 rounded-lg bg-stone-800 border-2 border-agold shadow-2xl shadow-amber-700">
        <h1 class="text-3xl font-bold text-center">Se connecter</h1>
        <form action="{{route("login")}}" method="post" class="flex flex-col gap-4">
            @csrf
            <input type="email" name="email" required placeholder="Email" class="rounded p-1 text-noir focus:outline-none" />
            <input type="password" name="password" required placeholder="Mot de passe" class="rounded p-1 text-noir focus:outline-none" />
            <div class="flex jusitfy-center m-auto gap-2 items-center">
            <p>Se rappeler de moi</p>
            <input type="checkbox" name="remember" class="size-4 checked:accent-gold"/>
            </div>
            <input type="submit" class="transition-all border w-max m-auto px-2 py-1 border-gold rounded hover:bg-amber-600" />
        </form>
        <div class="flex justify-center gap-2">
            <p>Pas de compte ? <p>
            <a class="underline" href="{{route("register")}}">Créez en un !</a>
        </div>
    </div>
@endsection
@extends("templates.app")

@section('content')

    <div class="flex flex-col justify-center gap-6 p-6 rounded-lg bg-stone-800 border-2 border-amber-400 shadow-2xl shadow-amber-700">
        <h1 class="text-3xl font-bold text-center">Créer un compte</h1>
        <form action="{{route("register")}}" method="post" class="flex flex-col gap-4">
            @csrf
            <input type="text" name="name" required placeholder="Nom d'utilisateur" class="rounded p-1 text-noir focus:outline-none" />
            <input type="email" name="email" required placeholder="Email" class="rounded p-1 text-noir focus:outline-none" />
            <input type="password" name="password" required placeholder="Mot de passe" class="rounded p-1 text-noir focus:outline-none" />
            <input type="password" name="password_confirmation" required placeholder="Confirmation de mot de passe" class="rounded p-1 text-noir focus:outline-none" />
            <input type="submit" class="transition-all border w-max m-auto px-2 py-1 border-amber-400 rounded hover:bg-amber-400"/>
        </form>
        <div class="flex justify-center gap-2">
            <p>Déjà un compte ? <p>
            <a class="underline" href="{{route("login")}}">Connectez vous</a>
        </div>
    </div>
@endsection
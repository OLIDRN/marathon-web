@extends("templates.app")

@section('content')
    <div class="flex flex-col justify-center gap-6 p-6 max-w-5xl m-auto">
            <div class="flex flex-col justify-center p-6 gap-4">
                <h1 class="text-3xl font-bold text-center m-auto flex gap-2">Bienvenue sur <p class="text-gold">Gold Decision</p></h1>

                <p class="text-center text-xl underline decoration-gold">Vous êtes un nouveau lecteur ?</p>
                <p class="text-center text-md">N'hésitez pas à <a class="m-auto before:content-['→'] underline hover:decoration-gold" href="{{ route('register') }}"> Créer un compte</a>
                </p>
                <p class="text-center text-md">Sinon, n'hésitez pas à <a class="m-auto before:content-['→'] underline hover:decoration-gold" href="{{ route('login') }}"> Vous connecter</a>
                </p>
            </div>

            <div class="flex flex-col justify-center gap-4 items-center">
                <a class="border min-w-52 text-center w-max max-w-md border-gold rounded p-2 hover:bg-gold" href="{{ route('histoire.index') }}">Voir les histoires</a>
                <a class="border min-w-52 text-center w-max max-w-md border-gold rounded p-2 hover:bg-gold" href="{{ route('histoire.show', ['id' => rand(1, 10)]) }}">Lire une histoire au hasard</a>
            </div>

            <hr class="border-2 border-gold">

        <div class="flex flex-col justify-center p-6 gap-4">
            <h1 class="text-3xl font-bold text-center m-auto flex gap-2">L'avis de nos utilisateurs :</h1>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/XHsFTStq6sc?si=6EPcaBZesDG9JJhu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
@endsection
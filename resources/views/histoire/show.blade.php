@extends("templates.app")

@section('content')
    <div class="flex flex-col justify-center gap-10 p-6 max-w-2xl">
        <a class="before:content-['←'] underline" href="{{ route('histoire.index') }}" class="text-2xl underline">Retour</a>
        <h1 class="text-3xl underline text-center">{{ $histoire->titre }}</h1>
        <h2 class="text-xl text-justify max-w-sm m-auto">{{ $histoire->pitch }}</h2>
        <hr class="border-2 border-gold">
        <div class="flex justify-around">
        <p class="text-lg">Genre : {{ $histoire->genre->label }}</p>
        <p>Auteur :
            <a class="underline" href="{{ route('user.dashboard', $histoire->user->name) }}">
                {{ $histoire->user->name }}
            </a>
        </p>
    </div>

        @if($histoire->id == 2)
            <img src="{{ $histoire->photo }}" alt="Image description">
        @elseif($histoire->id == 100)
            <img src="{{ Vite::asset('/public' . $histoire->photo) }}" alt="image de l'histoire">
        @else
            <img src="{{ Storage::url($histoire->photo) }}" alt="image de lqdqd'histoire">
        @endif

        @if(Auth::check())
            @if(Auth::user()->id == $histoire->user_id)
                <div class="flex gap-2">
                <a class="border-2 rounded bg-noir focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" href="{{ route('histoire.edit', $histoire->id) }}">Modifier</a>
                <form method="POST" action="{{ route('histoire.destroy', $histoire->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="border-2 rounded bg-noir focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" type="submit">Supprimer</button>
                </form>
                <a class="border-2 rounded bg-noir focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" href="{{ route('histoire.encours', $histoire->id) }}">Créer un chapitre</a>
                </div>
            @endif
        @endif

        <a class="border-2 rounded focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" href="{{route('histoire.starthistory', $histoire->id)}}"><p>Commencer la lecture</p></a>
        
        <hr class="border-2 border-gold">

        <form class="flex flex-col gap-2 justify-center m-auto" method="POST" action="{{ route('histoire.avis', $histoire->id) }}">
            @csrf
            <label class="text-lg py-2" for="contenu">Ajouter un commentaire :</label>
            <textarea class="p-2 w-96 bg-stone-700 text-gold focus:outline-none" rows="3" id="contenu" name="contenu" required></textarea>
            <button class="flex gap-2 rounded p-2 border border-gold w-max hover:bg-stone-600" type="submit">
                Envoyer
                <box-icon name='send' color='#cba135' ></box-icon>
            </button>
        </form>

        <p class="text-md underline text-center">Nombre de commentaire : {{ $histoire->avis->count() }}</p>

        @foreach($histoire->avis as $avis)
            <div class="transition-all  hover:border hover:border-gold flex flex-col rounded p-1 hover:shadow-xl hover:shadow-amber-500 hover:scale-105">
                    <a class="underline border-b border-gold p-1" href="{{ route('user.dashboard', $avis->user->name) }}">
                        {{ $avis->user->name }}
                    </a>
                <p>{{ $avis->contenu }}</p>
            </div>
        @endforeach

    </div>



@endsection


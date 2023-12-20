@extends("templates.app")

@section('content')
    <div class="flex flex-col justify-center gap-10 p-6 max-w-2xl">
        <a class="before:content-['←'] underline" href="{{ route('histoire.index') }}" class="text-2xl underline">Retour</a>
        <h1 class="text-3xl underline">{{ $histoire->titre }}</h1>
        <h2 class="text-xl text-justify max-w-sm">{{ $histoire->pitch }}</h2>
        <p class="text-lg">Genre : {{ $histoire->genre->label }}</p>
        <p>Auteur :
            <a class="underline" href="{{ route('user.dashboard.blade.php', $histoire->user->name) }}">
                {{ $histoire->user->name }}
            </a></p>

        @if($histoire->id == 2)
            <img src="{{ $histoire->photo }}" alt="Image description">
        @elseif($histoire->id == 100)
            <img src="{{ Vite::asset('/public' . $histoire->photo) }}" alt="image de l'histoire">
        @else
            <img src="{{ Vite::asset('/public/storage/' . $histoire->photo) }}" alt="image de lqdqd'histoire">
        @endif

        @if(Auth::check())
            @if(Auth::user()->id == $histoire->user_id)
                <a href="{{ route('histoire.edit', $histoire->id) }}">Modifier</a>
                <form method="POST" action="{{ route('histoire.destroy', $histoire->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            @endif
        @endif

        <a href="{{route('histoire.starthistory', $histoire->id)}}"><p>Commencer la lecture</p></a>

        @foreach($histoire->avis as $avis)
            <div>
                <p>Auteur : {{ $avis->user->name }}</p>
                <p>Commentaire : {{ $avis->contenu }}</p>
            </div>
        @endforeach

        <form method="POST" action="{{ route('histoire.avis', $histoire->id) }}">
            @csrf
            <label for="contenu">Ajouter un commentaire :</label>
            <textarea id="contenu" name="contenu" required></textarea>
            <button type="submit">Soumettre</button>
        </form>
    </div>



@endsection


@extends("templates.app")

@section('content')

    <div class="my-16 flex flex-col justify-center gap-6 p-6 min-w-96 max-w-2xl border-2 border-gold rounded">
        <h1 class="text-3xl underline">{{ $histoire->titre }}</h1>
        @if ($histoire->photo)
            <img class="" src="{{ $histoire->photo }}" alt="Image description">
        @else
            <p>Pas d'image</p>
        @endif
        <hr class="border border-gold">
        <h2>Chapitre :</h2>
        <div class="">
            <h3>{{ $chapitre->texte }}</h3>
            <p>{{ $chapitre->question }}</p>
            <hr class="border border-gold mt-4">
            <div class="flex flex-col justify-center m-auto gap-4 mt-4">
            @foreach($chapitre->suivants as $suiv)
            <a class="before:content-['→'] border w-max max-w-md border-gold rounded p-1 hover:bg-gold" href="{{ route('histoire.showChapitre', ['histoire' => $histoire->id, 'chapitre' => $suiv->id]) }}"> {{ $suiv->pivot->reponse }}</a>
            @endforeach
            </div>
        </div>
    </div>

@endsection
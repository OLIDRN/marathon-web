@extends("templates.app")

@section('content')

    <div class="flex flex-col justify-center gap-10 p-6 max-w-2xl">
        <h1>{{ $histoire->titre }}</h1>
        <img src="{{ $histoire->photo }}" alt="Image description">
        <h2>Chapter:</h2>
        <div>
            <h3>{{ $chapitre->titre }}</h3>
            <p>{{ $chapitre->question }}</p>
            @foreach($chapitre->suivants as $suiv)
                <a href="{{ route('histoire.showChapitre', ['histoire' => $histoire->id, 'chapitre' => $suiv->id]) }}">{{ $suiv->pivot->reponse }}</a>
            @endforeach
        </div>
    </div>

@endsection
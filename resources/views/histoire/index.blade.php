<button class="btn btn-primary" onclick="window.location='{{ route('histoire.create') }}'">Ajouter une histoire</button>


@foreach($histoire as $story)
    <h3>Titre : {{ $story->titre }}</h3>
    <h4>Resume : {{ $story->pitch }}</h4>
    <a href="{{ route('histoire.show', $story->id) }}">Lire la suite</a>
@endforeach
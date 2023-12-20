<h1>{{ $user->name }}</h1>
<h2>Nombre d'histoire : {{ $user->mesHistoires->count() }}</h2>
@foreach($user->mesHistoires as $histoire)
    <div>
        <a href="{{ route('histoire.show', $histoire->id) }}">
            <h3>Titre : {{ $histoire->titre }}</h3>
        </a>
    </div>
@endforeach

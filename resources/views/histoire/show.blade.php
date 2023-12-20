<h1>{{ $histoire->titre }}</h1>
<h2>{{ $histoire->pitch }}</h2>
<p>Genre : {{ $histoire->genre->label }}</p>
<p><a href="{{ route('user.dashboard', $histoire->user->name) }}">Auteur : {{ $histoire->user->name }}</a></p>

@if($histoire->id == 2)
    <img src="{{ $histoire->photo }}" alt="Image description">
@else
    <img src="{{ Vite::asset('/public' . $histoire->photo) }}" alt="image de l'histoire">
@endif
<a href="{{ route('histoire.starthistory', ['id' => $histoire->id]) }}"><p> Commencer l'histoire</p></a>

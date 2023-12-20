<h1>{{ $histoire->titre }}</h1>
<h2>{{ $histoire->pitch }}</h2>
<p>Genre : {{ $histoire->genre->label }}</p>
<p><a href="{{ route('dashboard') }}">Auteur : {{ $histoire->user->name }}</p>

@if($histoire->id == 2)
    <img src="{{ $histoire->photo }}" alt="Image description">
@else
    <img src="{{ Vite::asset('/public' . $histoire->photo) }}" alt="image de l'histoire">
@endif


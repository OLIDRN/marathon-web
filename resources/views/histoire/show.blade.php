<h1>{{ $histoire->titre }}</h1>
<h2>{{ $histoire->pitch }}</h2>
<p>Genre : {{ $histoire->genre->label }}</p>
<p><a href="{{ route('user.dashboard', $histoire->user->name) }}">Auteur : {{ $histoire->user->name }}</a></p>

@if($histoire->id == 2)
    <img src="{{ $histoire->photo }}" alt="Image description">
@else
    <img src="{{ Vite::asset('/public' . $histoire->photo) }}" alt="image de l'histoire">
@endif

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
@extends("templates.app")

@section('content')

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
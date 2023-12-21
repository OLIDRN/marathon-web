<!-- donne moi un code afin de pouvoir creer les chapitres d'une histoire avec un titre, un titre court, un media, une question, un bouton pour choisir si c'est le premier chapitre et une zone de texte afin de noter le chapitre et un bouton pour valider le chapitre -->
<!-- resources/views/chapitre/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un chapitre</title>
</head>
<body>
<h1>Créer un chapitre</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('encours.store') }}">
    @csrf

    <div>
        <label for="titre">Titre du chapitre:</label><br>
        <input type="text" id="titre" name="titre"><br><br>
    </div>

    <div>
        <label for="titrecourt">Titre court:</label><br>
        <input type="text" id="titrecourt" name="titrecourt"><br><br>
    </div>

    <div>
        <label for="media">Média:</label><br>
        <input type="text" id="media" name="media"><br><br>
    </div>

    <div>
        <label for="question">Question:</label><br>
        <input type="text" id="question" name="question"><br><br>
    </div>

    <div>
        <label for="texte">Texte du chapitre:</label><br>
        <textarea id="texte" name="texte"></textarea><br><br>
    </div>

    <div>
        <label for="premier">Premier chapitre:</label><br>
        <input type="checkbox" id="premier" name="premier"><br><br>
    </div>

    <button type="submit">Valider le chapitre</button>
</form>
</body>
</html>

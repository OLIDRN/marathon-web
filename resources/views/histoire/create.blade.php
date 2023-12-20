
<title>Créer une histoire</title>

<div class="create-scene">
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

        <form method="POST" action="{{ route('histoire.store') }}" onsubmit="return confirm('Etes vous sur de confirmer la création ?')">
            @csrf
            <label for="titre">Titre de l'histoire:</label>
            <input type="text" name="titre" value="{{ old('titre') }}" required>

            <label for="pitch">Pitch de l'histoire:</label>
            <textarea name="pitch" required>{{ old('pitch') }}</textarea>

            <label for="photo">Photo de l'histoire</label>
            <input type="file" name="photo" value="{{ old('photo') }}" required>

            <label for="genre_id">Genre:</label>
            <input type="number" name="genre_id" value="{{ old('genre_id') }}" required> <!-- Add this line -->

            <button type="submit">Créer l'histoire</button>
        </form>
</div>
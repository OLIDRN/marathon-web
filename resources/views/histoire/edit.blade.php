<form method="POST" action="{{ route('histoire.update', $histoire->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col justify-center gap-10 p-6 max-w-2xl">
        <a class="before:content-['←'] underline" class="text-2xl underline" href="{{ route('histoire.index') }}">Retour</a>
        <h1 class="text-3xl underline">Modifier une histoire</h1>
        <div class="flex flex-col gap-4">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="{{ $histoire->titre }}" required>
        </div>
        <div class="flex flex-col gap-4">
            <label for="pitch">Pitch :</label>
            <textarea id="pitch" name="pitch" required>{{ $histoire->pitch }}</textarea>
        </div>
        <div class="flex flex-col gap-4">
            <label for="genre">Genre :</label>
            <select id="genre" name="genre_id" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $histoire->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-4">
            <label for="photo">Photo :</label>
            <input type="file" id="photo" name="photo" required>
        </div>
        <button type="submit">Soumettre</button>
    </div>
</form>
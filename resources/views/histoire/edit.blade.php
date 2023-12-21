@extends("templates.app")

@section('content')


<form method="POST" action="{{ route('histoire.update', $histoire->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col justify-center gap-6 p-6 max-w-2xl m-auto">
        <a class="before:content-['←'] underline" class="text-2xl underline" href="{{ route('histoire.index') }}">Retour</a>
        <h1 class="text-3xl underline text-center">Modifier une histoire</h1>
        <div class="flex flex-col gap-4 border border-gold relative">
            <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="titre">Titre :</label>
            <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="text" id="titre" name="titre" value="{{ $histoire->titre }}" required>
        </div>
        <div class="flex flex-col gap-4 border border-gold relative">
            <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="pitch">Pitch :</label>
            <textarea class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" id="pitch" name="pitch" required>{{ $histoire->pitch }}</textarea>
        </div>
        <div class="flex flex-col gap-4 border border-gold relative">
            <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="genre">Genre :</label>
            <select class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" id="genre" name="genre_id" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $histoire->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-4 border border-gold relative">
            <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="photo">Photo :</label>
            <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="file" id="photo" name="photo" required>
        </div>
        <button class="border-2 rounded bg-stone-600 focus:outline-none border-gold w-max p-2 m-auto" type="submit">Soumettre</button>
    </div>
</form>

@endsection
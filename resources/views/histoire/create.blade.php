@extends("templates.app")

@section('content')


<form method="POST" action="{{ route('histoire.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="flex flex-col justify-center gap-6 p-6 max-w-2xl m-auto">
        <a class="before:content-['←'] underline" class="text-2xl underline" href="{{ route('histoire.index') }}">Retour</a>
        <h1 class="text-3xl underline text-center">Créer une histoire</h1>
        <div class="flex flex-col gap-4 border border-gold relative">
            <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="titre">Titre :</label>
            <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="text" id="titre" name="titre" required>
        </div>
        <div class="flex flex-col gap-4 border border-gold relative">
            <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="pitch">Pitch :</label>
            <textarea class="p-2 border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" id="pitch" name="pitch" required></textarea>
        </div>
        <div class="flex flex-col gap-4 border border-gold relative">
            <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="genre">Genre :</label>
            <select class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" id="genre" name="genre_id" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-4">
            <label for="photo">Photo :</label>
            <input class="p-2 border-2 rounded bg-stone-600 focus:outline-none border-gold" type="file" id="photo" name="photo" required>
        </div>
        <button class="border-2 rounded bg-stone-600 focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" type="submit">Soumettre</button>
    </div>
</form>

@endsection
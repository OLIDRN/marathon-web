@extends("templates.app")

@section('content')
    <div class="flex flex-col flex-wrap justify-center gap-10 p-6 ">
        <div class="flex">
            <h1 class="text-3xl font-bold text-center flex m-auto">Histoires</h1>
        </div>
        <form class="flex justify-center" method="POST" action="{{ route('histoire.un')  }}">
            @csrf
            @method('POST')
            <select class="border border-gold p-1 bg-stone-800 focus:outline-none" id="cat" name="cat" onchange="this.form.submit()">
                <option value="" {{ $cat == null ? 'selected' : '' }}>Tout les genres</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $cat == $genre->id ? 'selected' : '' }}>{{ $genre->label }}</option>
                @endforeach
            </select>
        </form>
        @foreach($histoire as $story)
            @if($story->active === 1)
                <div class="flex flex-col justify-center max-w-md gap-4 p-6 rounded-lg border-2 border-gold shadow-2xl shadow-amber-700">
                    <h3 class="text-xl font-bold">{{ $story->titre }}</h3>
                    @if($story->id == 2)
                        <img class="aspect-square object-cover w-full" src="{{ $story->photo }}" alt="Image description">
                    @elseif($story->id == 100)
                        <img class="aspect-square object-cover w-full" src="{{ Vite::asset('/public' . $story->photo) }}" alt="image de l'histoire">
                    @else
                        <img class="aspect-square object-cover w-full" src="{{ Storage::url($story->photo) }}" alt="image de lqdqd'histoire">
                    @endif
                    <h4 class="text-sm">Auteur :
                        <a class="underline text-stone-400 italic" href="{{ route('user.dashboard', $story->user->name) }}">
                            {{ $story->user->name }}
                        </a>
                    </h4>
                    <h4 class="text-sm">Genre :
                        <a class="underline text-stone-400 italic" href="{{ route('user.dashboard', $story->user->name) }}">
                            {{ $story->genre->label }}
                        </a>
                    </h4>
                    <h4 class="text-sm">Resume : {{ $story->pitch }}</h4>
                    <a class="rounded p-2 bg-stone-700 w-max hover:bg-stone-600" href="{{ route('histoire.show', $story->id) }}">
                        Lire la suite
                    </a>
                </div>
            @endif
        @endforeach
    </div>
    <button class="fixed bottom-0 right-0 m-4 p-2 bg-stone-700 rounded-full hover:bg-stone-600" onclick="window.location.href='{{ route('histoire.create') }}'">
        Créer une histoire
    </button>
@endsection
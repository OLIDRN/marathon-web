@extends("templates.app")

@section('content')

    <div class="flex flex-col flex-wrap justify-center gap-10 p-6 ">
        <div class="flex">
        <h1 class="text-3xl font-bold text-center flex m-auto">Histoires</h1>
        </div>
            @foreach($histoire as $story)
            <div class="flex flex-col justify-center max-w-md gap-4 p-6 rounded-lg border-2 border-amber-400 shadow-2xl shadow-amber-700">
                <h3 class="text-xl font-bold">{{ $story->titre }}</h3>
                @if($story->id == 2)
                <img class="aspect-square object-cover w-full" src="{{ $story->photo }}" alt="Image description">
            @else
                <img class="aspect-square object-cover w-full" src="{{ Vite::asset('/public' . $story->photo) }}" alt="image de l'histoire">
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
            @endforeach
    </div>


@endsection
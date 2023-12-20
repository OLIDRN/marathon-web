@extends("templates.app")

@section('content')

    <div class="flex flex-col justify-center gap-10 p-6 max-w-2xl">
        <h1 class="text-3xl underline">{{ $histoire->titre }}</h1>
        <h2 class="text-xl text-justify max-w-sm">{{ $histoire->pitch }}</h2>
        <p class="text-lg">Genre : {{ $histoire->genre->label }}</p>
        <p>Auteur :  
            <a class="underline" href="{{ route('user.dashboard', $histoire->user->name) }}">
            {{ $histoire->user->name }}
        </a></p>

        @if($histoire->id == 2)
            <img src="{{ $histoire->photo }}" alt="Image description">
        @else
            <img src="{{ Vite::asset('/public' . $histoire->photo) }}" alt="image de l'histoire">
        @endif
    </div>

@endsection

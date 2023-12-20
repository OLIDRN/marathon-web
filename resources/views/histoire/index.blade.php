@extends("templates.app")

@section('content')

    <div class="flex flex-col justify-center gap-10 p-6 ">
        <h1 class="text-3xl font-bold text-center">Histoires</h1>
            @foreach($histoire as $story)
            <div class="flex flex-col justify-center max-w-md gap-4 p-6 rounded-lg border-2 border-amber-400 shadow-2xl shadow-amber-700">
                <h3 class="text-xl">{{ $story->titre }}</h3>
                <h4 class="text-sm">Resume : {{ $story->pitch }}</h4>
                <a class="rounded p-2 bg-stone-700 w-max hover:bg-stone-600" href="{{ route('histoire.show', $story->id) }}">
                    Lire la suite
                </a>
            </div>
            @endforeach
    </div>


@endsection
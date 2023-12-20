@extends("templates.app")

@section('content')


    <div class="flex flex-col justify-center gap-2 p-6 max-w-2xl">
        <h1 class="text-3xl">{{ $user->name }}</h1>
        <hr class="border-2 border-amber-400">
        <h2>Nombre d'histoire(s) : {{ $user->mesHistoires->count() }}</h2>
        {{-- <h2>Nombre de vote(s) : {{ $user->votes->count() }}</h2> --}}
        @foreach($user->mesHistoires as $histoire)
            <div>
                <a class="underline" href="{{ route('histoire.show', $histoire->id) }}">
                    {{ $histoire->titre }}
                </a>
            </div>
        @endforeach
    </div>

@endsection
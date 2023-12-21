@extends("templates.app")

@section('content')

    <div class="flex flex-col justify-center gap-2 p-6 max-w-2xl border-2 border-gold shadow-2xl shadow-amber-600 rounded-lg">
        <h1 class="text-3xl">{{ $user->name }}</h1>
        <hr class="border-2 border-gold">
            <h2>Nombre d'histoire(s) : {{ $user->mesHistoires->where('active',1)->count() }}</h2>
            @foreach($user->mesHistoires()->where('active',1)->get() as $histoire)
                <div>
                    <a class="underline" href="{{ route('histoire.show', $histoire->id) }}">
                        {{ $histoire->titre }}
                    </a>
                </div>
            @endforeach
    </div>

@endsection
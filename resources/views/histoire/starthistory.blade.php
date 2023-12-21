@extends("templates.app")

@section('content')


    <div class="flex flex-col justify-center gap-10 p-6 max-w-2xl">
    <h1>{{ $histoire->titre }}</h1>
    <img src="{{ $histoire->photo }}" alt="Image description">
    {{-- @if($histoire->id == 2)
        <img src="{{ Vite::asset('/public' . $histoire->photo) }}" alt="image de l'histoire">
    @else
        <img src="{{ Storage::url($histoire->photo) }}" alt="image de lqdqd'histoire">
    @endif     --}}
    <p>{{ $histoire->pitch }}</p>

    <div class="flex gap-2">
    <a class="flex p-2 border border-gold w-max hover:bg-gold" href="#">Choix 1</a>
    <a class="flex p-2 border border-gold w-max hover:bg-gold" href="#">Choix 2</a>
    </div>
    </div>

@endsection
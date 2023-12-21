@extends("templates.app")

@section('content')

    <div class="error w-full h-screen"></div>

    {{-- div error 404 --}}
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="flex flex-col justify-center gap-4 max-w-2xl m-auto">
            <h1 class="text-3xl text-center">Oups</h1>
            <p class="text-center text-xl">Vous vous êtes perdus ?</p>
            <a class="m-auto text-lg before:content-['←'] underline" class="text-2xl underline" href="{{ route('index') }}"> Retourner en lieu sûr</a>
        </div>



@endsection
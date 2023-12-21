@extends("templates.app")

@section('content')
<div class="flex flex-col justify-center gap-10 p-6 max-w-2xl">
    <div class="flex flex-col justify-content-center">
                <div class="card border rounded-lg border-gold p-3">
                    <div class="">
                    @if ($user->avatar != 'default.png')
                        <img class="w-[10rem] bg-gold rounded-xl mx-auto mb-16" src="{{ asset('storage/' . $user->avatar) }}" alt="avatar">
                    @else
                        <img class="w-[10rem] bg-gold rounded-xl mx-auto mb-16" src="https://upload.wikimedia.org/wikipedia/commons/7/72/Default-welcomer.png" alt="qendjkqbefjk">
                    @endif
                    </div> 
                    <div class="flex flex-col">
                    <form class="flex flex-col gap-4" method="POST" action="{{ route('user.updateAvatar') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-4 border border-gold relative">
                        <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-stone-800" for="avatar">Modifier l'avatar :</label>
                        <input class="border-2 p-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="file" id="avatar" name="avatar" required>
                        </div>
                        <button class="border-2 rounded bg-stone-600 focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" type="submit">Soumettre</button>
                    </form>
                </div>
                
                <div class="card-bod mt-4 gap-4 text-center">
                        <h1 class="text-xl">{{ $user->name }}</h1>
                        <p>Email: {{ $user->email }}</p>
                        <hr class="border m-4 border-gold">
                        <p>Vous etes l'auteur de {{ $user->mesHistoires->count() }} histoires</p>
                            @foreach($user->mesHistoires as $histoire)
                                <a class="underline" href="{{ route('histoire.show', $histoire->id) }}">
                                    <li>
                                    {{ $histoire->titre }}
                                    </li>
                                </a>
                            @endforeach
                    </div>
                </div>
            </div>
    </div>
@endsection
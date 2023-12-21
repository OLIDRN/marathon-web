@extends("templates.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{ Auth::user()->avatar ?? 'chemin/vers/votre/image/par/defaut.png' }}" alt="Avatar" width="100" height="100" style="border-radius: 50%; margin-bottom: 20px;">
                    <form method="POST" action="{{ route('user.updateAvatar') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="avatar">Modifier l'avatar :</label>
                        <input type="file" id="avatar" name="avatar" required>
                        <button type="submit">Soumettre</button>
                    </form>
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <p>Email: {{ $user->email }}</p>
                        <p>Vous etes l'auteur de {{ $user->mesHistoires->count() }} histoires</p>
                        <li>
                            @foreach($user->mesHistoires as $histoire)
                                <a href="{{ route('histoire.show', $histoire->id) }}">{{ $histoire->titre }}</a>
                            @endforeach
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends("templates.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
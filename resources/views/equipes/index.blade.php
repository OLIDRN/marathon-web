@vite('/resources/css/app.css')
@extends("templates.app")

@section('content')
    <title>Equipe {{ $equipe['nomEquipe'] }}</title>
        <div class="flex flex-col justify-center gap-2 p-6 rounded-lg border-2 border-amber-400 shadow-2xl shadow-amber-700">
            <h1 class="text-3xl font-bold text-center">{{ $equipe['nomEquipe'] }}</h1>
            <h2 class="text-xl text-center text-zinc-600">{{ $equipe['slogan'] }}</h2>
            <h3 class="text-zinc-400 text-center underline">Salle {{ $equipe['localisation'] }}</h3>
            <table class="text-justify m-auto text-white">
                <thead class="">
                <tr class="">
                    <th class="text-left w-full">Nom</th>
                    <th>Prenom</th>
                    <th>Fonction</th>
                </tr>
                </thead>
                <tbody class="text-xs">
                @foreach($equipe['membres'] as $membre)
                    <tr class="">
                        <td class="">{{ $membre['nom'] }}</td>
                        <td class="px-2">{{$membre['prenom'] }}</td>
                        <td>
                            @foreach($membre['fonctions'] as $fonction)
                                <p>{{ $fonction }}</p>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
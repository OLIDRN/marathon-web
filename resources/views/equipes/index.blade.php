<title>Equipe {{ $equipe['nomEquipe'] }}</title>
<h1>{{ $equipe['nomEquipe'] }}</h1>
<h2>{{ $equipe['slogan'] }}</h2>
<h3>Salle {{ $equipe['localisation'] }}</h3>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Fonction</th>
    </tr>
    </thead>
    <tbody>
    @foreach($equipe['membres'] as $membre)
        <tr>
            <td>{{ $membre['nom'] }}</td>
            <td>{{ $membre['prenom'] }}</td>
            <td>
                @foreach($membre['fonctions'] as $fonction)
                    <p>{{ $fonction }}</p>
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
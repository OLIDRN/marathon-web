
    <h1>Créer un chapitre pour l'histoire : {{ $histoire->titre }}</h1>
    <form method="POST" action="{{ route('encours.store', $histoire->id) }}">
        @csrf
        <div class="form-group">
            <label for="titre">Titre du chapitre:</label>
            <input type="text" id="titre" name="titre" class="form-control">
        </div>

        <div class="form-group">
            <label for="titrecourt">Titre court:</label>
            <input type="text" id="titrecourt" name="titrecourt" class="form-control">
        </div>

        <div class="form-group">
            <label for="media">Média:</label>
            <input type="text" id="media" name="media" class="form-control">
        </div>

        <div class="form-group">
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" class="form-control">
        </div>

        <div class="form-group">
            <label for="texte">Texte du chapitre:</label>
            <textarea id="texte" name="texte" class="form-control"></textarea>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="premier" name="premier" class="form-check-input">
            <label for="premier" class="form-check-label">Premier chapitre</label>
        </div>

        <button type="submit" class="btn btn-primary">Valider le chapitre</button>
    </form>

    <h1>Chapitre de l'histoire</h1>
    <form action="{{ route('chapitres.order', ['id' => $histoire->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="chapitre_source">Chapitre Source:</label>
            <select id="chapitre_source" name="chapitre_source" class="form-control">
                @foreach($chapitres as $chapitre)
                    <option value="{{ $chapitre->id }}" {{ $chapitre->premier ? 'selected' : '' }}>{{ $chapitre->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="chapitre_destination">Chapitre Destination:</label>
            <select id="chapitre_destination" name="chapitre_destination" class="form-control">
                @foreach($chapitres as $chapitre)
                    <option value="{{ $chapitre->id }}">{{ $chapitre->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reponse_destination">Réponse Destination:</label>
            <input type="text" id="reponse_destination" name="reponse_destination" placeholder="Entrez la réponse">
        </div>

        <button type="submit" class="btn btn-primary">Lier les chapitres</button>

        <h2>Liaison</h2>
        <table>
            <thead>
                <tr>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Réponse</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chapitres as $chapitre)
                    @foreach($chapitre->suivants as $chapitreDestination)
                        <tr>
                            <td>{{ $chapitre->id }} : {{ $chapitre->question }}</td>
                            <td>{{ $chapitreDestination->pivot->reponse }}</td>
                            <td>{{ $chapitreDestination->id }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </form>
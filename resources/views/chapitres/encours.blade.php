@extends("templates.app")

@section('content')

<div class="flex flex-col md:flex-row justify-center gap-10 p-6 max-w-2xl">
    <div class="flex flex-col gap-4 p-2 border border-gold relative rounded">
        <h1 class="text-md underline">Créer un chapitre pour l'histoire : {{ $histoire->titre }}</h1>
        <form class="flex flex-col gap-6" method="POST" action="{{ route('encours.store', $histoire->id) }}">
            @csrf
            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="titre">Titre du chapitre:</label>
                <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="text" id="titre" name="titre" class="form-control">
            </div>

            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="titrecourt">Titre court:</label>
                <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="text" id="titrecourt" name="titrecourt" class="form-control">
            </div>

            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="media">Média:</label>
                <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="text" id="media" name="media" class="form-control">
            </div>

            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="question">Question:</label>
                <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="text" id="question" name="question" class="form-control">
            </div>

            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="texte">Texte du chapitre:</label>
                <textarea class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" id="texte" name="texte" class="form-control"></textarea>
            </div>

            <div class="flex items-center justify-center gap-2 form-group form-check">
                <label class="border-2 p-1 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" for="premier" class="form-check-label">Premier chapitre</label>
                <input class="size-5 checked:accent-gold" type="checkbox" id="premier" name="premier" class="form-check-input">
            </div>

            <button class="border-2 rounded bg-stone-600 focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" type="submit" class="btn btn-primary">Valider le chapitre</button>
        </form>
        </div>

        <div class="flex flex-col gap-4 p-2 border border-gold relative rounded">
            <h1 class="underline">Chapitre de l'histoire</h1>
        <form class="flex flex-col gap-6" action="{{ route('chapitres.order', ['id' => $histoire->id]) }}" method="POST">
            @csrf
            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="chapitre_source">Chapitre Source:</label>
                <select class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" id="chapitre_source" name="chapitre_source" class="form-control">
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}" {{ $chapitre->premier ? 'selected' : '' }}>{{ $chapitre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="chapitre_destination">Chapitre Destination:</label>
                <select class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" id="chapitre_destination" name="chapitre_destination" class="form-control">
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}">{{ $chapitre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-4 border border-gold relative">
                <label class="absolute top-[-1rem] left-2 leading-2 z-10 bg-noir" for="reponse_destination">Réponse Destination:</label>
                <input class="border-2 relative m-2 rounded bg-stone-600 focus:outline-none border-gold" type="text" id="reponse_destination" name="reponse_destination" placeholder="Entrez la réponse">
            </div>

            <button class="border-2 rounded bg-stone-600 focus:outline-none border-gold w-max p-2 m-auto hover:bg-gold" type="submit" class="btn btn-primary">Lier les chapitres</button>

            <hr class="border m-4 border-gold">

            <div class="flex flex-col gap-4 p-4 w-72">
            <h2 class="underline text-center">Liaisons</h2>
            <table class="text-center">
                <thead>
                    <tr class="">
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
            </div>
        </form>
        </div>

@endsection
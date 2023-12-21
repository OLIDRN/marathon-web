<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use App\Models\Suite;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function create($id)
    {
        $histoire = Histoire::find($id);
        $chapitres = $histoire->chapitres;
        return view('chapitres.encours', ['histoire' => $histoire, 'chapitres' => $chapitres]);
    }

    public function store(Request $request, $id)
    {
        $histoire = Histoire::find($id);

        $request->validate([
            'titre' => 'required',
            'titrecourt' => 'required',
            'texte' => 'required',
        ]);

        $chapitre = new Chapitre();
        $chapitre->titre = $request->titre;
        $chapitre->titrecourt = $request->titrecourt;
        $chapitre->texte = $request->texte;
        $chapitre->media = $request->media ?? null;
        $chapitre->question = $request->question ?? null;
        $chapitre->histoire_id = $histoire->id;
        $chapitre->premier = $request->has('premier') ? 1 : 0;
        $chapitre->save();

        return redirect()->route('encours.create', ['id' => $id]);
    }

    // Dans ChapitreController.php
    public function order(Request $request, $id)
    {
        $histoire = Histoire::find($id);
        $chapitres = $histoire->chapitres;

        $chapitreSourceId = $request->input('chapitre_source');
        $chapitreDestinationId = $request->input('chapitre_destination');
        $reponse = $request->input('reponse_destination');

        $chapitreSource = Chapitre::find($chapitreSourceId);
        $chapitreSource->suivants()->attach($chapitreDestinationId, ['reponse' => $reponse]);

        return redirect()->route('encours.create', ['id' => $id]);
    }
}
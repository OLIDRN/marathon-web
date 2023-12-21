<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function create()
    {
        return view('histoire.encours');
    }

    public function store(Request $request)
    {
            $request->validate([
                'titrecourt' => 'required',
                'texte' => 'required',
            ]);

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $chapitre = new Chapitre();
        $chapitre->titre = $request->titre;
        $chapitre->titrecourt = $request->titrecourt;
        $chapitre->texte = $request->texte;
        $chapitre->question = $request->question;
        $chapitre->histoire_id = 40;
        if ($request->premier == 1) {
            $chapitre->premier =true;
        }else {
            $chapitre->premier = false;
        }

        $chapitre->save();

    }
}
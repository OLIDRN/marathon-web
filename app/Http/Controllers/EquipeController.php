<?php

namespace App\Http\Controllers;

class EquipeController extends Controller
{
    public function index(){
        $equipe= [
            'nomEquipe'=>"Les indécis",
            'logo'=>"referenceDuFichier",
            'slogan'=>"testetstetsetts",
            'localisation'=>"002X",
            'membres'=> [
                [ 'nom'=>"Hernandez",'prenom'=>"Thomas", 'image'=>"nomFichier", 'fonctions'=>["concepteur"] ],
                [ 'nom'=>"Lefebvre",'prenom'=>"Louis", 'image'=>"nomFichier", 'fonctions'=>["concepteur"] ],
                [ 'nom'=>"Obin",'prenom'=>"Sacha", 'image'=>"nomFichier", 'fonctions'=>["concepteur"] ],
                [ 'nom'=>"Grand",'prenom'=>"Emilien", 'image'=>"nomFichier", 'fonctions'=>["concepteur"] ],
                [ 'nom'=>"Vallet",'prenom'=>"Alexandre", 'image'=>"nomFichier", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Juet",'prenom'=>"Thomas", 'image'=>"nomFichier", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Duchet",'prenom'=>"Timéo", 'image'=>"nomFichier", 'fonctions'=>["développer"] ],
                [ 'nom'=>"Dourdin",'prenom'=>"Olivier", 'image'=>"nomFichier", 'fonctions'=>["validateur"] ],
                [ 'nom'=>"Drique",'prenom'=>"Noah", 'image'=>"nomFichier", 'fonctions'=>["développer"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);
    }
}
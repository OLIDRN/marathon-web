<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Genre;

class HistoireController extends Controller
{
    public function index(Request $request){
        $cat = $request->input('cat', null);
        if (isset($cat)) {
            $histoire = Histoire::where('genre_id', $cat)->get();

        } else {
            $histoire = Histoire::all();
        }

        $genres = Genre::all();

        return view('histoire.index', ['histoire' => $histoire, 'cat' => $cat, 'genres' => $genres]);
    }

    public function show($id){
        $histoire = Histoire::find($id);
        return view('histoire.show', ['histoire' => $histoire]);
    }

    public function dashboard($username)
    {
        $user = User::where('name', $username)->with(['mesHistoires'])->first();
        if (!$user) {
            abort(404, 'User not found');
        }
        return view('user.dashboard', ['user' => $user]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('histoire.create', ['genres' => $genres]);
    }

    public function addAvis(Request $request, $id)
    {
        $user = auth()->user();

        $request->validate([
            'contenu' => 'required',
        ]);

        if (!$user) {
            return redirect()->route('login');
        }

        $histoire = new Avis();
        $histoire->contenu = $request->contenu;
        $histoire->user_id = auth()->user()->id;
        $histoire->histoire_id = $id;
        $histoire->save();
        return redirect()->route('histoire.show', ['id' => $id]);
    }

    public function starthistory(Request $request, $id)
    {
        $histoire = Histoire::find($id);
        $chapitre = $histoire->chapitres()->first();
        return view('histoire.starthistory', ['histoire' => $histoire, 'chapitre' => $chapitre]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'pitch' => 'required',
            'genre_id' => 'required',
            'photo' => 'required|image',
        ]);

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $histoire = new Histoire();
        $histoire->titre = $request->titre;
        $histoire->pitch = $request->pitch;
        $histoire->user_id = $user->id;
        $histoire->genre_id = $request->genre_id;
        $histoire->active = true;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $histoire->photo = $photoPath;
        }

        $histoire->save();

        return redirect()->route('encours.create', ['id' => $histoire->id]);
    }

    public function edit(Request $request, $id)
    {
        $genres = Genre::all();
        $histoire = Histoire::find($id);
        return view('histoire.edit', ['histoire' => $histoire, 'genres' => $genres]);
    }

    public function update(Request $request, $id)
    {
        $histoire = Histoire::find($id);
        $histoire->titre = $request->titre;
        $histoire->pitch = $request->pitch;
        $histoire->genre_id = $request->genre_id;
        $histoire->active = true;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $histoire->photo = $photoPath;
        }

        $histoire->save();
        return redirect()->route('histoire.show', ['id' => $histoire->id]);
    }

    public function destroy(Request $request, $id)
    {
        $histoire = Histoire::find($id);
        $histoire->delete();
        return redirect()->route('histoire.index');
    }

    public function dashboardUser(Request $request)
    {
        $user = auth()->user();
        $histoires = Histoire::where('user_id', $user->id)->get();
        if (!$user) {
            return redirect()->route('login');
        }
        return view('dashboard', ['user' => $user, 'histoires' => $histoires]);
    }

    public function updateAvatar(Request $request)
    {
        $user = auth()->user();

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path = $avatar->getRealPath();
            $data = file_get_contents($path);
            $base64 = 'data:photos/' . $avatar->getClientOriginalExtension() . ';base64,' . base64_encode($data);

            $user->avatar = $base64;
            $user->save();
        }

        return redirect()->route('dashboard');
    }

    public function showChapitre($histoire_id, $chapitre_id)
    {
        $histoire = Histoire::find($histoire_id);
        $chapitre = $histoire->chapitres()->find($chapitre_id);
        if (!$chapitre) {
            abort(404, 'Chapter not found');
        }
        return view('histoire.showChapitre', ['histoire' => $histoire, 'chapitre' => $chapitre]);
    }

}
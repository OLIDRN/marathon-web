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
        return view('histoire.starthistory', ['histoire' => $histoire]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'titre' => 'required',
                'pitch' => 'required',
                'genre_id' => 'required',
                'photo' => 'required|image',
            ]);

            $user = auth()->user();
            if (!$user) {
                // No user is authenticated, redirect to login page
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

            return redirect()->route('histoire.show', ['id' => $histoire->id]);
        } catch (\Exception $e) {
            \Log::error('Error creating story: ' . $e->getMessage());

            return back()->with('error', 'There was an error creating the story.');
        }
    }
}
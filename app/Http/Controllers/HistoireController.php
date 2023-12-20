<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;

class HistoireController extends Controller
{
    public function index(){
        $histoire = Histoire::all();
        return view('histoire.index', ['histoire' => $histoire]);
    }

    public function show($id){
        $histoire = Histoire::find($id);
        return view('histoire.show', ['histoire' => $histoire]);
    }

    public function dashboard($username)
    {
        $user = User::where('name', $username)->with('mesHistoires')->first();
        if (!$user) {
            abort(404, 'User not found');
        }
        return view('user.dashboard', ['user' => $user]);
    }

    public function create()
    {
        return view('histoire.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'pitch' => 'required',
            'photo' => 'required',
            'genre_id' => 'required|integer', // Add validation for genre_id
        ]);

        if (!auth()->check()) {
            // Redirect to login page or handle this situation as needed
            return redirect()->route('login');
        }

        $histoire = new Histoire();
        $histoire->titre = $request->titre;
        $histoire->pitch = $request->pitch;
        $histoire->photo = $request->photo;
        $histoire->active = false;
        $histoire->user_id = auth()->user()->id;
        $histoire->genre_id = $request->genre_id;
        $histoire->save();
        return redirect()->route('index');
    }
}
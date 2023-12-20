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
}
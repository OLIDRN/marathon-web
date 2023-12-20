<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
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
}
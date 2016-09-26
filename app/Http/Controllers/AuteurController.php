<?php

namespace App\Http\Controllers;

use App\Auteur;
use Illuminate\Http\Request;

use App\Http\Requests;

class AuteurController extends Controller
{
    public function lister()
    {
        $auteurs = Auteur::all();

        return view('auteurs.list', compact('auteurs'));
    }


    // SA MÈRE
    public function show($id)
    {
        $auteur = Auteur::find($id);

        return view('auteurs.show', [ 'auteur' => $auteur ]);
    }


}

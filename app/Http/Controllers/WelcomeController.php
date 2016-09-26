<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Livre;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function welcome() {

        $bestAutor = Auteur::find(Livre::getBestAutor()->auteur_id);

        return view('welcome', compact('bestAutor'));
    }


}

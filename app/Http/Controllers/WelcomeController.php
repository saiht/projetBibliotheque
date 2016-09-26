<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Livre;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function welcome() {

        $bestAutor = Auteur::find(Livre::getBestAutor()->auteur_id);

        $lastBook = Livre::getLastAdded();

//        $bookOfThisYear = Livre::getPublishedThisYear();

        return view('welcome', compact('bestAutor', 'lastBook'));
    }


}

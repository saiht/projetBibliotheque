<?php

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | This file is where you may define all of the routes that are handled
    | by your application. Just tell Laravel the URIs it should respond
    | to using a Closure or controller method. Build something great!
    |
    */

    Route::any('/', 'WelcomeController@welcome')->name('welcome');


    // pour récupérer les livres en JSON —> LivreController ng
    Route::get('/livres', function () {
       return \App\Livre::select('livre.ISBN', 'livre.ean', 'livre.titre', 'livre.resume', 'livre.image', 'livre.parution', 'auteur.nom as nom', 'auteur.prenom as prenom', 'auteur.courant_litteraire', 'livre.editeur', 'livre.magasin', 'livre.numerique', 'livre.vue', 'livre.created_at', 'livre.updated_at')
           ->join('auteur', 'auteur.id', '=', 'livre.auteur_id')
           ->get();
    });


    // pour récupérer en JSON
    Route::get('/auteurs', function () {
        return \App\Auteur::all();
    });

    Route::get('/livres', function () {
        return \App\Livre::where('parution', '=', \Carbon\Carbon::now()->year)->get();
    });


    Route::group(['prefix' => "livres"], function(){
        //Ajout de la fonctionalité de tri par parution
        Route::any('/list/{tri?}', 'LivreController@lister')->name('livres.list');
        Route::any('/add', 'LivreController@add')->name('livres.add');
        Route::any('/delete/{id}', 'LivreController@delete')->name('livres.delete');
        Route::any('/show/{id}', 'LivreController@show')->name('livres.show');
        Route::get('/reserver/{id}/{action}', 'LivreController@reserver')
            ->where('id', '^[0-9]+$')
            ->name('livres.reserver');
    });

    Route::group(['prefix' => "auteurs"], function(){
        Route::get('/list', 'AuteurController@lister')->name('auteurs.list');

        Route::any('/show/{id}', 'AuteurController@show')->name('auteurs.show');

    });


    Route::get('/best-auteur', 'WelcomeController@getBestAuteur')->name('bestAuteur');




























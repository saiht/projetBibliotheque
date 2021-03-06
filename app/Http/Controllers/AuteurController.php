<?php

namespace App\Http\Controllers;

use App\Auteur;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AuteurController extends Controller
{
    public function lister()
    {
        $auteurs = Auteur::all();

        return view('auteurs.list', compact('auteurs'));
    }

    public function show($id)
    {
        $auteur = Auteur::find($id);

        return view('auteurs.show', [ 'auteur' => $auteur ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|regex:/[a-zA-Z \-]{8,40}/',
            'prenom' => 'required|regex:/[a-zA-Z \-]{8,40}/',
            'ville' => 'required|regex:/[a-zA-Z \-]{8,40}/',
            'dob' => 'required|date_format:d/m/Y',
            'dod' => 'date:d/m/Y',
            'age' => 'min:18|max:100|numeric',
            'prix' => 'required|numeric',
            'auteur' => 'required|exists:auteur,id',
            'parution' => 'required|digits:4',
            'resume' => 'required|min:10|max:500',
            'ISBN' => 'required|regex:/^[0-9][0-9\-]{10,20}$/|unique:livre,ISBN',
            'ean' => 'required|regex:/^[0-9]{10,20}$/|unique:livre,ean',
            'cgv' => 'accepted',
        ]);

        if ($validator->fails() && $request->isMethod('post')) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } elseif ($request->isMethod('post')){

            $livre = new Livre();

            $dob = Carbon::createFromFormat($request->dob, 'd/m/Y');

            if ($request->dob) {
                $dod = Carbon::createFromFormat($request->dod, 'd/m/Y');
            }


            $livre->titre = $request->titre;
            $livre->image = $request->image;
            $livre->magasin = $request->magasin;
            $livre->editeur = $request->editeur;
            $livre->parution = $parution;
            $livre->numerique = $request->numerique == '1' ? 1 : 0;
            $livre->prix = $request->prix;
            $livre->resume = $request->resume;
            $livre->ISBN = $request->ISBN;
            $livre->ean = $request->ean;
            $livre->auteur_id = $request->auteur;
            $livre->vue = 0;


            $livre->save();

            //Redirection avec message de succès
            return redirect()->back()
                ->with('success', 'Votre livre a bien été ajouté');       //Message de succés (voir doc)

        }


        return redirect()->back();
    }


}

<?php

    namespace App\Http\Controllers;

    use App\Livre;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    use App\Http\Requests;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator;

    class LivreController extends Controller
    {
        public function lister($tri = false)
        {

//            dump(is_int($tri), $tri);

            $livres = Livre::all();
            if ($tri) {
                $livres = DB::table('livre')->where('auteur_id', '=', $tri)->get();
            }

            return view('livres.list', compact('livres'));
        }

        public function delete($id) {

            $livre = Livre::find($id);
            $livre->delete();

            return redirect()->back()
                ->with('danger', "Attention ! Vous avez supprimé un livre de la base.");
        }

        public function show($id) {

            $livre = Livre::find($id);

            return view('livres.show', ['livre' => $livre]);

        }

        public function reserver(Livre $id, $action = 'noreserve') {

            $likes = session('resas') !== NULL ? session('resas') : [];

            if ($action == 'reserve') {
                $likes[$id->id] = $id->titre;
            }
            else {
                unset($likes[$id->id]);
            }
            session()->put('resas', $likes);

            return redirect()->back();
        }

        public function add(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required|regex:/[\w\d\ ]{8,60}/|unique:livre,titre',
                'magasin' => 'required|regex:/[\w\d]{4,60}/',
                'image' => 'required|active_url',
                'editeur' => ['required', "regex:/[a-zA-Z -']{4,30}/"],
                'prix' => 'required|numeric',
                'auteur' => 'required|exists:auteur,id',
                'parution' => 'required|digits:4',
                'resume' => 'required|min:10|max:500',
                'ISBN' => 'required|regex:/^[0-9][0-9\-]{10,20}$/|unique:livre,ISBN',
                'ean' => 'required|regex:/^[0-9]{10,20}$/|unique:livre,ean',
                'cgv' => 'accepted',
            ]);

            // Si le formulaire a été validé mais qu'une validation ne passe pas
            if ($validator->fails() && $request->isMethod('post')) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } elseif ($request->isMethod('post')){

                $livre = new Livre();

                $parution = Carbon::createFromFormat($request->parution, 'Y');
                dump($parution);

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


            return view('livres.list');
        }




    }

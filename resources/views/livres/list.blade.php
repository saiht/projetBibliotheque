@extends('layout')

@section('js')
    @parent
@endsection
@section('css')
    @parent
@endsection


@section('content')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif


    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4><strong><i class="fa fa-book"></i> LES LIVRES</strong></h4>
                <table class="display">
                    <thead>
                    <tr>
                        <th>Supp</th>
                        <th>Titre</th>
                        <th>Résumé</th>
                        <th>Éditeur</th>
                        <th>Parution</th>
                        <th>ISBN</th>
                        <th>EAN</th>
                        <th style="text-align: center">Réserver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($livres as $livre)
                        <tr class="odd">
                            <td style="text-align: center">
                                <a href="{{ route('livres.delete', ['id' => $livre->id] ) }}">X</a>
                            </td>
                            <td title="{{ $livre->titre }}"><a href="{{ route('livres.show', ['id' => $livre->id]) }}">{{ mb_strimwidth($livre->titre, 0, 20, "...") }}</a></td>
                            <td title="{{ $livre->resume }}">{{ mb_strimwidth($livre->resume, 0, 35, "...") }}</td>
                            <td>{{ $livre->editeur }}</td>
                            <td class="center">{{ $livre->parution }}</td>
                            <td class="center">{{ $livre->ISBN }}</td>
                            <td class="center">{{ $livre->ean }}</td>
                            <td style="text-align: center">
                                @if(array_key_exists($livre->id, session('resas', [])))
                                    <a class=" text-danger" href="{{ route('livres.reserver', ['id' => $livre->id, 'action' =>'noreserve'] ) }}">
                                        Annuler
                                    </a>
                                @else
                                    <a class=" text-success" href="{{ route('livres.reserver', ['id' => $livre->id, 'action' =>'reserve'] ) }}">
                                        Réserver
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <a href="#formAjout">Aucun livre dans la base</a>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12 col-lg-12">
                <div id="register-wraper">

                    <h3><i class="fa fa-book"></i> Ajouter un livre</h3>

                    <form id="formAjout" role="form" method="post" action="{{ route('livres.add') }}">
                        {{ csrf_field() }}
                        <div class="row">

                            {{-- 1ère colonne --}}
                            <div class="col-md-6">

                                <div class="form-group @if($errors->has('titre')) has-warning @endif" >
                                    <input  value="{{ old('titre') }}" name="titre" type="text" class="form-control input-sm" placeholder="Titre">
                                    @if($errors->has('titre'))
                                        <span class="help-block text-danger">{{ $errors->first('titre') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('editeur')) has-warning @endif" >
                                    <input  value="{{ old('editeur') }}" type="text" name="editeur" class="form-control input-sm" placeholder="Éditeur">
                                    @if($errors->has('editeur'))
                                        <span class="help-block text-danger">{{ $errors->first('editeur') }}</span>
                                    @endif
                                </div>



                                <div class="form-group @if($errors->has('editeur')) has-warning @endif" >
                                    <input  value="{{ old('parution') }}" type="text" name="parution" class="form-control input-sm" placeholder="Parution (ex: 2016)">
                                    @if($errors->has('parution'))
                                        <span class="help-block text-danger">{{ $errors->first('parution') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('prix')) has-warning @endif" >
                                    <input  value="{{ old('prix') }}" type="text" name="prix" class="form-control input-sm" placeholder="Prix en €">
                                    @if($errors->has('prix'))
                                        <span class="help-block text-danger">{{ $errors->first('prix') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('magasin')) has-warning @endif" >
                                    <input  value="{{ old('magasin') }}" type="text" name="magasin" class="form-control input-sm" placeholder="Magasin">
                                    @if($errors->has('magasin'))
                                        <span class="help-block text-danger">{{ $errors->first('magasin') }}</span>
                                    @endif
                                </div>

                            </div>
                            {{-- ./1ère colonne --}}

                            {{-- 2nd colonne --}}
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('ISBN')) has-warning @endif" >
                                    <input  value="{{ old('ISBN') }}" type="text" name="ISBN" class="form-control input-sm" placeholder="ISBN (ex : 978-3-16-148410-0)">
                                    @if($errors->has('ISBN'))
                                        <span class="help-block text-danger">{{ $errors->first('ISBN') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('ean')) has-warning @endif" >
                                    <input  value="{{ old('ean') }}" type="text" name="ean" class="form-control input-sm" placeholder="EAN (ex : 9783161484100)">
                                    @if($errors->has('ean'))
                                        <span class="help-block text-danger">{{ $errors->first('ean') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('image')) has-warning @endif" >
                                    <input value="{{ old('image') }}"  type="text" name="image" class="form-control input-sm" placeholder="URL de l'image">
                                    @if($errors->has('image'))
                                        <span class="help-block text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                {{-- À modifier pour le rendre dynamique  --}}
                                <div class="form-group @if($errors->has('auteur')) has-warning @endif" >
                                    <select name="auteur" class="form-control input-sm">
                                        @forelse(\App\Auteur::all() as $auteur)
                                            <option value="{{ $auteur->id }}">{{ $auteur->nom }} {{ $auteur->prenom }}</option>
                                        @empty
                                            <a href="{{ route('auteurs.list') }}">(Redirection) Veuillez d'abord ajouter un auteur</a>
                                        @endforelse
                                    </select>
                                    @if($errors->has('auteur'))
                                        <span class="help-block text-danger">{{ $errors->first('auteur') }}</span>
                                    @endif
                                </div>

                                <input value="1" @if(old('numerique')) checked @endif  id="numerique" type="checkbox" name="numerique">
                                <label style="display: inline" for="numerique" class="inline">Disponible en version numérique</label>

                            </div>
                            {{-- ./Seconde colonne --}}

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('resume')) has-warning @endif" >

                                    <textarea name="resume" class="form-control input-sm" placeholder="Résumé">{{ old('resume') }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- ./Row form --}}

                        {{-- Submit form --}}
                        <div class="row" id="submit">
                            <div class="row">
                                <input class="@if($errors->has('cgv')) text-red @endif" value="on" id="cgv" type="checkbox" name="cgv">
                                <label style="display: inline" for="cgv" class="inline">Acceptez les termes des <em>CGV</em></label>
                            </div>
                            @if($errors->has('cgv'))
                                <span class="help-block text-danger">{{ $errors->first('cgv') }}</span>
                            @endif
                            {{-- Boutton Submit --}}
                            <button type="submit" class="btn btn-success">Ajouter ce livre</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>


@endsection
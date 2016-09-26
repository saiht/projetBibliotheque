@extends('layout')

@section('css')
    @parent
@endsection


@section('content')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <h4><strong><i class="fa fa-users"></i> LES AUTEURS</strong></h4>

                <table class="display">
                    <thead>
                    <tr>
                        <th style="width: 20px">Sexe</th>
                        <th>Identité</th>
                        <th>Age</th>
                        <th>Ville</th>
                        <th>Biographie</th>
                        <th>Ville</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($auteurs as $auteur)
                        <tr class="odd">
                            <td style="text-align: center"><i class="fa @if($auteur->sexe == 'm')fa-male @else fa-female @endif"></i></td>
                            <td><a href="{{ route('auteurs.show', ['id' => $auteur->id]) }}">{{ $auteur->nom }} {{ $auteur->prenom }}</a></td>
                            <td>{{ $auteur->age }} ans</td>
                            <td>{{ $auteur->ville }}</td>
                            <td title="{{ $auteur->biographie }}">{{ mb_strimwidth($auteur->biographie,0, 50, "...") }}</td>
                            <td>{{ $auteur->ville }}</td>
                        </tr>
                    @empty
                        <tr>
                            Aucun auteur dans la base
                        </tr>

                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-6 col-lg-6 col-sm-offset-3 col-md-offset-3">
                <div id="register-wraper">

                    <h3><i class="fa fa-user"></i> Ajouter un auteur</h3>

                    <form id="formAjout" role="form" method="post" action="{{ route('auteurs.add') }}">
                        {{ csrf_field() }}
                        <div class="row">

                            {{-- 1ère colonne --}}
                            <div class="col-md-12">

                                <input value="m" @if(old('sexe') == 'm') checked @endif  id="homme" type="radio" name="sexe">
                                <label style="display: inline" for="homme" class="inline">Homme</label>

                                <input value="f" @if(old('sexe') == 'f') checked @endif  id="femme" type="radio" name="sexe">
                                <label style="display: inline" for="femme" class="inline">Femme</label>


                                <div class="form-group @if($errors->has('nom')) has-warning @endif" >
                                    <input  value="{{ old('nom') }}" name="nom" type="text" class="form-control input-sm" placeholder="Nom">
                                    @if($errors->has('nom'))
                                        <span class="help-block text-danger">{{ $errors->first('nom') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('prenom')) has-warning @endif" >
                                    <input  value="{{ old('prenom') }}" type="text" name="prenom" class="form-control input-sm" placeholder="Prénom">
                                    @if($errors->has('prenom'))
                                        <span class="help-block text-danger">{{ $errors->first('prenom') }}</span>
                                    @endif
                                </div>



                                <div class="form-group @if($errors->has('dob')) has-warning @endif" >
                                    <label for="dob">Date de naissance</label>
                                    <input id="dob" value="{{ old('dob') }}" type="date" name="dob" class="form-control input-sm" placeholder="Date de naissance">
                                    @if($errors->has('dob'))
                                        <span class="help-block text-danger">{{ $errors->first('dob') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('dod')) has-warning @endif" >
                                    <label for="dod">Date de Mort</label>
                                    <input id="dod" value="{{ old('dod') }}" type="date" name="dod" class="form-control input-sm" placeholder="Date de mort (ou vide)">
                                    @if($errors->has('dod'))
                                        <span class="help-block text-danger">{{ $errors->first('dod') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('age')) has-warning @endif" >
                                    <input  value="{{ old('age') }}" type="text" name="age" class="form-control input-sm" placeholder="Age (ex: 33)">
                                    @if($errors->has('age'))
                                        <span class="help-block text-danger">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>

                            </div>
                            {{-- ./1ère colonne --}}

                            {{-- 2nd colonne --}}
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('ville')) has-warning @endif" >
                                    <input  value="{{ old('ville') }}" type="text" name="ISBN" class="form-control input-sm" placeholder="Ville">
                                    @if($errors->has('ville'))
                                        <span class="help-block text-danger">{{ $errors->first('ville') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('image')) has-warning @endif" >
                                    <input value="{{ old('image') }}"  type="text" name="image" class="form-control input-sm" placeholder="URL de l'image">
                                    @if($errors->has('image'))
                                        <span class="help-block text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('courant_litteraire')) has-warning @endif" >
                                    <select name="auteur" class="form-control input-sm">
                                        <option value="humanisme" @if(old('courant_litteraire') == 'humanisme') selected @endif>Humanisme</option>
                                        <option value="romantisme" @if(old('courant_litteraire') == 'romantisme') selected @endif>Romantisme</option>
                                        <option value="realisme" @if(old('courant_litteraire') == 'realisme') selected @endif>Réalisme</option>
                                    </select>
                                    @if($errors->has('courant_litteraire'))
                                        <span class="help-block text-danger">{{ $errors->first('courant_litteraire') }}</span>
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
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>


    </div>


@endsection
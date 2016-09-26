@extends('layout')


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

            <div class="col-sm-12 col-lg-12">
                <div id="register-wraper">

                    <h3><i class="fa fa-user"></i> Ajouter un auteur</h3>

                    <form id="formAjout">
                        {{ csrf_field() }}
                        <div class="row">

                            {{-- 1ère colonne --}}
                            <div class="col-md-6">
                                <input pattern="[A-Za-z\ \-\']{3,60}" name="nom" type="text" class="form-control input-sm" placeholder="Nom">
                                <input pattern="[A-Za-z\ \'\-]{3,60}" name="prenom" type="text" class="form-control input-sm" placeholder="Prénom">

                                <input type="text" name="parution" class="form-control input-sm" placeholder="Parution (ex: 2016)">
                                <input type="text" name="prix" class="form-control input-sm" placeholder="Prix en €">

                                <input type="text" name="magasin" class="form-control input-sm" placeholder="Magasin">

                            </div>
                            {{-- ./1ère colonne --}}

                            {{-- 2nd colonne --}}
                            <div class="col-md-6">
                                {{--<label for="parution">Parution</label>--}}
                                <input type="text" name="ISBN" class="form-control input-sm" placeholder="ISBN (ex : 978-3-16-148410-0)">
                                <input type="text" name="ean" class="form-control input-sm" placeholder="EAN (ex : 9783161484100)">
                                <input type="text" name="image" class="form-control" placeholder="URL de l'image">


                                {{-- À modifier pour le rendre dynamique  --}}
                                <select name="courant_litteraire" class="form-control input-sm">
                                    <option value="romantisme">Romantisme</option>
                                    <option value="humanisme">Humanisme</option>
                                    <option value="realisme">Réalisme</option>
                                </select>

                                <input value="1" id="numerique" type="checkbox" name="numerique" placeholder="Version numérique">
                                <label style="display: inline" for="numerique" class="inline">Disponible en version numérique</label>

                            </div>
                            {{-- ./Seconde colonne --}}

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <textarea type="text" name="resume" class="form-control input-sm" placeholder="Résumé"></textarea>
                            </div>
                        </div>

                        {{-- ./Row form --}}

                        {{-- Submit form --}}
                        <div class="row" id="submit">
                            <button class="btn btn-success">Ajouter ce livre</button>

                        </div>

                    </form>




                </div>
            </div>

        </div>


    </div>


@endsection
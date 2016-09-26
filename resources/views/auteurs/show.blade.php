@extends('layout')

@section('content')
    <div class="container">
        <div class="col-md-12">

            <div class="register-info-wraper">
                <div id="register-info">
                    <div class="cont2">
                        <div class="thumbnail">
                            <img src="{{ $auteur->image }}" alt="{{ $auteur->prenom }} {{ $auteur->nom }}" width="100" height="auto" class="img-circle">
                        </div><!-- /thumbnail -->
                        <h2>{{ $auteur->prenom }} {{ $auteur->nom }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="cont3">
                                <p><ok>Ville :</ok> {{ $auteur->ville }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="cont3">
                                <p><ok>Date de naissance :</ok> {{ $auteur->dob }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="cont3">
                                @if($auteur->dod)
                                    <p><ok>Date de mort :</ok> {{ $auteur->dod }}</p>
                                @else
                                    <p><ok>Age :</ok> {{ $auteur->age }} ans</p>
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="cont3">
                                <p><ok>Courant littéraire :</ok> {{ $auteur->courant_litteraire }}</p>
                            </div>
                        </div>
                    </div><!-- /inner row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cont3">
                                <p><ok>Biographie :</ok></p>
                                <p style="text-align: justify">{{ $auteur->biographie }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="cont2">
                        <h2>Choisissez une option</h2>
                    </div>
                    <br>
                    <div class="info-user2">
                        <a title="Allez à ses ouvrages" href="{{ route('livres.list', $auteur->id) }}"><i class="fa fa-book"></i></a>
                        <a title="Modifier ses données" href=""><i class="fa fa-pencil"></i></a>

                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
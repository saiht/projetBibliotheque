@extends('layout')

@section('content')
    <div class="container">
        <div class="col-md-12">

            <div class="register-info-wraper">
                <div id="register-info">
                    <div class="cont2">
                        <div class="thumbnail">
                            <img src="{{ $livre->image }}" alt="Image {{ $livre->titre }}" title="Image {{ $livre->titre }}" width="100" height="auto" class="img-circle">
                        </div><!-- /thumbnail -->
                        <h2>#{{ $livre->id }} {{ $livre->titre }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="cont3">
                                <p><ok>Éditeur</ok> {{ $livre->editeur }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="cont3">
                                <p><ok>Prix :</ok> {{ $livre->prix }} €</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="cont3">
                                <p><ok>Version numérique : </ok>@if($livre->numerique) Oui @else Non @endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="cont3">
                                <p><ok>Magasin :</ok> {{ $livre->magasin }}</p>
                            </div>
                        </div>
                    </div><!-- /inner row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cont3">
                                <p><ok>Résumé :</ok></p>
                                <p style="text-align: justify">{{ $livre->resume }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- Nb de vues --}}
                    <div class="row">
                        <div class="col-md-2 pull-right">
                            <p><ok>Nombre de vues : </ok>@if($livre->vue > 999) 999+ @else{{ $livre->vue }} @endif</p>
                        </div>
                    </div>
                    <hr>
                    <div class="cont2">
                        <h2>Choisissez une option</h2>
                    </div>
                    <br>
                    <div class="info-user2">
                        <a title="Voir son auteur" href="{{ route('auteurs.show', ['id' => $livre->auteur_id]) }}"><span aria-hidden="true" class="li_user fs1"></span></a>
                        <a title="Mode d'édition" href=""><span aria-hidden="true" class="li_settings fs1"></span></a>
                        <a title="Exporter en PDF" href=""><span aria-hidden="true" class="li_key fs1"></span></a>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
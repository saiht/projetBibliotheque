@extends('layout')

@section('css')
    @parent
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('js/controller/LivreController.js') }}"></script>
@endsection

@section('content')

    <div class="container" ng-app="app">

        <!-- Première Row -->
        <div class="row">

            <!-- Auteur en vogue -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle><i class="fa fa-star"></i>  Utilisateurs avec le plus d'oeuvres</dtitle>
                    <hr>
                    <div class="thumbnail">
                        <a title="Voir son profil" href="{{ route('auteurs.show', $bestAutor->id) }}"><img width="90" height="auto" title="{{ $bestAutor->nom }} {{ $bestAutor->prenom }}" src="{{ $bestAutor->image }}" alt="Image {{ $bestAutor->nom }} {{ $bestAutor->prenom }}" class="img-circle"></a>
                    </div><!-- /thumbnail -->
                    <h1>{{ $bestAutor->nom }} {{ $bestAutor->prenom }}</h1>
                    <h3>{{ $bestAutor->ville }}</h3>
                    <br>
                    <div class="info-user">
                        <a title="Voir son profil" href="{{ route('auteurs.show', $bestAutor->id) }}"><i class="fa fa-user"></i></a>
                        <a title="Allez à ses ouvrages" href="{{ route('livres.list', $bestAutor->id) }}"><i class="fa fa-book"></i></a>
                        <a href="" title="Modifier son profil"><i class="fa fa-cog"></i></a>
                    </div>
                </div>
            </div>

            <!-- Dernier livre ajouté -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle><i class="fa fa-clock-o"></i>  Dernier livre ajouté</dtitle>
                    <hr>
                    <div class="info-user">
                        <a href="{{ route('livres.show', $lastBook->id) }}"><span aria-hidden="true" class="li_news fs2"> # {{ $lastBook->id }}</span></a>
                    </div>
                    <br>
                    <div class="text">
                        <h3><a href="{{ route('livres.show', $lastBook->id) }}">{{ $lastBook->titre }}</a></h3>
                        <p>{{ mb_strimwidth($lastBook->resume, 0, 100) }}<a href="{{ route('livres.show', $lastBook->id) }}">...Voir plus...</a></p>
                        <?php
                        \Carbon\Carbon::setLocale('fr');
                        ?>
                        <p><grey>Ajouté : {{ $lastBook->created_at->diffForHumans() }}</grey></p>
                    </div>
                </div>
            </div>

            {{--<div class="col-sm-3 col-lg-3" ng-controller="LivreController">--}}
                {{--<!-- MAIL BLOCK -->--}}
                {{--<div class="dash-unit">--}}
                    {{--<dtitle>Les livres parus cette année</dtitle>--}}
                    {{--<hr>--}}
                    {{--<div class="framemail">--}}
                        {{--<div class="window">--}}
                            {{--<ul class="mail" ng-repeat="livreParu in livresParus">--}}
                                {{--<li>  <!-- ng-repeat -->--}}
                                    {{--<i class="unread"></i>--}}
                                    {{--<img class="avatar" src="// livreParu.image //" alt="avatar" width="20" height="auto">--}}
                                    {{--<p class="sender">// livreParu.titre //</p>--}}
                                    {{--<p class="message"><strong>Working</strong> - This is the last...</p>--}}
                                    {{--<div class="actions">--}}
                                        {{--<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>--}}
                                        {{--<a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>--}}
                                        {{--<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>--}}
                                        {{--<a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div><!-- /dash-unit -->--}}
            {{--</div><!-- /span3 -->--}}

            <div class="col-sm-3 col-lg-3" ng-controller="LivreController">
                <div class="dash-unit">
                    <dtitle>Les livres</dtitle>
                    <a class="pull-right" href="{{ route('livres.list') }}">Aller à la liste</a>
                    <hr>
                    <div class="accordion" id="accordion2" ng-repeat="livre in livres">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    // livre.titre //
                                </a>
                            </div>
                        </div>
                    </div><!--/accordion -->
                </div>
            </div>


            <div class="col-sm-3 col-lg-3 pull-right">

                <!-- Heure Locale -->
                <div class="half-unit">
                    <dtitle>Heure Locale</dtitle>
                    <hr>
                    <div class="clockcenter">
                        <digiclock>  <!-- Généré automatiquement -->  </digiclock>
                    </div>
                </div>

            </div>

        </div><!-- /row -->

    <div style="height: 23vh"></div>


@endsection
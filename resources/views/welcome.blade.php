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

            <div class="col-sm-3 col-lg-3" ng-controller="LivreController">
                <!-- MAIL BLOCK -->
                <div class="dash-unit">
                    <dtitle>Les livres parus cette année</dtitle>
                    <hr>
                    <div class="framemail">
                        <div class="window">
                            <ul class="mail">
                                <li ng-repeat="livre in livres">  <!-- ng-repeat -->
                                    <i class="unread"></i>
                                    <img class="avatar" src="// livre.image //" alt="avatar" width="20" height="auto">
                                    <p class="sender">// livre.titre //</p>
                                    <p class="message"><strong>Working</strong> - This is the last...</p>
                                    <div class="actions">
                                        <a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png" alt="reply"></a>
                                        <a><img src="http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png" alt="favourite"></a>
                                        <a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png" alt="label"></a>
                                        <a><img src="http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png" alt="delete"></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /dash-unit -->
            </div><!-- /span3 -->


            <div class="col-sm-3 col-lg-3">

                <!-- LOCAL TIME BLOCK -->
                <div class="half-unit">
                    <dtitle>Local Time</dtitle>
                    <hr>
                    <div class="clockcenter">
                        <digiclock>  <!-- Généré automatiquement -->  </digiclock>
                    </div>
                </div>

            </div>

        </div><!-- /row -->


        <!-- Seconde Row -->
        <div class="row">


            <!-- DONUT CHART BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Site Bandwidth</dtitle>
                    <hr>
                    <div id="load"></div>
                    <h2>45%</h2>
                </div>
            </div>

            <!-- LAST MONTH REVENUE -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Last Month Revenue</dtitle>
                    <hr>
                    <div class="cont">
                        <p><bold>$879</bold> | <ok>Approved</ok></p>
                        <br>
                        <p><bold>$377</bold> | Pending</p>
                        <br>
                        <p><bold>$156</bold> | <bad>Denied</bad></p>
                        <br>
                        <p><img src="img/up-small.png" alt=""> 12% Compared Last Month</p>

                    </div>

                </div>
            </div>

            <!-- 30 DAYS STATS - CAROUSEL FLEXSLIDER -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Last 30 Days Stats</dtitle>
                    <hr>
                    <br>
                    <br>
                    <div class="flexslider">
                        <ul class="slides">
                            <li><img src="img/slide01.png" alt="slider"></li>
                            <li><img src="img/slide02.png" alt="slider"></li>
                        </ul>
                    </div>
                    <div class="cont">
                        <p>StatCounter Information</p>
                    </div>
                </div>
            </div>
        </div><!-- /row -->


        <!-- THIRD ROW OF BLOCKS -->
        <div class="row">
            <div class="col-sm-3 col-lg-3">

                <!-- BARS CHART - lineandbars.js file -->
                <div class="half-unit">
                    <dtitle>Stock Information</dtitle>
                    <hr>
                    <div class="cont">
                        <div class="info-aapl">
                            <h4>AAPL</h4>
                            <ul>
                                <li><span class="orange" style="height: 37.5%"></span></li>
                                <li><span class="orange" style="height: 47.5%"></span></li>
                                <li><span class="orange" style="height: 70%"></span></li>
                                <li><span class="orange" style="height: 85%"></span></li>
                                <li><span class="green" style="height: 75%"></span></li>
                                <li><span class="green" style="height: 50%"></span></li>
                                <li><span class="green" style="height: 15%"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-3 col-lg-3">

                <!-- LIVE VISITORS BLOCK -->
                <div class="half-unit">
                    <dtitle>Live Visitors</dtitle>
                    <hr>
                    <div class="cont">
                        <p><bold>388</bold></p>
                        <p><img src="img/up-small.png" alt=""> 412 Max. | <img src="img/down-small.png" alt=""> 89 Min.</p>
                    </div>
                </div>

                <!-- PAGE VIEWS BLOCK -->
                <div class="half-unit">
                    <dtitle>Page Views</dtitle>
                    <hr>
                    <div class="cont">
                        <p><bold>145.0K</bold></p>
                        <p><img src="img/up-small.png" alt=""> 23.88%</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-lg-3">
                <!-- TOTAL SUBSCRIBERS BLOCK -->
                <div class="half-unit">
                    <dtitle>Total Subscribers</dtitle>
                    <hr>
                    <div class="cont">
                        <p><bold>14.744</bold></p>
                        <p>98 Subscribed Today</p>
                    </div>
                </div>

                <!-- FOLLOWERS BLOCK -->
                <div class="half-unit">
                    <dtitle>Twitter Followers</dtitle>
                    <hr>
                    <div class="cont">
                        <p><bold>17.833 Followers</bold></p>
                        <p>@SomeUser</p>
                    </div>
                </div>
            </div>

            <!-- LATEST NEWS BLOCK -->

        </div><!-- /row -->

        <!-- FOURTH ROW OF BLOCKS -->
        <div class="row">

            <!-- TWITTER WIDGET BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Twitter Widget</dtitle>
                    <hr>
                    <div class="info-user">
                        <span aria-hidden="true" class="li_megaphone fs2"></span>
                    </div>
                    <br>
                    <div id="jstwitter" class="clearfix">
                        <ul id="twitter_update_list"></ul>
                    </div>
                    <script src="http://twitter.com/javascripts/blogger.js"></script><!-- Script Needed to load the Tweets -->
                    <script src="http://api.twitter.com/1/statuses/user_timeline/wrapbootstrap.json?callback=twitterCallback2&amp;count=1"></script>
                    <!-- To show your tweets replace "wrapbootstrap", in the line above, with your user. -->
                    <div class="text">
                        <p><grey>Show your tweets here!</grey></p>
                    </div>
                </div>
            </div>

            <!-- NOTIFICATIONS BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Notifications</dtitle>
                    <hr>
                    <div class="info-user">
                        <span aria-hidden="true" class="li_bubble fs2"></span>
                    </div>
                    <div class="cont">
                        <p><button class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;This is a success notification&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}">Top Right</button></p>
                        <p><button class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;This is an informaton notification&quot;,&quot;layout&quot;:&quot;topLeft&quot;,&quot;type&quot;:&quot;information&quot;}">Top Left</button></p>
                        <p><button class="btnnew noty" data-noty-options="{&quot;text&quot;:&quot;This is an alert notification with fade effect.&quot;,&quot;layout&quot;:&quot;topCenter&quot;,&quot;type&quot;:&quot;alert&quot;,&quot;animateOpen&quot;: {&quot;opacity&quot;: &quot;show&quot;}}">Top Center (fade)</button></p>
                    </div>
                </div>
            </div>

            <!-- SWITCHES BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Switches</dtitle>
                    <hr>
                    <div class="info-user">
                        <span aria-hidden="true" class="li_params fs2"></span>
                    </div>
                    <br>
                    <div class="switch">
                        <input type="radio" class="switch-input" name="view" value="on" id="on" checked="">
                        <label for="on" class="switch-label switch-label-off">On</label>
                        <input type="radio" class="switch-input" name="view" value="off" id="off">
                        <label for="off" class="switch-label switch-label-on">Off</label>
                        <span class="switch-selection"></span>
                    </div>
                    <div class="switch switch-blue">
                        <input type="radio" class="switch-input" name="view2" value="week2" id="week2" checked="">
                        <label for="week2" class="switch-label switch-label-off">Week</label>
                        <input type="radio" class="switch-input" name="view2" value="month2" id="month2">
                        <label for="month2" class="switch-label switch-label-on">Month</label>
                        <span class="switch-selection"></span>
                    </div>

                    <div class="switch switch-yellow">
                        <input type="radio" class="switch-input" name="view3" value="yes" id="yes" checked="">
                        <label for="yes" class="switch-label switch-label-off">Yes</label>
                        <input type="radio" class="switch-input" name="view3" value="no" id="no">
                        <label for="no" class="switch-label switch-label-on">No</label>
                        <span class="switch-selection"></span>
                    </div>
                </div>
            </div>

            <!-- GAUGE CHART BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Gauge Chart</dtitle>
                    <hr>
                    <div class="info-user">
                        <span aria-hidden="true" class="li_lab fs2"></span>
                    </div>
                    <canvas id="canvas" width="300" height="300">
                    </canvas></div>
            </div>

        </div><!--/row -->

        <!-- FOURTH ROW OF BLOCKS -->
        <div class="row">

            <!-- ACCORDION BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Accordion</dtitle>
                    <hr>
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Collapsible Group Item #1
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    Collapsible Group Item #2
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                    Collapsible Group Item #3
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem.
                                </div>
                            </div>
                        </div>
                    </div><!--/accordion -->
                </div>
            </div>

            <div class="col-sm-3 col-lg-3">

                <!-- LAST USER BLOCK -->
                <div class="half-unit">
                    <dtitle>Last Registered User</dtitle>
                    <hr>
                    <div class="cont2">
                        <img src="img/user-avatar.jpg" alt="">
                        <br>
                        <br>
                        <p>Paul Smith</p>
                        <p><bold>Liverpool, England</bold></p>
                    </div>
                </div>

                <!-- MODAL BLOCK -->
                <div class="half-unit">
                    <dtitle>Modal</dtitle>
                    <hr>
                    <div class="cont">
                        <a href="#myModal" role="button" class="btnnew" data-toggle="modal">Example Modal Window</a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- FAST CONTACT BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Fast Contact</dtitle>
                    <hr>
                    <div class="cont">
                        <form action="#get-in-touch" method="POST" id="contact">
                            <input type="text" id="contactname" name="contactname" placeholder="Name">
                            <input type="text" id="email" name="email" placeholder="Email">
                            <div class="textarea-container"><textarea id="message" name="message" placeholder="Message"></textarea></div>
                            <input type="submit" id="submit" name="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>

            <!-- INFORMATION BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Block Dashboard</dtitle>
                    <hr>
                    <div class="info-user">
                        <span aria-hidden="true" class="li_display fs2"></span>
                    </div>
                    <br>
                    <div class="text">
                        <p>Block Dashboard created by Basicoh.</p>
                        <p>Special Thanks to Highcharts, Linecons and Bootstrap for their amazing tools.</p>
                    </div>

                </div>
            </div>

        </div><!--/row -->



    </div>

@endsection

<div class="navbar-nav navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('img/logo30.png') }}" alt=""> BLOCKS</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('welcome') }}"><i class="icon-home icon-white"></i> Accueil</a></li>
                <li><a href="{{ route('livres.list') }}"><i class="icon-folder-open icon-white"></i> Livres</a></li>
                <li><a href="{{ route('auteurs.list') }}"><i class="icon-calendar icon-white"></i> Auteurs</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>


</head>

<body style="padding-top: 80px">

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('homeInvite') }}">Serious Game premiers secours</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li><a href="{{ route('invite.scenarios') }}">Jeux</a></li>
                <?php
                if (Auth::guard('invites')->check())
                {
                ?>
                <li><a href="{{ route('invite.cours') }}">Mon cours</a></li>
                <li><a href="{{ route('invite.logout') }}">Se déconnecter</a></li>

                <?php }
                else
                {
                ?>
                <li class="dropdown">
                    <a href=href="{{ route('auth.login') }} class="dropdown-toggle" data-toggle="dropdown">Connexion<b class="caret"></b></a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ route('auth.login') }}">Connexion normale</a></li>
                        <li><a href="{{ route('invite.connexion') }}">Connexion à un cours</a></li>
                    </ul>
                </li>
                <?php
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">

    <div class="starter-template">
        @yield('content')
    </div>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>




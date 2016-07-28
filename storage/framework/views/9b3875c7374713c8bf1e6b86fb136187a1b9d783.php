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
    <link href="<?php echo e(asset('bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>


</head>

<body style="padding-top: 80px">

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Serious Game premiers secours</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo e(route('classement')); ?>">Classement</a></li>
                <li><a href="<?php echo e(route('scenarios')); ?>">Jeux</a></li>
                <?php
                if (Auth::check())
                {
                $role = Auth::guard('web')->user()->role_id;
                if ($role == 1)
                {
                ?>
                <li><a href="<?php echo e(route('cours.index')); ?>">Mes cours</a></li>
                <li><a href="<?php echo e(route('user.index')); ?>">Gérer les utilisateurs</a></li>
                <?php
                }
                else if ($role == 2)
                {
                ?>
                <li><a href="<?php echo e(route('cours.index')); ?>">Mes cours</a></li>
                <?php
                }
                ?>
                <li><a href="<?php echo e(route('profil')); ?>">Mon profil</a></li>
                <li><a href="<?php echo e(route('auth.logout')); ?>">Se déconnecter</a></li>
                <?php
                }
                else
                {
                ?>
                <li class="dropdown">
                    <a href=href="<?php echo e(route('auth.login')); ?> class="dropdown-toggle" data-toggle="dropdown">Connexion<b class="caret"></b></a>

                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route('auth.login')); ?>">Connexion normale</a></li>
                        <li><a href="<?php echo e(route('invite.connexion')); ?>">Connexion à un cours</a></li>
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
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>




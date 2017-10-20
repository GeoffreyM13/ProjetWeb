<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">


    <title>Black Manba Face!</title>

    <!-- Bootstrap core CSS -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylebis.css" rel="stylesheet" type="text/css" >
    <link href="css/sidebar.css" rel="stylesheet" type="text/css" >
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">BlackManba</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="BlackManba.php?action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- j'ai le droit de mettre des commentaires dans mon fichier HTML -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<div id="layout"> <?php echo $context->data; ?> <?php echo $context->error; ?> </div>

<?php include($template_view); ?>
</body>
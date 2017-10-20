<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 18/10/2017
 * Time: 13:51
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Black Manba Face!</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylebis.css" rel="stylesheet" type="text/css" >

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<!-- NAVBAR -->
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
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li> <a class="navbar-brand" href="#"> Hi, <?php echo $_SESSION['identifiant'];?> ! </a></li>
                <li><button id="Submit" style="background-color:gainsboro"><span class="glyphicon glyphicon-log-out" ></span> Logout</button></li>
            </ul>
        </div>
    </div>
</nav>

<!-- NAVBAR -->


<script>

    $(function() {
        $('#Submit').click(function() {
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'https://pedago.univ-avignon.fr/~uapv1302596/ProjetWeb/BlackManbaAjax.php?action=disconnected',
                success: function(data) {
                    $('#layout').empty().prepend("Vous êtes bien deconnecté!");
                    $('#divconnected').load('app/view/loginSuccess.php .container');
                },
                error: function() {
                    alert('La requête n\'a pas abouti'); }
            });
        });
    });

</script>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<div id="layout" class="div_error_layout"> <?php echo $context->data; ?> <?php echo $context->error; ?> </div>

<?php include($template_view); ?>
</body>
</html>

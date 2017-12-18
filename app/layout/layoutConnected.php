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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="//code.jquery.com/jquery-1.12.4.js">
    </script>
    <!--Script ci-dessous pour la liste des users dans le mur-->
    <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="js/test.js"></script>

    <link rel="stylesheet" href="jqueryui/jquery-ui.min.css">
    <script src="jqueryui/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>


    <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}

    /* Set gray background color and 100% height */
    .sidenav {
        background-color: #f1f1f1;
        height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
        background-color: #555;
        color: white;
        padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
        .sidenav {
            height: auto;
        .row.content {height: 1500px}
    }
</style>

    
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
                <li <?php if ($context->navbar_etat == "showmessage") {?> class ="active" <?php } ?> ><a href="BlackManba.php?action=showmessage">Home</a> </li>
                <li <?php if ($context->navbar_etat == "profil") {?> class ="active" <?php } ?> ><a href="BlackManba.php?action=profil">Profil</a></li>
                <li <?php if ($context->navbar_etat == "userslist") {?> class ="active" <?php } ?> ><a href="BlackManba.php?action=userslist">Utilisateurs</a></li>
                <li <?php if ($context->navbar_etat == "allmessage") {?> class ="active" <?php } ?> ><a href="BlackManba.php?action=allmessage">Fils d'actualité</a></li>
                <li><a href="BlackManba.php?action=chat">Chat</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li> <a class="navbar-brand" href="#"> Welcome Back, <?php echo $_SESSION['identifiant'];?> ! </a></li>
                <li><button id="Submit" style="background-color:gainsboro"><span class="glyphicon glyphicon-log-out" ></span> Logout</button></li>
            </ul>
        </div>
    </div>
</nav>

<!-- NAVBAR -->
<div id="layout"> <?php echo $context->data; ?> <?php echo $context->error; ?> </div>

<?php include($template_view); ?>
<!-- <?php include(app/view/chatSuccess.php); ?> -->

</body>
</html>
<script>

    $(function() {
        $('#Submit').click(function() {
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: '../ProjetWeb/BlackManbaAjax.php?action=disconnected',
                success: function(data) {
                    $('#layout').empty().prepend("Vous êtes bien deconnecté!");
                },
                error: function() {
                    alert('La requête n\'a pas abouti'); }
            });
        });
    });

</script>

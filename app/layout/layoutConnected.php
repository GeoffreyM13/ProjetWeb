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
    <script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
    </script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
    </script>

    
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
                <li class="active"><a href="BlackManba.php?action=showmessage">Home</a></li>
                <li><a href="BlackManba.php?action=profil">Profil</a></li>
                <li><a href="BlackManba.php?action=userslist">Utilisateurs</a></li>
                <li><a href="BlackManba.php?action=allmessage">Chat</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li> <a class="navbar-brand" href="#"> Hi, <?php echo $_SESSION['identifiant'];?> ! </a></li>
                <li><button id="Submit" style="background-color:gainsboro"><span class="glyphicon glyphicon-log-out" ></span> Logout</button></li>
            </ul>
        </div>
    </div>
</nav>

<!-- NAVBAR -->
<div id="layout"> <?php echo $context->data; ?> <?php echo $context->error; ?> </div>

<?php include($template_view); ?>
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

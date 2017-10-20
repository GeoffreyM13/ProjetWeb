<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 20/10/2017
 * Time: 12:01
 */

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-9">

            <?php foreach($context->allmessage as $message)


            {print("<h4><small>RECENT POSTS</small></h4>");
                print("<hr>");
                print("<p>"); echo $message->post->texte; print("</p>");
                print("<h5><span class='glyphicon glyphicon-time'></span> Post by "); echo $message->emetteur->nom; print("</h5>");
                print("<h5><span class='label 4abel-danger'>Food</span> <span class='label label-primary'>Ipsum</span></h5><br>");
                print("<h4> Pour : "); echo $message->destinataire->nom ; print("</h4><br><br>");}



            ?>


        </div>
    </div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>




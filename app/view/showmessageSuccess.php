<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 18:30
 */
foreach ( $context->message as $message)
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
        .row.content {height: 1500px}
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

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
        <div class="col-sm-3 sidenav">
            <h4>Message de <?php echo $message->emetteur->nom ?> </h4>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#section1">Home</a></li>
                <li><a href="#section2">Friends</a></li>

            </ul><br>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Blog..">
                <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
            </div>
        </div>

        <div class="col-sm-9">

            <?php foreach ( $context->message as $message)

            {print("<h4><small>RECENT POSTS</small></h4>");
            print("<hr>");
            print("<h2>"); echo $message->post->texte; print("</h2>");
            print("<h5><span class='glyphicon glyphicon-time'></span> Post by "); echo $message->parent->nom;print(" for "); echo $message->destinataire->nom; print("</h5>");
            print("<h5><span class='label label-danger'>Pouce Rouge !</span> <span class='label label-primary'>Pouce Bleu !</span></h5><br>");
            print("<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <br><br>");}
            ?>


            <h4>Leave a Comment:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <br><br>

            <p><span class="badge">2</span> Comments:</p><br>

            <div class="row">
                <div class="col-sm-2 text-center">
                    <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
                    <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <br>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
                    <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <br>
                    <p><span class="badge">1</span> Comment:</p><br>
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                        </div>
                        <div class="col-xs-10">
                            <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
                            <p>Me too! WOW!</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>



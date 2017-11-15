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

</head>
<body>
    <?php foreach($context->allmessage as $message): ?>
    <div class="col-sm-9">

        <div class="row">
            <div class="span2">
                <a href="#" class="thumbnail">
                    <!-- <img src="http://placehold.it/260x180" alt=""> -->
                </a>
            </div>
            <div class="span6">
                <p>
                    <?= $message->post->texte; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <p></p>
                <p>
                    <i class="icon-user"></i> by <a href="#"> <?= $message->emetteur->nom; ?> </a>
                    | <i class="icon-calendar"></i>
                    | <i class="icon-comment"></i> <a href="#">3 Comments</a>
                    | <i class="icon-share"></i> <a href="#">39 Shares</a>
                    | <i class="icon-tags"></i> Tags : <a href="#"><span class="label label-info">Snipp</span></a>
                    <a href="#"><span class="label label-info">Bootstrap</span></a>
                    <a href="#"><span class="label label-info">UI</span></a>
                    <a href="#"><span class="label label-info">growth</span></a>
                </p>
            </div>
        </div>
    </div>

<?php endforeach; ?>

</body>
</html>




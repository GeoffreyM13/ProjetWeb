<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 20/10/2017
 * Time: 12:01
 */

?>



<div class="col-lg-offset-4">
<h4>WHAT'S NEWS ? [...]</h4><br><br>

</div>
<!--martinez geoffrey - inclusion du chat-->
<div class="col-sm-3 col-lg-offset-8">

    <?php include("chatSuccess.php"); ?>

</div>

<?php foreach($context->allmessage as $message): ?>

<div class="container-fluid">

    <div class="col-sm-7 col-lg-offset-1">

        <div class="row">
            <div class="span2">
                <a href="#" class="thumbnail">
                    <!-- <img src="http://placehold.it/260x180" alt=""> -->
                </a>
            </div>
            <div class="span6">
                <p style="background-color: #f8f8f8">
                    <?php echo htmlentities($message->post->texte); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <p></p>
                <p>
                    <i class="icon-user"></i> by <a href="#"> <?=  $message->emetteur->nom; ?> </a>
                    || <i class="icon-calendar"> On : <?= $message->post->getDate(); ?> </i>
                    |  For : <?= $message->destinataire->nom; ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>


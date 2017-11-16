<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 18:30
 */

if (!empty($context->message))  foreach ( $context->message as $message);
else $message = "Pas encore de post pour cet user !";


    ?>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">

                <h3>
                    <img class="image-circle" src="<?php echo (!empty($context->res->avatar)?$context->res->avatar:'images/no-avatar.png') ?>">
                    <?php echo " ".$context->res->nom." ".$context->res->prenom ?>
                </h3>
                <br>
                <h6> <?php echo $context->res->statut ?> </h6>
                <br>
                <div>
                    <?php include("userlistwallSuccess.php"); ?>
                </div>
        </div>


            <div class="col-sm-9">

                <br><br>
                <h4>Envoyer un message à <?php echo $context->res->prenom ?> : </h4>
                <form role="form" method="POST" action="BlackManba.php?action=showmessage" >
                    <div class="form-group">
                        <textarea class="form-control" name="send_message" rows="2" required></textarea>
                       
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <br><br>


                <div class="col-lg-offset-1" style="background-color: #f8f8f8">
                <h4>RECENT POST(S)</h4>

            <?php if($context->message != false) { foreach ( $context->message as $message)

            {
            print("<hr>");
            print("<h2>"); echo $message->post->texte; print("</h2>");
            print("<h5><span class='glyphicon glyphicon-user'></span> Post by "); echo $message->emetteur->nom;print(" for "); echo $message->destinataire->nom; print("</h5>");
            print("<h5><span class='glyphicon glyphicon-time'></span>"); echo $message->post->getDate(); print("</h5>");
            print("<h5><span class='glyphicon glyphicon-thumbs-up'>"); if (!isset($message->aimer)) { echo "0";} else {echo $message->aimer;} print("</span> <span class='label label-primary'>Add Pouce Bleue !</span></h5><br>");
            }

            }

            else {
                print("<hr>");
                print("<h2>"); echo $message; print("</h2>");} ?></div>
            </div>
        </div>
    </div>



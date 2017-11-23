<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 18:30
 */

if (!empty($context->message))  foreach ( $context->message as $message);
else $message = "Pas encore de post pour cet user !";
if (!empty($context->messageDestinataire))  foreach ( $context->messageDestinataire as $messageDestinataire);
else $messageDestinataire = "Personne n'a écrit à cet user !";
?>


<div class="container-fluid">
        <div class="col-sm-3 sidenav">
            <h3>
                <img class="image-circle" src="<?php echo (!empty($context->res->avatar)?$context->res->avatar:'images/no-avatar.png') ?>">
                <?php echo " ".$context->res->nom." ".$context->res->prenom ?>
                <br>
            </h3>
            <span class="col-lg-offset-2" style="color: #c12e2a"> "<?php echo $context->res->statut ?>"</span>
            <br>
            <br>
            <div>
                <?php include("userlistwallSuccess.php"); ?>
            </div>
            <br>
            <br>
        </div>
        <div class="col-sm-9">
            <!-- ENVOIE DE MESSAGE - MARTINEZ GEOFFREY - -->

            <h4>Envoyer un message à <?php echo $context->res->prenom ?> : </h4>
            <form role="form" method="POST" action="BlackManba.php?action=showmessage&id=<?php echo $context->res->id ; ?>" >
                <div class="form-group">
                    <textarea class="form-control" name="send_message" rows="2" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">SEND</button>
            </form>
            <br>
            <div class="col-lg-offset-3">
                <button onclick="showPane('messageenvoyer')">Message Envoyés</button><button onclick="showPane('messagerecu')">Message Reçus</button>
            </div>
            <div id="message">
                <div id="messageenvoyer" style="background-color: #f8f8f8">
                    <h4>Message Envoyés</h4>
                    <?php 
                    if($context->message != false) {
                        foreach ( $context->message as $message)
                        {
                            echo "<hr>";
                            echo "<h2>"; 
                            echo $message->post->texte;
                            echo "</h2>";
                            echo "<h5><span class='glyphicon glyphicon-user'></span> Post by ";
                            echo $message->emetteur->nom;
                            echo " for ";
                            echo $message->destinataire->nom;
                            echo "</h5>";
                            echo "<h5><span class='glyphicon glyphicon-time'></span>";
                            echo $message->post->getDate();
                            echo "</h5>";
                            echo "<h5><span class='glyphicon glyphicon-thumbs-up'>";
                            if(!isset($message->aimer)){
                                echo "0";
                            } 
                            else {
                                echo $message->aimer;
                            } 
                            echo "</span> <span class='label label-primary'>Add Pouce Bleue !</span></h5><br>";
                        }
                    }
                    else {
                        echo "<hr>";
                        echo "<h2>";
                        echo $message;
                        echo "</h2>";
                    } ?>
                </div>
                <!--Fait par Dimitri Hueber, Récupère les messages envoyé à cette utilisateur-->
                <div id="messagerecu" style="background-color: #f8f8f8;display: none">
                    <h4>Message Reçus</h4>

                    <?php 
                    if($context->messageDestinataire != false) {
                        foreach ( $context->messageDestinataire as $messageDestinataire)
                        {
                            echo "<hr>";
                            echo "<h2>"; 
                            echo $messageDestinataire->post->texte;
                            echo "</h2>";
                            echo "<h5><span class='glyphicon glyphicon-user'></span> Post by ";
                            echo $messageDestinataire->emetteur->nom;
                            echo " for ";
                            echo $messageDestinataire->destinataire->nom;
                            echo "</h5>";
                            echo "<h5><span class='glyphicon glyphicon-time'></span>";
                            echo $messageDestinataire->post->getDate();
                            echo "</h5>";
                            echo "<h5><span class='glyphicon glyphicon-thumbs-up'>";
                            if(!isset($messageDestinataire->aimer)){
                                echo "0";
                            } 
                            else {
                                echo $messageDestinataire->aimer;
                            } 
                            echo "</span> <span class='label label-primary'>Add Pouce Bleue !</span></h5><br>";
                        }
                    }
                    else {
                        echo "<hr>";
                        echo "<h2>";
                        echo $messageDestinataire;
                        echo "</h2>";
                    } ?>
                </div>
            </div>
    </div>
    <!--Fait par Dimitri Hueber-->
    <script type="text/javascript">
        function showPane(id) {
            var div,i;
            var maindiv = "message"; 
            var p = document.getElementById(maindiv); 
            for (i=0; i<p.childNodes.length; i++) {
                div = p.childNodes[i];
                if (div.nodeType!=1) continue;
                    if (div.getAttribute("id") == id) {
                        div.style.display = "block";
                    }
                    else {
                        div.style.display = "none";
                    }
            }
        }
    </script>


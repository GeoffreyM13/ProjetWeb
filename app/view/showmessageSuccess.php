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
            <!--martinez geoffrey - inclusion du chat-->
            <div>
                <?php include("chatSuccess.php"); ?>
            </div>

        </div>

        <div class="col-sm-9">
            <!-- ENVOIE DE MESSAGE - MARTINEZ GEOFFREY - -->

            <h4>Envoyer un message à <?php echo $context->res->prenom ?> : </h4>
            <form role="form" method="POST" id="message_textarea" action="BlackManba.php?action=showmessage&id=<?php echo $context->res->id ; ?>" >
                <div class="form-group">
                    <textarea class="form-control" name="send_message" id="send_message" rows="2" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">SEND</button>
            </form>
            <br>
            <!-- Affichage messagerecu-messageenvoyer Dimitri hueber -->
            <div class="col-lg-offset-3">
                <button class=" btn btn-info" onclick="showPane('messageenvoyer')">Message Envoyés</button>   <button class="btn btn-info" onclick="showPane('messagere')">Message Reçus</button>
            </div>
            <div id="message">
                <div id="messageenvoyer" style="background-color: #f8f8f8">
                    <h3><u>Message Envoyés</u></h3>

                <!-- Martinez Geoffrey -  Affiche les messages envoyés par un utilisateur -->
                    <?php 
                    if($context->message != false) {
                      ?>
                    <form method='POST' id ="formA" class ="add_aime" action="BlackManba.php?action=showmessage&id=<?php echo $context->res->id?>">
                        <?php
                        foreach ( $context->message as $message)
                        {

                            if (!empty($message->destinataire->nom)) {
                                echo "<hr>";
                                echo "<h2>"; 
                                echo htmlentities($message->post->texte);
                                echo "</h2>";
                                echo "<h5><span class='glyphicon glyphicon-user'></span> Post by ";
                                echo $message->emetteur->nom;
                                echo " for ";
                                echo $message->destinataire->nom;
                                echo "</h5>";
                                echo "<h5><span class='glyphicon glyphicon-time'></span>";
                                echo $message->post->getDate();
                                echo "</h5>";

                                echo "<div class=\"btn\" onclick=\"addLike(<?= $message->id ?>)\"> add like  </div>";
                                if(!isset($message->aimer)){
                                    echo "0";
                                } 
                                else {
                                    echo $message->aimer;
                                } 
                                 ?>

                            <input name="messageid" class ="messageid" value="<?= $message->id ?>" type='submit' class='btn-warning'> ADD!</input><br>

                    <?php

                            }

                        }     ?>  </form> <?php
                    }
                    else {
                        echo "<hr>";
                        echo "<h2>";
                        echo $message;
                        echo "</h2>";
                    } ?>
                </div>
                <!--Fait par Dimitri Hueber, Récupère les messages envoyé à cette utilisateur-->
                <div id="messagere" style="background-color: #f8f8f8;display: none">
                    <div id="messagerecu">
                    <h3><u>Message Reçus</u></h3>

                    <?php 
                    if($context->messageDestinataire != false) {
                        foreach ( $context->messageDestinataire as $messageDestinataire)
                        {
                            echo "<hr>";
                            echo "<h2>"; 
                            echo htmlentities($messageDestinataire->post->texte);
                            echo "</h2>";
                            echo "<h5><span class='glyphicon glyphicon-user'></span> Post by ";
                            echo $messageDestinataire->emetteur->nom;
                            echo " for ";
                            echo $messageDestinataire->destinataire->nom;
                            echo "</h5>";
                            echo "<h5><span class='glyphicon glyphicon-time'></span>";
                            echo $messageDestinataire->post->getDate();
                            echo "</h5>";

                            echo "<h5><span class='glyphicon glyphicon-thumbs-up'> </span></h5>";
                            if(!isset($messageDestinataire->aime)){
                                echo "0";
                            } 
                            else {
                                echo $messageDestinataire->aime;
                            } 
                            echo "  <input type='button' id='add_aime' class='glyphicon-bitcoin' value='<?= $messageDestinataire->id ?>' >Add!</input><br>";
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
    //Fait par Dimitri Hueber    
        $(function() {
            $('#message_textarea').submit(function( event ) {
                // Stop form from submitting normally
                event.preventDefault();

                // Get some values from elements on the page:
                var $formVal = $(this).find( "textarea[name='send_message']" )
                var term = $formVal.val();

                if (term == '') {
                    return;
                }

                // Send the data using post
                $.post('BlackManbaAjax.php?action=showmessage&id=<?php echo $context->res->id ?>', { send_message: term } )
                .done(function (data) {
                    data = JSON.parse(data);

                    $formVal.val('');
                    $('#messageenvoyer').load('./BlackManbaAjax.php?action=showmessage&id=<?php echo $context->res->id ?> #messageenvoyer')
                    $('#messagerecu').load('./BlackManbaAjax.php?action=showmessage&id=<?php echo $context->res->id ?> #messagerecu')
                    Notification('send');
                })

                return false;
            });

            setInterval(function () {
                $('#messagerecu').load('./BlackManbaAjax.php?action=showmessage&id=<?php echo $context->res->id ?> #messagerecu')
            }, 30000);

        });

        function addLike($id){

            var arr = {"messge" : $id};

            $.post(
                'BlackManbaAjax.php?action=update',
                {
                    value_id : term,

                    test : "test"
                },
                function (data) {
                    if(data == 'Success'){
                        Notification('send');
                    }

                }
            );

        }

        // MARTINEZ GEOFFREY - Ajout aime et refresh
        $(function() {
            $('.add_aime').submit(function( event ) {
                // Stop form from submitting normally
                event.preventDefault();

                // je récupere l'id du message
                var term = $('.messageid').val();

                if (term == '') {
                    return;
                }

                // J'utilise Post
                $.post(
                    'BlackManbaAjax.php?action=update',
                    {
                        value_id : term,

                        test : "test"
                    },
                    function (data) {
                        if(data == 'Success'){
                            Notification('send');
                        }

                    }
                    );


                    $('#messageenvoyer').load('./BlackManbaAjax.php?action=showmessage&id=<?php echo $context->res->id ?> #messageenvoyer')
                    $('#messagerecu').load('./BlackManbaAjax.php?action=showmessage&id=<?php echo $context->res->id ?> #messagerecu')
                return false;
            });

        });


    </script>

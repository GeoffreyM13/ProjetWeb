<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 13/11/2017
 * Time: 11:18
 */

?>

<style>

     .button:hover,
    button:focus {
        background-color: #4cceea;
        border-radius: 50%;
    }



    .button_id_submit .fa-paper-plane {
        color: grey;
        transition: color ease 0.2s;
    }

    .button_id_submit:hover .fa-paper-plane {
        color: white;
    }


    .modal__dialog {
        width : 100%;
        height: auto;
        position: absolute;
        z-index: 1;
        left: 0;
        margin-top: 2%;
    }


    .modal__icon .fa-times {
        font-size: 18px;
        line-height: 16px;
        color: white;
        display: inline-block;
        vertical-align: top;
    }

    .modal__main {
        flex: 1 1 auto;
        width: 100%;
    }

    .chat {
        display: flex;
        background-color: white;
        box-shadow: 0 0 32px rgba(0, 1, 3, 0.15);
        margin-bottom: 0px;
    }


    .users__item_group .users__avatar {
        background-color: #4cceea;
    }

    .users__item_group .users__note {
        color: #4cceea;
    }

    .users__item_group .users__counter {
        background-color: #4cceea;
    }


    /* Chatbox */

    .chatbox {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: auto;
        table-layout: fixed;
        box-sizing: border-box;
        width: 100%;
        padding: 0 14px;

    }

    .chatbox__row {
        display: block;
    }

    .chatbox__row_fullheight {
        flex: 1;
        overflow-y: auto;
    }

    .head {
        display: inline-flex;
        position: relative;
        width: 100%;
        align-items: center;
        padding: 11px 0 13px 0;
    }

    .head:after {
        background-color: #edeef1;
        height: 2px;
        width: 100%;
        content: '';
        position: absolute;
        left: 0;
        top: 100%;
    }
     .message__head {
        display: flex;
        justify-content: space-between;
        padding: 5% 8% 0% 15%;
    }

    .message__note {
        opacity: 0.5;
        color: #5b6171;
        font-size: 12px;
    }

    .message__base {
        display: inline-flex;
        width: 100%;
        align-items: center;
    }

    .message__textbox {
        box-sizing: border-box;
        display: box;
        align-items: center;
        margin-left: 15px;
        width: 100%;
        min-height: 43px;
        background-color: #f5f6fa;
        border-radius: 9px;
        padding: 11px 25px 12px 25px;
        color: #6a6d77;
        word-break: break-all;
    }

    .enter__textarea {
        padding-right: 50px;
    }

    .enter__textarea textarea {
        width: 100%;
        border: none;
        resize: none;
    }

    .enter__icons .fa-paperclip {
        font-size: 16px;
        color: grey;
    }

    .enter__icons .fa-smile-o {
        font-size: 16px;
        color: grey;
    }


</style>
<!--martinez geoffrey - draggable et resize du chat avec jquery ui -->
<script>

$( function() {
$( "#draggable" ).draggable().resizable({minHeight: 250,
    minWidth: 357});
});

$(document).ready(function(){
    $("#hide").click(function(){
        $("#showornot").hide();
    });
    $("#show").click(function(){
        $("#showornot").show();
    });
});
</script>

<!-- MARTINEZ GEOFFREY -->
<!-- Geoffrey Martinez -->
<!-- Pour les notify de bootstrap -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
<script type="text/javascript" src="js/notify.js"></script>


<!-- should be hidden with the hidden-md-down class
see  https://v4-alpha.getbootstrap.com/layout/responsive-utilities/ -->

    <div class= "modal__dialog ui-widget-content"  id="draggable" >
        <div class="modal__content chat visible-lg visible-md" >
            <div class="modal__main" >
                <!-- MARTINEZ GEOFFREY -->
                <!-- affiche ou non le chat -->
                <button id="hide" class="glyphicon glyphicon-menu-up"></button>
                <button id="show" class="glyphicon glyphicon-menu-down"></button>

                <div class="chatbox" id="showornot" >
                    <div class="chatbox__row" >


                        <div class="head">

                            <div class="enter__textarea">
                                <form role="form" id="chat" method="POST" action="BlackManba.php" >
                                <input type="textarea" id="send_chat" class="form-control" cols="30" rows="2" placeholder="Say message..." name="send_chat"></input>
                                    <button class="button" type="submit" id="send_message">Send</button>
                                <input type="hidden" name="action" value="<?php echo $action ?>">
                                </form>

                            </div>


                        </div>
                    </div>
                    <div id="chatbox_messages" class="chatbox__row chatbox__row_fullheight "  >

                    <?php foreach($context->chat as $chat): ?>
                        <div class="message">

                                <div class="message__head">
                                    <span class="message__note"><?= htmlspecialchars($chat->emetteur->nom); ?></span>
                                    <span class="message__note"><?= $chat->post->getDate(); ?></span>
                                </div>

                                <div class="message__base">

                                    <div class="message__avatar avatar">
                                            <img src="<?php echo htmlspecialchars(!empty($chat->emetteur->avatar)?$chat->emetteur->avatar:'images/no-avatar.png') ?>"  width="35" height="35" alt="avatar image">
                                    </div>

                                    <div class="message__textbox">
                                        <span class="message__text"><?= htmlspecialchars($chat->post->texte); ?></span>
                                    </div>

                                </div>
                            </div>
                    <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Fait par Dimitri HUEBER  & Geoffrey-->
<script>
    $(function() {
        $('#chat').submit(function( event ) {
            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $formVal = $(this).find( "input[name='send_chat']" )
            var term = $formVal.val();

            if (term == '') {
                return;
            }

            // Send the data using post
            $.post('./BlackManbaAjax.php?action=chat', { send_chat: term } )
            .done(function (data) {
                data = JSON.parse(data);

                $formVal.val('');
                $('#chatbox_messages').load('./BlackManbaAjax.php?action=chat #chatbox_messages')
                Notification('chat');
            })

            return false;
        });
        // recharge le chat tous les 5s
        setInterval(function () {
            $('#chatbox_messages').load('./BlackManbaAjax.php?action=chat #chatbox_messages')
        }, 5000);

        setInterval(function(){Notification('chat_updated')},15000);

    });


    <!-- MARTINEZ GEOFFREY -->
    <!-- notifications pour le site -->
   <!-- pour l'ensenble des pages car chat est inclus dans presque toutes les pages -->
    function Notification(action) {

        if (action == 'chat') {

            $.bootstrapGrowl('Votre chat a bien été envoyé !', {

                ele: '.chatbox',
                type: 'success',
                offset: {from: 'top', amount: 20},
                delay: 3000,
                width: 250,
                allow_dismiss: true,
                align: 'right'


            });
        }
        if (action == 'chat_updated') {

            $.bootstrapGrowl('Votre chat a été mise à jour!', {

                ele: '.modal__main',
                type: 'success',
                offset: {from: 'top', amount: 20},
                delay: 1000,
                width: 250,
                allow_dismiss: true,
                align: 'right'


            });

        }
        if (action == 'send') {

            $.bootstrapGrowl('Votre message à bien été envoyé!', {

                ele: 'body',
                type: 'success',
                offset: {from: 'top', amount: 20},
                delay: 3000,
                width: 250,
                allow_dismiss: true,
                align: 'right'


            });
        }
        if (action == 'statut') {

            $.bootstrapGrowl('Votre statu a bien été modifié!', {

                ele: 'body',
                type: 'success',
                offset: {from: 'top', amount: 20},
                delay: 3000,
                width: 250,
                allow_dismiss: true,
                align: 'right'


            });
        }
    }


</script>

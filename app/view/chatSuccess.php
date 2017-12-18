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
        width: 400px;
    }

    .chat {
        display: flex;
        background-color: white;
        box-shadow: 0 0 32px rgba(0, 1, 3, 0.15);
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
        height: 530px;
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
$( "#draggable" ).draggable().resizable({minHeight: 150,
    minWidth: 357});
});

$(document).ready(function(){
    $("#hide").click(function(){
        $("#draggable").hide();
    });
    $("#show").click(function(){
        $("#draggable").show();
    });
});
</script>

<!-- MARTINEZ GEOFFREY -->

<button id="hide">Hide</button>
<button id="show">Show</button>

<!-- should be hidden with the hidden-md-down class
see  https://v4-alpha.getbootstrap.com/layout/responsive-utilities/ -->

    <div class= "modal__dialog ui-widget-content" id="draggable">
        <div class="modal__content chat visible-lg visible-md" >
            <div class="modal__main" >
                <div class="chatbox" >
                    <div class="chatbox__row">

                        <div class="head">

                            <div class="enter__textarea">
                                <!--<form role="form" method="POST" action="BlackManba.php?action=chat" > -->
                                <form id ="chat">
                                    <input type="textarea" id="send_chat" class="form-control" cols="30" rows="2" placeholder="Say message..."></input>
                                <button class="button" type="submit" id="send_message">Send</button>
                                </form>

                            </div>


                        </div>
                    </div>
                    <div class="chatbox__row chatbox__row_fullheight " >

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

<script>
 /*   // Envoie un nouveau chat en ajax
    $( "#chat" ).submit(function( event ) {

        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var $form = $( this ),
            term = $form.find( "input[name='send_chat']" ).val(),
            url = $form.attr( "action" );

        // Send the data using post
        $.post( "../ProjetWeb/BlackManbaAjax.php?action=chat", { send_chat: term } );
        $.('.messaeg__text').append(term);

    });
*/
/*MARCHE MAIS RETOURNE SUR LA PAGE LOGIN A CHAQUE FOIS !!!*/
    $(function() {
        $('#send_message').click(function() {

            var message = $('#send_chat').val();

            $.ajax({
                type: "POST",
                url: "../ProjetWeb/BlackManbaAjax.php?action=chat",
                data:{ 'send_chat' : message }

            });

            .done(
            function(data){
                console.log(data);
                $(".message__text".html()+data);
            });
        });
    });

</script>
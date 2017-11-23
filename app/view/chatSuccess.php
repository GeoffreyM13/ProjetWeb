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
        width: 400px;
        position: relative;
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

message block */

    .message {}

    .message__head {
        display: flex;
        justify-content: space-between;
        padding: 12px 80px 10px 82px;
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

    <div class= "modal__dialog">
        <div class="modal__content chat">
            <div class="modal__main" >
                <div class="chatbox">
                    <div class="chatbox__row">

                        <div class="head">

                            <div class="enter__textarea">
                                <form role="form" method="POST" action="BlackManba.php?action=chat" >
                                    <textarea name="send_chat" class="form-control" cols="30" rows="2" placeholder="Say message..."></textarea>
                                    <input class="button" type="submit">
                                </form>

                            </div>


                        </div>
                    </div>
                    <div class="chatbox__row chatbox__row_fullheight">

                    <?php foreach($context->chat as $chat): ?>
                        <div class="message">

                                <div class="message__head">
                                    <span class="message__note"><?= $chat->emetteur->nom; ?></span>
                                    <span class="message__note"><?= $chat->post->getDate(); ?></span>
                                </div>

                                <div class="message__base">

                                    <div class="message__avatar avatar">
                                            <img src="<?php echo (!empty($chat->emetteur->avatar)?$chat->emetteur->avatar:'images/no-avatar.png') ?>"  width="35" height="35" alt="avatar image">
                                    </div>

                                    <div class="message__textbox">
                                        <span class="message__text"><?= $chat->post->texte; ?></span>
                                    </div>

                                </div>
                            </div>
                    <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

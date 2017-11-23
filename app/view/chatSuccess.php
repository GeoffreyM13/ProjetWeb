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

    .button_id_submit {
        border-radius: 50%;
        height: 38px;
        width: 38px;
        color: grey;
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

    .modal__close {
        font-size: 0;
        position: absolute;
        right: 25px;
        top: -30px;
        cursor: pointer;
    }

    .modal__icon {
        display: inline-block;
        vertical-align: top;
    }

    .modal__icon .fa-times {
        font-size: 18px;
        line-height: 16px;
        color: white;
        display: inline-block;
        vertical-align: top;
    }

    .modal__note {
        display: inline-block;
        vertical-align: top;
        margin-left: 9px;
        font-size: 14px;
        color: #fff;
        font-weight: 700;
        text-transform: uppercase;
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

    .chat__search {
        padding: 23px 23px 13px 21px;
    }

    .chat__search:after {
        content: '';
        display: block;
        position: absolute;
        bottom: 0;
        left: 22px;
        right: 24px;
        height: 2px;
        opacity: 0.25;
        background-color: #b8bbc8;
    }


    .search {
        display: block;
        position: relative;
    }

    .search__icon {
        width: 18px;
        height: 18px;
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        cursor: pointer;
    }

    .search__icon_right {
        right: 0;
        left: auto;
    }

    .search__input {
        width: 100%;
        background: none;
        border: none;
        padding: 0 32px;
        line-height: 14px;
        color: #a0a3b1;
        outline: none;
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

    .head__avatar.avatar {
        position: relative;
        background-color: #4cceea;
    }

    .head__title {
        color: #5b6171;
        font-size: 18px;
        font-weight: 400;
        margin-left: 21px;
        padding-top: 3px;
    }

    .head__note {
        color: #a0a3b1;
        font-size: 14px;
        font-weight: 400;
        margin-left: auto;
        padding-right: 18px;
        padding-top: 3px;
    }

    .head__icon {
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #d2d4da;
        display: inline-block;
        vertical-align: middle;
        margin-left: 8px;
    }

    .chatbox__content {
        height: 100%;
    }


    /* message block */

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

    .message__date {}

    .message__base {
        display: inline-flex;
        width: 100%;
        align-items: center;
    }

    .message__avatar {}

    .message__textbox {
        box-sizing: border-box;
        display: flex;
        align-items: center;
        margin-left: 15px;
        width: 100%;
        min-height: 43px;
        background-color: #f5f6fa;
        border-radius: 9px;
        padding: 11px 25px 12px 25px;
        color: #6a6d77;
    }

    .message__smiley {
        margin-right: 3px;
    }

    .message__smiley:last-child {
        margin-right: 0;
    }

    .message__text + .message__smiley {
        margin-left: 4px;
    }

    .avatar {
        border-radius: 50%;
        position: relative;
        border: none;
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: 700;
        background-color: #b8bbc8;
    }

    .avatar_larger {
        width: 43px;
        height: 43px;
    }

    .avatar_online:before {
        position: absolute;
        content: '';
        top: 0;
        right: 0;
        width: 6px;
        height: 6px;
        background-color: #4cceea;
        border: 2px solid #eff0f5;
        border-radius: 50%;
    }

    .avatar__wrap {
        border-radius: 50%;
        text-decoration: none;
        display: inherit;
        color: #fff;
    }

    .avatar__img {
        border-radius: 50%;
    }

    .counter {
        line-height: 11px;
        color: white;
        font-size: 13px;
        font-weight: 700;
        display: block;
    }


    /* enter block */

    .enter {
        position: relative;
        padding-top: 12px;
        padding-bottom: 14px;
    }

    .enter:before {
        background-color: #edeef1;
        height: 2px;
        width: 100%;
        content: '';
        position: absolute;
        bottom: 100%;
        left: 0;
    }

    .enter__submit {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        width: 38px;
        height: 38px;
        border: 2px solid #e2e3e7;
        border-radius: 50%;
        background-color: #fff;
        text-align: center;
    }

    .enter__textarea {
        padding-right: 50px;
    }

    .enter__textarea textarea {
        width: 100%;
        border: none;
        resize: none;
    }

    .enter__icons {
        padding-right: 50px;
        font-size: 0;
        display: flex;
        align-items: center;
        margin-top: 6px;
    }

    .enter__icons .fa-paperclip {
        font-size: 16px;
        color: grey;
    }

    .enter__icons .fa-smile-o {
        font-size: 16px;
        color: grey;
    }

    .enter__icon {
        margin-right: 12px;
    }
</style>


    <div class="modal__dialog" >
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
                    <?php foreach($context->chat as $chat): ?>

                    <div class="chatbox__row chatbox__row_fullheight">
                        <div class="chatbox__content">
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
                            <?php endforeach; ?>
                    <div class="chatbox__row">






                    </div>


                </div>
            </div>
        </div>
    </div>
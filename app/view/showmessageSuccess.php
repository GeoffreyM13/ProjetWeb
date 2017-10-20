<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 18:30
 */




 foreach ( $context->message as $message)
     echo "-->" . $message->post->texte . " par " . $message->emetteur->nom . " destinataire " . $message->destinataire->nom . " parent " . $message->parent->nom ."</br>";




?>
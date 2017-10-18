<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 18:40
 */
require_once "message.class.php";

public static function getMessageByUserId($id){

    $em = dbconnection::getInstance()->getEntityManager() ;

    $messageRepository = $em->getRepository('message');
    $message = $userRepository->findAll('emetteur'=>$id);

    if ($message == false){

        return false;
    }
    return $message;
}



?>
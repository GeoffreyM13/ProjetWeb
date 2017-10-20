<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 18:40
 */
require_once "message.class.php";

class messageTable {

    public static function getMessageByUserId($id){

    $em = dbconnection::getInstance()->getEntityManager();

    $userRepository = $em->getRepository('message');
    $message = $userRepository->findBy(['emetteur'=>$id]);

    if ($message == false) {

        return false;
    }
    return $message;
    }

}

?>
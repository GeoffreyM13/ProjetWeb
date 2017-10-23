<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 18:40
 */
require_once "message.class.php";

class messageTable {

    //Martinez Geoffrey

    public static function getMessageByUserId($id){

    $em = dbconnection::getInstance()->getEntityManager();

    $userRepository = $em->getRepository('message');
    $message = $userRepository->findBy(['emetteur'=>$id]);

    if ($message == false) {

        return false;
    }
    return $message;
    }

    //Martinez Geoffrey

    public static function getAllMessages(){

        $em = dbconnection::getInstance()->getEntityManager();

        $messageRepository = $em->getRepository('message');
        $message = $messageRepository->findAll();

        if ($message == false) {

            return false;
        }
        return $message;
    }

}

?>
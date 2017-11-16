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

    $messageRepository = $em->getRepository('message');
    $message = $messageRepository->findBy(['emetteur'=>$id]);

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

 /*   public static function SendMessage($destinataire,$emetteur,$message){

        $em = dbconnection::getInstance()->getEntityManager();

        $createPost   = $em->getRepository(post);
        $post = new post($message,$date,$image);
        $em->persist($post);
        $em->flush();


        $SendingMessage = $em->getRepository(message);
        $message = new message($emetteur, $destinataire, null, $post);
        $em->persist($message);
        $em->flush();

        return $message;



    }
*/
}

?>
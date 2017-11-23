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
    $message = $messageRepository->findBy(['emetteur'=>$id],['id'=>'DESC'],$limit = 10);

    if ($message == false) {

        return false;
    }
    return $message;
    }
    //Dimitri Hueber
    public static function getMessageByUserIdDestinataire($id){

    $em = dbconnection::getInstance()->getEntityManager();

    $messageRepository = $em->getRepository('message');
    $message = $messageRepository->findBy(['destinataire'=>$id],['id'=>'DESC'],$limit = 10);

    if ($message == false) {

        return false;
    }
    return $message;
    }

    //Martinez Geoffrey
    // permet de retourner les 10 derniers messages poster
    public static function getAllMessages(){

        $em = dbconnection::getInstance()->getEntityManager();

        $messageRepository = $em->getRepository('message');
        $message = $messageRepository->findBy( [],['id'=>'DESC'],$limit = 10 );

        if ($message == false) {

            return false;
        }
        return $message;
    }
    // Martinez Geoffrey
    // permet de déposer un nouveau message sur le forum
    // crée un post puis un message
     public static function SendMessage($destinataire , $emetteur , $message){

        $image = '';

        $em = dbconnection::getInstance()->getEntityManager();


         $userRepository = $em->getRepository('utilisateur');

         $dest   = $userRepository->findOneById(array("id" => $destinataire));
         $emet   = $userRepository->findOneById(array("id" => $emetteur));


         $postRepository = $em->getRepository('post');

         //utilise le constructeur de post.class
         $post= new post($message,$image);
         $em->persist($post);
         $em->flush();

         $messageRepo = $em->getRepository('message');
         //utilise le constructeur de message.class
         $message        = new message($emet, $dest, null, $post);
         $em->persist($message);
         $em->flush();

        return $message;



    }

}

?>
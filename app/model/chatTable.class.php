<?php
// Inclusion de la classe chat
require_once "chat.class.php";

class chatTable {

  //Dimitri Hueber
  //Retourne les données :chat
  //out = array

  public static function getChats(){
  	$em = dbconnection::getInstance()->getEntityManager() ;
	  $chatRepository = $em->getRepository('chat');
	  $chat = $chatRepository->findBy([],['id'=>'DESC'],$limit = 10 );

	  if ($chat == false){
		  return false;
	  }
    return $chat;
  }

  //Dimitri Hueber
	//Retourne le dernier chat
	//out = array

  public static function getLastChat(){
    $em = dbconnection::getInstance()->getEntityManager() ;
    $chatRepository = $em->getRepository('chat');
    $lastchat = $chatRepository->findOneBy(array('id' => $id), array('id' => 'DESC'));
    if ($lastchat == false){
      return false;
    }
		return $lastchat;
  }

  //MArtinez Geoffrey
    // Insert un chat dans la table

    public static function SendChat($emetteur, $message){

        $image = '';

        $em = dbconnection::getInstance()->getEntityManager();


        $userRepository = $em->getRepository('utilisateur');

        $emet   = $userRepository->findOneById(array("id" => $emetteur));

        $postRepository = $em->getRepository('post');

        //utilise le constructeur de post.class
        $post= new post($message,$image);
        $em->persist($post);
        $em->flush();

        $chatRepo = $em->getRepository('chat');
        //utilise le constructeur de message.class
        $chat        = new chat($post, $emet);
        $em->persist($chat);
        $em->flush();

        return $chat;



    }
}

?>

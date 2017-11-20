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

}

?>

<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {

  public static function getUserByLoginAndPass($login,$pass){
    $em = dbconnection::getInstance()->getEntityManager() ;
    $userRepository = $em->getRepository('utilisateur');
	  $user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));	
	  if ($user == false){
      return false;
	  }
	  return $user; 
  }

    //Martinez Geoffrey
	//Retourne les données :user par l'id
	//in = user id
	//out = array

  public static function getUserById($id){
    $em = dbconnection::getInstance()->getEntityManager() ;
    $userRepository = $em->getRepository('utilisateur');
    $user = $userRepository->findOneBy(array("id" => $id));
    if ($user == false){
      return false;
    }
	  return $user;
  }

    //Martinez Geoffrey

    public static function getUsers(){
        $em = dbconnection::getInstance()->getEntityManager() ;
        $usersRepository = $em->getRepository('utilisateur');
        $users = $usersRepository->findAll();


        if ($users == false){
            return false;
        }

        return $users;
    }
}

?>

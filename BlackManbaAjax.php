<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 10/10/2017
 * Time: 15:22
 */


//nom de l'application
$nameApp = "app";

// Inclusion des classes et librairies
require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';

//action par défaut
//$action = "index";
$action	= "login";


if(key_exists("action", $_REQUEST))
    $action =  $_REQUEST['action'];

session_start();

$context = context::getInstance();
$context->init($nameApp);

/*$user = $context->getSessionAttribute('user_id') ;
if(!isset($user) || $user == NULL){
	$action = "login" ;
}*/

$view=$context->executeAction($action, $_REQUEST);

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view===false){
    echo "Une grave erreur s'est produite, il est probable que l'action ".$action." n'existe pas...";
    die;
}

//inclusion du layout qui va lui meme inclure le template view
elseif($view==context::NONE){

    if (isset($_SESSION['statut']))
    {


        include($nameApp."/layout/layoutConnected.php");
    }
    else {



        include($nameApp . "/layout/" . $context->getLayout() . ".php");
    }

}

?>
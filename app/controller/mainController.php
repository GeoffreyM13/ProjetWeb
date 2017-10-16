<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}

    public static function login($request,$context)
    {
        
        if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']))
        {

            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            $context->res=utilisateurTable::getUserByLoginAndPass($username,$password);

            if ($context->res == false)
            {

                $context->error = "Il y a une erreur dans l'identifiant/password";
                return context::ERROR;
            }
            else
            {

                context::setSessionAttribute('id', $context->res->id);
                context::setSessionAttribute('identifiant', $context->res->identifiant);
                context::setSessionAttribute('nom', $context->res->nom);
                context::setSessionAttribute('prenom', $context->res->prenom);
                //$_SESSION['statut']= 'actif';

                return $context->redirect("BlackManba.php?action=connected");

            }

        }

        return context::SUCCESS;
    }

    public static function connected($request,$context)
    {

        $context->data = "Bienvenue $_SESSION[prenom] , $_SESSION[nom] ! ";
        return context::SUCCESS;
    }

	public static function index($request,$context)
	{
		
		return context::SUCCESS;
	}

    public static function disconnected($request,$context)
    {
        unset($_SESSION['user_id']); 
        return context::NONE;
    }

}

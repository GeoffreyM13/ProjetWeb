<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController
{

    public static function login($request,$context)
    {
        
        if(!empty($request['username']) && !empty($request['password']))
        {

            $username = $request['username'];
            $password = $request['password'];

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
                context::setSessionAttribute('statut', $context->res->statut);
                $_SESSION['statut']= 'actif';

                return $context->redirect("BlackManba.php?action=showmessage");

            }

        }

        return context::SUCCESS;
    }

    public static function connected($request,$context)
    {
        if($_SESSION['prenom']!=null || $_SESSION['nom']!=null){
        $context->data = "Bienvenue $_SESSION[prenom] , $_SESSION[nom] ! ";
        return context::SUCCESS;
        }
        else{
            return $context->redirect("BlackManba.php?action=login");
        }
    }

    public static function disconnected($request,$context)
    {
        unset($_SESSION['statut']);
        session_destroy();
        return context::NONE;
    }

    //Martinez Geoffrey
    //16-10-17

    public static function showmessage($request, $context){

            if (isset($_GET['id'])) {
                self::userlistwall($request,$context);
                $context->message = messageTable::getMessageByUserId($_GET['id']); //recup messages user
                $context->res = utilisateurTable::getUserById($_GET['id']); //recup info user
            }

            else{
                self::userlistwall($request,$context);
            $context->message = messageTable::getMessageByUserId($_SESSION['id']);
            $context->res = utilisateurTable::getUserById($_SESSION['id']); //recup info user
            }

        if(!empty($_POST['send_message'])){
            messageTable::SendMessage($_GET['id'],$_SESSION['id'],$_POST['send_message']);
        }


        return context::SUCCESS;
    }


    //Martinez Geoffrey
    //20-10-17
    public static function userslist($request,$context){
        $context->users=utilisateurTable::getUsers();

        return context::SUCCESS;
    }
    //Dimitri Hueber
    public static function userlistwall($request,$context){
        $context->users=utilisateurTable::getUsers();

        return context::SUCCESS;
    }

    //Martinez Geoffrey
    //20-10-17
    public static function allmessage($request,$context)
    {

        $context->allmessage = messageTable::getAllMessages();

        return context::SUCCESS;
    }

    public static function chat($request,$context)
    {

        $context->chat = chatTable::getChats();

        return context::SUCCESS;
    }

    //Dimitri Hueber, permet de récupérer le profil de l'utilisateur connecté
    public static function profil($request,$context){
        $context->profil=utilisateurTable::getUserById($_SESSION['id']);
        if(!empty($request['modif_statut'])){
            $context->profil->statut=strip_tags($request['modif_statut']);
            utilisateurTable::updateStatut($context->profil);
        }
        return context::SUCCESS;
    }

}

<?php
/*
 * All doc on :
 * Toutes les actions disponibles dans l'application 
 *
 */

class mainController
{
    public static function login($request, $context)
    {
        if (!empty($request['username']) && !empty($request['password'])) {
            $username = $request['username'];
            $password = $request['password'];

            $context->res = utilisateurTable::getUserByLoginAndPass($username, $password);

            if ($context->res === false) {
                $context->error = "Il y a une erreur dans l'identifiant/password";

                return context::ERROR;
            } else {
                //attribus de session
                context::setSessionAttribute('id', $context->res->id);
                context::setSessionAttribute('identifiant', $context->res->identifiant);
                context::setSessionAttribute('nom', $context->res->nom);
                context::setSessionAttribute('prenom', $context->res->prenom);
                context::setSessionAttribute('statut', $context->res->statut);
                $_SESSION['statut'] = 'actif';

                return $context->redirect("BlackManba.php?action=showmessage");
            }

        }

        return context::SUCCESS;
    }

    public static function connected($request, $context)
    {
        if ($_SESSION['prenom'] !== null || $_SESSION['nom'] !== null) {
            $context->data = 'Bienvenue ' . $_SESSION['prenom'] . ' , ' . $_SESSION['nom'] . ' ! ';

            return context::SUCCESS;
        }

        return $context->redirect("BlackManba.php?action=login");
    }

    public static function disconnected($request, $context)
    {
        unset($_SESSION['statut']);
        session_destroy();

        return $context->redirect("BlackManba.php?action=login");
    }

    //Martinez Geoffrey
    //16-10-17
    //affiche les messages recus et envoyés pour un utilisateur
    //input : get[id]
    //output : $context->message, destinataire, res
    //
    //Update Dimitri Hueber
    public static function showmessage($request, $context)
    {
        if ($_SESSION['prenom'] === null || $_SESSION['nom'] === null) {
            return $context->redirect("BlackManba.php?action=login");
        }

        if (isset($_GET['id'])) {
            self::userlistwall($request, $context);
            self::chat($request, $context);
            $context->message = messageTable::getMessageByUserId($_GET['id']); //recup messages user
            $context->messageDestinataire = messageTable::getMessageByUserIdDestinataire($_GET['id']);
            $context->res = utilisateurTable::getUserById($_GET['id']); //recup info user

        } else {
            self::userlistwall($request, $context);
            self::chat($request, $context);
            $context->message = messageTable::getMessageByUserId($_SESSION['id']);
            $context->messageDestinataire = messageTable::getMessageByUserIdDestinataire($_SESSION['id']);
            $context->res = utilisateurTable::getUserById($_SESSION['id']); //recup info user
        }

        if (!empty($_POST['send_message'])) {
            messageTable::SendMessage($_GET['id'], $_SESSION['id'], $_POST['send_message']); // to , by , text
            if ($context->type === 'ajax') {
                die(json_encode($sent));
            }

            return $context->redirect('BlackManba.php?action='.$request['action']);
        }

        if (!empty($_POST['add_aime'])) {

            var_dump($_POST['add_aime']);
            die;
            messageTable::UpdateAime($_POST['add_aime']); // message id

            if ($context->type === 'ajax') {
                die(json_encode($sent));
            }

            return $context->redirect('BlackManba.php?action='.$request['action']);
        }

        $context->navbar_etat = "showmessage";

        return context::SUCCESS;
    }


    //Martinez Geoffrey
    //20-10-17
    // permet de récuperer la lite des utilisateurs
    public static function userslist($request, $context)
    {
        self::logornot($request, $context);
        $context->users = utilisateurTable::getUsers();
        $context->navbar_etat = "userslist";

        return context::SUCCESS;
    }

    //Dimitri Hueber
    public static function userlistwall($request, $context)
    {
        self::logornot($request, $context);
        $context->users = utilisateurTable::getUsers();

        return context::SUCCESS;
    }

    //Martinez Geoffrey
    //20-10-17
    //permet de récupérer les 10 derniers messages

    public static function allmessage($request, $context)
    {
        self::logornot($request, $context);
        $context->allmessage = messageTable::getAllMessages();
        $context->navbar_etat = "allmessage";

        return context::SUCCESS;
    }
    //Martinez Geoffrey
    //Envoie du message sur le chat

    public static function chat($request, $context)
    {
        self::logornot($request, $context);
        $context->chat = chatTable::getChats();

        if (!empty($_POST['send_chat'])) {
            $sent = chatTable::SendChat($_SESSION['id'], $_POST['send_chat']); // to , by

            if ($context->type === 'ajax') {
                die(json_encode($sent));
            }
                
            return $context->redirect('BlackManba.php?action='.$request['action']);
        }

        return context::SUCCESS;
    }

    //Dimitri Hueber, permet de récupérer le profil de l'utilisateur connecté et de changer le statut
    public static function profil($request, $context)
    {
        self::logornot($request, $context);
        $context->profil = utilisateurTable::getUserById($_SESSION['id']);
        if (!empty($request['modif_statut'])) {
            $context->profil->statut = strip_tags($request['modif_statut']);
            utilisateurTable::updateStatut($context->profil);
            if ($context->type === 'ajax') {
               die($context->profil->statut);
            }
            
            return $context->redirect('BlackManba.php?action='.$request['action']);
        }

        $context->navbar_etat = "profil";

        return context::SUCCESS;
    }

    public static function logornot($request, $context)
    {
        if ($_SESSION['prenom'] == null || $_SESSION['nom'] == null) {
            return $context->redirect("BlackManba.php?action=login");
        }
    }

}

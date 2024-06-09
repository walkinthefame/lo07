<?php

require_once('../model/ModelBanque.php');
require_once('../model/ModelPersonne.php');
require_once('../model/ModelCompte.php');

class ControllerLogin
{
    public static function Connexion()
    {
        include 'config.php';
        $vue = $root . '/app/view/Login/viewLogin.php';
        if (DEBUG) echo ("ControllerLogin : LogIn : vue = $vue");
        require ($vue);
    }

    public static function Connected()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $result = ModelLogin::CheckUser($user, $password);
        if ($result == "admin")
        {
            ControllerAdministrateur::BanqueAccueil();
        }
        else if ($result == "client")
        {
            ControllerClient::ClientAccueil();
        }
        else
        {
            echo "Erreur de connexion : Vérifiez que vous possédez un compte et que vos identifiants sont corrects";
        }
    }


}

?>
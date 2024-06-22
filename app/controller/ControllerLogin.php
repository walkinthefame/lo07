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

    public static function Connected($args)
    {
        if(DEBUG) echo("ControllerLogin : Connected : begin</br>");
        $user = $_POST['user'];
        $password = $_POST['password'];
        $result = ModelLogin::CheckUser($user, $password);
        if ($result == "admin")
        {
            $_SESSION['user'] = $user;
            $_SESSION['type'] = 0;

        }
        else if ($result == "client")
        {
            $_SESSION['type'] = 1;
        }
        else
        {
            $_SESSION['type'] = -1;
            echo "Erreur de connexion : Vérifiez que vous possédez un compte et que vos identifiants sont corrects";
        }
        $target = $args["target"];
        if(DEBUG) echo("ControllerLogin : Connected : target = $target</br>");
        include 'config.php';
        $vue = $root . '/app/view/Login/truc.php';
        require ($vue);

        }

    public static function Deconnexion()
    {
       include 'index.php';
       include 'config.php';
       $vue = $root . '/app/view/index.php';
       require($vue);
    }

    public static function SignUp()
    {
        include 'config.php';
        $vue = $root . '/app/view/Login/viewSignUp.php';
        require($vue);
    }


}

?>
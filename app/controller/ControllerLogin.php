<?php

require_once('../model/ModelBanque.php');
require_once('../model/ModelPersonne.php');
require_once('../model/ModelCompte.php');
require_once('../model/ModelLogin.php');

class ControllerLogin
{
    public static function Connexion()
    {
        include 'config.php';
        $vue = $root . '/app/view/Login/viewLogin.php';
        require ($vue);
    }

    public static function Connected()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $result = ModelLogin::CheckUser($user, $password);
        include 'config.php';
        $vue = $root . '/app/view/Login/viewConnected.php';
        require ($vue);

        }

    public static function Deconnexion()
    {
       $_SESSION['login'] = 'vide';     
       include 'config.php';
       session_destroy();
       header('Location: router2.php?action=truc');
       exit();
    }

    public static function SignUp()
    {
        include 'config.php';
        $vue = $root . '/app/view/Login/viewSignUp.php';
        require($vue);
    }

    public static function SignedUp()
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $user = $_POST['login'];
        $password = $_POST['password'];
        $result = ModelLogin::Register($nom, $prenom, $user, $password);
        include 'config.php';
        $vue = $root . '/app/view/Login/viewSignedUp.php';
        require($vue);
    }

    public static function SignedUpREDIRECTED()
    {
        $result = $_GET['result'];
        include 'config.php';
        $vue = $root . '/app/view/Login/viewSignUpREDIRECTED.php';
        require($vue);
    }


}

?>
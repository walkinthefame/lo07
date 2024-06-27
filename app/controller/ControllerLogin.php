<?php

require_once('../model/ModelBanque.php');
require_once('../model/ModelPersonne.php');
require_once('../model/ModelCompte.php');
require_once('../model/ModelLogin.php');

class ControllerLogin
{
    public static function Connexion()
    {
        session_destroy();
        $database = Model::getInstance();
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
        $database = Model::getInstance();
       $_SESSION['login'] = 'vide';     
       include 'config.php';
       session_destroy();
       header('Location: router2.php?action=truc');
       exit();
    }

    public static function SignUp()
    {
        session_destroy();
        $database = Model::getInstance();
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
        $database = Model::getInstance();
        $result = $_GET['result'];
        include 'config.php';
        $vue = $root . '/app/view/Login/viewSignUpREDIRECTED.php';
        require($vue);
    }

    public static function AmeliorationMVC()
    {
        $database = Model::getInstance();
        include 'config.php';
        $vue = $root . '/app/view/ameliorations/MVC.php';
        require($vue);
    }
    public static function fonctionnalite()
    {   
        $database = Model::getInstance();
        include 'config.php';
        $vue = $root . '/app/view/ameliorations/fonctionnalite.php';
        require($vue);
    }


}

?>
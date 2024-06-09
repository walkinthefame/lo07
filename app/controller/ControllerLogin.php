<?php

require_once 'ModelPersonne.php';

class ControllerLogin
{
    public static function LogIn()
    {
        include 'config.php';
        $vue = $root . '/app/view/Login/viewLogin.php';
        if (DEBUG) echo ("ControllerLogin : LogIn : vue = $vue");
        require ($vue);
    }


}

?>
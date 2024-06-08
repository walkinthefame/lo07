<?php
require_once('../model/ModelBanque.php');
require_once('../model/ModelPersonne.php');

class ControllerAdministrateur
{
    public static function getAllClients()
    {
        $clients = ModelPersonne::getAllClients();
        include 'config.php';
        $vue = $root . '/app/view/viewAllClients.php';
        if (DEBUG) echo ("ControllerAdministrateur : getAllClients : vue = $vue");
        require ($vue);
    }

    public static function getAllBanques()
    {
        $banques = ModelBanque::getAllBanques();
        include 'config.php';
        $vue = $root . '/app/view/viewAllBanques.php';
        if (DEBUG) echo ("ControllerAdministrateur : getAllBanques : vue = $vue");
        require ($vue);
    
    }

    public static function addBanque()
    {
        $banques = ModelBanque::getAllBanques();
        include 'config.php';
        $vue = $root . '/app/view/viewAddBanque.php';
        require ($vue);
    }

    public static function addedBanque()
    {
        $label = $_GET['label'];
        $pays = $_GET['pays'];
        ModelBanque::AddBanque($label, $pays);
        include 'config.php';
        $vue = $root . '/app/view/viewAddedBanque.php';
        require ($vue);
    }

    public static function SelectCompteBanque()
    {
        $banques = ModelBanque::getAllBanques();
        include 'config.php';
        $vue = $root . '/app/view/SelectCompteBanque.php';
        require ($vue);
    }


    //in progress =>
    public static function DisplaySelectCompteBanque()
    {
        $banques = ModelBanque::getAllBanques();
        include 'config.php';
        $vue = $root . '/app/view/SelectCompteBanque.php';
        require ($vue);
    }

    public static function ListeClients()
    {
        $clients = ModelPersonne::getAllClients();
        include 'config.php';
        $vue = $root . '/app/view/ListeClients.php';
        require ($vue);
    }

    public static function ListeAdmins()
    {
        $admins = ModelPersonne::getAllAdmins();
        include 'config.php';
        $vue = $root . '/app/view/ListeAdmins.php';
        require ($vue);
    }

    public static function ListeComptes()
    {
        $comptes = ModelCompte::getAllComptes();
        include 'config.php';
        $vue = $root . '/app/view/ListeComptes.php';
        require ($vue);
    }

    public static function ListeResidences()
    {
        $residences = ModelResidence::getAllResidences();
        include 'config.php';
        $vue = $root . '/app/view/ListeResidences.php';
        require ($vue);
    }


}
?>
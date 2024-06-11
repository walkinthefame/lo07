<?php
require_once('../model/ModelBanque.php');
require_once('../model/ModelPersonne.php');
require_once('../model/ModelCompte.php');

class ControllerAdministrateur
{
    public static function BanqueAccueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewBanqueAccueil.php';
        if (DEBUG) echo ("ControllerAdministrateur : BanqueAccueil : vue = $vue");
        require ($vue);
    }
    public static function getAllClients()
    {
        $clients = ModelPersonne::getAllClients();
        include 'config.php';
        $vue = $root . '/app/view/Admin/viewAllClients.php';
        if (DEBUG) echo ("ControllerAdministrateur : getAllClients : vue = $vue");
        require ($vue);
    }

    public static function getAllBanques()
    {
        $banques = ModelBanque::getAllBanques();
        include 'config.php';
        $vue = $root . '/app/view/Admin/viewAllBanques.php';
        if (DEBUG) echo ("ControllerAdministrateur : getAllBanques : vue = $vue");
        require ($vue);
    
    }

    public static function addBanque()
    {
        include 'config.php';
        $vue = $root . '/app/view/Admin/viewAddBanque.php';
        require ($vue);
    }

    public static function addedBanque()
    {
        $label = $_GET['label'];
        $pays = $_GET['pays'];
        $results = ModelBanque::AddBanque($label, $pays);

        include 'config.php';
        $vue = $root . '/app/view/Admin/viewAddedBanque.php';
        require ($vue);
    }

    public static function SelectCompteBanque()
    {
        $banques = ModelBanque::getAllBanques();
        include 'config.php';
        $vue = $root . '/app/view/Admin/viewSelectCompteBanque.php';
        if (DEBUG) echo ("ControllerAdministrateur : SelectCompteBanque : vue = $vue");
        require ($vue);
    }

    public static function DisplaySelectCompteBanque()
    {
        $label = htmlspecialchars($_GET['label']);
        $result = ModelCompte::getComptes($label);
        $comptes = $result[0];
        $clients = $result[1];
        $value = $result[2];
        include 'config.php';
        $vue = $root . '/app/view/Admin/viewDisplaySelectCompteBanque.php';
        if (DEBUG) echo ("ControllerAdministrateur : SelectCompteBanque : vue = $vue"); 
        require ($vue);
    }

    public static function getAllAdmins()
    {
        $admins = ModelPersonne::getAllAdmins();
        include 'config.php';
        $vue = $root . '/app/view/Admin/viewAllAdmins.php';
        if (DEBUG) echo ("ControllerAdministrateur : ListeAdmins : vue = $vue");    
        require ($vue);
    }

    public static function getAllComptes()
    {
        $comptes = ModelCompte::getAllComptes();
        include 'config.php';
        $vue = $root . '/app/view/Admin/viewAllComptes.php';
        if (DEBUG) echo ("ControllerAdministrateur : ListeComptes : vue = $vue");
        require ($vue);
    }

    public static function ListeResidences()
    {
        $residences = ModelResidence::getAllResidences();
        include 'config.php';
        $vue = $root . '/app/view/Admin/ListeResidences.php';
        if (DEBUG) echo ("ControllerAdministrateur : ListeResidences : vue = $vue");    
        require ($vue);
    }


}
?>
<?php
require_once('../model/ModelCompte.php');
class ControllerClient
{
    public static function MesComptes()
    {
        $results = ModelCompte::getOneCompte(1001);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewMesComptes.php';
        if (DEBUG) echo ("ControllerClient : MesComptes : vue = $vue");
        require ($vue);
    }

    public static function UserNewCompte($args)
    {
        $user = "Béatrice";
        $banques = ModelBanque::getAllBanques();
        if(DEBUG) echo("ControllerClient : UserNewCompte : begin</br>");
        $target = $args["target"];
        if(DEBUG) echo("ControllerClient : UserNewCompte : target = $target</br>");
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewUserNewCompte.php';
        require ($vue);
    }

    public static function UserNewCompteAdded($args)
    {
        $label = $_GET['label'];
        $solde = $_GET['montant'];
        $banque = $_GET['banque'];
        $results = ModelCompte::AddCompte($label, $solde, $banque, 1001);
        if(DEBUG) echo("ControllerClient : UserNewCompte : begin</br>");
        $target = $args["target"];
        if(DEBUG) echo("ControllerClient : UserNewCompte : target = $target</br>");
        include 'config.php';
        $vue = $root . '/app/view/Client/viewUserNewCompteAdded.php';
        require ($vue);
    }

    public static function TransfertCompte()
    {
        $UserComptes = ModelCompte::getComptesByClient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Client/viewTransfertCompte.php';
        if (DEBUG) echo ("ControllerClient : TransfertCompte : vue = $vue");
        require ($vue);
    }

    public static function TransfertCompteAdded()
    {
        $compteFROM = $_GET['compte1'];
        $compteTO = $_GET['compte2'];
        $montant = $_GET['montant'];
        $results = ModelCompte::TransfertCompte($compte1, $compte2, $montant);
        include 'config.php';
        $vue = $root . '/app/view/Client/viewTransfertCompteAdded.php';
        require ($vue);
    }

    public static function getMyResidences()
    {
        $UserResidences = ModelResidence::getResidencesByClient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Client/viewMyResidences.php';
        if (DEBUG) echo ("ControllerClient : getMyResidences : vue = $vue");
        require ($vue);
    }

    public static function BuyResidence()
    {
        include 'config.php';
        $vue = $root . '/app/view/Client/viewBuyResidence.php';
        require ($vue);
    }

    public static function MonPatrimoine()
    {
        $UserResidences = ModelResidence::getResidencesByClient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Client/viewMonPatrimoine.php';
        if (DEBUG) echo ("ControllerClient : MonPatrimoine : vue = $vue");
        require ($vue);
    }


}

?>
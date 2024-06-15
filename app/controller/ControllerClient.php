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

    public static function UserNewCompteAdded()
    {
        $user = "Béatrice";
        $label = $_GET['label'];
        $solde = $_GET['montant'];
        $banque = htmlspecialchars($_GET['banque']);
        $id_banque = ModelBanque::getBanqueIDByLabel($banque);
        $results = ModelCompte::AddCompte($label, $solde, $id_banque, 1001);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewUserNewCompteAdded.php';
        require ($vue);
    }

    public static function TransfertCompte()
    {
        $UserComptes = ModelCompte::getComptesByClient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransfertCompte.php';
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
        $vue = $root . '/app/view/Clients/viewTransfertCompteAdded.php';
        require ($vue);
    }

    public static function getMyResidences()
    {
        $user = "Béatrice";
        $results = ModelResidence::getClientResidence(1001);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewMyResidences.php';
        if (DEBUG) echo ("ControllerClient : getMyResidences : vue = $vue");
        require ($vue);
    }

    public static function BuyResidence()
    {
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewBuyResidence.php';
        require ($vue);
    }

    public static function MonPatrimoine()
    {
        $UserResidences = ModelResidence::getResidencesByClient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewMonPatrimoine.php';
        if (DEBUG) echo ("ControllerClient : MonPatrimoine : vue = $vue");
        require ($vue);
    }


}

?>
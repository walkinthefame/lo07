<?php
require_once('../model/ModelCompte.php');
class ControllerClient
{
    public static $residenceName  ;
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

    public static function TransfertCompte($args)
    {
        $user = "Béatrice";
        $results = ModelCompte::COUNTOneCompte(1001);
        $results2 = ModelCompte::getOneCompte(1001);
        if(DEBUG) echo("ControllerClient : TransfertCompte : begin</br>");
        $target = $args["target"];
        if(DEBUG) echo("ControllerClient : TransfertCompte : target = $target</br>");
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransfertsCompte.php';
        require ($vue);
    }

    public static function TransfertCompteAdded()
    {
        $user = "Béatrice";
        $compteFROM = $_GET['compte1'];
        $montant = $_GET['montant'];
        $results = ModelCompte::TransfertCompte(1001, $compteFROM); 
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransfertCompteAdded.php';
        require ($vue);
    }

    public static function TransfertCompteDone()
    {
        $user = "Béatrice";
        $compteFROM = htmlspecialchars($_GET['compteFROM']);
        $compteTO = $_GET['compteTO'];
        $montant = $_GET['montant'];
        $results = ModelCompte::TransfertCompteDone($compteFROM, $compteTO, $montant, 1001);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransfertCompteDone.php';
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

    /*affichage de la vue qui permet de selectionner la residence a acheter */ 
    public static function selectResidenceToBuy(){
        $user = "Béatrice";
        $userId = 1001 ;
        $results = ModelResidence::getNameResidences($userId);     /*getNameResidence permet d obtenir tout les labels des residences de la base de données*/
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewSelectResidenceToBuy.php';
        require ($vue);
        
    }
    /*recuperation de la residence choisie et affichage du formulaire pour choisir les details de la transaction */
    public static function recuperationNameResidenceToBuy(){
        $user = "Béatrice";
        $userId = 1001 ;
            $residenceName = $_GET['residence'];
            $residencePrice = ModelResidence::getResidencePrice($residenceName) ;
            $ownerId = ModelResidence::getResidenceOwner( $residenceName);
            $ownerAccount = ModelResidence::OwnAccountOrNot($ownerId);
            $buyerAccount = ModelResidence::OwnAccountOrNot($userId);
            include 'config.php';
            if(empty($buyerAccount) or empty($ownerAccount)){
                $vue = $root . '/app/view/Clients/viewImpossibleBuyResidence.php';
                
            }
            else{
            $vue = $root . '/app/view/Clients/viewBuyResidence.php' ;
            }require($vue);
}

    public static function transactionBuyResidence(){
        $userId = 1001 ;
        $buyerAccount = $_GET['compteBuyer']; /*compte choisit pour le transfert*/
        $ownerAccount = $_GET['ownerAccount']; /*compte choisit pour le transfert*/
        $residencePrice = $_GET['residencePrice']; /*prix de la res*/
        $residenceName = $_GET['residence'];
        $ownerId = ModelResidence::getResidenceOwner($residenceName);
        ModelResidence::transactionResidence($residenceName, $ownerId, $userId);
        ModelResidence::transactionCompte($buyerAccount, $ownerAccount, $residencePrice);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransactionBuyResidence.php';
        require($vue);
    }

    public static function patrimoine(){
        $userId = 1001 ; 
        /*recupere le montant de chaque compte et le nom de chaque compte */ 
        $liste_compte_montant = ModelResidence::getMontantNomCompte($userId);
        /*recuperer ses residences et leur montant*/
        $liste_residence_prix = ModelResidence::getNomPrixResidence($userId);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewMonPatrimoine.php';
        $data = compact('liste_compte_montant', 'liste_residence_prix');
        require($vue);

    }




/*
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

*/
}

?>
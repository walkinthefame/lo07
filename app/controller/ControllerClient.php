<?php
require_once('../model/ModelCompte.php');
class ControllerClient
{
    public static $residenceName  ;
    public static function MesComptes()
    {
        $results = ModelCompte::getOneCompte($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewMesComptes.php';
        if (DEBUG) echo ("ControllerClient : MesComptes : vue = $vue");
        require ($vue);
    }

    public static function UserNewCompte($args)
    {
        $user = $_SESSION['nom'];
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
        $results = ModelCompte::AddCompte($label, $solde, $id_banque, $_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewUserNewCompteAdded.php';
        require ($vue);
    }

    public static function TransfertCompte($args)
    {
        $user = "Béatrice";
        $results = ModelCompte::COUNTOneCompte($_SESSION['id']);
        $results2 = ModelCompte::getOneCompte($_SESSION['id']);
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
        $compteFROM = $_POST['compte1'];
        $montant = $_POST['montant'];
        $results = ModelCompte::TransfertCompte($_SESSION['id'], $compteFROM); 
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransfertCompteAdded.php';
        require ($vue);
    }

    public static function TransfertCompteDone()
    {
        $user = "Béatrice";
        $compteFROM = htmlspecialchars($_POST['compteFROM']);
        $compteTO = $_POST['compteTO'];
        $montant = $_POST['montant'];
        $results = ModelCompte::TransfertCompteDone($compteFROM, $compteTO, $montant, $_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransfertCompteDone.php';
        require ($vue);
    }

    public static function TransfertREDIRECTED()
    {
        $user = "Béatrice";
        $compteFROM = htmlspecialchars($_GET['compteFROM']);
        $compteTO = $_GET['compteTO'];
        $montant = $_GET['montant'];
        $database = Model::getInstance();
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewTransfertREDIRECTED.php';
        require ($vue);
    }

    

    public static function getMyResidences()
    {
        $user = "Béatrice";
        $results = ModelResidence::getClientResidence($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewMyResidences.php';
        if (DEBUG) echo ("ControllerClient : getMyResidences : vue = $vue");
        require ($vue);
    }

    /*affichage de la vue qui permet de selectionner la residence a acheter */ 
    public static function selectResidenceToBuy(){
        $user = "Béatrice";
        $userId = $_SESSION['id'] ;
        $results = ModelResidence::getNameResidences($userId);     /*getNameResidence permet d obtenir tout les labels des residences de la base de données*/
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewSelectResidenceToBuy.php';
        require ($vue);
        
    }
    /*recuperation de la residence choisie et affichage du formulaire pour choisir les details de la transaction */
    public static function recuperationNameResidenceToBuy(){
        $user = "Béatrice";
        $userId = $_SESSION['id'] ;
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
        $userId = $_SESSION['id'] ;
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
        $userId = $_SESSION['id'] ; 
        /*recupere le montant de chaque compte et le nom de chaque compte */ 
        $liste_compte_montant = ModelResidence::getMontantNomCompte($userId);
        /*recuperer ses residences et leur montant*/
        $liste_residence_prix = ModelResidence::getNomPrixResidence($userId);
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewMonPatrimoine.php';
        $data = compact('liste_compte_montant', 'liste_residence_prix');
        require($vue);

    }

    public static function ResidenceREDIRECTED()
    {
        $database = Model::getInstance();
        $user = "Béatrice";
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewResidenceDIRECTED.php';
        require ($vue);
    
    }

    public static function CompteREDIRECTED()
    {
        $database = Model::getInstance();
        $user = $_GET['user'];
        $label = $_GET['label'];
        $solde = $_GET['solde'];
        $results = $_GET['results'];
        include 'config.php';
        $vue = $root . '/app/view/Clients/viewUserNewCompteDIRECTED.php';
        require ($vue);
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
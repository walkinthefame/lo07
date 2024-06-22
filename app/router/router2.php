<?php
require_once('../controller/ControllerAdministrateur.php');
require_once('../controller/ControllerClient.php');
require_once('../controller/ControllerLogin.php');
$query_string = $_SERVER['QUERY_STRING'];

parse_str($query_string, $param);

$action = htmlspecialchars($param['action']);
$action = $param['action'];
unset($param['action']);
$args = $param;

switch($action)
{
    case "getAllClients":
    case "getAllBanques":
    case "addBanque":
    case "addedBanque":
    case "SelectCompteBanque":
    case "DisplaySelectCompteBanque":
    case "getAllAdmins" :
    case "getAllComptes" :
    case "addClient":
    case "ListeResidences" :
        ControllerAdministrateur::$action($args);
        break;
    case "MesComptes":
    case "UserNewCompte":
    case "UserNewCompteAdded":
    case "TransfertCompte":
    case "TransfertCompteAdded":
    case "TransfertCompteDone" : 
    case "getMyResidences":
    /*case "BuyResidence":*/
    case "selectResidenceToBuy":
    case "MonPatrimoine":
    case "recuperationNameResidenceToBuy":
    case "transactionBuyResidence":
    case "patrimoine":
    case "TransfertREDIRECTED" : 
    case "ResidenceREDIRECTED" :
    case "CompteREDIRECTED" : 
        ControllerClient::$action($args);
        break;
    case "Connexion" :
    case "Connected" :
    case "Disconnect" :
    case "SignUp" :
        ControllerLogin::$action($args);
        break;
    default :
    $action = "BanqueAccueil";
    ControllerAdministrateur::$action($args);
}
?>
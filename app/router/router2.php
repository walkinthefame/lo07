<?php
require('../controller/ControllerAdministrateur.php');
require('../controller/ControllerClient.php');
$query_string = $_SERVER['QUERY_STRING'];

parse_str($query_string, $param);

$action = htmlspecialchars($param["action"]);
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
    case "ListeClients":
    case "ListeAdmins" :
    case "addClient":
    case "ListeResidences" :
        ControllerAdministrateur::$action($args);
        break;

    default :
    $action = "BanqueAccueil";
    ControllerAdministrateur::$action($args);
}
?>
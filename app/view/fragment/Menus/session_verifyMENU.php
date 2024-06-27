<?php
require_once('../model/ModelPersonne.php');
if (isset($_SESSION['login'])) {
      switch ($statut) {
        case ModelPersonne::ADMINISTRATEUR:
            require('fragmentMenuADMIN.php');
            break;
        case ModelPersonne::CLIENT:
            require('fragmentMenuCLIENT.php');
            break;
        default:
            require('fragmentMenuVisiteur.php');
            break;
    }
} else {
    require('fragmentMenuVisiteur.php');
}

?>
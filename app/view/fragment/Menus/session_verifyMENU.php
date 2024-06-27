<?php
require_once('../model/ModelPersonne.php');
/*if (session_status() == PHP_SESSION_NONE) {
    session_start();
}*/
if (isset($_SESSION['login'])) {
    $id = ModelPersonne::getIDByUser($_SESSION['login']);
    $userModel = new ModelPersonne();
    $user = $userModel->getPersonneByID($id);
    $prenom = isset($user['prenom']) ? $user['prenom'] : null;
    $nom = isset($user['nom']) ? $user['nom'] : null;
    $statut = isset($user['statut']) ? $user['statut'] : null;

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
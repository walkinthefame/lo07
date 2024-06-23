<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$status = isset($_SESSION['user']);
if ($status) {
    $userModel = new ModelPersonne();
    $user = $userModel->getPersonneByID($_SESSION['id'] ?? null);
    $prenom = $user ? $user->getPrenom() : null;
    $nom = $user ? $user->getNom() : null;
    $statut = $user ? $user->getStatut() : null;

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
    require('login_signup.php');
}
?>
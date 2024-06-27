<?php
session_start();
$_SESSION['login'] = "vide";
header('/app/router/router2.php?action=truc');
?>

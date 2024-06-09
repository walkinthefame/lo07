<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="router2.php?action=BanqueAccueil">HAOUAS Lena / SEFFAR Youssef</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
           aria-haspopup="true" aria-expanded="false">VIN <span class="caret"></span></a>
        <ul class="dropdown-menu"></ul>

<?php
switch ($_SESSION['type'])
{
    case ModelPersonne::ADMINISTRATEUR :
        require('Menus/fragmentMenuAdmin.php');
        break;
    case ModelPersonne::CLIENT :
        require('Menus/fragmentMenuClient.php');
        break;
    default :
        require('Menus/fragmentMenuVisiteur.php');
        break;

}
?>
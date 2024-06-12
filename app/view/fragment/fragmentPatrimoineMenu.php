<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="router2.php?action=BanqueAccueil"> HAOUAS Lena / SEFFAR Youssef</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">



<?php
/*
switch ($_SESSION['type'])
{
    case ModelPersonne::ADMINISTRATEUR :
        require('Menus/fragmentMenuADMIN.php');
        break;
    case ModelPersonne::CLIENT :
        require('Menus/fragmentMenuCLIENT.php');
        break;
    default :
        require('Menus/fragmentMenuVisiteur.php');
        break;

}
*/
include('Menus/fragmentMenuCLIENT.php');
?>      
</ul>
</div>
</div>
</nav> 
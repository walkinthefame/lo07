<?php
if (isset($_SESSION['login'])) {
  $id = ModelPersonne::getIDByUser($_SESSION['login']);
  if ($id == -1) {
    $_SESSION['nom'] = null;
    $_SESSION['prenom'] = null;
  }
  else{
  $_SESSION['id'] = $id;
  $_SESSION['nom'] = ModelPersonne::getNomByID($id);
  $_SESSION['prenom'] = ModelPersonne::getPrenomByID($id);
  $nom = $_SESSION['nom'];
  $prenom = $_SESSION['prenom'];
  $userModel = new ModelPersonne();
  $user = ModelPersonne::getPersonneByID($id);
  $statut = isset($user['statut']) ? $user['statut'] : null;
  }
}
?>

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="router2.php?action=BanqueAccueil">HAOUAS - SEFFAR | <?php 
  if(isset($_SESSION['type'])){
  if($_SESSION['type']==0){
    echo "administrateur";
  }
  else if($_SESSION['type']==1){
    echo "client";
  }
  }
  else{
    echo "visiteur";
  }
  echo " | ";
  if(isset($prenom) && isset($nom)){
    echo $nom." ".$prenom;
    }
  echo " | ";
  ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">



<?php
require('Menus/session_verifyMENU.php');
?>      
</ul>
</div>
</div>
</nav> 
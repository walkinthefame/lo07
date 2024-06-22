<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?><?php 
  if($results==1)
  {
  echo "<h3>Informations concernant l'ajout du nouveau compte de $user</h3>";
  echo "Le compte $label de $user a été ajouté avec succès avec un montant de : $solde euros";
  
  }
  else if($results==-1)
  {
    echo "<h3>Erreur lors de l'ajout du nouveau compte de $user : ce label existe déjà</h3> ";
  }
  else{
    echo "<h3>Erreur lors de l'ajout du nouveau compte de $user</h3> ";
  }?>
  <br>


      </div>
      <p/>
       <br/> 
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
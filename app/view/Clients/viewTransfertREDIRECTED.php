<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>
  <h3>Récapitulatif de la transaction :</h3><br>
  <h5>Compte de départ : <?php printf('%s', $compteFROM); ?></h5>
  <h5>Compte d'arrivée : <?php printf('%s', $compteTO); ?></h5>
  <h5>Montant : <?php printf('%s', $montant); ?></h5>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
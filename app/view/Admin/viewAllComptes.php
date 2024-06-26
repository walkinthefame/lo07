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
    <h3>Liste des Comptes : </h3><br>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">client_nom</th>
          <th scope = "col">client_prenom</th>
          <th scope = "col">banque_label</th>
          <th scope = "col">banque_pays</th>
          <th scope = "col">compte_label</th>
          <th scope = "col">compte_montant</th>
        </tr>
      </thead>
      <tbody>
          <?php

foreach ($comptes as $element) {
  printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
      $element['nom'], 
      $element['prenom'], 
      $element['banque_label'], 
      $element['pays'], 
      $element['compte_label'], 
      $element['montant']
  );
}
          ?>
      </tbody>
    </table>
    <br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll --> 
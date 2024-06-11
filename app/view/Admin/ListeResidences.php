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
    <h3>Liste des Résidences : </h3><br>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">client_nom</th>
          <th scope = "col">client_prenom</th>
          <th scope = "col">résidence_label</th>
          <th scope = "col">résidence_ville</th>
          <th scope = "col">résidence_prix</th>
          
        </tr>
      </thead>
      <tbody>
          <?php

foreach ($residences as $element) {
  printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td></tr>", 
      $element['nom'], 
      $element['prenom'], 
      $element['label'], 
      $element['ville'], 
      $element['prix'], 
      
  );
}
          ?>
      </tbody>
    </table>
    <br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
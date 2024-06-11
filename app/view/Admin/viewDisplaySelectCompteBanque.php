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
<h3 class="text-primary">Liste de tous les comptes de la banque <?php printf('%s', $label)?> </h3>
<br>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Prénom</th>
          <th scope = "col">Nom</th>
          <th scope = "col">Banque</th>
          <th scope = "col">Compte</th>
          <th scope = "col">Montant</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $i=0;
            foreach($comptes as $element2){
              printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$clients[$i][0]-> getPrenom(), $clients[$i][0]-> getNom() ,$label, $element2->getLabel(), $element2->getMontant());
              $i++;
          }

          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
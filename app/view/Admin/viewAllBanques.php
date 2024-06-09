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
<h3 class="text-primary">Liste de toutes les banques vues par l'administrateur : </h3>
<br>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Label</th>
          <th scope = "col">Pays</th>
        </tr>
      </thead>
      <tbody>
          <?php

          foreach ($banques as $element) {
           printf("<tr><td>%s</td><td>%s</td></tr>", $element->getLabel(), $element->getPays());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
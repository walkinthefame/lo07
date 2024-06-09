<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.html';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>
    <h3>Liste des clients</h3>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Nom</th>
          <th scope = "col">Prénom</th>
          <th scope = "col">Login</th>
          <th scope = "col">Password</th>
        </tr>
      </thead>
      <tbody>
          <?php

          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td></tr>", $element->getNom(), $element->getPrenom(), $element->getLogin(), $element->getPassword());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
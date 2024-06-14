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
          <th scope = "col">Label de banque</th>
          <th scope = "col">Pays</th>
          <th scope = "col">Label du compte</th>
          <th scope = "col">Montant</th>
        </tr>
      </thead>
      <tbody>
          <?php
  for($i = 0; $i < count($results)/2; $i++){
     printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
     $results[$i+count($results)/2][0]['label'],
     $results[$i+count($results)/2][0]['pays'], 
      $results[$i]['label'],
    $results[$i]['montant'],
    );
  }


          ?>
      </tbody>
    </table>
    <br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll --> 
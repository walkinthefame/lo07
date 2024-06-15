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
    <h3>Liste des résidences de <?php echo $user?> : </h3><br>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Label de la résidence</th>
          <th scope = "col">Ville</th>
          <th scope = "col">Prix</th>
        </tr>
      </thead>
      <tbody>
          <?php
  foreach($results as $result){
     printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", 
     $result['label'],
     $result['ville'], 
      $result['prix']
    );
  }


          ?>
      </tbody>
    </table>
    <br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll --> 
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
      <?php 
      if ($result ==0)
      {
            echo "<h3>Vous êtes connecté en tant qu'administrateur</h3>";
        }
        else if ($result ==1)
        {
            echo "<h3>Vous êtes connecté en tant qu'utilisateur</h3>";
        }
        else
        {
            echo "<h3>Erreur de connexion : Vérifiez que vous possédez un compte et que vos identifiants sont corrects</h3>";
            
      }
    ?>
          <br>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
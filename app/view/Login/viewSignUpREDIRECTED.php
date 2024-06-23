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
        if ($result ==1)
        {
            echo "Votre compte a bien été créé, vous êtes connecté en tant qu'utilisateur";
        }
        else
        {
            echo "Erreur lors de l'inscription, votre login déjà présent dans la base de données";
            
      }
    ?>
          <br>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->

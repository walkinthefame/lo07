<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results == 1) {
     echo ("<h3>Résultat de l'insertion d'une nouvelle banque</h3>");
     echo("<ul>");
     echo ("<li>label = " . $label . "</li>");
     echo ("<li>pays = " . $pays . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la banque</h3>");
     echo ("label = " . $label);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
<?php include '../view/fragment/fragmentPatrimoineHeader.html';?>
<body>
    <div class="container"><?php 
    include '../view/fragment/fragmentPatrimoineMenu.php';
    include '../view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
    <h2>Fonctionnalité originale : transfert d'argent</h2><br>
    <li>Dans le choix de compte, nous avons décidé de mettre en place deux formulaires pour choisir
        les deux comptes : dans le premier se trouve le compte de départ, dans le second se trouve tous les autres comptes sauf le compte de départ. <br><br>
        <li>Cela nous permet de ne pas avoir à vérifier si le compte de départ est le même que le compte d'arrivée.</li> <br>
    </li>
    </div>
    <?php
    include '../view/fragment/fragmentPatrimoineFooter.html';
    ?>
</body>
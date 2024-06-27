<?php include '../view/fragment/fragmentPatrimoineHeader.html';?>
<body>
    <div class="container"><?php 
    include '../view/fragment/fragmentPatrimoineMenu.php';
    include '../view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
    <h2>Amélioration du modèle MVC</h2><br>
    <li>Nous avons pu constater que, pour certaines transactions (exemple : transfert d'argent, de résidence, ...), un rafraichissement de la page entraine une itération de l'opération <br><br>
        <li>C'est la raison pour laquelle nous avons mis des pages de redirection afin d'éviter ce problème</li> <br>
    </li>
    </div>
    <?php
    include '../view/fragment/fragmentPatrimoineFooter.html';
    ?>
</body>
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
    <h3>Mon Patrimoine : </h3><br>
<table class = "table table-striped table-bordered">
  <thead>
    <tr>
      <th scope = "col">Catégorie</th>
      <th scope = "col">Label</th>
      <th scope = "col">Valeur</th>
      <th scope = "col">Capital</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $capital = 0;
    $mergedArray = array_map(function($item) {
        return array_merge($item, ["categorie" => "Compte", "valeur" => $item['montant']]);
    }, $liste_compte_montant);
    $mergedArray = array_merge($mergedArray, array_map(function($item) {
        return array_merge($item, ["categorie" => "Résidence",  "valeur" => $item['prix']]);
    }, $liste_residence_prix));
    
    foreach($mergedArray as $item){
        $capital += $item['valeur'];
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
            $item['categorie'],
            $item['label'], 
            $item['valeur'],
            $capital
        );
    }
    ?>
  </tbody>
</table>
    <br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll --> 
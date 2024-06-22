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
  <h3><?php echo "Formulaire de transfert d'argent pour $user" ?></h3> 
  <br>
  <?php
    echo "<form role=\"form\" method='get' action='router2.php'>
          <div class=\"form-group\">
            <input type=\"hidden\" name='action' value='TransfertCompteDone'>  
            <input type=\"hidden\" name='compteFROM' id='compteFROM' value='". $compteFROM ."'> 
            <input type=\"hidden\" name='montant' id='montant' value='". $montant . "'> 
            <label class='w-25' for='compteTO'>Sélectionnez le compte d'arrivée     : </label><select class=\"form-control\" id='compteTO' name='compteTO' style=\"width: 250px\">";
    
    for($i = 0; $i < count($results); $i++) {
        echo "<option>" .      $results[$i]['label'] . "</option>";
    }
    echo "</select><br>
          </div>
          <p></p>
          <br/> 
          <button class=\"btn btn-primary\" type=\"submit\">Valider</button>
        </form>
      </div>";
 include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

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
  <h3><?php echo "Formulaire pour le transfert d'argent" ?></h3> 
  <br>
  <?php if ($results !=1)
  {
    echo "Erreur : vous n'avez pas assez de comptes !";
  }
  else 
  {
    echo "<form role=\"form\" method='POST' action='router2.php?action=TransfertCompteAdded&target=TransfertCompteDone'>
          <div class=\"form-group\">
            <input type=\"hidden\" name='action' value='TransfertCompteAdded'>        
            <label class='w-25' for='compte1'>Sélectionnez le compte de départ : </label><select class=\"form-control\" id='compte1' name='compte1' style=\"width: 250px\">";
    
    for($i = 0; $i < count($results2)/2; $i++) {
        echo "<option>" .      $results2[$i]['label'] . "</option>";
    }
    
    echo "</select><br>
    <label class='w-25' for='montant'>Montant : </label><br><input type='number' name='montant' value='' min='1' required>
          </div>
          <p></p>
          <br/> 
          <button class=\"btn btn-primary\" type=\"submit\">Valider</button>
        </form>
      </div>";
  }
 include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

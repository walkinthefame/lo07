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
  <h3><?php echo "Selection d'une residence pour un achat " ?></h3> 
  <br>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='recuperationNameResidenceToBuy'>        
        <label class='w-25' for='banque'>Selectionner une residence à acheter :</label><select class="form-control" id='residence' name='residence' style="width: 250px">
        <?php
            foreach ($results as $residence) {
                echo "<option value='$residence'>$residence</option>";
            }
            ?> 
          </select> 
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
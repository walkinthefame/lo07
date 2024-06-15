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
  <h3><?php echo "Achat de la résidence $residenceName" ?></h3> 
  <br>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='transactionBuyResidence'>  
        <input type="hidden" name='residence' value='<?php echo $residenceName; ?>'>      
        <label class='w-25' for='compteBuyer'>Selectionner un compte de l'acheteur :</label>
        <select class="form-control" id='compteBuyer' name='compteBuyer' style="width: 250px">
            
        <?php
       

        foreach ($buyerAccount as $account) {
            $accountName = $account['label'];
            echo "<option value='$accountName'>$accountName</option>";
        }
      
            ?> 
          </select>
      </div>

      <div class="form-group">
               
        <label class='w-25' for='ownerAccount'>Selectionner un compte du vendeur :</label>
        <select class="form-control" id='ownerAccount' name='ownerAccount' style="width: 250px">
        <?php

        foreach ($ownerAccount as $account) {
            $accountName = $account['label'];
            echo "<option value='$accountName'>$accountName</option>";
        }
            ?> 
          </select> 

          <div class="form-group">
    <label for="residencePrice">Prix de la résidence :</label>
    <input type="text" class="form-control" id="residencePrice" name="residencePrice" value="<?php echo $residencePrice; ?>" readonly>
</div>

          
      </div>
        </p>
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
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
    <h3>Formulaire pour l'ajout d'une banque par l'admin : </h3><br>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='addedBanque'>        
        <label class='w-25' for="label">Label : : </label><input type="text" name='label' value='Crédit de Troyes'> <br/>                          
        <label class='w-25' for="pays">Pays : </label><input type="text" name='pays' value='France'> <br/>           
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
 
  <!-- ----- fin viewAll --> 
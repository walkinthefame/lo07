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
  <h3><?php echo "Formulaire pour l'ajout d'un compte pour $user" ?></h3> 
  <br>
  <?php /*
    <form role="form" method='GET' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='UserNewCompteAdded'>        
        <label class='w-25' for="label">Label</label><input type="text" name='label' value=''> <br/>                          
        <label class='w-25' for="montant">Montant</label><input type="text" name='montant' value=''> <br/>       <br/>
        <label class='w-25' for="banque">Banque</label><select class="form-control" id='label' name='label' style="width: 250px">
        <?php
            foreach ($banques as $id) {
             printf ("<option>%s</option>", $id->getLabel());
            }
            ?> </select> */ ?>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
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
    <h3>Formulaire d'inscription : </h3><br>
    <form role="form" method='POST' action='router2.php?action=SignedUp'>
      <div class="form-group">      
        <label class='w-25' for="username">Nom : </label><input type="text" name='nom' value='' required> <br> 
        <label class='w-25' for="username">Prénom : </label><input type="text" name='prenom' value='' required> <br/> 
        <label class='w-25' for="username">Login : </label><input type="text" name='login' value='' required> <br/>                        
        <label class='w-25' for="password">Mot de passe : </label><input type="password" name='password' value='' required> <br/>       <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
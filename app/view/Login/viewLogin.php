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
    <h3>Formulaire de Login : </h3>
    <form role="form" method='POST' action='router2.php?action=Connected'>
      <div class="form-group">      
        <label class='w-25' for="username">Username : </label><input type="text" name='user' value='' required> <br/>                          
        <label class='w-25' for="password">Mot de passe : </label><input type="password" name='password' value='' required> <br/>       <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
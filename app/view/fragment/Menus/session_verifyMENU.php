<?php
if(isset($_SESSION['type']))
{
  switch($_SESSION['type'])
  {
    case 0:
      require('fragmentMenuADMIN.php');
      break;
    case 1:
      require('fragmentMenuCLIENT.php');
      break;
    default:
      require('fragmentMenuVisiteur.php');
      break;
  }
}
else{
  require('login_signup.php');
}
?>
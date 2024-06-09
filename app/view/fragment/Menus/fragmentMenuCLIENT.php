  
  <!-- ----- début fragmentMenuADMIN -->
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes comptes bancaires</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=getAllBanques">Liste de mes comptes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=addBanque">Ajouer un nouveau compte</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=SelectCompteBanque">Transfert inter-comptes</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes résidences</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=getAllClients">Liste de mes résidences</a></li>
            <li><a class="dropdown-item" href="router2.php?action=getAllAdmins">Acheter une nouvelle résidence</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon patrimoine</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=getAllClients">Bilan de mon patrimoine</a></li>
          </ul>
        </li>
        <?php include 'login_signup.php'; ?>

  
  <!-- ----- fin fragmentMenuADMIN -->

  
  <!-- ----- début fragmentMenuADMIN -->
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes comptes bancaires</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=MesComptes">Liste de mes comptes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=UserNewCompte&target=UserNewCompteAdded">Ajouter un nouveau compte</a></li>
            <li><a class="dropdown-item" href="router2.php?action=TransfertCompte">Transfert inter-comptes</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes résidences</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=getMyResidences">Liste de mes résidences</a></li>
            <li><a class="dropdown-item" href="router2.php?action=selectResidenceToBuy">Acheter une nouvelle résidence</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon patrimoine</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=MonPatrimoine">Bilan de mon patrimoine</a></li>
          </ul>
        </li>
        <?php include 'login_signup.php'; ?>

  
  <!-- ----- fin fragmentMenuADMIN -->

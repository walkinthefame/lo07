
  <!-- ----- début fragmentMenuADMIN -->
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=getAllBanques">Liste des banques</a></li>
            <li><a class="dropdown-item" href="router2.php?action=addBanque&target=addedBanque">Ajout d'une banque</a></li>
            <li><a class="dropdown-item" href="router2.php?action=SelectCompteBanque&target=DisplaySelectCompteBanque">Liste des comptes d'une banque</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=getAllClients">Liste des clients</a></li>
            <li><a class="dropdown-item" href="router2.php?action=getAllAdmins">Liste des administrateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=getAllComptes">Liste des comptes</a></li> 
            <li><a class="dropdown-item" href="router2.php?action=getAllResidences">Liste des résidences</a></li>
          </ul>
        </li>
        <?php include 'login_signup.php'; ?>

  
  <!-- ----- fin fragmentMenuADMIN -->
   
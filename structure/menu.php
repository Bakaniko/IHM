<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>
<nav class="navbar navbar-toggleable-lg fixed-top navbar-inverse bg-inverse" id="menu">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menu-deroulant" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="material-icons md-36 mx-auto d-block">&#xE5D2;</i>
  </button>
  <a class="navbar-brand"  title="Opéra National de Paris" href="<?php echo $path_root ; ?>index.php" ><img class="" src="<?php echo $path_images ; ?>logo.svg"></a>
  <div class="collapse navbar-collapse" id="menu-deroulant">
    <ul class="navbar-nav">
      <?php if (isset($_SESSION['auth'])): ?>
     <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_root ; ?>index.php"><i class="material-icons mr-2">&#xE88A;</i>Accueil</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo $path_pages ; ?>programmation.php"><i class="material-icons mr-2">&#xE616;</i>Programmation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_pages ; ?>compte.php"><i class="material-icons mr-2">&#xE853;</i>Mon compte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_pages ; ?>logout.php"><i class="material-icons mr-2">&#xE853;</i>Se déconnecter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_pages ; ?>panier.php"><i class="material-icons mr-2">&#xE8CB;</i>Panier</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_pages ; ?>infos.php"><i class="material-icons mr-2">&#xE88F;</i>Nous contacter</a>
      </li>

      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_root ; ?>index.php"><i class="material-icons mr-2">&#xE88A;</i>Accueil</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?php echo $path_pages ; ?>programmation.php"><i class="material-icons mr-2">&#xE616;</i>Programmation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_pages ; ?>connexion.php"><i class="material-icons mr-2">&#xE853;</i>Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_pages ; ?>panier.php"><i class="material-icons mr-2">&#xE8CB;</i>Panier<span class="badge badge-success ml-2 align-top rounded-circle" id="badgePanier">1</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $path_pages ; ?>infos.php"><i class="material-icons mr-2">&#xE88F;</i>Nous contacter</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>

<noscript>
<li>
   <a href="<?php echo $path_root ; ?>index.php">Accueil</a>
 </li>
 <li>
 <a href="<?php echo $path_pages ; ?>programmation.php">Programmation</a>
 </li>
 <li>
   <a href="<?php echo $path_pages ; ?>compte.php">Mon compte</a>
 </li>
 <li>
   <a href="<?php echo $path_pages ; ?>logout.php">Se déconnecter</a>
 </li>
 <li>
   <a href="<?php echo $path_pages ; ?>panier.php">Panier</a>
 </li>
 <li>
   <a href="<?php echo $path_pages ; ?>infos.php">Nous contacter</a>
 </li>
</noscript>

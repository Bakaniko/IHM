<nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-inverse" id="menu">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menu-deroulant" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="material-icons md-36 mx-auto d-block">&#xE5D2;</i>
  </button>
  <a class="navbar-brand"  title="Opéra National de Paris" href="<?php echo $path_root ; ?>index.php" ><img class="" src="<?php echo $path_images ; ?>logo.svg"></a>
  <div class="collapse navbar-collapse" id="menu-deroulant">
    <ul class="navbar-nav">
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
        <a class="nav-link" href="<?php echo $path_pages ; ?>infos.php"><i class="material-icons mr-2">&#xE88F;</i>Infos</a>
      </li>
    </ul>
  </div>
</nav>
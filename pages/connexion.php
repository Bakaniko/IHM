<?php
if (session_status()==PHP_SESSION_NONE) {session_start();}?>

<?php if (isset($_SESSION['flash'])):?>
  <?php foreach ($_SESSION['flash'] as $type=>$message):?>
    <div class="alertalert-<?=$type;?>">
      <?=$message;?>
    </div>
  <?php endforeach;?>
  <?php unset($_SESSION['flash']);?>
<?php endif;?>

<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>
<!DOCTYPE html>
<html lang="fr" class="">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body class="">
	<?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

	<!-- Contenu de la page de connexion -->
  <div class="container" id="main">
    <div class="card m-auto" id="connexion">
      <div class="card-block text-center">
        <h4 class="card-title">Formulaire de connexion</h4>
        <form>
          <div class="form-group">
            <label for="inputEmail">Login</label>
            <input type="text class="form-control mx-auto text-center" id="inputEmail" aria-describedby="" placeholder="pinpin.lapin@gmail.com">
          </div>
          <div class="form-group">
            <label for="inputMotDePasse">Mot de passe</label>
            <input type="password" class="form-control mx-auto text-center" id="inputMotDePasse" placeholder="************">
          </div>
          <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
      </div>
      <div class="card m-auto">
        <div class="card-block text-center">
          <p class="card-text">Vous n'êtes pas encore inscrit ?</p>
          <a class="btn btn-secondary" href="<?php echo $path_pages ; ?>inscription.php" role="button">Inscription</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->

</body>
</html>
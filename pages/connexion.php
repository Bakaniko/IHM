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
    <div class="card m-auto">
      <div class="card-block text-center">
        <h4 class="card-title">Formulaire de connexion</h4>
        <form>
          <div class="form-group">
            <label for="inputEmail">Adresse email</label>
            <input type="email" class="form-control mx-auto text-center" id="inputEmail" aria-describedby="emailHelp" placeholder="pinpin.lapin@gmail.com">
          </div>
          <div class="form-group">
            <label for="inputMotDePasse">Mot de passe</label>
            <input type="password" class="form-control mx-auto text-center" id="inputMotDePasse" placeholder="************">
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              Rester connecté(e)
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
      </div>
      
      <!-- Fin des formulaires -->
    </div>
  </div>
  <?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
  <?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->

</body>
</html>

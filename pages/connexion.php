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
<html lang="fr">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

	<!-- Contenu de la page de connexion -->

    <div class="container" id="main">
        <!-- Formulaire de connexion -->
        <div class="card mx-auto" id="cardConnexion">
            <div class="card-block text-center">
                <h4 class="card-title">Formulaire de connexion</h4>
            </div>
            <form class="text-center" method="POST" action="">
                <!-- Informations de connexion -->
                <div class="form-group">
                    <label for="Login">Login</label>
                    <input type="text class" class="form-control mx-auto text-center" name="Login" placeholder="LapinAnonyme">
                </div>
                <div class="form-group">
                    <label for="MotDePasse">Mot de passe</label>
                    <input type="password" class="form-control mx-auto text-center" name="MotDePasse" placeholder="************">
                </div>
                <button type="submit" class="btn btn-primary" value="Envoyer">Connexion</button>
            </form>
            <!-- Boutton d'envoi -->
            <div class="card-block text-center">
                <p class="card-text">Vous n'êtes pas encore inscrit ?</p>
                <a class="btn btn-secondary" href="<?php echo $path_pages ; ?>inscription.php" role="button">Inscription</a>
            </div>
            <!-- Fin du forulaire de connexion -->
        </div>
    </div>

  <?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
  <?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->

</body>
</html>
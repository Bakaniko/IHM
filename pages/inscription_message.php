  <?php
if (session_status()==PHP_SESSION_NONE) {session_start();}?>

<?php if (isset($_SESSION['flash'])):?>
<?php foreach ($_SESSION['flash'] as $type=>$message):?>
  <div class="alert alert-<?=$type;?>">
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
<body>
  <div class="container" id="main">
    <div class="alert alert-success">
    <h1>Un email de confirmation vous été envoyé, veuillez consulter votre boite mail pour valider votre inscription</h1>
    </div>
</body>
</html>
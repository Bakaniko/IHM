<?php session_start();
unset($_SESSION['auth']);?>
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
<?php
$_SESSION['flash']['success']='Vous etes maintenant déconnecté';?>
 <?php if (isset($_SESSION['flash'])):?>
  <?php foreach ($_SESSION['flash'] as $type=>$message):?>
    <div class="alert alert-<?=$type;?>">
      <?=$message;?>
    </div>
  <?php endforeach;?>
  <?php unset($_SESSION['flash']);?>
<?php endif;?>
<?php header('Location:connexion.php'); ?>
</body>
</html>

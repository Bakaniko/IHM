<?php session_start();?>
<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>
<?php
require"$path_structure".'base.php';
$dernierinscrit=$_GET['id']; # Récuperer l'Id dans l'url de confirmation
$code_url=$_GET['code_confirme'];# Récuperer le code de confirmation dans l'url de confirmation
$req=$pdo->prepare('SELECT * FROM proj_utilisateur WHERE idUtilisateur=?');# Récuperer son code de confirmation pour les comparer
$req->execute([$dernierinscrit]);
$user_demande_inscription=$req->fetch();# on met ce code dans une variable
	session_start();
if ($code_url && $code_confirmation->code_confirmation==$code_url){  # on compare le code dans la base le code url et le code extré de la base

	$pdo->prepare('UPDATE proj_utilisateur SET code_confirmation="ok", date_confirmation = NOW() WHERE idUtilisateur=?')->execute([$dernierinscrit]);
	$_SESSION['auth']=$user_demande_inscription;# stocker l'utilisateur dans l'index de la session
	$_SESSION['flash']['success']='Votre compte a été confirmé !';
	header('Location:compte.php');
}else{
	$_SESSION['flash']['danger']='La confirmation a échouée !';
	header('Location:connexion.php');
	  <?php if (isset($_SESSION['flash'])):?>
  <?php foreach ($_SESSION['flash'] as $type=>$message):?>
    <div class="alert alert-<?=$type;?>">
      <?=$message;?>
    </div>
  <?php endforeach;?>
  <?php unset($_SESSION['flash']);?>
<?php endif;?>
}
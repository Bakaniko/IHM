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
$code_confirmation=$req->fetch();# on met ce code dans une variable
	session_start();
if ($code_confirmation&&$code_confirmation->code_confirmation==$code_url){  # on compare le code dans la base le code url et le code extré de la base

	$pdo->prepare('UPDATE proj_utilisateur SET code_confirmation=NULL, date_confirmation = NOW() WHERE idUtilisateur=?')->execute([$dernierinscrit]);
	$_SESSION['authentification']=$code_confirmation;# stocker l'utilisateur dans l'index de la session
	header('location:panier.php');
}else{
	$_SESSION['flash']['danger']='La confirmation a échouée !';
	header('location:connexion.php');
}
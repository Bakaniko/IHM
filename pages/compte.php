<?php session_start();
// Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
// inclusion des fichiers de connexion
require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
require_once("$path_structure".'fonctions.php');# inclure la fonction debug



?>

<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page de Compte client -->

	<div class="container main" id="compte">
		<div class="card mx-auto text-center">
			<h2>Mes réservations</h2>
		</div>
		<div class="card mx-auto text-center">
			<h2>Mes coordonnées</h2>
		</div>
		
	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

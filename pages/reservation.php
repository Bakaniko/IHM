<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>

<!DOCTYPE html>
<html lang="fr" class="">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body class="">
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page spectacle -->
	
	<div class="container" id="main">
		<div class="card mx-auto">
			<div class="card-block text-center">
				<h4 class="card-title">Sélectionnez vos places</h4>
			</div>
		</div>
		<div class="d-flex flex-row justify-content-center">
			<?php include($path_pages."salle-1.php"); ?>	<!-- Inclusion svg salle 1 -->
		</div>
		<div class="card mx-auto">
			<div class="card-block text-center">
				<a class="btn btn-secondary" href="#" role="button"><i class="fa fa-undo mr-2" aria-hidden="true"></i>Refaire la sélection</a>
				<a class="btn btn-success" href="<?php echo $path_pages ; ?>panier.php" role="button"><i class="fa fa-check mr-2" aria-hidden="true"></i>Ajouter au panier</a>
			</div>
		</div>
	</div>
	<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
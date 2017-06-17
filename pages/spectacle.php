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
				<h4 class="card-title">Date et Titre du spectacle</h4>
			</div>
			<img class="card-img-bottom img-fluid d-block mx-auto" src="<?php echo $path_images ; ?>les_contes_d_hoffmann_1_christian_leiber_opera_national_de_paris.jpg" alt="Titre du spectacle">
			<div class="card-block"> 
				<p class="card-text text-justify">Texte de présentation du spectacle : Si la liaison entre Titus et Bérénice a inspiré 
				les plus grands dramaturges français, c’est l’empereur romain, incarnation de la souveraineté absolue,
				qui occupe la place centrale de ce qui devait être le dernier opéra de Mozart.
				Marquant un retour à l’opera seria par ses contraintes formelles et le choix du sujet,
				La Clémence de Titus détourne néanmoins les attentes et brille par son humanité dans une obscure clarté
				qui laisse apparaître la tristesse dissimulée de la partition d’un compositeur déjà souffrant.
				La mise en scène épurée de Willy Decker offre une réflexion sur le pouvoir où le pardon et la réconciliation
				s’exposent dans toute leur force et leur fragilité.
				</p>
			</div>
			<div class="card-block text-center">
				<a class="btn btn-lg btn-primary" href="<?php echo $path_pages ; ?>reservation.php" role="button">Réserver</a>
			</div>
		</div>
	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
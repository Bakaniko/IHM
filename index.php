<?php // Définition des chemins d'accès aux fichiers
$path_root="./";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>

<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

	<!-- Contenu de la page d'accueil -->
	
	<div class="container" id="main">
		<div class="card-deck">
			<div class="card mx-auto">
				<div class="card-block">
					<h4 class="card-title"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et Titre du spectacle à venir</a></h4>
					<p class="card-text">Présentation du spectacle</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
				</ul>	
			</div>
			<div class="card m-auto">
				<img class="card-img-bottom img-fluid d-block mx-auto" src="<?php echo $path_images ; ?>les_contes_d_hoffmann_1_christian_leiber_opera_national_de_paris.jpg" alt="Titre du spectacle">
			</div>
		</div>
	</div>
</div>
<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
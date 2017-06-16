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

	<!-- Contenu de la page de programmation -->

	<div class="container" id="main">
		<!-- Critères de Recherche -->
		<div class="card mx-auto">
			<!-- Titre -->
			<div class="card-block text-center">
				<h4 class="card-title">Programmation 2017</h4>
				<p class="card-text">Chercher et sélectionner un spectacle selon des critères</p>
			</div>
			<!-- Formulaire critères de recherche -->

			<form>
				<div class="card-block text-center mx-auto">
					<div class="d-flex flex-row flex-wrap justify-content-center">
						<!-- Type -->
						<div class="form-group d-flex flex-column">
							<label for="typeSelect">Type</label>
							<select class="custom-select" id="typeSelect">
								<option selected>Choisir...</option>
								<option value="1">Concert et Récital</option>
								<option value="2">Ballet</option>
								<option value="3">Concert et Récital</option>
								<option value="4">Galas</option>
							</select>
						</div>
						<!-- Mois -->
						<div class="form-group d-flex flex-column">
							<label for="moisSelect">Mois</label>
							<select class="custom-select" id="moisSelect">
								<option selected>Choisir...</option>
								<option value="1">Janvier</option>
								<option value="2">Février</option>
								<option value="3">Mars</option>
								<option value="4">Avril</option>
								<option value="5">Mai</option>
								<option value="6">Juin</option>
								<option value="7">Juillet</option>
								<option value="8">Août</option>
								<option value="9">Septembre</option>
								<option value="10">Octobre</option>
								<option value="11">Novembre</option>
								<option value="12">Décembre</option>
							</select>
						</div>
						<!-- Salle -->
						<div class="form-group d-flex flex-column">
							<label for="salleSelect">Salle</label>
							<select class="custom-select" id="salleSelect">
								<option selected>Choisir...</option>
								<option value="1">Salle 1</option>
								<option value="2">Salle 2</option>
								<option value="3">Salle 3</option>
							</select>
						</div>
						<div class="form-group d-flex align-items-end">
							<button type="submit" class="btn btn-primary">Chercher</button>
						</div>
					</div>

				</form>

			</div>
			<!-- Fin du Formulaire critères de recherche-->
		</div>


		<!-- Listes de spectacles en sortie -->
		<div class="card-deck">
			<!-- Liste 1 -->
			<div class="card mx-auto">
				<ul class="list-group list-group-flush mx-auto">
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
				</ul>
			</div>
			<!-- Liste 2 -->
			<div class="card mx-auto">
				<ul class="list-group list-group-flush mx-auto">
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
				</ul>
			</div>
			<!-- Liste 3 -->
			<div class="card mx-auto">
				<ul class="list-group list-group-flush mx-auto">
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
					<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date Spectacle Salle</a></li>
				</ul>
			</div>
		</div>

	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
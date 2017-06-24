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

	<!-- Contenu de la page spectacle -->
	
	<div class="container" id="main">
		<!-- Interface de Sélection des places -->
		<div class="card mx-auto">
			<!-- Titre -->
			<div class="card-block text-center">
				<h4 class="card-title">Sélectionnez vos places</h4>
			</div>
			<!-- Formulaire de sélection des places -->
			<div class="card-block text-center mx-auto">
				<form method="POST" action="#">
					<div class="d-flex flex-row flex-wrap justify-content-center">
						<!-- Sélection catégorie -->
						<div class="form-group d-flex flex-column">
							<label for="categorie">Catégorie</label>
							<select class="custom-select" name="categorie">
								<option selected>Choisir...</option>
								<option value="1"></option>
								<option value="2"></option>
								<option value="3"></option>
								<option value="4"></option>
							</select>
						</div>
						<!-- Sélection rangée -->
						<div class="form-group d-flex flex-column">
							<label for="rangee">Rangée</label>
							<select class="custom-select" name="rangee">
								<option selected>Choisir...</option>
								<option value="1"></option>
								<option value="2"></option>
								<option value="3"></option>
								<option value="4"></option>
								<option value="5"></option>
								<option value="6"></option>
								<option value="7"></option>
								<option value="8"></option>
								<option value="9"></option>
								<option value="10"></option>
								<option value="11"></option>
								<option value="12"></option>
							</select>
						</div>
						<!-- Sélection numéro -->
						<div class="form-group d-flex flex-column">
							<label for="numero">Numéro</label>
							<select class="custom-select" name="numero">
								<option selected>Choisir...</option>
								<option value="1"></option>
								<option value="2"></option>
								<option value="3"></option>
							</select>
						</div>
						<!-- Boutton d'envoi -->
						<div class="form-group d-flex align-items-end">
							<button type="submit" class="btn btn-success" value="Envoyer">
								<i class="fa fa-check mr-2" aria-hidden="true"></i>
								Ajouter au panier
							</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Fin du formulaire de sélection des places -->
			<!-- Lien vers panier.php -->
			<div class="card-block text-center">
				<a class="btn btn-primary" href="<?php echo $path_pages ; ?>panier.php" role="button">Aller au panier</a>
			</div>
		</div>
		<!-- Fin de l'interface de Sélection des places -->
		<!-- Interface graphique de sélection des places-->
		<div class="d-flex flex-row justify-content-center">
			<?php include($path_pages."salle-1.php"); ?> <!-- Inclusion svg salle 1 -->
		</div>
		<!-- Fin de l'interface graphique de sélection des places-->
	</div>

	<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
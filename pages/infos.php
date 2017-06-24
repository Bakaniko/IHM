<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>

<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page infos -->

	<div class="container main" id="infos">
		<!-- Informations de contact-->
		<div class="card mx-auto">
			<div class="card-block">
				<h4 class="card-title text-center">Nous contacter</h4>
				<p class="card-text text-justify">
					Par téléphone au 08 92 89 90 90 (0,35 € TTC/min depuis un poste fixe hors coût éventuel selon opérateur) 
					ou au + 33 1 71 25 24 23 depuis l’étranger, du lundi au samedi de 9h à 19h.
				</p>
				<p class="card-text text-justify">
					Aux guichets du Palais Garnier (l’angle des rues Scribe et Auber - 75009 Paris) 
					et de l’Opéra Bastille (130 rue de Lyon - 75012 Paris) du lundi au samedi de 11h30 à 18h30 (sauf jours fériés) 
					et une heure avant le début des représentations.
				</p>
			</div>
		</div>
		<!-- Formulaire de contact -->
		<div class="card mx-auto">
			<div class="card-block">
				<h4 class="card-title text-center">Par email</h4>
				<form method="post" action="">
					<div class="form-group row">
						<label class="col-3 col-form-label" for="user_name">Nom</label>
						<div class="col-9">
							<input type="text" class="form-control" name="user_name" placeholder="Pinpin"/>
						</div>
					</div>		
					<div class="form-group row">
						<label class="col-3 col-form-label" for="user_firstname">Prénom</label>
						<div class="col-9">
							<input type="text" class="form-control" name="user_firstname" placeholder="Lapin"/>
						</div>
					</div>						
					<div class="form-group row">
						<label class="col-3 col-form-label" for="user_email">Email</label>
						<div class="col-9">
							<input type="email" class="form-control" name="user_email" placeholder="pinpin.lapin@gmail.com"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-3 col-form-label" for="message">Message</label>
						<div class="col-9">
							<textarea class="form-control" name="message" rows="4"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<button type="submit" class="btn btn-primary mx-auto" value="Envoyer">Envoyer</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Plan -->
		<div class="card mx-auto">
			<div class="card-block text-center">
				<h4 class="card-title">Plan</h4>
				<p class="card-text">
					Opéra Bastille : Place de la Bastille, 75012 Paris<br />
					Palais Garnier : 8 Rue Scribe, 75009 Paris
				</p>
				<!-- div utilisée pour positionner la carte créée par la fonction JavaScript initMap
				le style appliqué à la carte fonctionne seulement dans le html -->
				<div class="mx-auto" style="width:30rem;height:25rem;" id="map"></div>
			</div>
		</div>
	</div>

	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
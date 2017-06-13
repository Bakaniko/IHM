<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>

<!DOCTYPE html>
<html lang="fr" class="w-100 h-100">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body class="w-100 h-100">
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page infos -->

	<div class="container" id="main">
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
			<!-- Formulaire -->
			<div class="card-block text-center">
				<h5 class="card-title text-center">Par email</h5>
				<form action="" method="post">
					<div class="form-group">
						<label for="prenom">Prénom</label>
						<input type="text" id="prenom"  class="form-control mx-auto text-center" name="user_firstname" />
					</div>		
					<div class="form-group">
						<label for="nom">Nom</label>
						<input type="text" id="nom" class="form-control mx-auto text-center" name="user_name"  />
					</div>									
					<div class="form-group">
						<label for="couriel">Adresse email</label>
						<input type="email" id="courriel" class="form-control mx-auto text-center" name="user_email" />
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<textarea class="form-control mx-auto text-center" id="message" rows="3"></textarea>
					</div>
						<button class="btn btn-primary" type="submit">Envoyer</button>
				</form>
			</div>
		</div>

		<div class="card-block text-center">
			<h4 class="card-title">Plan</h4>
			<p class="card-text">
				Opéra Bastille : Place de la Bastille, 75012 Paris<br />
				Palais Garnier : 8 Rue Scribe, 75009 Paris
			</p>
			<!-- div utilisée pour positionner la carte créée par la fonction JavaScript initMap -->
			<div class="mx-auto" style="width:40rem;height:30rem;" id="map"></div>
		</div>
	</div>
</div>

<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
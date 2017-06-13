<?php
if (session_status()==PHP_SESSION_NONE) {session_start();}
?>
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

	<!-- Contenu de la page panier -->
	
	<div class="container" id="main">
		<h1>Mon panier</h1>
		<p></p>
		<div class="card mx-auto">
			<div class="card-block text-center">
				<h4 class="card-title"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et Titre du spectacle</a></h4>
			</div>
			<div class="card-block"> 
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th>Place</th>
							<th>Prix</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><input class="form-check-input" type="checkbox" value="" checked></th>
							<td>Place 16 rangée A Salle 1</td>
							<td>50€</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row"><input class="form-check-input" type="checkbox" value="" checked></th>
							<td>Place 17 rangée A Salle 1</td>
							<td>50€</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row"><input class="form-check-input" type="checkbox" value="" checked></th>
							<td>Place 17 rangée A Salle 1</td>
							<td>45€</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row"><input class="form-check-input" type="checkbox" value="" checked></th>
							<td>Place 1 rangée L Salle 1</td>
							<td>40€</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-block text-center">
				<a class="btn btn-info" href="<?php echo $path_pages ; ?>reservation.php" role="button"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Retour</a>
				<a class="btn btn-success" href="https://developer.paypal.com/docs/classic/ipn/integration-guide/IPNSimulator" role="button">Paiement</a>
			</div>
		</div>
	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
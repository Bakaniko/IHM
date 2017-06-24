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
<html lang="fr">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page panier -->
	
	<div class="container main" id="panier">
		<div class="card mx-auto text-center">
			<div class="card-block">
				<h4 class="card-title">Panier</h4>
			</div>
			<form class="mx-auto">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" checked>
								Spectacle : La Traviata&nbsp;&nbsp;&nbsp;&nbsp;Place : 16&nbsp;&nbsp;&nbsp;&nbsp;Rangée : A&nbsp;&nbsp;&nbsp;&nbsp;Salle : 1&nbsp;&nbsp;&nbsp;&nbsp;Prix : 50€
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" checked>
								Spectacle : La Traviata&nbsp;&nbsp;&nbsp;&nbsp;Place : 16&nbsp;&nbsp;&nbsp;&nbsp;Rangée : A&nbsp;&nbsp;&nbsp;&nbsp;Salle : 1&nbsp;&nbsp;&nbsp;&nbsp;Prix : 50€
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" checked>
								Spectacle : La Traviata&nbsp;&nbsp;&nbsp;&nbsp;Place : 16&nbsp;&nbsp;&nbsp;&nbsp;Rangée : A&nbsp;&nbsp;&nbsp;&nbsp;Salle : 1&nbsp;&nbsp;&nbsp;&nbsp;Prix : 50€
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" checked>
								Spectacle : Rigoletto&nbsp;&nbsp;&nbsp;&nbsp;Place : 16&nbsp;&nbsp;&nbsp;&nbsp;Rangée : A&nbsp;&nbsp;&nbsp;&nbsp;Salle : 1&nbsp;&nbsp;&nbsp;&nbsp;Prix : 50€
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" checked>
								Spectacle : Rigoletto&nbsp;&nbsp;&nbsp;&nbsp;Place : 16&nbsp;&nbsp;&nbsp;&nbsp;Rangée : A&nbsp;&nbsp;&nbsp;&nbsp;Salle : 1&nbsp;&nbsp;&nbsp;&nbsp;Prix : 50€
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" checked>
								Spectacle : Rigoletto&nbsp;&nbsp;&nbsp;&nbsp;Place : 16&nbsp;&nbsp;&nbsp;&nbsp;Rangée : A&nbsp;&nbsp;&nbsp;&nbsp;Salle : 1&nbsp;&nbsp;&nbsp;&nbsp;Prix : 50€
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<p class="m-auto font-weight-bold">Prix total : 295€</p>
					</li>
					<li class="list-group-item">
						<button type="submit" class="btn btn-success m-auto"><i class="fa fa-check mr-2" aria-hidden="true"></i>Enregistrer les modifications</button>
					</li>
				</ul>
			</form>
			<div class="card-block">
				<a class="btn btn-secondary" href="<?php echo $path_pages ; ?>programmation.php" role="button">Poursuivre mes achats</a>
				<a class="btn btn-primary" href="https://developer.paypal.com/docs/classic/ipn/integration-guide/IPNSimulator" role="button">Paiement</a>
			</div>
		</div>
	</div>
</div>
<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
require_once("$path_structure".'fonctions.php');# inclure la fonction debug

?>

<!DOCTYPE html>
<html lang="fr" class="">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body class="">
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->


	<!-- Contenu de la page de gestion -->

	<div class="container" id="main">

		<div class="card mx-auto">

			<div class="card-block text-center">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#gestionSpectacles" role="tab">Gestion des spectacles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#gestionReservations" role="tab">Gestion des réservations</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#vide" role="tab">...</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="gestionSpectacles" role="tabpanel">
						<!-- Ajouter -->
						<form>
							<div class="card-block text-center mx-auto">
								<h5 class="card-title">Ajouter un spectacle</h5>
								<div class="form-group row">
									<label for="specSelect"></label>
									<select class="custom-select" id="specSelect">
										<option selected>Choisir le type</option>
										<option value="1">Opéra</option>
										<option value="2">B</option>
										<option value="3">C</option>
										<option value="4">D</option>
										<option value="5">E</option>
										<option value="6">F</option>
										<option value="7">G</option>
									</select>
								</div>

								<div class="form-group row">
									<label for="inputTitre" class="col-3 col-form-label">Titre</label>
									<div class="col-9">
										<input type="text" class="form-control" id="inputTitre" placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-3 col-form-label" for="message">Informations</label>
									<div class="col-9">
										<textarea class="form-control" id="message" rows="4"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<button class="btn btn-success mx-auto" type="submit">Ajouter</button>
								</div>
							</div>
						</form>
						<!-- Représentation -->
						<form>
							<div class="card-block text-center mx-auto">
								<h5 class="card-title">Ajouter une représentation</h5>
								<div class="form-group row">
									<label for="specSelect"></label>
									<select class="custom-select" id="specSelect">
										<option selected>Choisir le spectacle</option>
										<option value="1">A</option>
										<option value="2">B</option>
										<option value="3">C</option>
										<option value="4">D</option>
										<option value="5">E</option>
										<option value="6">F</option>
										<option value="7">G</option>
									</select>
								</div>
								<div class="form-group row">
									<label for="specSelect"></label>
									<select class="custom-select" id="specSelect">
										<option selected>Choisir la salle</option>
										<option value="1">Salle 1</option>
										<option value="2">Salle 2</option>
										<option value="3">Salle 3</option>
									</select>
								</div>
								<div class="form-group row">
									<label for="inputTitre" class="col-3 col-form-label">Date et heure</label>
									<div class="col-9">
										<input type="datetime-local" value="2011-08-19T13:45:00" class="form-control" id="inputTitre" placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<button class="btn btn-success mx-auto" type="submit">Ajouter</button>
								</div>
							</div>
						</form>
						<!-- Suprimer -->
						<form>
							<div class="card-block text-center mx-auto">
								<h5 class="card-title">Suprimer un spectacle / une représentation</h5>
								<div class="d-flex flex-row flex-wrap justify-content-center">
									<!-- Spectacle -->
									<div class="form-group d-flex flex-column">
										<label for="specSelect"></label>
										<select class="custom-select" id="specSelect">
											<option selected>Choisir un spectacle</option>
											<option value="1">A</option>
											<option value="2">B</option>
											<option value="3">C</option>
											<option value="4">D</option>
											<option value="5">E</option>
											<option value="6">F</option>
											<option value="7">G</option>
										</select>
									</div>
									<!-- Représentation -->
									<div class="form-group d-flex flex-column">
										<label for="repreSelect"></label>
										<select class="custom-select" id="repreSelect">
											<option selected>Choisir une représentation</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
									<div class="form-group d-flex align-items-end">
										<button type="submit" class="btn btn-danger"><i class="fa fa-check mr-2" aria-hidden="true"></i>Suprimer</button>
									</div>
								</div>
							</div>
						</form>
					</div> <!-- tab pane -->


					<div class="tab-pane" id="gestionReservations" role="tabpanel">
					</div>

					<div class="tab-pane" id="vide" role="tabpanel">
					</div>
				</div> <!-- tab content -->
			</div>
		</div>
	</div>
</div>
<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

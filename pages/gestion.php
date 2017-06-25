<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>
<?php
// Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

require_once"$path_structure".'fonctions.php';# inclure la fonction debug  <?php session_start();
if (!isset($_SESSION['auth'])){
$_SESSION['flash']['danger']="Vous n'avez pas le droit d'accèder à cette page";
header('Location:connexion.php');
}if (isset($_SESSION['auth']) && ($_SESSION['auth']->typeUtilisateur=='admin')) {
 $_SESSION['flash']['success']= "Bienvenue".$_SESSION['auth']->nom." ".$_SESSION['auth']->prenom." !";
 debug($_SESSION);
}
else {
	debug($_SESSION);
}

require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas


// ajouter un spectacle
if(isset($_POST['btn-add-spectacle']))
{
	$_SESSION['flash']['success']= "Un nouveau spectacle a été ajouté !";

	debug($_POST);


} // fin de si l'utilisateur a valider un nouveau spectacle

// Ajouter une représentation
if(isset($_POST['btn-add-representation']))
{
	$_SESSION['flash']['success']= "Une nouvelle représentation a été ajoutée !";
		debug($_POST);
} // fin de si l'utilisateur a valider une nouvelle représentation


// Suppression d'un spectacle / Représentation
if(isset($_POST['btn-rm-objet']))
{
	$_SESSION['flash']['success']= "Le spectacle / la représentation a bien été supprimé(e) !";
		debug($_POST);
} // fin de si l'utilisateur a supprimer un objet de la base

?>

<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body  >
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- afficher les message flash s'il y en a-->
    <?php if (isset($_SESSION['flash'])):?>
		<?php foreach ($_SESSION['flash'] as $type=>$message):?>
		 <div class="alert alert-<?=$type;?>">
		 <?=$message;?>
		</div>
		<?php endforeach;?>
		 <?php unset($_SESSION['flash']);?>
		<?php endif;?>

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
						<form method="POST" action="">
							<div class="card-block text-center mx-auto">
								<h5 class="card-title">Ajouter un spectacle</h5>
								<div class="form-group row">
									<label for="specSelect"></label>
									<select class="custom-select" id="specSelect" name="selectSpectacle">
										<option selected>Choisir le type</option>
										<?php //requête de sélection les options de type de spectacle présents dans la base
										$sql = "SELECT DISTINCT(s.type) as type from proj_Spectacle as s where 1 ORDER BY type ASC";

										$req = $pdo->query($sql);

										while ($data=$req->fetch()) {

													echo "<option value=".$data->type.">".$data->type."</option>\n";
											}
										$req->closeCursor();
											 ?>
									</select>
								</div>

								<div class="form-group row">
									<label for="inputTitre" class="col-3 col-form-label">Titre</label>
									<div class="col-9">
										<input type="text" class="form-control" id="inputTitre" name="titreSpectacle">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputNomImage" class="col-3 col-form-label">Nom de l'image</label>
									<div class="col-9">
										<input type="text" class="form-control" id="inputNomImage" name="nomImage">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-3 col-form-label" for="message">Informations</label>
									<div class="col-9">
										<textarea class="form-control" id="message" rows="4" name="infosSpectacle"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<button class="btn btn-success mx-auto" type="submit" name="btn-add-spectacle">Ajouter</button>
								</div>
							</div>
						</form>
						<!-- Représentation -->
						<form method="POST" action="">
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
									<button class="btn btn-success mx-auto" type="submit" name="btn-add-representation">Ajouter la représentation</button>
								</div>
							</div>
						</form>
						<!-- Supprimer -->
						<form method="POST" action="">
							<div class="card-block text-center mx-auto">
								<h5 class="card-title">Supprimer un spectacle / une représentation</h5>
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
										<button type="submit" class="btn btn-danger" name='btn-rm-objet'><i class="fa fa-check mr-2" aria-hidden="true"></i>Suprimer</button>
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

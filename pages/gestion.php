<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>
<?php
// Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

require_once"$path_structure".'fonctions.php';# inclure la fonction debug  <?php session_start();
if (!isset($_SESSION['auth'])){
$_SESSION['flash']['danger']="Vous n'avez pas le droit d'accéder à cette page";
header('Location:connexion.php');
}if (isset($_SESSION['auth']) && ($_SESSION['auth']->typeUtilisateur=='admin')) {
 $_SESSION['flash']['success']= "Bienvenue".$_SESSION['auth']->nom." ".$_SESSION['auth']->prenom." !";
 //debug($_SESSION);
}
else {
	//debug($_SESSION);
	header('Location:connexion.php');
}

require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas


// ajouter un spectacle
if(isset($_POST['btn-add-spectacle']))
{

	$req=$pdo->prepare("INSERT INTO proj_Spectacle SET infos = ?, nom = ?, nomImage = ?, type = ?;");
	$req->execute ([htmlspecialchars($_POST['infosSpectacle']),htmlspecialchars($_POST['titreSpectacle']), htmlspecialchars($_POST['nomImage']), htmlspecialchars($_POST['selectSpectacle'])]);
	$_SESSION['flash']['success']= "Un nouveau spectacle a été ajouté !";

	//debug($_POST);


} // fin de si l'utilisateur a valider un nouveau spectacle

// Ajouter une représentation
if(isset($_POST['btn-add-representation']))
{
	/*
	[specSelect] => 6
	 [salleSelect] => 2
	 [dateRepresentation] => 2017-06-23
	 [horaireDebut] => 20:30
	 [horaireFin] => 23:30
	 [btn-add-representation] =>
	 */
	 $req=$pdo->prepare("INSERT INTO proj_Representation
		 									SET date = ?,
		 									horaireDebut = ?,
											horaireFin = ?,
											idSalle = ?,
											idSpectacle = ?;");
 	$req->execute ([htmlspecialchars($_POST['dateRepresentation']),
									htmlspecialchars($_POST['horaireDebut']),
									htmlspecialchars($_POST['horaireFin']),
									htmlspecialchars($_POST['salleSelect']),
									htmlspecialchars($_POST['specSelect'])]);

	$_SESSION['flash']['success']= "Une nouvelle représentation a été ajoutée !";
		debug($_POST);
} // fin de si l'utilisateur a valider une nouvelle représentation


// Suppression d'un spectacle
if(isset($_POST['btn-rm-spectacle']))
{
	/*
	[delete-spectacle] => 6 // idSpectacle
[btn-rm-spectacle] => */

$req=$pdo->prepare("DELETE FROM proj_Spectacle WHERE idSpectacle = ? LIMIT 1;");
$req->execute ([htmlspecialchars($_POST['delete-spectacle'])]);

	$_SESSION['flash']['success']= "Le spectacle  a bien été supprimé !";
		debug($_POST);
} // fin de si l'utilisateur a supprimer un objet de la base

// Suppression d'une représentation
if(isset($_POST['btn-rm-representation']))
{
	/*
	[delete-representation] => 1 // idRepresentation
    [btn-rm-representation] =>
		*/

		$req=$pdo->prepare("DELETE FROM proj_Representation
											 WHERE idRepresentation = ? ;");
	 $req->execute ([htmlspecialchars($_POST['delete-representation'])]);

	$_SESSION['flash']['success']= "La représentation a bien été supprimée !";
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

													echo "\t\t\t\t\t\t\t\t<option value=".$data->type.">".$data->type."</option>\n";
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
									<select class="custom-select" id="specSelect" name="specSelect">
										<option selected>Choisir le spectacle</option>
										<?php //requête de sélection les options de type de spectacle présents dans la base
										$sql = "SELECT DISTINCT s.idSpectacle as id, s.nom from proj_Spectacle as s where 1 ORDER BY nom ASC";

										$req = $pdo->query($sql);

										while ($data=$req->fetch()) {

													echo "\t\t\t\t\t\t\t\t<option value=".$data->id.">".$data->nom."</option>\n";
											}
										$req->closeCursor();
											 ?>
									</select>
								</div>
								<div class="form-group row">
									<label for="salleSelect"></label>
									<select class="custom-select" id="salleSelect" name="salleSelect">
										<option selected>Choisir la salle</option>
										<?php //requête de sélection les options de type de spectacle présents dans la base
										$sql = "SELECT DISTINCT s.idSalle as id, s.nom from proj_Salle as s where 1 ORDER BY nom ASC";

										$req = $pdo->query($sql);

										while ($data=$req->fetch()) {

													echo "\t\t\t\t\t\t\t\t<option value=".$data->id.">".$data->nom."</option>\n";
											}
										$req->closeCursor();
											 ?>
									</select>
								</div>
								<div class="form-group row">
									<label for="dateRepresentation" class="col-3 col-form-label">Date (AAAA-MM-JJ)</label>
									<div class="col-9">
										<input type="date" class="form-control" id="dateRepresentation" value="<?php echo date('Y-m-d')?>" name="dateRepresentation">
									</div>
								</div>
								<div class="form-group row">
									<label for="HoraireDebut" class="col-3 col-form-label">Heure de début</label>
									<div class="col-9">
										<input type="time" class="form-control" id="HoraireDebut" value="20:30" name="horaireDebut">
									</div>
								</div>
								<div class="form-group row">
									<label for="HoraireFin" class="col-3 col-form-label">Heure de fin</label>
									<div class="col-9">
										<input type="time" class="form-control" id="HoraireFin" placeholder="23:30" name="horaireFin">
									</div>
								</div>
								<div class="form-group row">
									<button class="btn btn-success mx-auto" type="submit" name="btn-add-representation">Ajouter la représentation</button>
								</div>
							</div>
						</form>
						<!-- Supprimer -->
							<!-- Spectacle -->
						<form method="POST" action="">
							<div class="card-block text-center mx-auto">
								<h5 class="card-title">Supprimer un spectacle</h5>
								<div class="d-flex flex-row flex-wrap justify-content-center">
									<div class="form-group d-flex flex-column">
										<label for="specSelect"></label>
										<select class="custom-select" id="specSelect" name="delete-spectacle">
											<option selected>Choisir un spectacle</option>
											<?php //requête de sélection les options de type de spectacle présents dans la base
											$sql = "SELECT DISTINCT s.idSpectacle as id, s.nom from proj_Spectacle as s where 1 ORDER BY nom ASC";

											$req = $pdo->query($sql);

											while ($data=$req->fetch()) {

														echo "\t\t\t\t\t\t\t\t<option value=".$data->id.">".$data->nom."</option>\n";
												}
											$req->closeCursor();
												 ?>
										</select>
									</div>
									<div class="form-group d-flex align-items-end">
										<button type="submit" class="btn btn-danger" name='btn-rm-spectacle'><i class="fa fa-check mr-2" aria-hidden="true"></i>Suprimer</button>
									</div>
								</div>
							</div>
						</form>
						<!-- Représentation -->
						<form method="POST" action="">
							<div class="card-block text-center mx-auto">
								<h5 class="card-title">Supprimer une représentation</h5>
								<div class="d-flex flex-row flex-wrap justify-content-center">
									<div class="form-group d-flex flex-column">
										<label for="repreSelect"></label>
										<select class="custom-select" id="repreSelect" name="delete-representation">
											<option selected>Choisir une représentation</option>
											<?php //requête de sélection les options de type de spectacle présents dans la base
											$sql = "SELECT DISTINCT r.idRepresentation as id, s.nom, r.date
															from proj_Representation  as r
															JOIN proj_Spectacle  as s ON s.idSpectacle = r.idSpectacle
															where 1 ORDER BY date ASC";

											$req = $pdo->query($sql);

											while ($data=$req->fetch()) {

														echo "\t\t\t\t\t\t\t\t<option value=".$data->id.">".$data->date." / ".$data->nom."</option>\n";
												}
											$req->closeCursor();
												 ?>
										</select>
									</div>
									<div class="form-group d-flex align-items-end">
										<button type="submit" class="btn btn-danger" name='btn-rm-representation'><i class="fa fa-check mr-2" aria-hidden="true"></i>Suprimer</button>
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

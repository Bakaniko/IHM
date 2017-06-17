<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
// inclusion des fichiers de connexion
require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
require_once("$path_structure".'fonctions.php');# inclure la fonction debug

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
								<?php //requête de sélection les options de type de spectacle présents dans la base
								$sql = "SELECT DISTINCT(s.type) as type from proj_Spectacle as s where 1 ORDER BY type ASC";

								$req = $pdo->query($sql);

								while ($data=$req->fetch()) {

											echo "<option value=".$data->type.">".$data->type."</option>";
									}
								$req->closeCursor();
									 ?>
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

								<?php //requête de sélection des noms de salle présents dans la base
								$sql = "SELECT DISTINCT(s.nom) as nom, s.idSalle from proj_Salle as s where 1 ORDER BY s.nom DESC";

								$req = $pdo->query($sql);

								while ($data=$req->fetch()) {

											echo "<option value=".$data->idSalle.">".$data->nom."</option>";
									}
								$req->closeCursor();
									 ?>
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

					<?php
					// sélection de tous les spectacles à venir
					$sql = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE date < '2017-05-01' ORDER BY date ASC";
									$req = $pdo->query($sql);

									while ($data=$req->fetch()) { ?>
										<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php?idSpectacle=<?php echo $data->idSpectacle  ?>" class="card-link"><?php echo affDate($data->date)." ".$data->spectacle." (".$data->salle.")" ?></a></li>
									<?php }
								$req->closeCursor(); ?>
					</ul>
			</div>
			<!-- Liste 2 -->
			<div class="card mx-auto">
				<ul class="list-group list-group-flush mx-auto">
					<?php
					// sélection de tous les spectacles à venir
					$sql = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE date >= '2017-05-01' AND date < '2017-09-01' ORDER BY date ASC";
									$req = $pdo->query($sql);

									while ($data=$req->fetch()) { ?>
										<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php?idSpectacle=<?php echo $data->idSpectacle  ?>" class="card-link"><?php echo affDate($data->date)." ".$data->spectacle." (".$data->salle.")" ?></a></li>
									<?php }
								$req->closeCursor(); ?>
				</ul>
			</div>
			<!-- Liste 3 -->
			<div class="card mx-auto">
				<ul class="list-group list-group-flush mx-auto">
					<?php
					// sélection de tous les spectacles à venir
					$sql = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE date >= '2017-09-01' ORDER BY date ASC";
									$req = $pdo->query($sql);

									while ($data=$req->fetch()) { ?>
										<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php?idSpectacle=<?php echo $data->idSpectacle  ?>" class="card-link"><?php echo affDate($data->date)." ".$data->spectacle." (".$data->salle.")" ?></a></li>
									<?php }
								$req->closeCursor(); ?>
				</ul>
			</div>
		</div>

	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

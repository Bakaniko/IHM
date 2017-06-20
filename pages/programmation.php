<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
// inclusion des fichiers de connexion
require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
require_once("$path_structure".'fonctions.php');# inclure la fonction debug
if(isset($_GET['annee'])){
	$annee=$_GET['annee'];
}
else{
	$annee=date("Y");
}


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
				<h4 class="card-title">Programmation <?php echo $annee; ?></h4>
				<p class="card-text">Chercher un spectacle</p>
				</div>


							<form action="<?php echo $path_pages;?>programmation.php" method="post">
								<div class="card-block text-center mx-auto">
									<div class="d-flex flex-row flex-wrap justify-content-center">
										<!-- Type -->
										<div class="form-group d-flex flex-column">
											<label for="typeSelect">Type</label>
											<select class="custom-select" id="typeSelect" name="typeSelect">
												<option selected>Choisir...</option>
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
										<!-- Mois -->
										<div class="form-group d-flex flex-column">
											<label for="moisSelect">Mois</label>
											<select class="custom-select" id="moisSelect" name="moisSelect">
												<option selected>Choisir...</option>
												<option value="01">Janvier</option>
												<option value="02">Février</option>
												<option value="03">Mars</option>
												<option value="04">Avril</option>
												<option value="05">Mai</option>
												<option value="06">Juin</option>
												<option value="07">Juillet</option>
												<option value="08">Août</option>
												<option value="09">Septembre</option>
												<option value="10">Octobre</option>
												<option value="11">Novembre</option>
												<option value="12">Décembre</option>
											</select>
										</div>
										<!-- Salle -->
										<div class="form-group d-flex flex-column">
											<label for="salleSelect">Salle</label>
											<select class="custom-select" id="salleSelect" name="salleSelect">
												<option selected>Choisir...</option>

												<?php //requête de sélection des noms de salle présents dans la base
												$sql = "SELECT DISTINCT(s.nom) as nom, s.idSalle from proj_Salle as s where 1 ORDER BY s.nom DESC";

												$req = $pdo->query($sql);

												while ($data=$req->fetch()) {

															echo "<option value=".$data->idSalle.">".$data->nom."</option>\n";
													}
												$req->closeCursor();
													 ?>
											</select>
										</div>
										<div class="form-group d-flex align-items-end">
											<button type="submit" class="btn btn-primary" name="btn-submit">Chercher</button>
										</div>
									</div>

								</form>

							</div>
							<!-- Fin du Formulaire critères de recherche-->
			<?php
			/* 	sortie de $_POST
					Array ( [typeSelect] => Ballet [moisSelect] => 1 [salleSelect] => 3 [btn-submit] => ) */
			//print_r($_POST);
			?>
			<!-- Formulaire critères de recherche -->
			<?php
				if(isset($_POST['btn-submit']) || ((isset($_POST['moisSelect']) && isset($_POST['typeSelect']) && isset($_POST['salleSelect'])) &&($_POST['moisSelect'] == "Choisir..." && $_POST['typeSelect'] == "Choisir..." && $_POST['salleSelect'] == "Choisir...")) ){
					// si le formulaire est utilisé ou les valeurs existent dans $_POST
					// récupération des valeurs fournies
					$mois = htmlspecialchars($_POST['moisSelect']);
					$type = htmlspecialchars($_POST['typeSelect']);
					$salle = htmlspecialchars($_POST['salleSelect']);
					echo "<p>".$mois.$type.$salle."</p>";
					/*
					$sql = "SELECT DISTINCT(s.type) as type from proj_Spectacle as s where 1 ORDER BY type ASC";

					$req = $pdo->query($sql);

					while ($data=$req->fetch()) {

					}*/
					//echo $annee;
					$dateDebut=$annee."-".$mois."01";
					if(intval($mois < 9)){
						$moisFin="0".(intval($mois)+1);
						$dateFin=$annee."-".$moisFin."01";
					}
					elseif ($mois < 12) {
						$moisFin=intval($mois)+1;
						$dateFin=$annee."-".$moisFin."01";
					}
					else{
						$moisFin=01;
						$dateFin=($annee+1)."-".$moisFin."01";
					}

					// sélection de tous les spectacles à venir - requête par défaut
					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE date < '".$annee."-05-01' ORDER BY date ASC";

					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE date >= '".$annee."-05-01' AND date < '2017-09-01' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE date >= '".$annee."-09-01' ORDER BY date ASC";

					/*
					$sql = "SELECT spe.type as type, r.date as date, s.nom, s.idSalle as salle, r.idRepresentation
					FROM proj_Representation as r
					JOIN proj_Spectacle as spe ON spe.idSpectacle=r.idSpectacle
					JOIN proj_Salle as s ON s.idSalle = r.idSalle
					WHERE date  ORDER BY date ASC";

					$req = $pdo->prepare($sql);

				if($req->execute(array('date' => $idSpectacle))){
								while ($data = $req->fetch()){

								}
*/
				if ($mois !== "Choisir..." && $type !== "Choisir..." && $salle !== "Choisir...") {
					//echo "1. 3 valeurs saisies";

					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND s.idSalle='".$salle."' AND
									date >= '".$annee."-".$mois."-01' AND date < '".$annee."-".$mois."-11' ORDER BY date ASC";
									//echo $sql1;
					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND s.idSalle='".$salle."' AND
									date >= '".$annee."-".$mois."-11' AND date < '".$annee."-".$mois."-21' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND s.idSalle='".$salle."' AND
									date >= '".$annee."-".$mois."-21' AND date <= '".$annee."-".$mois."-31' ORDER BY date ASC";

				}
				elseif($mois !== "Choisir..." && $type !== "Choisir..." && $salle == "Choisir..."){
					echo "2. mois + type -> ok";

					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND
									date >= '".$annee."-".$mois."-01' AND date < '".$annee."-".$mois."-11' ORDER BY date ASC";
									//echo $sql1;
					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND
									date >= '".$annee."-".$mois."-11' AND date < '".$annee."-".$mois."-21' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND
									date >= '".$annee."-".$mois."-21' AND date <= '".$annee."-".$mois."-31' ORDER BY date ASC";

				}
				elseif($mois == "Choisir..." && $type !== "Choisir..." && $salle !== "Choisir..."){
					echo " 3. type +salle -> ok";

					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND  salle ='".$salle."' AND
									date >= '".$annee."-01-01' AND date < '".$annee."-05-01' ORDER BY date ASC";
									//echo $sql1;
					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND  salle ='".$salle."' AND
									date >= '".$annee."-05-01' AND date < '".$annee."-09-01' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND  salle ='".$salle."' AND
									date >= '".$annee."-09-01' AND date <= '".$annee."-12-31' ORDER BY date ASC";


				}
				elseif($mois !== "Choisir..." && $type == "Choisir..." && $salle !== "Choisir..."){
					echo " 4. mois +salle";

					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE
									date >= '".$annee."-".$mois."-01' AND date < '".$annee."-".$mois."-11' ORDER BY date ASC";
									//echo $sql1;
					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE
									date >= '".$annee."-".$mois."-11' AND date < '".$annee."-".$mois."-21' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE
									date >= '".$annee."-".$mois."-21' AND date <= '".$annee."-".$mois."-31' ORDER BY date ASC";

				}
				elseif($mois == "Choisir..." && $type == "Choisir..." && $salle !== "Choisir..."){
					echo "5. salle uniquement -> ok";
					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE s.idSalle ='".$salle."' AND
									date >= '".$annee."-01-01' AND date < '".$annee."-05-01' ORDER BY date ASC";
									//echo $sql1;
					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE s.idSalle ='".$salle."' AND
									date >= '".$annee."-05-01' AND date < '".$annee."-09-01' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE s.idSalle ='".$salle."' AND
									date >= '".$annee."-09-01' AND date <= '".$annee."-12-31' ORDER BY date ASC";

				}
				elseif($mois !== "Choisir..." && $type == "Choisir..." && $salle == "Choisir..."){
					echo "6. mois uniquement -> ok";

					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE
									date >= '".$annee."-".$mois."-01' AND date < '".$annee."-".$mois."-11' ORDER BY date ASC";
									//echo $sql1;
					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE
									date >= '".$annee."-".$mois."-11' AND date < '".$annee."-".$mois."-21' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE
									date >= '".$annee."-".$mois."-21' AND date <= '".$annee."-".$mois."-31' ORDER BY date ASC";

				}
				elseif($mois == "Choisir..." && $type !== "Choisir..." && $salle == "Choisir..."){
					echo "7. type uniquement -> ok";

					$sql1 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND
									date >= '".$annee."-01-01' AND date < '".$annee."-05-01' ORDER BY date ASC";
									//echo $sql1;
					$sql2 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND
									date >= '".$annee."-05-01' AND date < '".$annee."-09-01' ORDER BY date ASC";

					$sql3 = "SELECT r.date as date, spe.nom as spectacle ,s.nom as salle, spe.idSpectacle
									FROM proj_Representation as r
									JOIN proj_Salle as s ON r.idSalle = s.idSalle
									JOIN proj_Spectacle as spe ON spe.idSpectacle = r.idSpectacle
									WHERE spe.type LIKE '".substr($type, 0, 2)."%' AND
									date >= '".$annee."-09-01' AND date <= '".$annee."-12-31' ORDER BY date ASC";

				}

						echo "<p>SQL1: ".$sql1."</p>";
						echo "<p>SQL2: ".$sql2."</p>";
						echo "<p>SQL3: ".$sql3."</p>";
						/*
						$req = $pdo->query($sql1);
						$data=$req->fetch();
						print_r($data);
			*/
?>	
				<!-- Listes de spectacles en sortie -->
				<div class="card-deck">
					<!-- Liste 1 -->
					<div class="card mx-auto">
						<ul class="list-group list-group-flush mx-auto">

							<?php

											$req = $pdo->query($sql1);

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

											$req = $pdo->query($sql2);

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

											$req = $pdo->query($sql3);

											while ($data=$req->fetch()) { ?>
												<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php?idSpectacle=<?php echo $data->idSpectacle  ?>" class="card-link"><?php echo affDate($data->date)." ".$data->spectacle." (".$data->salle.")" ?></a></li>
											<?php }
										$req->closeCursor(); ?>
						</ul>
					</div>
				</div>
		<?php	} // fin de si btn-submit validé ou 3 valeurs vides
				else { // si submit est vide ou les 3 valeurs ont vides
			  ?>





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
									WHERE date < '".$annee."-05-01' ORDER BY date ASC";
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
									WHERE date >= '".$annee."-05-01' AND date < '2017-09-01' ORDER BY date ASC";
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
									WHERE date >= '".$annee."-09-01' ORDER BY date ASC";
									$req = $pdo->query($sql);

									while ($data=$req->fetch()) { ?>
										<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php?idSpectacle=<?php echo $data->idSpectacle  ?>" class="card-link"><?php echo affDate($data->date)." ".$data->spectacle." (".$data->salle.")" ?></a></li>
									<?php }
								$req->closeCursor(); ?>
				</ul>
			</div>
		</div>
<?php } ?>
</div>
	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

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
<html lang="fr">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

	<!-- Contenu de la page spectacle -->

	<div class="container main" id="spectacle">
		<div class="card-deck">
			<div class="card m-auto">
				<div class="card-block text-center">
					<?php
					// récupération du paramètre passé par la méthode GET
					if(isset($_GET['idSpectacle'])){
						//$nomSpectacle ="'".htmlspecialchars($_GET['spectacle'])."'";
						$idSpectacle = intval($_GET['idSpectacle']);



					$sql  = 'SELECT spe.nom, r.date as date, spe.type, spe.infos, spe.nomImage
					FROM  proj_Representation as r
					JOIN proj_Spectacle as spe ON r.idSpectacle = spe.idSpectacle
					WHERE date >= CURRENT_DATE AND spe.idSpectacle = :idSpectacle ORDER BY DATE  ASC' ;

					$req = $pdo->prepare($sql);
					if($req->execute(array('idSpectacle' => $idSpectacle))){

						$data = $req->fetch();
						$req->closeCursor();
						?>

					<h3 class="card-title"><?php echo $data->nom; ?></h3>
					<h5 class="card-title">Prochaine représentation : <?php echo affDate($data->date);?></h5>
				</div>
				<img class="card-img-bottom img-fluid d-block mx-auto specImg" src="<?php echo $path_images.$data->nomImage;?>" alt="<?php echo "Affiche de ".$data->nom;?>">
			</div>
			<div class="card m-auto" id="spectacleText">
				<div class="card-block">
				<h4 class="card-title text-center">Présentation du spectacle</h4>
					<p class="card-text text-justify"><?php echo $data->infos;?></p>
				</div>
				<div class="card-block">
					<h4 class="card-title text-center">Représentations à venir</h4>
					<ul class="list-group list-group-flush">
						<?php

			// retourne ma date et le nom des prochaines représentations du spectacle passé par $_GET
						$sql = "SELECT r.date as date, spe.nom, r.idRepresentation as representation
						from proj_Representation as r
						JOIN proj_Spectacle as spe
						ON r.idSpectacle = spe.idSpectacle
						where r.idSpectacle = :idSpectacle
						AND r.date >= CURRENT_DATE
						ORDER BY date ASC";
										//echo $sql;
			//$req->bindParam(':idSpectacle', $idSpectacle, PDO::PARAM_INT,3);
			//echo $idSpectacle;


						$req = $pdo->prepare($sql);

						if($req->execute(array('idSpectacle' => $idSpectacle))){
							while ($data = $req->fetch()){ // tant que j'ai des objets qui sont retournés
								// afficher un bouton réserver pour chaque représentation
							?>

							<li class="list-group-item px-0">
							<div class="col-6 pl-0"><?php echo  affDate($data->date)." : ".$data->nom  ?></div>
							<div class="col-3 pl-0"><a class="btn btn-primary" href="<?php echo $path_pages ; ?>reservation.php?idRepresentation=<?php echo $data->representation ; ?>" role="button">Réserver</a></div>
							</li>

							<?php
						}
						$req->closeCursor();
					} // fin du if
				} //fin du si la requête retourne des informations
				else {
					?><h3 class="card-title">Spectacle indisponible</h3><?php
				}
				?>

				</ul>
			<?php }// fin du if isset
			else{ // la requête retourne une erreur.( par exemple spectacle inexistant)
				?><h3 class="card-title">Spectacle indisponible</h3><?php
			}
			?>
			</div>
		</div>
	</div>
</div>

<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

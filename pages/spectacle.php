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

	<!-- Contenu de la page spectacle -->

	<div class="container" id="main">

<?php

// récupération du paramètre passé par la méthode GET
if(isset($_GET['spectacle'])){
	$nomSpectacle ="'".htmlspecialchars($_GET['spectacle'])."'";
}
if(isset($_GET['idSpectacle'])){
	$idSpectacle = intval($_GET['idSpectacle']);

	$sql  = 'SELECT spe.nom, r.date as date, spe.type, spe.infos, spe.nomImage
					FROM  proj_Representation as r
					JOIN proj_Spectacle as spe ON r.idSpectacle = spe.idSpectacle
					WHERE date >= CURRENT_DATE AND spe.idSpectacle = :idSpectacle ORDER BY DATE  ASC' ;

	$req = $pdo->prepare($sql);
	if($req->execute(array('idSpectacle' => $idSpectacle))){

			$data = $req->fetch();
			$req->closeCursor();
		}

?>


		<div class="card mx-auto">
			<div class="card-block text-center">
				<h4 class="card-title"><?php echo $data->nom; ?></h4>
				<h5 class="card-title">Prochaine représentation : <?php echo affDate($data->date);?></h5>
			</div>
			<img class="card-img-bottom img-fluid d-block mx-auto" src="<?php echo $path_images.$data->nomImage;?>" alt="<?php echo "Affiche de ".$data->nom;?>">
			<div class="card-block">
				<p class="card-text text-justify"><?php echo $data->infos;?></p>
			</div>
			<div class="card-block text-center">
				<h4 class="card-title">Prochaines représentations</h4>
				<ul class="list-group list-group-flush mt-3">
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

													<li class="list-group-item"><?php echo  affDate($data->date)." : ".$data->nom  ?><a class="btn btn-lg btn-primary" href="<?php echo $path_pages ; ?>reservation.php?idRepresentation=<?php echo $data->representation ; ?>" role="button">Réserver</a></li>

								<?php
							}
							$req->closeCursor();
						} // fin du if?>

						</ul>
				</div>
		</div>


	<?php }
		else {
			echo "Page non disponible";
		}
	 ?>
	 </div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

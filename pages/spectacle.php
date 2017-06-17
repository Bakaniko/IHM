<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

// inclusion des fichiers de connexion
require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
require_once("$path_structure".'fonctions.php');# inclure la fonction debug

// récupération du paramètre passé par la méthode GET
$nomSpectacle ="'".$_GET['spectacle']."'";
$idSpectacle ="'".$_GET['idSpectacle']."'";

$sql  = 'SELECT spe.nom, r.date as date, spe.type, spe.infos, spe.nomImage
				FROM  proj_Representation as r
				JOIN proj_Spectacle as spe ON r.idSpectacle = spe.idSpectacle
				WHERE date >= CURRENT_DATE AND spe.idSpectacle = '.$idSpectacle.' ORDER BY DATE  ASC' ;
//print_r($_GET);
$req = $pdo->query($sql);
		$compteur=0;

		$data = $req->fetch();
		$req->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr" class="">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body class="">
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page spectacle -->

	<div class="container" id="main">
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
			<?php $sql = "SELECT r.date as date, spe.nom, r.idRepresentation
										from proj_Representation as r
										JOIN proj_Spectacle as spe
										ON r.idSpectacle=spe.idSpectacle
										where r.idSpectacle=".$idSpectacle."
										AND r.date >= CURRENT_DATE
										ORDER BY date ASC"; ?>

				<?php $req = $pdo->query($sql);

							while ($data = $req->fetch()){ // tant que j'ai des objets qui sont retournés
								// afficher un bouton réserver pour chaque représentation
								?>

													<li class="list-group-item"><?php echo  affDate($data->date)." : ".$data->nom  ?><a class="btn btn-lg btn-primary" href="<?php echo $path_pages ; ?>reservation.php" role="button">Réserver</a></li>

								<?php
							}
							$req->closeCursor(); ?>

						</ul>
				</div>
		</div>
	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

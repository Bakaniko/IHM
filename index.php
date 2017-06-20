<?php
session_start();

 // Définition des chemins d'accès aux fichiers
$path_root="./";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
require_once("$path_structure".'fonctions.php');# inclure la fonction debug

?>

<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

	<!-- Contenu de la page d'accueil -->

	<div class="container" id="main">
		<div class="card mx-auto text-center">
			<h2>Prochaines représentations</h2>
		</div>
		<!--
		<div class="btn-group-vertical" id="btnTaillePolice" role="group" aria-label="Taille de police">
			<button class="btn btn-secondary font-weight-bold" id="zoomIn">+</button>
			<button class="btn btn-secondary font-weight-bold" id="zoomOut">-</button>
		</div>

	-->
		<div class="card-deck" id="indexImg">
<?php
				//date_format(r.date, "%d %M %Y") as date
				$sql  = $sql  = 'SELECT spe.nom, r.date as date, spe.type, spe.infos, spe.nomImage, spe.idSpectacle as id
                FROM  proj_Representation as r
                JOIN proj_Spectacle as spe ON r.idSpectacle = spe.idSpectacle
                WHERE r.date >= CURRENT_DATE ORDER BY date ASC LIMIT 5';

        $req = $pdo->query($sql);
					while ($data = $req->fetch()){
															?>
						<div class="card">
							<a href="<?php echo $path_pages.'spectacle.php?spectacle='.$data->nom.'&idSpectacle='.$data->id;?>" class="card-link">
								<div class="card-block text-center">
									<h4 class="card-title" id="indexTitreSpec"><?php echo $data->nom;?></h4>
									<h6 class="card-title"><?php echo affDate($data->date);?></h6>
								</div>
								<img class="card-img-bottom img-fluid d-block mx-auto" src="<?php echo $path_images.$data->nomImage;?>" alt="<?php echo "Affiche de ".$data->nom;?>">
							</a>
						</div>

							<?php

            }
						 $req->closeCursor();
            ?>
	</div>
</div>
<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

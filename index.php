<?php // Définition des chemins d'accès aux fichiers
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

		<div class="card mx-auto">
			<div class="card-block text-center">


				<!--
				<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
				<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
				<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
				<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
				<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
				<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
				<li class="list-group-item"><a href="<?php echo $path_pages ; ?>spectacle.php" class="card-link">Date et titre du spectacle + informations</a></li>
			</ul>

		-->

			<?php
				//date_format(r.date, "%d %M %Y") as date
				$sql  = $sql  = 'SELECT spe.nom, r.date as date, spe.type, spe.infos, spe.nomImage, spe.idSpectacle as id
                FROM  proj_Representation as r
                JOIN proj_Spectacle as spe ON r.idSpectacle = spe.idSpectacle
                WHERE r.date >= CURRENT_DATE ORDER BY date ASC LIMIT 6';

        $req = $pdo->query($sql);
						$compteur=0;

            while ($data = $req->fetch()){
							if($compteur==0){
								?>
							<h4 class="card-title"><a href="<?php echo $path_pages.'spectacle.php?spectacle='.$data->nom.'&idSpectacle='.$data->id;?>" class="card-link"><?php echo $data->nom;?></a></h4>
							<h5 class="card-title"><?php echo affDate($data->date);?></h5>

							</div>
							<img class="card-img-bottom img-fluid d-block mx-auto" src="<?php echo $path_images.$data->nomImage;?>" alt="<?php echo "Affiche de ".$data->nom;?>">

							<p class="card-text"><?php echo $data->infos;?></p>

							<ul class="list-group list-group-flush mt-3">
							<?php
							}
							else{
								echo '<li class="list-group-item"><a href="'.$path_pages.'spectacle.php?spectacle='.$data->nom.'&idSpectacle='.$data->id.'"class="card-link">'.affDate($data->date)." : ".$data->nom.','.$data->type.'</a></li>';
							}
							$compteur++;
            }
          $req->closeCursor();
            ?>

        </ul>
		</div>
	</div>
</div>
<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

<?php // Définition des chemins d'accès aux fichiers
session_start();
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

//require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
?>
<?php
//$connect = mysqli_connect("localhost", "nicolas", "omkivyeik8", "p18_nicolas");
$connect = mysqli_connect("localhost", "bilo", "defvearsh7", "p18_bilo");
$categorie = '';
$handi='';
$rang='';
$numero='';
$query = "SELECT Categorie FROM proj_Place where proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) Group by Categorie ";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
 $categorie .= "<option value=".$row["Categorie"].">".$row["Categorie"]."</option>";
}

$query = "SELECT DISTINCT Handicap FROM proj_Place where proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) GROUP BY Handicap";
  $result = mysqli_query($connect, $query);
   while($row = mysqli_fetch_array($result))
  {
   $handi .= '<option value="'.$row["Handicap"].'">'.$row["Handicap"].'</option>';
  }
  
$query = "SELECT DISTINCT Ranger FROM proj_Place where proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) GROUP BY Ranger";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
  {
   $rang .= '<option value="'.$row["Ranger"].'">'.$row["Ranger"].'</option>';
  }
 
$query = "SELECT DISTINCT Numero FROM proj_Place where proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) GROUP BY Numero";
  $result = mysqli_query($connect, $query);
   while($row = mysqli_fetch_array($result))
  {
   $numero .= '<option value="'.$row["Numero"].'">'.$row["Numero"].'</option>';
  }
  
?>
<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

	<!-- Contenu de la page spectacle -->

	<div class="container main">
		<!-- Interface de Sélection des places -->
		<div class="card mx-auto">
			<!-- Titre -->
			<div class="card-block text-center">
				<h4 class="card-title">Sélectionnez vos places</h4>
			</div>
			<!-- Formulaire de sélection des places -->
			<div class="card-block text-center mx-auto">
				<form>
					<div class="d-flex flex-row flex-wrap justify-content-center">
						<!-- Sélection catégorie -->
						<div class="form-group d-flex flex-column">
							<label for="categorie">Catégorie</label>
							<select class="custom-select action" name="categorie" id="categorie">
								<option value="">Choisir</option>
									<?php echo $categorie;?>
							</select>
						</div>
						<!-- Sélection Handicap -->
						<div class="form-group d-flex flex-column">
							<label for="handicap">Accessibilité requise ?</label>
							<select class="custom-select action" name="handicap" id="handicap">
								<option value="">Choisir</option>
									<?php echo $handi;?>
							</select>
						</div>
						<!-- Sélection rangée -->
						<div class="form-group d-flex flex-column">
							<label for="ranger">Rangée</label>
							<select class="custom-select action" name="ranger" id="ranger">
								<option value="">Rangées disponibles</option>
									<?php echo $rang;?>
							</select>
						</div>
						<!-- Sélection numéro -->
						<div class="form-group d-flex flex-column">
							<label for="numero">Numéro</label>
							<select class="custom-select" name="numero" id="numero">
								<option value="">Places disponibles</option>
								<?php echo $numero;?>
							</select>
						</div>
						<!-- Boutton d'envoi -->
						<div class="form-group d-flex align-items-end">
							<button type="submit" class="btn btn-success" value="Envoyer">
								<i class="fa fa-check mr-2" aria-hidden="true"></i>
								Ajouter au panier
							</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Fin du formulaire de sélection des places -->
			<!-- Lien vers panier.php -->
			<div class="card-block text-center">
				<a class="btn btn-primary" href="<?php echo $path_pages ; ?>panier.php" role="button">Aller au panier</a>
			</div>
		</div>
		<!-- Fin de l'interface de Sélection des places -->
		<!-- Interface graphique de sélection des places-->
		<div class="d-flex flex-row justify-content-center">
			<?php include($path_pages."salle-1.php"); ?> <!-- Inclusion svg salle 1 -->
		</div>
		<!-- Fin de l'interface graphique de sélection des places-->
	</div>

	<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
<script>
<?php include($path_pages."recherche_place.js"); ?> <!-- Inclusion la page js de requête de recherche de place-->
</script>

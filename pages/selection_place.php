<?php // Définition des chemins d'accès aux fichiers
session_start();
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>

<?php
require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas

if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "categorie")
 {
  $query = "SELECT DISTINCT Handicap FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) AND Categorie = '".$_POST["query"]."'";
  $result = mysqli_query($connect, $query);
 $output .= '<option value="">Choisir</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Handicap"].'">'.$row["Handicap"].'</option>';
  }
 }
 else if($_POST["action"] == "handicap")
 {
  $query = "SELECT DISTINCT Ranger FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) AND Handicap = '".$_POST["query"]."'";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Choisir</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Ranger"].'">'.$row["Ranger"].'</option>';
  }
 }
  else if($_POST["action"] == "ranger")
 {
  $query = "SELECT DISTINCT Numero FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) AND Ranger = '".$_POST["query"]."'";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Choisir</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Numero"].'">'.$row["Numero"].'</option>';
  }
 }
 echo $output;
}


?>

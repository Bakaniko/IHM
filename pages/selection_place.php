<?php
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas


if(isset($_POST["action"]))
{
 $connect = $pdo;
 $output = '';

 if($_POST["action"] == "categorie")
 {
  $sql = "SELECT Distinct Handicap FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT proj_Reservation.idPlace FROM proj_Reservation)
							AND Categorie = '".$_POST["sql"]."' ORDER BY Handicap";


  $req = $pdo->query($sql);
  $output .= '<option value="">Selectionner le type</option>';
  while($row = $req->fetch())
  {
   $output .= '<option value="'.$row->Handicap.'">'.$row->Handicap.'</option>';
  }
 }
 if($_POST["action"] == "handicap")
 {
  $sql = "SELECT Distinct Rang FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT proj_Reservation.idPlace FROM proj_Reservation)
							AND Handicap ='".$_POST["sql"]."'ORDER BY Rang" or die(print_r($bd->errorInfo()));
  $req = $pdo->query($sql);
  $output .= '<option value="">Choisir votre rangé</option>';
  while($row = $req->fetch())
  {
   $output .= '<option value="'.$row->Rang.'">'.$row->Rang.'</option>';
  }

 }
 if($_POST["action"] == "ranger")
 {
  $sql = "SELECT Distinct Numero FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT proj_Reservation.idPlace FROM proj_Reservation)
							AND Ranger ='".$_POST["sql"]."'ORDER BY Numero" or die(print_r($bd->errorInfo()));
    $req = $pdo->query($sql);
  $output .= '<option value="">Selectionner votre place</option>';
  while($row = $req->fetch())
  {
   $output .= '<option value="'.$row->Numero.'">'.$row->Numero.'</option>';
  }
}
 echo $output;
}
?>

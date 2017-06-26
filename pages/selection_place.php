<?php
//fetch.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect('mysql:dbname=p18_nicolas;host=localhost','nicolas','omkivyeik8');
 $output = '';

 if($_POST["action"] == "categorie")
 {
  $query = "SELECT Distinct Handicap FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT proj_reservation.idPlace FROM proj_reservation) 
							AND Categorie = '".$_POST["query"]."'ORDER BY Handicap";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Selectionner le type</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Handicap"].'">'.$row["Handicap"].'</option>';
  }
 }
 if($_POST["action"] == "handicap")
 {
  $query = "SELECT Distinct Rang FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT proj_reservation.idPlace FROM proj_reservation) 
							AND Handicap ='".$_POST["query"]."'ORDER BY Rang" or die(print_r($bd->errorInfo())); 
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Choisir votre rangé</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Rang"].'">'.$row["Rang"].'</option>';
  }
  
 }
 if($_POST["action"] == "ranger")
 {
  $query = "SELECT Distinct Numero FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT proj_reservation.idPlace FROM proj_reservation) 
							AND Ranger ='".$_POST["query"]."'ORDER BY Numero" or die(print_r($bd->errorInfo())); 
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Selectionner votre place</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Numero"].'">'.$row["Numero"].'</option>';
  }
 }
 echo $output;
}
?>

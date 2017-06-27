<?php
//fetch.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "bilo", "defvearsh7", "p18_bilo");
 $output = '';
 if($_POST["action"] == "categorie")
 {
  $query = "SELECT Handicap FROM proj_Place WHERE proj_Place.idPlace NOT IN (SELECT  proj_Reservation.idRepresentation FROM proj_Reservation join
			 proj_Representation on proj_Reservation.idRepresentation =proj_Representation.idRepresentation) AND Categorie = '".$_POST["query"]."'";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select Handicap</option>';
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
  $output .= '<option value="">Select Ranger</option>';
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
  $output .= '<option value="">Select Numero</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["Numero"].'">'.$row["Numero"].'</option>';
  }
 }
 echo $output;
}


?>

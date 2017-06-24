<?php

// Ajout d'un utilisateur dans la Base

$sql = "INSERT INTO
  `proj_Utilisateur` (
      `idUtilisateur`,
      `login`,
      `passHash`,
      `nom`,
      `prenom`,
      `adressePostale1`,
      `adressePostale2`,
      `codePostal`,
      `ville`,
      `adresseMail`,
      `telephone`,
      `typeUtilisateur`)
    VALUES (
        NULL,
        \'niko\',
        \'$2y$10$zsvTwVw.4WKjqIUvBZWXE.ySB7jb5DrhLsRqAyDkGjVnRLFGfuG2m\',
        \'Niko\',
        \'Nicolas\',
        \'Université Paris8\',
        \'2 rue de la Liberté\',
        \'93526\',
        \'Saint-Denis cedex \',
        \'youpitralala126@yopmail.com\',
        \'001122334455\',
        \'admin\')";


// insérer une salle

$sql = "INSERT INTO
          `proj_Salle` (
            `idSalle`,
            `nom`,
            `adresse`,
            `type`)
        VALUES (
          NULL,
          \'salleTest\',
          \'Rue du Théatre \n". "84000 AVIGNON\',
          \'Théatre\')";

  // rechercher une représentation dans une salle après une date donnée
  $sql = "SELECT * \n"
    . "from proj_Representation as r \n"
    . "JOIN proj_Spectacle as spe ON (spe.idSpectacle = r.idSpectacle) \n"
    . "JOIN proj_Salle as sa ON (sa.idSalle = r.idSalle)\n"
    . "\n"
    . "where r.date > 20170601 and sa.nom=\"Opéra Bastille\"";

    // Rechercher les places à moins de 120 euros des spectacles ayant lieu à l'opéra bastille après le 01/06/2017

    $sql = "SELECT distinct(cat.Categorie),spe.nom, r.date, prix.Prix\n"
    . "from proj_Representation as r \n"
    . "JOIN proj_Spectacle as spe ON (spe.idSpectacle = r.idSpectacle) \n"
    . "JOIN proj_Salle as sa ON (sa.idSalle = r.idSalle)\n"
    . "JOIN proj_Categorie as cat ON (cat.idSalle = sa.idSalle)\n"
    . "JOIN proj_PrixPlace as prix ON (prix.idCategorie = cat.idCategorie)\n"
    . "where r.date > 20170601 and sa.nom=\"Opéra Bastille\" and prix.Prix < 120";


    // récupérer les 6 prochains spectacles
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

<?php
  // récupérer les prochaines réservations d'un utilisateur

  $sql = "SELECT u.idUtilisateur, u.nom, rep.date as date, spe.nom, r.idPlace, p.Categorie
          FROM `proj_Reservation` as r
          JOIN proj_utilisateur as u ON r.idUtilisateur= u.idUtilisateur
          JOIN proj_Representation as rep ON r.idRepresentation = rep.idRepresentation
          JOIN proj_Spectacle as spe ON spe.idSpectacle=rep.idSpectacle
          JOIN proj_Place as p ON p.idPlace= r.idPlace
          WHERE u.idUtilisateur = 3 and rep.date >= CURRENT_DATE ORDER BY date ASC";


 ?>

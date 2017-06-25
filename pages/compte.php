<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>
<?php
// Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";

require_once"$path_structure".'fonctions.php';# inclure la fonction debug  <?php session_start();
if (!isset($_SESSION['auth'])){
$_SESSION['flash']['danger']="Vous n'avez pas le droit d'accèder à cette page";
header('Location:connexion.php');
}if (isset($_SESSION['auth']) && ($_SESSION['auth']->typeUtilisateur=='admin')) {
 header('Location:gestion.php');
}
else {
   $_SESSION['flash']['success']= "Bienvenue".$_SESSION['auth']->nom." ".$_SESSION['auth']->prenom." !";
	debug($_SESSION);
}

?>


<?php
// Accès à la base
require_once"$path_structure".'base.php';# cette instruction est déjà effectuée à la ligne 32

?>
<!-- PHP qui gère le formulaire -->
<?php
if (!empty($_POST)) {
	require_once"$path_structure".'base.php';# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
	require_once"$path_structure".'fonctions.php';# inclure la fonction debug
	if (!empty($_POST['inputpseudo']) && !preg_match('/^[A-Za-z0-9]+$/',$_POST['inputpseudo'])){
		$_SESSION['flash']['danger']= "Votre  nouveau pseudo n'est pas valide !";
	}else if(!empty($_POST['inputpseudo']) && preg_match('/^[A-Za-z0-9]+$/',$_POST['inputpseudo'])){
	$user_id=$_SESSION['auth']->idUtilisateur; # Je récupère l'id utilisateur qui vient de se connecter je l'affecte àla variable $user_id que je met en parametre dans ma requete sql pour changer les infos
    $req=$pdo->prepare("UPDATE proj_utilisateur SET login =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputpseudo'],$user_id]);
    $_SESSION['flash']['success']= "Votre pseudo a été mis à jour !";
    }if (!empty($_POST['inputNom']) && !preg_match('/^[A-Za-z]+$/',$_POST['inputNom'])){
		$_SESSION['flash']['danger']= "Votre  nouveau nom n'est pas valide !";
	}else{
	$user_id=$_SESSION['auth']->idUtilisateur;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET nom =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputNom'],$user_id]);
    $_SESSION['flash']['success']= "Votre nom a été mis à jour !";

    }if (!empty($_POST['inputPrenom']) && !preg_match('/^[A-Za-z]+$/',$_POST['inputPrenom'])){
		$_SESSION['flash']['danger']= "Votre  nouveau prenom n'est pas valide !";
	}else{
	$user_id=$_SESSION['auth']->idUtilisateur;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET prenom =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputPrenom'],$user_id]);
    $_SESSION['flash']['success']= "Votre nom a été mis à jour !";

    }if (!empty($_POST['inputEmail'])&& !filter_var($_POST['inputEmail'],FILTER_VALIDATE_EMAIL)){
		$_SESSION['flash']['danger']="Votre nouveau mail n'est pas !";
	}else{
		$user_id=$_SESSION['auth']->idUtilisateur ;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET adresseMail =? WHere idUtilisateur=?");
    $req->execute ([$_POST['inputEmail'],$user_id]);
    $_SESSION['flash']['success']= "L'Email a été mis à jour !";
  }if (!empty($_POST['inputMotDePasse']) || ($_POST['inputMotDePasse']!= $_POST['inputMotDePasse2'])){
		$_SESSION['flash']['danger']= "Les mots de passe ne correspondent pas !";
	}elseif(!empty($_POST['inputMotDePasse']) && ($_POST['inputMotDePasse'] == $_POST['inputMotDePasse2'])){
		$user_id=$_SESSION['auth']->idUtilisateur ;
		$hashmod=password_hash($_POST['inputMotDePasse'], PASSWORD_BCRYPT);
    $req=$pdo->prepare("UPDATE proj_utilisateur SET passHash =? WHERE idUtilisateur=?");
    $req->execute ([$hashmod,$user_id]);
    $_SESSION['flash']['success']= "Le mot de passe a été mis à jour !";
    }if (!empty($_POST['inputAdressePostale1']) && !preg_match('/^[A-Za-z0-9]+$/',$_POST['inputAdressePostale1'])){
		$_SESSION['flash']['danger']= "Votre  nouveau code postale n'est pas valide !";
	}else{
	$user_id=$_SESSION['auth']->idUtilisateur;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET adressePostale1 =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputAdressePostale1'],$user_id]);
    $_SESSION['flash']['success']= "Votre code postale N#1 a été mis à jour !";
    }if (!empty($_POST['inputAdressePostale2']) && !preg_match('/^[A-Za-z0-9]+$/',$_POST['inputAdressePostale2'])){
		$_SESSION['flash']['danger']= "Votre  nouvelle adresse n'est pas valide !";
	}else{
	$user_id=$_SESSION['auth']->idUtilisateur;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET adressePostale2 =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputAdressePostale2'],$user_id]);
    $_SESSION['flash']['success']= "Votre code postale N#2 a été mis à jour !";

    }if (!empty($_POST['inputCodePostal']) && !preg_match('/^[0-9]{5}$/',$_POST['inputCodePostal'])){
		$_SESSION['flash']['danger']= "Votre  nouvelle adresse n'est pas valide !";
	}else{
	$user_id=$_SESSION['auth']->idUtilisateur;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET codePostal =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputCodePostal'],$user_id]);
    $_SESSION['flash']['success']= "Votre code postale a été mis à jour !";

    }if (!empty($_POST['inputVille']) && !preg_match('/^[A-Za-z]+$/',$_POST['inputVille'])){
		$_SESSION['flash']['danger']= "Votre  nouvelle ville de résidence n'est pas valide !";
	}else{
	$user_id=$_SESSION['auth']->idUtilisateur;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET ville =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputVille'],$user_id]);
    $_SESSION['flash']['success']= "Votre ville de résidence a été mise à jour !";
    }if (!empty($_POST['inputTel']) && !preg_match('/^[0-9]{10}$/',$_POST['inputTel'])){
		$_SESSION['flash']['danger']= "Votre numéro de téléphone n'est pas valide !";
	}else{
	$user_id=$_SESSION['auth']->idUtilisateur;
    $req=$pdo->prepare("UPDATE proj_utilisateur SET telephone =? WHERE idUtilisateur=?");
    $req->execute ([$_POST['inputTel'],$user_id]);
    $_SESSION['flash']['success']= "Votre numéro de téléphone a été mis à jour !";
    }
    header('Location:compte.php');
    $_SESSION['flash']['success']= "Vos changements ont été pris en compte";
}
?>


<?php


?>

<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body>
<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

  <!-- afficher les message flash s'il y en a-->
    <?php if (isset($_SESSION['flash'])):?>
		<?php foreach ($_SESSION['flash'] as $type=>$message):?>
		 <div class="alert alert-<?=$type;?>">
		 <?=$message;?>
		</div>
		<?php endforeach;?>
		 <?php unset($_SESSION['flash']);?>
		<?php endif;?>

	<div class="container main" id="compte">
		<div class="card mx-auto text-center">
			<h2>Mes réservations</h2>
		</div>
		<div class="card mx-auto text-center">
			<h2>Mes coordonnées</h2>
		</div>
      <!-- Formulaire de modification -->
      <div class="card-block text-center">
        <h4 class="card-title">Modifiez vos identifiants</h4>
      </div>
      <form action="" method="POST">
					<div class="form-group row">
						<label for="inputpseudo" class="col-3 col-form-label">Modifier votre pseudo</label>
						<div class="col-9">
							<input type="text" class="form-control" name="inputpseudo" id="inputpseudo" value="<?php echo $_SESSION['auth']->login; ?>">
						</div>
					</div>
          <div class="form-group row">
            <label for="inputMotDePasse" class="col-3 col-form-label"> Modifier votre mot de passe</label>
            <div class="col-9">
              <input type="password" class="form-control" name="inputMotDePasse" id="inputMotDePasse">
            </div>
          </div>
           <div class="form-group row">
            <label for="inputMotDePasse2" class="col-3 col-form-label"> Confirmer le nouveau mot de passe</label>
            <div class="col-9">
              <input type="password" class="form-control" name="inputMotDePasse2" id="inputMotDePasse2">
            </div>
          </div>
		<div class="form-group row">
			<button type="submit" class="btn btn-primary mx-auto">Enregistrer vos modifications</button>
		</div>
	</form>

		<div class="card mx-auto text-center">
			<h2>Mes coordonnées</h2>
		</div>
      <!-- Formulaire de modification -->
      <div class="card-block text-center">
        <h4 class="card-title">Modifiez vos coordonnées</h4>
      </div>
      <form action="" method="POST">
         <div class="form-group row">
          <label for="inputNom" class="col-3 col-form-label">Nom</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputNom" name="inputNom" value="<?php echo $_SESSION['auth']->nom; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPrenom" class="col-3 col-form-label">Prénom</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputPrenom" name="inputPrenom" value="<?php echo $_SESSION['auth']->prenom; ?> ">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail" class="col-3 col-form-label">Adresse email</label>
          <div class="col-9">
            <input type="email" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="emailHelp" value="<?php echo $_SESSION['auth']->adresseMail; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAdressePostale1" class="col-3 col-form-label">Adresse postale 1</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputAdressePostale1" name="inputAdressePostale1" value="<?php echo $_SESSION['auth']->adressePostale1; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAdressePostale2" class="col-3 col-form-label">Adresse postale 2</label>
          <div class="col-9">
          <input type="text" class="form-control" id="inputAdressePostale2"  name="inputAdressePostale2" value="<?php echo $_SESSION['auth']->adressePostale2; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputCodePostal" class="col-3 col-form-label">Code postal</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputCodePostal" name="inputCodePostal" value="<?php echo $_SESSION['auth']->codePostal; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputVille" class="col-3 col-form-label">Ville</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputVille" name="inputVille" value="<?php echo $_SESSION['auth']->ville; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputTel" class="col-3 col-form-label">Téléphone</label>
          <div class="col-9">
            <input class="form-control" type="tel" name="inputTel" id="inputTel" value="<?php echo $_SESSION['auth']->telephone; ?>">
          </div>
        </div>

        <div class="form-group row">
          <button type="submit" class="btn btn-primary mx-auto">Enregistrer vos modifications</button>
        </div>
      </form>
    </div>
    <!-- Fin du formulaire -->
<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

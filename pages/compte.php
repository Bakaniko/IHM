<?php session_start();
// Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
// inclusion des fichiers de connexion
require_once("$path_structure".'base.php');# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
require_once("$path_structure".'fonctions.php');# inclure la fonction debug


$userId=
?>

<!DOCTYPE html>
<html lang="fr" class="">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body class="">
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page de Compte client -->

	<div class="container" id="main">
		<div class="card mx-auto text-center">
			<h2>Mes réservations</h2>
		</div>
		<div class="card mx-auto text-center">

			<!-- Formulaire d'inscription -->
      <div class="card-block text-center">
        <h4 class="card-title">Mes Informations</h4>
      </div>
      <form>
        <div class="form-group row">
          <label for="inputNom" class="col-3 col-form-label">Nom</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputNom" placeholder="Pinpin">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPrenom" class="col-3 col-form-label">Prénom</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputPrenom" placeholder="Lapin">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail" class="col-3 col-form-label">Adresse email</label>
          <div class="col-9">
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="pinpin.lapin@gmail.com">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAdressePostale1" class="col-3 col-form-label">Adresse postale 1</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputAdressePostale1" placeholder="2 Rue de la carotte">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAdressePostale2" class="col-3 col-form-label">Adresse postale 2</label>
          <div class="col-9">
          <input type="text" class="form-control" id="inputAdressePostale2" placeholder="Escalier B">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputCodePostal" class="col-3 col-form-label">Code postal</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputCodePostal" placeholder="88600">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputVille" class="col-3 col-form-label" class="col-2 col-form-label">Ville</label>
          <div class="col-9">
            <input type="text" class="form-control" id="inputVille" placeholder="Bois-de-Champ">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputTel" class="col-3 col-form-label">Téléphone</label>
          <div class="col-9">
            <input class="form-control" type="tel" value="1-(555)-555-5555" id="inputTel">
          </div>
        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-primary mx-auto">Modifier</button>
        </div>
      </form>
    </div>
    <!-- Fin du formulaire -->

		<div class="card mx-auto text-center">

			<!-- Formulaire de changement de mot de passe-->
      <div class="card-block text-center">
        <h4 class="card-title">Changer de mot de passe</h4>
      </div>
      <form>
				<div class="form-group row">
					<label for="inputMotDePasse" class="col-3 col-form-label">Ancien mot de passe</label>
					<div class="col-9">
						<input type="password" class="form-control" id="AncientMotDePasse" placeholder="************">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputMotDePasse" class="col-3 col-form-label">Nouveau mot de passe</label>
					<div class="col-9">
						<input type="password" class="form-control" id="inputMotDePasse1" placeholder="************">
					</div>
				</div>
        <div class="form-group row">
          <label for="inputMotDePasse" class="col-3 col-form-label">Mot de passe</label>
          <div class="col-9">
            <input type="password" class="form-control" id="inputMotDePasse2" placeholder="************">
          </div>
        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-primary mx-auto">Modifier</button>
        </div>
      </form>
    </div>
    <!-- Fin du formulaire de changement de mot de passe -->
		</div>

	</div>
	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>

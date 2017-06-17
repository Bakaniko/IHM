<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>

<!DOCTYPE html>
<html lang="fr" class="">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body class="">
  <?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

  <!-- Contenu de la page de connexion -->

  <div class="container" id="main">
    <div class="card mx-auto">
      <!-- Formulaire d'inscription -->
      <div class="card-block text-center">
        <h4 class="card-title">Formulaire d'inscription</h4>
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
          <label for="inputMotDePasse" class="col-3 col-form-label">Mot de passe</label>
          <div class="col-9">
            <input type="password" class="form-control" id="inputMotDePasse" placeholder="************">
          </div>
        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-primary mx-auto">Inscription</button>
        </div>
      </form>
    </div>
    <!-- Fin du formulaire -->
  </div>
</div>




<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
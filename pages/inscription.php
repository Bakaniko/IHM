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
    <div class="card m-auto">
      <!-- Formulaire d'inscription -->
      <div class="card-block text-center">
        <h4 class="card-title">Formulaire d'inscription</h4>
        <form>
          <div class="form-group">
            <label for="inputEmail">Prénom</label>
            <input type="text" class="form-control mx-auto text-center" id="inputPrenom" placeholder="lapin">
          </div>
          <div class="form-group">
            <label for="inputEmail">Nom</label>
            <input type="text" class="form-control mx-auto text-center" id="inputNom" placeholder="pinpin">
          </div>
          <div class="form-group">
            <label for="inputEmail">Adresse email</label>
            <input type="email" class="form-control mx-auto text-center" id="inputEmail" aria-describedby="emailHelp" placeholder="pinpin.lapin@gmail.com">
          </div>
          <div class="form-group">
            <label for="inputAdressePostale1">Adresse postale 1</label>
            <input type="text" class="form-control mx-auto text-center" id="inputAdressePostale1" placeholder="2 rue de la carotte">
          </div>
          <div class="form-group">
            <label for="inputAdressePostale2">Adresse postale 2</label>
            <input type="text" class="form-control mx-auto text-center" id="inputAdressePostale2" placeholder="2 rue de la carotte">
          </div>
          <div class="form-group">
            <label for="inputCodePostal">Code postal</label>
            <input type="number" class="form-control mx-auto text-center" id="inputCodePostal" placeholder="88600">
          </div>
          <div class="form-group">
            <label for="inputVille">Ville</label>
            <input type="text" class="form-control mx-auto text-center" id="inputVille" placeholder="Bois-de-Champ">
          </div>
          <div class="form-group">
            <label for="inputTel">Téléphone</label>
            <input class="form-control mx-auto text-center" type="tel" value="1-(555)-555-5555" id="inputTel">
          </div>
          <div class="form-group">
            <label for="inputMotDePasse">Mot de passe</label>
            <input type="password" class="form-control mx-auto text-center" id="inputMotDePasse" placeholder="************">
          </div>
          <button type="submit" class="btn btn-primary">Inscription</button>
        </form>
      </div>
      <!-- Fin du formulaire -->
    </div>
  </div>




  <?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
  <?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
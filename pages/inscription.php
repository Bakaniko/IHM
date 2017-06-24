<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>

<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body>
    <?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

    <!-- Contenu de la page d'inscription -->

    <div class="container main" id="inscription">
        <!-- Formulaire d'inscription -->
        <div class="card mx-auto">
            <div class="card-block text-center">
                <h4 class="card-title">Formulaire d'inscription</h4>
            </div>
            <form method="POST" action="">
                <!-- Informations civiles -->
                <div class="form-group row">
                    <label for="Nom" class="col-3 col-form-label">Nom</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="Nom" placeholder="Pinpin">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Prenom" class="col-3 col-form-label">Prénom</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="Prenom" placeholder="Lapin">
                    </div>
                </div>
                <!-- Informations de connexion -->
                <div class="form-group row">
                    <label for="Login" class="col-3 col-form-label">Login</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="Login" placeholder="LapinAnonyme">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="MotDePasse" class="col-3 col-form-label">Mot de passe</label>
                    <div class="col-9">
                        <input type="password" class="form-control" name="MotDePasse" placeholder="************">
                    </div>
                </div>
                <!-- Informations de contact -->
                <div class="form-group row">
                    <label for="Email" class="col-3 col-form-label">Email</label>
                    <div class="col-9">
                        <input type="email" class="form-control" name="Email" placeholder="pinpin.lapin@gmail.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tel" class="col-3 col-form-label">Téléphone</label>
                    <div class="col-9">
                        <input type="tel" class="form-control" name="Tel" value="1-(555)-555-5555">
                    </div>
                </div>
                <!-- Informations de localisation -->
                <div class="form-group row">
                    <label for="Adresse1" class="col-3 col-form-label">Adresse 1</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="Adresse1" placeholder="2 Rue de la carotte">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Adresse2" class="col-3 col-form-label">Adresse 2</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="Adresse2" placeholder="Escalier B">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CodePostal" class="col-3 col-form-label">Code postal</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="CodePostal" placeholder="88600">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ville" class="col-3 col-form-label">Ville</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="Ville" placeholder="Bois-de-Champ">
                    </div>
                </div>
                <!-- Boutton d'envoi-->
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary mx-auto" value="Envoyer">Inscription</button>
                </div>
            </form>
        </div>
        <!-- Fin du formulaire d'inscription-->
    </div>



    <?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
    <?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
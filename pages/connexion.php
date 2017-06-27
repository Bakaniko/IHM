<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>
<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>
<?php
if (!empty($_POST)) {
  $warning=array();  # est un tableau associatif qui contient toutes les erreures eventuelles l'ors de la saisie du formulaire
  require_once"$path_structure".'base.php';# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
  require_once"$path_structure".'fonctions.php';# inclure la fonction debug

    if (empty($_POST['user_login'])){
    $warning['login'] = "Veuillez entrer votre pseudo !";
  } else if (empty($_POST['inputMotDePasse'])){
    $warning['inputMotDePasse'] = "Veuillez sasir votre mot de passe !";
  }else{
    $req=$pdo->prepare('SELECT * FROM proj_utilisateur WHERE (login= :user_login OR adresseMail= :user_login) and date_confirmation IS NOT NULL'); # verifier si le login existe en et que le compte est confirmé
    $req->execute (['user_login'=>$_POST['user_login']]);
    $inscrit=$req->fetch();
         if (password_verify($_POST['inputMotDePasse' ],$inscrit->passHash)){
          $_SESSION['auth']=$inscrit;
          $_SESSION['flash']['success']='Connexion réussie !';
          header('Location:compte.php');
           exit();
      }else {
       $_SESSION['flash']['danger']='Identifiant ou mot de passe incorrecte !';
       $warning['login']='Identifiant ou mot de passe incorrecte !';
      }
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

	<!-- Contenu de la page de connexion -->

  <?php if (isset($_SESSION['flash'])):?>
  <?php foreach ($_SESSION['flash'] as $type=>$message):?>
    <div class="alert alert-<?=$type;?>">
      <?=$message;?>
    </div>
  <?php endforeach;?>
  <?php unset($_SESSION['flash']);?>
<?php endif;?>
      <div class="container main" id="connexion">
        <!-- Formulaire de connexion -->
        <div class="card mx-auto">
            <div class="card-block text-center">
                <h4 class="card-title">Formulaire de connexion</h4>
            </div>
        <?php if(!empty($warning)):?>
                    <div class="alert alert-danger"> <!-- class bootstrap speciale pour les erreurs -->
                     <p>les champs du  formulaire n'ont pas été remplis correctement car il y a <?php echo count($warning);?> erreurs</p> <!-- mMessage en cas d'erreur(s) -->
                       <ol>
                           <?php foreach ($warning as $erros):?> <!-- parcurire la variable d'erreurs -->
                           <li><?=$erros;?></li>
                           <?php endforeach; ?>
                      </ol>
                    </div>
                    <?php endif; ?>
        <form class="text-center" method="POST" action="">
          <!-- Informations de connexion -->
          <div class="form-group">
            <label for="user_login"> Pseudonyme ou email</label>
            <input type="text" name="user_login" class="form-control mx-auto text-center" id="user_login"  placeholder="Votre pseudo">
          </div>
          <div class="form-group">
            <label for="inputMotDePasse">Mot de passe</label>
            <input type="password" name="inputMotDePasse" class="form-control mx-auto text-center" id="inputMotDePasse" placeholder="************">
          </div>
          <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
      </div>
      <!-- Bouton d'envoi -->
      <div class="card m-auto">
        <div class="card-block text-center">
          <p class="card-text">Vous n'êtes pas encore inscrit ?</p>
          <a class="btn btn-secondary" href="<?php echo $path_pages ; ?>register.php" role="button">Inscription</a>
        </div>

        <!-- Fin du formulaire de connexion -->
      </div>
    </div>
  </div>
</div>
<?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
<?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->

</body>
</html>

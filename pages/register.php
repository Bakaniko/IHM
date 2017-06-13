<?php session_start();?>
<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>
<!-- PHP qui gère le formulaire -->
<?php
if (!empty($_POST)) {
	$errors=array();  # est un tableau associatif qui contient toutes les erreures eventuelles l'ors de la saisie du formulaire 
	require_once"$path_structure".'base.php';# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
	require_once"$path_structure".'fonctions.php';# inclure la fonction debug  
	if (empty($_POST['login'])|| !preg_match('/^[A-Za-z0-9]+$/',$_POST['login'])){
		$errors['login'] = "Votre login n'est pas valide !";
	}else{
    $req=$pdo->prepare('SELECT idUtilisateur FROM proj_utilisateur WHERE login =?'); # verifier si le login existe en selectionnant son id
    $req->execute ([$_POST['login']]);
    $iduser=$req->fetch();
    if ($iduser) {
      $errors['login']='Ce Pseudo est déjà pris !';
    }	
  }
	if (empty($_POST['email'])|| !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		$errors['email'] = "Votre email n'est pas valide!";
	}else{
    $req=$pdo->prepare('SELECT idUtilisateur FROM proj_utilisateur WHERE adresseMail =?'); # verifier si le login existe en selectionnant son id
    $req->execute ([$_POST['email']]);
    $iduser=$req->fetch();
    if ($iduser) {
      $errors['email']='Cette adresse est déjà utilisée pour un autre compte !';
    }
  }
	if (empty($_POST['passe'])|| $_POST['passe']!=($_POST['passe_confirm'])){
		$errors['passe'] = "Les mots de passe ne correspondent pas !";
	}
	if (empty($errors)) {
		$req=$pdo->prepare("INSERT INTO proj_utilisateur SET login = ?, adresseMail = ?, passHash = ?, code_confirmation = ?"); # requette préparée pour entrer les infos dans le base de données
		$salt= uniqid(mt_rand(), true);
		$options=['salt'=>$salt, 'cost'=>12];
    $code_confirme=generer_code(60);
		$passehash=crypt($_POST['passe'],'$2y$12$'.$salt.'$');
		$req->execute([$_POST['login'],$_POST['email'],$passehash,$code_confirme]);
    $dernierId=$pdo->lastInsertId(); # Récuperer le dernier Id généré par PDO
    mail($_POST['email'], 'Confirmation de votre compte', "Projet M1MIASH : \n\nAfin de valider votre compte, veuillez ciliquer sur le lien suivant\n\n http://localhost/IHM-master/pages/confirmation.php?id=$dernierId&code_confirme=$code_confirme");# on envois par mail un lien de confirmation qui contient le code et qui est dirigé vers la page de confirmation
    $_SESSION['flash']['success']='Un email de confirmation vous été envoyé';
    header('location:inscription_message.php');
    exit();
	}
}
?>
<!DOCTYPE html>
<html lang="fr" class="">
<?php include($path_structure."head.php"); ?> <!-- Inclusion <head> -->
<body class="">
  <?php include($path_structure."menu.php"); ?> <!-- Inclusion menu -->

  <!-- Contenu de la page de connexion -->

  <div class="container" id="main">
    <div class="card m-auto">
      <!-- Formulaire de connexion -->
      <div class="card-block text-center">
          <h4 class="card-title">Formulaire d'inscription</h4>
          <?php if(!empty($errors)):?>
              <div class="alert alert-danger"> <!-- class bootstrap speciale pour les erreurs -->
               <p>les champs du  formulaire n'ont pas été remplis correctement car il y a <?php echo count($errors);?> erreurs</p> <!-- mMessage en cas d'erreur(s) -->
                 <ol>
                     <?php foreach ($errors as $error):?> <!-- parcurire la variable d'erreurs -->
                     <li><?=$error;?></li>
                     <?php endforeach; ?>
                </ol>
              </div>
           <?php endif; ?>   
          <!-- Formulaire d'inscription -->
        <form action="" method="POST">
          <div class="form-group">
            <label for="login">Pseudo *</label>
            <input type="text" name="login" class="form-control mx-auto text-center" id="inputNom" placeholder="Alphanumérique">
          </div>
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" class="form-control mx-auto text-center" id="inputEmail" aria-describedby="emailHelp" placeholder="Exemple@gmail.com">
          </div>
          <div class="form-group">
            <label for="passe">Mot de passe *</label>
            <input type="password"name="passe" class="form-control mx-auto text-center" id="inputMotDePasse">
          </div>
          <div class="form-group">
            <label for="passe_confirm">Confirmation du mot de passe *</label>
            <input type="password"name="passe_confirm" class="form-control mx-auto text-center" id="inputMotDePasse">
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              Rester connecté(e)
            </label>
          </div>
          <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
      </div>
      <!-- Fin des formulaires -->
    </div>
  </div>
  <?php include($path_structure."footer.php"); ?> <!-- Inclusion pied de page -->
  <?php include($path_structure."JS.php"); ?>  <!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
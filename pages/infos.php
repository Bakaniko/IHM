<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>
<?php // Définition des chemins d'accès aux fichiers
$path_root="../";
$path_structure=$path_root."structure/";
$path_pages=$path_root."pages/";
$path_images=$path_root."images/";
?>
<?php
if (!empty($_POST)) {
	$errorss=array();  # est un tableau associatif qui contient toutes les erreures eventuelles l'ors de la saisie du formulaire 
	require_once"$path_structure".'base.php';# inclure la connection à la base de données pour vérifier si les infos éxistent ou pas
	require_once"$path_structure".'fonctions.php';# inclure la fonction debug  
	if (empty($_POST['user_name'])|| !preg_match('/^[A-Za-z0-9]+$/',$_POST['user_name'])){
		$errorss['user_name'] = "Votre nom n'est pas valide !";
	}	
	if (empty($_POST['user_firstname'])|| !preg_match('/^[A-Za-z0-9]+$/',$_POST['user_firstname'])){
		$errorss['user_firstname'] = "Votre prénom n'est pas valide !";
	}	
	if (empty($_POST['user_email'])|| !filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL )|| !preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|gmail|laposte|).[a-z]{2,4}$#",$_POST['user_email'])){
		$errorss['email'] = "Votre email n'est pas valide!";
	}
	if (empty($_POST['message'])){
		$errorss['message'] = "votre message est vide, il ne sera pas envoyé !";
	}else{
	    $req=$pdo->prepare('SELECT id_message_contact FROM messages_contacts WHERE Text_message =? and Mail_contact=?'); # verifier si le message existe en selectionnant son id
    $req->execute ([$_POST['message'],$_POST['user_email']]);
    $message_envoye=$req->fetch();

    if ($message_envoye) {
      $errorss['message']='Vous avez déjà envoyé ce message !';
    }
	}
	if (empty($errorss)) {
		$req=$pdo->prepare("INSERT INTO messages_contacts SET Text_message=?, Mail_contact = ?, Nom_contact = ?, Prenom_contact = ?, date_message_contact = NOW()"); # requette préparée pour entrer les infos dans le base de données
		$req->execute ([$_POST['message'],$_POST['user_email'],$_POST['user_name'],$_POST['user_firstname']]);
 		$from=$_POST['user_email'];
        $message=$_POST["message"];
        $header="MIME-Version:1.0\r\n";
        $header.="From: $from\r\n";
        $header.='Content-Type:text/html;charset="utf-8"'."\n";
        $header.='Content-transfer-Encoding:8bit'; 
    mail('nassimyousfi1987@gmail.com',"Contact internaute",$message, $header);# on envois par mail un lien de confirmation qui contient le code et qui est dirigé vers la page de confirmation
    $_SESSION['flash']['success']='<h3>Message envoyé !</h3>';
    header('Location:infos.php');
    exit();
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php include($path_structure."head.php"); ?>	<!-- Inclusion <head> -->
<body>
	<?php include($path_structure."menu.php"); ?>	<!-- Inclusion menu -->

	<!-- Contenu de la page infos -->
		<?php if (isset($_SESSION['flash'])):?>
		<?php foreach ($_SESSION['flash'] as $type=>$message):?>
		 <div class="alert alert-<?=$type;?>">
		 <?=$message;?>
		</div>
		<?php endforeach;?>
		 <?php unset($_SESSION['flash']);?>
		<?php endif;?>

	<div class="container" id="main">
		<!-- Informations de contact-->
		<div class="card mx-auto">
			<div class="card-block">
				<h4 class="card-title text-center">Nous contacter</h4>
				<p class="card-text text-justify">
					Par téléphone au 08 92 89 90 90 (0,35 € TTC/min depuis un poste fixe hors coût éventuel selon opérateur) 
					ou au + 33 1 71 25 24 23 depuis l’étranger, du lundi au samedi de 9h à 19h.
				</p>
				<p class="card-text text-justify">
					Aux guichets du Palais Garnier (l’angle des rues Scribe et Auber - 75009 Paris) 
					et de l’Opéra Bastille (130 rue de Lyon - 75012 Paris) du lundi au samedi de 11h30 à 18h30 (sauf jours fériés) 
					et une heure avant le début des représentations.
				</p>
			</div>
		</div>
		<!-- Formulaire de contact -->
			<div class="card mx-auto">
				<!-- Formulaire -->
				<div class="card-block">
					<h4 class="card-title text-center">Nous envoyer un message</h4>
						
						 <?php if(!empty($errorss)):?>
			              <div class="alert alert-danger"> <!-- class bootstrap speciale pour les erreurs -->
			               <p>les champs du  formulaire n'ont pas été remplis correctement car il y a <?php echo count($errorss);?> erreurs</p> <!-- mMessage en cas d'erreur(s) -->
			                 <ol>
			                     <?php foreach ($errorss as $erro):?> <!-- parcurire la variable d'erreurs -->
			                     <li><?=$erro;?></li>
			                     <?php endforeach; ?>
			                </ol>
			              </div>
			          	 <?php endif; ?>  
			          	  <?php if(empty($errorss)):?>
			              <div class="alert alert-success"> <!-- class bootstrap speciale pour les erreurs -->			                     
			                     <h3><? echo' Votre message a bien été envoyé';?></h3>
				              </div>
			          	 <?php endif; ?>
					<form class="" action="" method="POST">
						<div class="form-group row">
							<label class="col-3 col-form-label" for="nom">Nom *</label>
							<div class="col-9">
								<input type="text" id="nom" class="form-control" name="user_name"/>
							</div>
						</div>	
						<div class="form-group row">
							<label class="col-3 col-form-label" for="prenom">Prénom *</label>
							<div class="col-9">
								<input type="text" id="prenom"  class="form-control" name="user_firstname"/>
							</div>
						</div>														
						<div class="form-group row">
							<label class="col-3 col-form-label" for="courriel">Email *</label>
							<div class="col-9">
								<input type="email" id="courriel" class="form-control" name="user_email"/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3 col-form-label" for="message">Message *</label>
							<div class="col-9">
								<textarea class="form-control" name="message" id="message" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<button class="btn btn-primary mx-auto" type="submit">Envoyer</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Plan -->
		<div class="card mx-auto">
			<div class="card-block text-center">
				<h4 class="card-title">Plan</h4>
				<p class="card-text">
					Opéra Bastille : Place de la Bastille, 75012 Paris<br />
					Palais Garnier : 8 Rue Scribe, 75009 Paris
				</p>
				<!-- div utilisée pour positionner la carte créée par la fonction JavaScript initMap
				le style appliqué à la carte fonctionne seulement dans le html -->
				<div class="mx-auto" style="width:30rem;height:25rem;" id="map"></div>
			</div>
		</div>
	</div>

	<?php include($path_structure."footer.php"); ?>	<!-- Inclusion pied de page -->
	<?php include($path_structure."JS.php"); ?>	<!-- Inclusion CDN et fichiers javascript -->
</body>
</html>
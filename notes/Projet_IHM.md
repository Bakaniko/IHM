---
title:  "Elaboration d'un site web accessible"
subtitle: "Opéra national de Paris"

author:
- Bilo Boury
- Charles Cascio
- Nicolas Roelandt
- Nassim Yousfi

formation: "Mathématiques et Informatique Appliquées aux Sciences Humaines et Sociales (MIASHS)"
parcours: "Technologie et handicap (HANDI)"
classname: "Interface Homme - Machine / Programmation Web Accessible"
responsable: "Responsables de formation: Dominique Archambauld, Isis Truck (Université Paris 8)"
#chargeDeCours: "Chargé de cours: ???"


subject: Réalisation d'un site web
tags: [Accessibilité, PHP, site web]
abstract: |
  This is the abstract.

  It consists of two paragraphs.
---







[//]: # (This may be the most platform independent comment)


# Introduction


Ce projet nous a été confié dans le cadre du Master *Mathématiques et Informatique
Appliquées aux Sciences Humaines et Sociales* (**MIASHS**) parcours *Technologie
et handicap* (**HANDI**). Il s'agit d'un projet associant les cours d'Interface
Homme Machine (Dominique Archambauld) et Programmation Web Accessible (Isis Truck)
de la première année.




Le site présenté ici été développé par une équipe de 4 étudiants:

- Bilo Boury

- Charles Cascio

- Nicolas Roelandt

- Nassim Yousfi

#### Cahier des charges

Développer un site de réservation de places de spectacle le plus accessible possible.

L'objectif est de développer un site web permettant la réservation de place de
spectacle. Le site doit être accessible et donc fonctionnel pour des personnes en
situation de handicap (visuel ou moteur).

Nous avons voulu travailler sur un cas le plus concret possible, c'est pourquoi
nous nous sommes inspirés du site de l'Opéra national de Paris.

Si les spectacles présentés dans ce projet ont réellement eu lieu, soit à l'Opéra
Bastille ou au Palais Garnier, l'inspiration s'arrête là. Le plan de salle, les
dates de représentation, les clients sont totalement fictifs.

# Conception

Ce site a été développé majoritairement le soir et le week-end, sur une période
d'un mois et demi environ, nous avons donc voulu le garder le plus simple et
fonctionnel possible. D'une part car dans un soucis d'économie de temps et
d'énergie, et d'autre part dans un souci d'accessibilité.


## Répartition des tâches

1. maquette et design du site (HTML/CSS): Charles Cascio

2. MCD et gestion des places et réservations : Bilo Boury

3. Implémentation de la base MySQL et PHP: Nicolas Roelandt

4. Implémentation PHP, gestion des sessions: Nassim Yousfi


Dans un premier temps, nous avons développé le design et le  squelette du site
et, parralèllement, le modèle de la base de données et son
implémentation. Enfin, nous avons rendu le site dynamique en interfaçant le site
avec la base à l'aide de PHP et Javascript.


# Design du site {#design-du-site}

## Design général {#designgeneral}

Si le site officiel [^operaNational] est superbe (voir fig. \ref{siteOfficiel}), nous ne nous en sommes pas
servi pour développer le design de notre site.

![Site officiel de l'Opéra national de Paris \label{siteOfficiel}](images/site_officiel.png){ width=100% }

[^operaNational]:
    [https://www.operadeparis.fr](https://www.operadeparis.fr)


Comme le montre les figures \ref{fig:interface1} et \ref{fig:interface2}, le
design a beaucoup évolué entre les différentes versions.



## La charte graphique

### Le choix des couleurs

Les couleurs ont d'abord été choisi pour correspondre aux goûts de la population
ciblée CSP+.
Le noir est la couleur du luxe, du haut de gamme. Le noir et le blanc sont des
couleurs classiques, sobres.
Ce choix de couleur permet de distinguer aisément le menu du reste de la page et
donc se repérer facilement.
Enfin ce thème blanc et noir a l'avantage de présenter de forts contrastes qui
facilitent la lecture du texte.

En outre le pied de page en gris clair est discret.
Il permet de faire le lien avec les autres présences sur le web de l'Opéra
National de Paris sans effacer
le contenu des pages. En effet, il donne accès aux différents réseaux sociaux de
l'opéra de paris.
Le vert a été choisi pour les boutons de validation et le bleu pour les boutons
marquant le franchissement
d'une étape ou l'envoi d'un formulaire.

### Le choix de la police

Bootstrap choisit par défault la meilleure police en fonction du navigateur.
La taille de la police d'écriture a été choisi relativement grande pour un
maximum de confort à la lecture.




## Les composants

### La barre de navigation comme repère

Le menu a été conçu de manière à être le plus simple et le plus lisible possible.
Seuls les liens qui doivent être accessibles depuis n'importe quelle page
ont été placés dans le menu. Ainsi l'ajout de sous menus n'a donc pas été nécessaire.

### L'accueil

L'importance a été donné aux images sur la page d'accueil de facon à accueillir
le visiteur de manière agréable et engageante.
Cette première page propose directement des spectacles à découvrir et donne envie
au visiteur de parcourir le reste du site.

### Une carte pour prévoir son déplacement

Une carte a été ajoutée pour donner un point de repère géographique immédiat.
Google maps a été préféré à leaflet pour l'accès à streetView et la visite à 360
degrés de l'intérieur de l'opéra.

\begin{figure}[H]
\centering
\includegraphics[scale=0.2, angle =90 ]{../interfaces/interface_1.png}
\caption[Première ébauche du design]{Première ébauche du design}
\label{fig:interface1}
\end{figure}

## Les apports visuels

### L'interraction au service de la lisibilité

Les liens sont soulignés au passage de la souris et s'éclairent. En plus de
donner des informations
sur les éléments survolés par la souris, le visiteur a un retour direct sur son
interraction avec les éléments du site.

### Des éléments visuels pour apporter davantage de sens

Des icônes ont été ajoutés aux éléments importants comme les boutons d'action ou
les liens principaux afin de se repérer
aisément et de donner davantage de sens à ces éléments.

### Une mise en page réfléchie

Une attention particulière a été portée sur le placement des éléments dans la
page de façon à utiliser
l'espace au maximum tout en aérant le plus possible le contenu.
Les pages sont peu chargées, seules les informations nécessaires sont présentes.
Ce choix de mise en page permet également d'éviter les ascenseurs horizontaux
et donc de limiter
les efforts des personnes à handicap moteur.


## Le responsive

Un site pour tous les types d'écrans et tous les navigateurs.
Les pages ont été pensées pour être totalement responsive, chose qui est facilitée
par le modèle en grille de bootstrap
et les flexboxs de HTML5.
Ensuite le site a été conçu pour fonctionner sur tous les navigateurs (même IE8).



## Retour et éléments de réflexion

Les premiers choix de design n'ont pas toujours étés respectés pour des raisons
de faisabilité (partie PHP).
En outre il était prévu d'ajouter un lien d'évitement sur le menu et le pied de
page.
Toutefois, le menu et pied de page ont peu de liens. C'est pourquoi ils ne sont
pas très gênants
lors du parcours du site avec la touche de tabulation.





\begin{figure}[H]
\centering
\includegraphics[scale=0.15, angle =90 ]{../interfaces/interface_2.png}
\caption[Design actuel]{Design actuel}
\label{fig:interface2}
\end{figure}




\clearpage





# Réalisation de la base de données

La base de données a été implémentée avec MySQL, car cet implémentation est courante
pour des sites web. Il est donc aisé de trouver de la documentation à ce sujet
ainsi que des packs logiciels fournissant la base de données et le serveur web pour
un usage local.

Enfin, il s'agit de la base de donnée installée sur le serveur Handiman.

## Modèle Conceptuel de Données

\begin{figure}[H]
\centering
\hspace{-10mm}\includegraphics[width=1.15\columnwidth]{images/capture_MCD.png}
\caption[Modèle Conceptuel de Données]{Modèle Conceptuel de Données}
\label{fig:MCD}
\end{figure}


# PHP {#PHP}

De façon général, nous avons essayé de conserver un maximum d'accessibilité pour
notre site. Ainsi, nous avons volontairement favoriser l'usage de *PHP* par
rapport à *Javascript*. Ceci afin de faciliter l'usage du site avec les lecteurs
d'écrans.

De cette manière, la page de réservation de place comporte deux manières de
choisir un siège:

- soit par un formulaire;

- soit en cliquant sur la place voulue de la représentation de la salle.

Cette deuxième option a nécessité l'utilisation de Javascript mais n'est pas
obligatoire.

Le block de code ci-dessous montre diverses techniques utilisées pour factoriser
le code en insérant définissant des chemins relatifs vers les fichiers à inclure et en insérant
le code nécessaire à la connexion à la base de données, à l'insertion du menu, du
head, du footer et des fonctions Javascript.

\begin{lstlisting}[language=php]

<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>
<?php
    // Définition des chemins d'accès aux fichiers
    $path_root="../";
    $path_structure=$path_root."structure/";
    $path_pages=$path_root."pages/";
    $path_images=$path_root."images/";


    # inclure la connection à la base de données pour vérifier si les infos existent ou pas
	require_once"$path_structure".'base.php';

    # inclure la fonction debug  
	require_once"$path_structure".'fonctions.php';
?>

...

<!DOCTYPE html>
<html lang="fr">
<!-- Inclusion <head> -->
<?php include($path_structure."head.php"); ?>
<body>
<!-- Inclusion menu -->
<?php include($path_structure."menu.php"); ?>

...

<!-- Inclusion pied de page -->
<?php include($path_structure."footer.php"); ?>
<!-- Inclusion CDN et fichiers javascript -->
<?php include($path_structure."JS.php"); ?>  

</body>
</html>
\end{lstlisting}


Le fait de procéder de cette manière favorise l'homogénéité du site et facilite
la création et la maintenance des pages de notre site.
Nous avons aussi utilisé PHP pour rendre le site dynamique à l'aide de requêtes
au sein de la base de données et pour gérer les sessions utilisateurs.



## Requêtes en base

### Les listes déroulantes

Pour limiter les soucis de cohérences sur les requêtes, les listes déroulantes étaient
fiwées avec les valeurs déjà présentes en base. Donc derrière chaque liste déroulante,
il y a une requête de type *query* qui va chercher des informations précises dans
la base et pré-rempli les balises html de type *SELECT*.


\begin{lstlisting}[language=php]

<!-- Type -->
<div class="form-group d-flex flex-column">
    <label for="typeSelect">Type</label>
    <select class="custom-select" id="typeSelect" name="typeSelect">
        <option selected>Choisir...</option>

        <?php
        // requête de sélection des options de
        // type de spectacle présents dans la base
        $sql = "SELECT DISTINCT (s.type) AS type
                FROM proj_Spectacle AS s WHERE 1 ORDER BY type ASC";

        $req = $pdo->query($sql);

        while ($data=$req->fetch()) {

                    echo "<option value=".$data->type.">".$data->type."</option>\n";
            }
        $req->closeCursor();
             ?>

    </select>
</div>

\end{lstlisting}


### Les saisies utilisateurs

Pour toutes les requêtes nécessitant une saisie de l'utilisateur (champ texte par
    exemple), nous avons contrôlé la saisie à l'aide d'expressions régulières si
    besoin, toutes les saisies sont passées dans la fonction php *htmlspecialchars*.

    Puis toutes les requêtes sont préparées avant d'être exécutées.

L'exemple de code ci-dessous montre le cas où un utilisateur souhaite changer son
login. Tout d'abord, le remplissage de la variable $\_POST['inputpseudo'] est testé,
la valeur fournie doit répondre à l'expression régulière définie. Sinon un message
flash de type *danger* est affiché disant que le nouveau login n'est pas valide.

Puis la requête est préparée et exécutée avec les valeurs passées en paramètres.
La saisie est contrôlée à ce moment avec *htmlspecialchars* pour éviter l'injection de
code sql.

Un message flash est alors envoyé pour indiquer que l'opération s'est bien déroulée.

\begin{lstlisting}[language=php]


if (!empty($\_POST['inputpseudo']) && !preg_match('#^[a-zA-Z0-9 -]+$#',$\_POST['inputpseudo'])){

    $\_SESSION['flash']['danger']= "Votre  nouveau pseudo n'est pas valide !";

}else if(!empty($\_POST['inputpseudo']) && preg_match('#^[a-zA-Z0-9 -]+$#',$\_POST['inputpseudo'])){

    // Je récupère l'id utilisateur qui vient de se connecter
    // je l'affecte à la variable $user_id que je met en parametre dans ma requete
    // sql pour changer les infos

    $user_id=$\_SESSION['auth']->idUtilisateur;

    $req=$pdo->prepare("UPDATE proj_utilisateur SET login =? WHERE idUtilisateur=?");

    $req->execute ([htmlspecialchars($\_POST['inputpseudo']),$user_id]);

    $\_SESSION['flash']['success']= "Votre pseudo a été mis à jour !";
}

\end{lstlisting}

## Gestion des sessions {#GESTIONSESSION}

La variable de session contient deux index :

1. l'index
\colorbox{bleuciel}{\lstinline[basicstyle=\ttfamily\color{black}]{$\_SESSION["auth"]}} (authentification),
qui contient tout les attributs liés à l'utilisateur inscrit dans la page
d'inscription (register.php)
ainsi que les informations nécessaires à la validation de son compte affectées
dans le fichier confirmation.php.

2. L'index
\colorbox{bleuciel}{\lstinline[basicstyle=\ttfamily\color{black}]{$\_SESSION["flash"]}},
 qui contient tous les messages d'erreurs et de
succès relatifs à la gestion des formulaires et des redirections.

Pour factoriser l'ouverture de la super variable dans toutes les pages, nous
avons effectué cette ouverture dans le fichier menu.php qui est présent dans
toutes les pages du site, néanmoins nous avons, à cause des nombreuses inclusions
de fichiers PHP dont la variable de session est déjà déclarée, du prévenir
l'éventualité d'une double ouverture de la session, ce qui engendrerait une erreur.

En utilisant cette instruction,

\colorbox{bleuciel}{\lstinline[basicstyle=\ttfamily\color{black}]{<?php if (session_status()==PHP_SESSION_NONE) {session_start();}?>}}

, nous vérifions d'abord si la variable de session existe déjà, dans le cas
contraire et seulement dans ce cas là, la session est ouverte.      

Un exemple de code de gestion des session vérifiant l'authentification de l'utilisateur est visible si dessous.

Il vérifie que le variable *auth* a bien été remplie à la connexion et sinon redirige, vers la page de connexion.
Si l'utilisateur qui se connecte est de type admin, il est redirigé vers la page d'administration.


\begin{lstlisting}[language=php]
if (!isset($\_SESSION['auth'])){
$\_SESSION['flash']['danger']="Vous n'avez pas le droit d'accèder à cette page";
header('Location:connexion.php');
}if (isset($\_SESSION['auth']) && ($\_SESSION['auth']->typeUtilisateur=='admin')) {
 header('Location:gestion.php');
}
else {
   $\_SESSION['flash']['success']= "Bienvenue".$\_SESSION['auth']->nom." ".$\_SESSION['auth']->prenom." !";
	//debug($\_SESSION);
}

?>
\end{lstlisting}

# Gestion des réservations
## Plan de salle


# Versionnement
## Logiciels de gestion du versionnement
### GIT

Dans le cadre du développement logiciel, la plupart des entreprises utilisent un
 logiciel de versionnement. Nous avons nous aussi souhaiter versionner notre
 travail. Nous avons choisi GIT car il est de plus en plus employé dans le monde
 professionnel et qu'il est open-source. Cela nous a permis  d'acquérir des
 compétences de gestion de projet et de développement susceptibles d'intéresser
 un employeur.

De plus, en combinaison avec Github, cela nous permet d'avoir un version sauvegardée
du code en ligne, palliant ainsi à d'éventuels soucis matériels.

Toutefois seul l'un d'entre nous avait déjà une expérience de ce logiciel de
versionnement. L'apprentissage n'a pas était aisé pour tous mais nous avons tous
progressé dans notre connaissance de ce logiciel. Afin de faciliter cet
apprentissage, nous avons eu recours au logiciel **GitKraken** qui propose une
interface graphique à git.

Au moment de la rédaction de ces lignes, 206 commits avaient été enregistrés, sur
12 branches différentes.


### GitKraken

Pour nous aider à nous retrouver dans les branches et les dépôts, nous avons eu
recours au logiciel **GitKraken** édité par la société Axosoft [^axosoft].

[^axosoft]:
    [https://www.gitkraken.com/](https://www.gitkraken.com/)

![Interface de GitKraken](images/gitkraken.png){ width=100% }

Outre une esthétique très travaillée, il permet de réaliser facilement plusieurs
opérations courantes sans avoir à recourir à la ligne de commande (COMMIT, PULL,
 PUSH, ADD REMOTE). Il permet aussi de visualiser les branches des autres
 collaborateurs et leur avancement.

## Hébergement

L'hébergement s'est fait principalement sur nos machines personnelles, puis le
site a été déployé sur Handiman. Ainsi, chaque *Pull Request* était testée dans
un serveur local avant d'être fusionnée à la branche *master*. Enfin, la branche
*master* était téléchargée sur Handiman.

La version déployée est visible à cette adresse:
[http://handiman.univ-paris8.fr/~nicolas/](http://handiman.univ-paris8.fr/~nicolas/)

La base de code est hébergée et visible sur github :
[https://github.com/MinMinLight/IHM](https://github.com/MinMinLight/IHM).

Nous aurions pu utiliser d'autres plate-formes tel que Bitbucket ou Gitlab /
Framagit; mais GitKraken s'intègre mieux avec Github et Bitbucket.
De plus, beaucoup de projets libres ont recours à Github, et c'était l'occasion
de se familiariser avec son interface.

La création et le lancement d'un projet nous ont semblé plus complexe sur des
plate-formes telles que Gitlab / Framagit. Nous avons donc écarté ces solutions.

Avec du recul, il aurait probablement été plus intéressant d'héberger le code sur
Bitbucket. En effet, c'est gratuit jusqu'à 5 collaborateurs (nous étions 4) et
il est possible de rendre le projet privé. En effet, Github propose un  hébergement
gratuit pour les projets open-source, . Tout ce que nous publions dessus est donc
 librement accessible sur Internet. Ce qui fait que nousa vons dû faire attention
 à ne pas publier nos codes d'accès ou nos mails personnels.



## Avantages

L'avantage principal a été le fait d'avoir une distribution distribuée du code.
Cela a aussi permis d'utiliser le code le plus à jour possible pour démarrer une
nouvelle branche.

Github permet une communication entre les participants à travers les *Pull Request*,
mais nous avons peu exploiter cette possibilité.

## Inconvénients

Le fait du publier quelque chose sur github, de façon gratuite, fait qu'il a
fallu faire attention à la sécurité. Afin de ne pas publier de mots de passe sur
internet.

## Problèmes rencontrés

- L'envoi de mail, fonctionne sur l'ordinateur de Nassim, ne fonctionne pas sur
l'ordinateur de Nicolas ou sur Handiman. La *SendMail* n'est pas installé sur le
 serveur.

- un certain nombre de fichiers n'ont pas pu être chargés sur Handiman, des erreurs
se produisaient. Par la suite, il n'était plus possible de supprimer ou remplacer
les fichiers vides ou incomplets présents sur Handiman. Nous avons donc utiliser
un serveur local pour terminer le projet.

# Evolutions possibles / points non traités

## Fonctionnalités / Interface du site

- gestion des achats (panier), paiement de la commande;

- renvoi d'un mot de passe temporaire en  cas d'oubli;

- charger directement l'image depuis l'interface de gestion;

- si un administrateur est connecté, remplacer panier par gestion qui renvoit
vers la page gestion.php;

- ajout d'un fil d'ariane en dessous du menu pour aider l'utilisateur à naviguer
dans le site;

-

## Page gestion.php

- vérifier les saisies administrateur: format de date et horaires

- pouvoir dupliquer les données d'une représentation ou d'un spectacle pour
gagner du temps de saisie

- insérer un message demandant la confirmation de l'action de suppression d'un
spectacle ou d'une représentation

- dans l'onglet suppression, trouver un moyen de filtrer les représentations:
par spectacle, par salle, par mois, par année. Evénentuellement en reprenant le
code de la page programmation.php. Il faudra peut-être avoir recours à Javascript
et JQuery/Ajax.

## Page spectacle.php

- gérer le cas où l'idSpectacle n'existe pas dans la base,

-  si toutes les dates du spectacles sont passées, afficher quand
 même les informations, plus représentations passées (sans bouton réservé)

## Page reservation.php

Cette page a nécessité l'utilisation d'un formulaire php et d'une image svg,
ainsi que du code mélant javascript, PHP et SQL.

Toutefois, bien que fonctionnelle sur l'ordinateur de la personne qui l'a développé,
nous avons eu des soucis à l'intégration. En effet, les serveurs locaux présentaient
des disparités de logiciels et de versions. Cette page ayant nécessité un temps de
développement long, il ne nous restait plus de temps pour régler les problèmes découverts
à l'intégration.

Après le choix de la place par le biais du formulaire ou de l'image, les informations
sont insérées dans la variable
\colorbox{bleuciel}{\lstinline[basicstyle=\ttfamily\color{black}]{$\_SESSION["panier"]}}

## Page panier.php

Bien qu'existante, la page panier.php n'est pas fonctionnelle car elle dépend
directement des .

# Conclusion

Bien que n'étant pas complètement terminé la réalisation de ce projet a été
enrichissante à plusieurs niveaux.

Nous avons pu en effet apprendre à développer tous les composants d'un site web,
en interfaçant son squelette à une base de données graĉe à PHP, afin de le rendre dynamique.
Nous avons rencontré un certain nombre de problèmes et essayé de trouver les meilleures solutions
pour y remédier (fournir une alternative, avoir recours à un autre langage, un autre outil).



Nous avons aussi appris à collaborer pour réaliser ce site, notamment durant les phases
d'intégration des différentes parties de chacun. En effet, nous n'avons pas toujours eu
les mêmes pratiques de code et l'harmonisation n'a pas toujours été heureuse.
 Nous avons aussi progresser dans
notre maîtrise de l'outil de versionnement Git.




\clearpage

\appendix

# Annexes


## Usecases

\input{jeanmarc}

\input{Marcelle_Jacques}

\input{philippe}

\clearpage

## Code python générant un jeu de test de réservations

\lstdefinestyle{numbers}
{numbers=left, stepnumber=5, numberstyle=\tiny, numbersep=10pt}

\lstinputlisting[language=python, style=numbers]{../sql/generate_reservations.py}

\clearpage

\input{sql}

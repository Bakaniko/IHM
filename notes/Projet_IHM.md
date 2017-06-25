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
tags: [Accessibilité, PHP]
abstract: |
  This is the abstract.

  It consists of two paragraphs.
---







[//]: # (This may be the most platform independent comment)


# Introduction

# conception


## maquette préliminiaire

## Modèle Conceptuel de Données

# Réalisation de la base de données


# design du site {#design-du-site}

## design général {#designgeneral}

## Accessibilité

# PHP {#PHP}

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





## Requêtes en base


# Gestion des réservations
## Plan de salle


# Versionnement
## Logiciels de gestion du versionnement
### GIT
### GitKraken


## Hébergement
L'hébergement s'est fait principalement sur nos machines personnelles, puis le site a été déployé sur Handiman.

La version final est visible à cette adresse: []()

La base de code est hébergée et visible sur github : [https://github.com/MinMinLight/IHM](https://github.com/MinMinLight/IHM).

Nous aurions pu utiliser d'autres plate-formes tel que Bitbucket ou Gitlab / framagit; mais GitKraken s'intègre mieux avec Github et Bitbucket.
De plus, beaucoup de projets libres ont recours à Github, et c'était l'occasion de se familiariser avec son interface.



## avantages

Permet une communication entre les


## inconvénients

- sécurité


## problèmes rencontrés

- envoi de mail, fonctionne sur l'ordinateur de Nassim, ne fonctionne pas sur l'ordinateur de nIcolas ou sur Handiman. La *SendMail* n'est pas installé sur le serveur.

# Evolutions / points non traités

## fonctionnalités du site

- gestion des achats, paiement de la commande

- renvoi d'un mot de passe temporaire en  cas d'oubli

- charger directement l'image depuis l'interface de gestion

- si un administrateur est connecté, remplacer panier par gestion qui renvoit vers la page gestion.php

## Page gestion.php

- vérifier les saisies administrateur: format de date et horaires

- pouvoir dupliquer les données d'une représentation ou d'un spectacle pour gagner du temps de saisie

## Page spectacle.php
- spectacle.php : si toutes les dates du spectacles sont passées, afficher quand même les informations, plus représentations passées (sans bouton réservé)


# Conclusion

\appendix

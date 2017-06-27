---
title:  'Use case : Philippe'
author:
- Bilo Boury
- Charles Cascio
- Nicolas Roelandt
- Nassim Yousfi
tags: [Use case, Philippe]
geometry: a4paper, margin=2cm
...

## Philippe, administrateur

Philippe est un des administrateurs de l'Opéra National de Paris.
C'est lui qui ajoute de nouveaux spectacles et plannifie les représentations en accord avec le Directeur.
Il les créé et les modifie si besoin.
Il peut supprimer les objets inutiles ou erronés.

Ce matin, par exemple, il a remarqué que l'affiche des contes d'Hoffman n'est pas la bonne.
Il se connecte donc sur le site. Il apprécie le fait que son interface soit la même que celle
des clients, ainsi il peut voir régulièrement si il y a des soucis.


Il se rend donc sur le site et se rend sur la page de connexion. Le site reconnait que Philippe est un administrateur et le redirige automatiquement vers la page de gestion.

SUr cette page, Philippe a la possibilité d'ajouter, modifier ou supprimer un spectacle. Il peut aussi administrer de la même façon les salles, réservations et utilisateurs.

En cliquant sur "Gestion des spectacles", il accède à la page permettant la gestion de ces derniers. Sur le côté, il peut choisir dans la liste tous les spectacles présents dans la base. Il sélectionne "Les contes d'Hoffmann" et valide.

La fiche du spectacle apparaît. En regardant le champ contenant le nom de l'image, il s'aperçoit qu'elle porte une extension peu courante: ".webp". Il vérifie le fichier sur le serveur et s'aperçioit que l'extension est en ".jpg". Il change donc l'extension dans le formulaire et valide. Puis il retourne sur l'accueil et contrôle le changement sur la fiche du spectacle. L'affiche offcielle est maintenant affichée.

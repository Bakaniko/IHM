Notes sur le SQL
================

Notes table par table

Toutes les tables commencent par le préfix "proj_"

## proj_TypeUtilisateur


### **TypeUtilisateur**

Défini les types d'utilisateurs possibles:

- admin : administre le site et la base de données
- manager : peut gérér les spectacles et les réservations mais pas le site et la base
- user : client du site, peut créer un compte et faire des réservations

Un utilisateur du site doit obligatoirement avoir un TypeUtilisateur, seul un admin
peut changer le type d'un utilisateur.

varchar 10

## proj_Utilisateur

### **IDU**
Identifiant Unique utilisateur, **clé primaire**

type numérique auto-incrémenté

### login
Identifiant de l'utilisateur (pseudo, adresse mail)

Varchar 30, **UNIQUE**

Il ne doit pas y avoir 2 login identiques dans la base


### passHash

Mot de passe haché par la fonction password_hash() de PHP; doit être utilisé
directement par password_verify().

varchar 255 NOT NULL

### nom

Nom de l'utilisateur

Varchar 30

### prenom

Prenom de l'utilisateur

Varchar 30


### adressePostale1

Première ligne de l'adresse postale

Varchar 50

### adressePostale2

Deuxième ligne de l'adresse postale

Varchar 50

### codePostal

Code postal : traité comme string pour les client étrangers

Varchar 10

### ville

Ville de résidence

Varchar 15

### adresseMail

email de contact, *devra correspondre à un certain format* NOT NULL

**unique**

varchar 50

### telephone

telephone de contact, traité comme string pour les numéros étrangers, *devra
correspondre à un certain format*

varchar 15

### *typeUtilisateur*

référence le type d'utilisateur

Par défaut, réglé sur *user*, devra être changé ultérieurement par un admin

Clé étrangère sur **proj_TypeUtilisateur.TypeUtilisateur**

varchar 10

## proj_Spectacle

Référence tous les spectacles proposés (faits, en cours, à venir)

### **idSpectacle**

Identifiant unique auto-incrémenté, **clé primaire**

Int

### nom

Nom du spectacle

varchar 50

(unique ?)


### type

Référence le type de spectacle: concert, pièce de théatre, danse ...

Suggestion: Les valeurs devraient venir d'une table externe

varchar 30

### infos

contient les informations du spectacle:

- nom du metteur en scène / chorégraphe
- noms des acteurs/musiciens
- description courte

suggestion : peut être divisé en plusieurs champs dans un vrai site

TEXT

## proj_Salle

Une salle est composée de places et appartient à un lieu

### **idSalle**

Identifiant unique

Numérique INT auto-incrémenté **clé primaire**

### nom

nom de la salle (salle n°3; Théatre Odéon; etc)

varchar 30

### adresse

adresse postale

TEXT

### type

type de salle: salle de concert, théatre, piste de cirque...

varchar 20

## proj_Representation

Une représentation est identifiée par un spectacle (auteur, acteurs, etc), une salle,
un horaire et une date. Un spectacle peut avoir plusieurs représentations dans la même salle.

### **idRepresentation**

Identifiant unique

Numérique INT auto-incrémenté **clé primaire**


### *idSalle*

proj_Salle.idSalle, **clé étrangère**



### *idSpectacle*

proj_Spectacle.idSpectacle, **clé étrangère**

### date

date de la représentation, séparée du temps pour être plus simple à dupliquer

DATE

### HoraireDebut

Début de la représentation

TIME

### HoraireFin

Fin de la représentation

TIME

## proj_Categorie

Catégories disponibles pour une salle

### **idCategorie**

Identifiant unique

Numérique INT auto-incrémenté **clé primaire**

### Categorie

Nom de la categorie

varchar 20

### *idSalle*

Les salles ont certaines catégories mais pas toutes. Il faut séparer les
catégories de chaque salle, car la même catégorie n'aura pas le même prix dans un
théatre que dans un opéra.

proj_Salle.idSalle, **clé étrangère**

## proj_Place
### **idPlace**

Identifiant unique

varchar(10) **clé primaire**

### *idSalle*

Une place appartient toujours à une salle

proj_Salle.idSalle, **clé étrangère**


### *idCategorie*

proj_Categorie.idCategorie, **clé étrangère**

## proj_PrixPlace

Le prix est fonction du spectacle, peut importe la représentation, et de la catégorie.
La catégorie permet de remonter à la salle.

### ***idCategorie***

proj_Categorie.idCategorie, **clé étrangère**; **clé primaire**

### ***idSpectacle***

proj_Spectacle.idSpectacle, **clé étrangère**; **clé primaire**

### prix

Prix en euros

Décimal

## proj_Reservation

Une réservation prend en compte 1 et 1 seule place, pour une unique réprésentation,
par un unique utilisateur /client.

Avec le couple idPlace et idRepresentation, il est possible de retrouver le prix


### ***IDU***

proj_Utilisateur.IDU, **clé étrangère**; **clé primaire**

### ***idRepresentation***
proj_Representation.idRepresentation, **clé étrangère**; **clé primaire**

### ***idPlace***
proj_Place.idPlace, **clé étrangère**; **clé primaire**

# Disponibilité des places

Pas besoin de créer une liste spéciale:

Il suffit de trier les places pour le spectacle concerné où il y a (ou pas) de
réservations de faite.

# Clés étrangères

proj_Utilisateur(typeUtilisateur) -> proj_TypeUtilisateur(typeUtilisateur)

proj_Representation(idSalle) -> proj_Salle(idSalle)

proj_Representation(idSpectacle) -> proj_Spectacle(idSpectacle)

proj_Categorie(idSalle) -> proj_Salle(idSalle)

proj_Place(idSalle) -> proj_Salle(idSalle)

proj_Place(idCategorie) -> proj_Categorie(idCategorie)

proj_PrixPlace(idCategorie) -> proj_Categorie(idCategorie)

proj_PrixPlace(idSpectacle) -> proj_Spectacle(idSpectacle)

proj_Reservation(IDU) -> proj_Utilisateur(IDU)

proj_Reservation(idRepresentation) -> proj_Representation(idRepresentation)

proj_Reservation(idPlace) -> proj_Place(idPlace)

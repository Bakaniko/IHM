<?php
$pdo=new PDO('mysql:dbname=ihm_master;host=localhost','root','');  # Pour la connection à la base de donnée sur wamp 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);# Pour afficher les erreurs de base de données qui sont muettes par défaut 
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
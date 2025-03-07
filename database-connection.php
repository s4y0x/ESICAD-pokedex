<?php
/*
Ce fichier permet de définir un objet de connexion $databaseConnection 
que vous pouvez utiliser dans chaque page qui nécessite de faire une requête au SGBD.
Il suffit d'utiliser require_once("config.php") pour que la variable $databaseConnection soit utilisable.
*/

global $databaseConnection;

$databaseConnection = mysqli_connect(
    'localhost',
    'root',
    null,
    'pokemon',
    '3306'
);

if (!$databaseConnection) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}
?>

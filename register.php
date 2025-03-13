<?php
require_once("head.php");
require_once("database-connection.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user (nom, prenom, login, password) VALUES 
    ('$nom', '$prenom', '$login', '$password')";

    if ($databaseConnection->query($sql) === TRUE) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur lors de l'inscription : " . $databaseConnection->error;
    }
}
?>

<form method="POST">
    Nom: <input type="text" name="nom" required><br>
    Prénom: <input type="text" name="prenom" required><br>
    Login: <input type="text" name="login" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <button type="submit">S'inscrire</button>
</form>

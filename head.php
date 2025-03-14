<!-- 
    Ce fichier contient le début du document HTML et de sa balise <head>
    Il permet de charger le fichier de styles CSS, le JS le cas échéant... 
-->
<?php
session_start();
$loggedIn = isset($_SESSION['user_id']);
$userName = $loggedIn ? $_SESSION['user_name'] : '';
$userFirstName = $loggedIn ? $_SESSION['user_firstname'] : '';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Du Professeur Chen</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/svg" href="assets/pokeball.svg" />
</head>

<body>
    
    <header>
        <a href="index.php">
            <h1>Pokedex Du Professeur Chen</h1>
        </a>

        <form id="search-bar" action="search_pokemon.php">
            <span class="input-group">
                <input id="q" name="q" type="search" placeholder="Rechercher un pokémon"><button type="submit">🔎</button>
                
        </form>
        <?php if ($loggedIn): ?>
            <div class="user-info">
                 <?php echo htmlspecialchars($userFirstName . ' ' . $userName); ?>
                <a href="logout.php" style="color: white;">Déconnexion</a>
            </div>
        <?php else: ?>
            <a href="login.php" style="color: white;">Connexion</a>
            <a href="register.php" style="color: white;">Inscription</a>        
        <?php endif; ?>
    </header>

    <div id="main-wrapper">


        <?php
        require_once("menu.php");
        ?>
        <main id="main">
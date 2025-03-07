<?php
require_once("head.php");
require_once("database-connection.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécurisation de l'entrée utilisateur
    
    // Requête avec JOIN pour récupérer les noms des types
    $query = "SELECT p.*, t1.nomType AS nomType1, t2.nomType AS nomType2 
              FROM pokemon p 
              LEFT JOIN type_pokemon t1 ON p.idType1 = t1.idType 
              LEFT JOIN type_pokemon t2 ON p.idType2 = t2.idType 
              WHERE p.idPokemon = $id";
              
    $result = mysqli_query($databaseConnection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "<h1>" . htmlspecialchars($row['nomPokemon']) . "</h1>";
        
        if (!empty($row['urlPhoto'])) {
            echo "<img src='" . htmlspecialchars($row['urlPhoto']) . "' alt='" . htmlspecialchars($row['nomPokemon']) . "' width='200'>";
        }
        
        // Affichage des types
        echo "<p><strong>Type principal:</strong> " . htmlspecialchars($row['nomType1']) . "</p>";
        
        if (!empty($row['nomType2'])) {
            echo "<p><strong>Type secondaire:</strong> " . htmlspecialchars($row['nomType2']) . "</p>";
        }
        
        echo "<p><strong>PV:</strong> " . $row['PV'] . "</p>";
        echo "<p><strong>Attaque:</strong> " . $row['PtsAttaque'] . "</p>";
        echo "<p><strong>Défense:</strong> " . $row['PtsDefense'] . "</p>";
        echo "<p><strong>Vitesse:</strong> " . $row['PtsVitesse'] . "</p>";
        echo "<p><strong>Spécial:</strong> " . $row['PtsSpecial'] . "</p>";
        echo "<p><strong>Date d'ajout:</strong> " . $row['DateAjout'] . "</p>";
    } else {
        echo "<p>Pokémon non trouvé.</p>";
    }
} else {
    echo "<p>ID de Pokémon non fourni.</p>";
}

require_once("footer.php");
?>
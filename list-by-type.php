<!--  
    Ce fichier représente la page de liste par type de pokémon du site.
-->
<?php 
require_once("head.php");
require_once("database-connection.php");



$typeQuery = $databaseConnection->query("SELECT * FROM type_pokemon ORDER BY nomType");

while ($type = $typeQuery->fetch_assoc()) {
    $typeName = $type['nomType'];
    $typeId = $type['idType']; 
    
    echo "<h2>Type : " . ($typeName) . "</h2>";

    $sql = "SELECT p.*, t1.nomType AS type1, t2.nomType AS type2 
            FROM pokemon p
            LEFT JOIN type_pokemon AS t1 ON p.idType1 = t1.idType
            LEFT JOIN type_pokemon AS t2 ON p.idType2 = t2.idType
            WHERE p.idType1 = $typeId OR p.idType2 = $typeId 
            ORDER BY p.nomPokemon";
            
    $result = $databaseConnection->query($sql);
    
 
    if ($result && $result->num_rows > 0) {
        echo '
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Numéro</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td>' . ($row['nomPokemon']) . '</td>
                    <td>' . ($row['idPokemon']) . '</td>
                    <td><img src="' . ($row['urlPhoto']) . '" alt="' . ($row['nomPokemon']) . '" height="50"></td>
                </tr>';
        }
        
        echo '
            </tbody>
        </table>';
    } else {
        echo "<p>Aucun Pokémon de ce type.</p>";
    }
}
?>

<?php
require_once("footer.php");
?>
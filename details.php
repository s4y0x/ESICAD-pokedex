<?php
require_once("head.php");
require_once("database-connection.php");

$pokemonId = $_GET['id'];

$sql = "SELECT p.*, t1.nomType AS type1, t2.nomType AS type2 
        FROM pokemon p
        LEFT JOIN type_pokemon AS t1 ON p.idType1 = t1.idType
        LEFT JOIN type_pokemon AS t2 ON p.idType2 = t2.idType
        WHERE p.idPokemon = $pokemonId";

$result = $databaseConnection->query($sql);

if ($result && $result->num_rows > 0) {
    $pokemon = $result->fetch_assoc();
    
    echo '<h2>Détails du Pokémon</h2>';
    echo '<table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Numéro</th>
                    <th>Image</th>
                    <th>Type(s)</th>
                    <th>PV</th>
                    <th>Attaque</th>
                    <th>Défense</th>
                    <th>Vitesse</th>
                    <th>Special</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . $pokemon['nomPokemon'] . '</td>
                    <td>' . $pokemon['idPokemon'] . '</td>
                    <td><img src="' . $pokemon['urlPhoto'] . '" alt="' . $pokemon['nomPokemon'] . '" height="100"></td>
                    <td>' . $pokemon['type1'] . ($pokemon['type2'] ? ' <br>' . $pokemon['type2'] : '') . '</td>
                    <td>' . $pokemon['PV'] . '</td>
                    <td>' . $pokemon['PtsAttaque'] . '</td>
                    <td>' . $pokemon['PtsDefense'] . '</td>
                    <td>' . $pokemon['PtsVitesse'] . '</td>
                    <td>' . $pokemon['PtsSpecial'] . '</td>
                </tr>
            </tbody>
          </table>';
} else {
    echo "<p>Aucun Pokémon trouvé.</p>";
}

require_once("footer.php");
?>
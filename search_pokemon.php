<?php
require_once("head.php");
?>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Numéro</th>
            <th>Image</th>
            <th>Type(s)</th>
        </tr>

    </thead>
    <tbody>
    
        <?php
        require_once("database-connection.php");
        $sql = "SELECT *, t1.nomType AS type1, t2.nomType AS type2 FROM pokemon 
        LEFT JOIN type_pokemon AS t1 ON pokemon.idType1 = t1.idtype 
        LEFT JOIN type_pokemon AS t2 ON pokemon.idType2 = t2.idtype
        WHERE nomPokemon LIKE '%" .$_GET["q"]. "%' ";
        $res = $databaseConnection->query($sql)->fetch_all(MYSQLI_ASSOC);
        foreach ($res as $row){
            echo
            '<tr>
            <td><a href="details.php?id=' . $row['idPokemon'] . '">' . $row['nomPokemon'] . '</a> </td>
            <td>' . $row['idPokemon'] . '</td>
            <td><img src="' . $row['urlPhoto'] . '" alt="Pokeimage"></td>
            <td>' . $row['type1']  . '<br>' . $row['type2'] . '</td>
            </tr>';
    }   
    ?>




</tbody>
</table>
<?php
require_once("footer.php");
?>

<?php
require_once("head.php");
require_once("database-connection.php");

$result = $databaseConnection -> query ( "SELECT * FROM pokemon");
while ( $row =$result ->fetch_assoc()) {
    echo '<p>'.$row['nomPokemon'].'</p>';
    echo '<p>'.$row["idPokemon"].'</p>';
    echo '<img src="'. $row["urlPhoto"] .'"alt="">' ;
   
}




require_once("footer.php")
?>
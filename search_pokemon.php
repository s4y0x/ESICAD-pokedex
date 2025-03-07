<?php
require_once("head.php");
require_once("database-connection.php");
$sql = "SELECT * FROM pokemon WHERE nomPokemon LIKE '%" .$_GET["q"]. "%'";
$res = $databaseConnection->query($sql)->fetch_all(MYSQLI_ASSOC);
foreach ($res as $row){
    echo '<p>'.$row['nomPokemon'].'</p>';
    echo '<p>'.$row["idPokemon"].'</p>';
    echo '<img src="'. $row["urlPhoto"] .'"alt="">' ;
}




require_once("footer.php");
?>

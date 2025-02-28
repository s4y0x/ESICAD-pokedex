<!-- 
    Ce fichier représente la page de liste de tous les pokémons.
-->
<?php
require_once("head.php");
?>
<?php
require_once ("database-connection.php") ;
?>
<?php
if ($result = mysqli_query($databaseConnection, "SELECT * FROM pokemon")) {

  // Seek to row number 15
  mysqli_data_seek($result,14);

  // Fetch row
  $row=mysqli_fetch_row($result);

  printf ("ID: %s <br>NOM: %s<br>URL: %s<br>PV: %s<br>PtsAttaque: %s<br>PtsDefense: %s<br>PtsSpecial: %s<br>PtsVitesse: %s<br>DateAjout: %s<br>idType2:  %s\r<br>idType1 %s", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10]);

  // Free result set
  mysqli_free_result($result);
}
?>

<pre>
    &lt;
    A REMPLACER PAR VOTRE CODE POUR CHARGER ET AFFICHER DANS UN TABLEAU LA LISTE DES POKEMONS PAR LEUR NOM.
    CHAQUE POKEMON DOIT ETRE CLIQUABLE POUR NAVIGUER SUR UNE PAGE OU L'ON AFFICHE SON IMAGE ET L'ENSEMBLE DE SES CARACTERISTIQUES 
    &gt;
    </pre>


<?php
require_once("footer.php");
?>
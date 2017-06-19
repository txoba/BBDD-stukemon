<?php
require_once 'bbdd.php';
echo "<form action='' method='post'>";
echo'<table style="width:50%" border="1">';
echo "<tr><th>Nombre</th><th>Puntos</th><th>Pokeballs</th><th>Pociones</th>";
$trainer = selectTrainerRanking();
while ($fila = mysqli_fetch_array($trainer)) {
    extract($fila);
    echo "<tr><td>$name</td><td>$points</td><td>$pokeballs</td><td>$potions</td>";
}
echo'</table>';
echo "</form>";
echo "<form action='index.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";
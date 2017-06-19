<?php
require_once 'bbdd.php';
echo "<form action='' method='post'>";
echo'<table style="width:20%" border="1">';
echo "<tr><th>Ganador</th><th>Victorias</th>";
$batalla = selectRankingBatalla();
while ($fila = mysqli_fetch_array($batalla)) {
    extract($fila);
    echo "<tr><td>$winner</td><td>$victory</td>";
}
echo'</table>';
echo "</form>";
echo "<form action='index.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";
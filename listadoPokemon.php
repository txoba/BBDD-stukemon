<?php
require_once 'bbdd.php';
echo "<form action='' method='post'>";
echo'<table style="width:80%" border="1">';
echo "<tr><th>Nombre</th><th>Tipo</th><th>Habilidad</th>"
   . "<th>Ataque</th><th>Defensa</th><th>Velocidad</th>"
   . "<th>Vida</th><th>Nivel</th><th>Entrenador</th></tr>";
$pokemon = selectPokemonLevelLife();
while ($fila = mysqli_fetch_array($pokemon)) {
    extract($fila);
    echo "<tr><td>$name</td><td>$type</td><td>$ability</td>"
       . "<td>$attack</td><td>$defense</td><td>$speed</td>"
       . "<td>$life</td><td>$level</td><td>$trainer</td></tr>";
}
echo'</table>';
echo "</form>";
echo "<form action='index.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";
<?php

require_once 'bbdd.php';

if (isset($_POST['obtener'])) {
    $entrenador = $_POST['trainer'];
    $pociones = $_POST['potions'];
    $puntos = selectPoints($entrenador);
    if ($puntos < 10 * $pociones) {
        $numPociones = 10 * $pociones;
        $numPocionesFinal = $numPociones / 10;
        updatePociones($numPociones, $numPocionesFinal, $entrenador);
    } else {

        echo 'no tienes dinero--------><a href="index.php">volver al menu principal</a>';
    }
} else {
    echo '<form action="" method="POST">';
    echo "Seleccionar Entrenador: ";
    echo "<select name='trainer'>";
    $trainer = selectTrainer();
    while ($fila = mysqli_fetch_array($trainer)) {
        extract($fila);
        echo "<option value='$name'>$name. Pociones: $potions. Puntos: $points</option>";
    }
    echo "</select>";
    echo 'Introducir numero de pociones: <input type="number" name="potions" >';
    echo "<input type='submit' value='Obtener pociones' name='obtener'>";
    echo "</form>";
}








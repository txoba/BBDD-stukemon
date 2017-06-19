<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $name = $_POST["name"];
    $type = $_POST["type"];
    $ability = $_POST["ability"];
    $attack = $_POST["attack"];
    $defense = $_POST["defense"];
    $speed = $_POST["speed"];
    $life = $_POST["life"];
    $trainer = $_POST["trainer"];
    newPokemon($name, $type, $ability, $attack, $defense, $speed, $life, 0, $trainer);
} else {
    echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "name" required><br>
        Tipo: <input type = "text" name = "type" required><br>
        Habilidad: <input type = "text" name = "ability" required><br>
        Ataque: <input type = "number" name = "attack" required><br>
        Defensa: <input type = "number" name = "defense" required><br>
        Velocidad: <input type = "number" name = "speed" required><br>
        Vida: <input type = "number" name = "life" required><br>';
    $datos = selectTrainer();
    echo " 
        Entrenador:<select name='trainer' requiered>";
        while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>
        <input type = "submit" name = "enviar" value = "Alta Pokemon"><br>
        </form>';
}
?>

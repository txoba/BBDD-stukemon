<?php
require_once('bbdd.php');
if (isset($_POST["pokemon"])) {
    $name = $_POST["name"];
    $type = $_POST["type"];
    $ability = $_POST["ability"];
    $attack = $_POST["attack"];
    $defense = $_POST["defense"];
    $speed = $_POST["speed"];
    $life = $_POST["life"];
    $trainer = $_POST["trainer"];
    newPokemon($name, $type, $ability, $attack, $defense, $speed, $life, 0, $trainer);    
}

else if (isset($_POST["trainer"])) {
    $datos = selectPokemonByTrainer($name);
    echo " 
        Seleccionar pokemon:<select name='trainer' requiered>";
        while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>
        <input type = "submit" name = "pokemon" value = "Seleccionar"><br>
        </form>';
}

else {
    $datos = selectTrainer();
    echo " 
        Seleccionar entrenador:<select name='trainer' requiered>";
        while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>
        <input type = "submit" name = "trainer" value = "Seleccionar"><br>
        </form>';
}
?>
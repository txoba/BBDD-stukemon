<?php
require_once('bbdd.php');
if (isset($_POST["seleccionar"])) {
    $datos = selectPokemonByTrainer($name);
    echo " 
        Seleccionar pokemon:<select name='pokemon' requiered>";
        while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>
        <input type = "submit" name = "seleccionar2" value = "Seleccionar"><br>
        </form>';
}

else if (isset($_POST["seleccionar2"])) {
    updatePotions($name);
    updateLife($name);
}

else {
    $datos = selectTrainerPociones();
    echo " 
        Seleccionar entrenador:<select name='trainer' requiered>";
        while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>
        <input type = "submit" name = "seleccionar" value = "Seleccionar"><br>
        </form>';
}
?>

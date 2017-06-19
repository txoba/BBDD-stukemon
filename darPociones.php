<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $pociones = $_POST["pociones"];
    $entrenador = $_POST["trainer"];
    $datos = selectTrainer();
    $fila = mysqli_fetch_array($datos);
    extract($fila);
    
    $needPoints = $pociones*10;
    
    if($points>$needPoints){
        
    }
    
} else {
    $datos = selectTrainer();
    echo " 
        Entrenador: <select name='trainer' requiered>";
        while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>
        Cuantas pociones? <input type = "number" name = "pociones" required><br>
        <input type = "submit" name = "enviar" value = "Enviar"><br>
        </form>';
}
?>

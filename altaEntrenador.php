<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $name = $_POST["nombre"];
    $pokeballs = $_POST["pokeballs"];
    $potions = $_POST["potions"];   
    newTrainer($name, $pokeballs, $potions,0);
} else {
    echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "nombre" required><br>
        Pokeballs: <input type = "number" name = "pokeballs" required><br>
        Pociones: <input type = "number" name = "potions" required><br>
        <input type = "submit" name = "enviar" value = "Alta entrenador"><br>
        </form>';
}
?>
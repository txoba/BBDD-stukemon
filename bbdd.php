<?php

//CONECTAR

function conectar($database) {
    $conexion = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $conexion;
}

//DESCONECTAR

function desconectar($conexion) {
    mysqli_close($conexion);
}

//INSERTS

function newTrainer($name, $pokeballs, $potions, $points) {
    $conexion = conectar("stukemon");
    $insert = "insert into trainer values('$name', $pokeballs, $potions, $points)";
    if (mysqli_query($conexion, $insert)) {
        echo "Entrenador dado de alta<br>";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($conexion);
    }
    desconectar($conexion);
}
function newPokemon($name, $type, $ability, $attack, $defense, $speed, $life, $level, $trainer) {
    $conexion = conectar("stukemon");
    $insert = "insert into pokemon values('$name', '$type', '$ability', $attack, $defense, $speed, $life, $level, '$trainer')";
    if (mysqli_query($conexion, $insert)) {
        echo "Pokemon dado de alta<br>";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($conexion);
    }
    desconectar($conexion);
}
function winner($pokemon1,$pokemon2,$winner){
    $con = conectar("stukemon");
    $insert = "insert into battle (pokemon1, pokemon2, winner) values ('$pokemon1','$pokemon2','$winner')";
    mysqli_query($con, $insert);
    desconectar($con);
}

//SELECTS

function selectTrainer() {
    $con = conectar("stukemon");
    $query = "select * from trainer;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectTrainerPociones() {
    $con = conectar("stukemon");
    $query = "select name from trainer where potions>0 and name in (select trainer from pokemon);";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectTrainerRanking() {
    $con = conectar("stukemon");
    $query = "select * from trainer order by points desc;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectTrainerByName($name) {
    $con = conectar("stukemon");
    $query = "select * from trainer where name='$name';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectPokemonByTrainer($trainer) {
    $con = conectar("stukemon");
    $query = "select * from pokemon where trainer='$trainer';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectPokemonByName($pokemon) {
    $con = conectar("stukemon");
    $query = "select * from pokemon where name='$pokemon';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectPokemonLevelLife() {
    $con = conectar("stukemon");
    $query = "select * from pokemon order by level desc, life desc;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectRankingBatalla() {
    $con = conectar("stukemon");
    $select = "select winner, count(*) as victory from battle group by winner order by victory desc;";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

//UPDATES

function updateLvl($name){ //Subida de nivel del pokemon
    $con = conectar("stukemon");
    $update = "update pokemon set level = level + 1 where name='".$name."'";
    mysqli_query($con, $update);
    desconectar($con);
}
function update10pts($name){ //Puntos entrenador ganador
    $con = conectar("stukemon");
    $update = "update trainer set points = points + 10 where name='".$name."'";
    mysqli_query($con, $update);
    desconectar($con);
}
function update1pto($name){ //Puntos entrenador perdedor
    $con = conectar("stukemon");
    $update = "update trainer set points = points + 1 where name='".$name."'";
    mysqli_query($con, $update);
    desconectar($con);
}
function updateVida($name,$life){
    $con = conectar("stukemon");
    $select = "update pokemon set life = ".$life." where name='".$name."'";
    mysqli_query($con, $select);
    desconectar($con);
}
function modificarpociones($name) {
    $con = conectar("stukemon");
    $update = "update trainer set potions=potions-1 where name='$name'";
    if (mysqli_query($con, $update)) {
        echo "Pociones actualizadas<br>";
    } else {
        echo mysqli_error($con);
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    }
    desconectar($con);
}
function modificarvidapokemon($pokemon) {
    $con = conectar("stukemon");
    $update = "update pokemon set life=life+50 where name='$pokemon'";
    if (mysqli_query($con, $update)) {
        echo "Vida modificada<br>";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($con);
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    }
    desconectar($con);
}
function updatePociones($puntosFinal,$pociones,$name) {
    $con = conectar("stukemon");
    $update = "update trainer set points=points-$puntosFinal, potions=potions+$pociones where name='$name'";
    if (mysqli_query($con, $update)) {
        echo "Puntos y pociones actualizados<br>";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($con);
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    }
    desconectar($con);
}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stukemon - Batalla!</title>
    </head>
    <body>
        <?php
        require_once('bbdd.php');
        
        if (isset($_POST["Batallar"])) {
            $pokemon1 = $_POST["pokemon1"];
            $pokemon2 = $_POST["pokemon2"];
        $poke1 = selectPokemonByTrainer($pokemon1);
        $fila = mysqli_fetch_array($poke1);
        extract($fila);
        $fuerza1 = $attack + 2*$level;
        $vida1 = $life;

        $poke2 = selectPokemonByTrainer($pokemon2);
        $fila = mysqli_fetch_array($poke2);
        extract($fila);
        $fuerza2 = $attack + 2*$level;
        $vida2 = $life;
        
        $result1 = $vida1-$fuerza2;
        if ($result1 <0 ) {$result1 =0;} 
        updateVida($pokemon1,$result1);
        echo "Vida ".$pokemon1.": ".$result1."<br>";
        
        $result2 = $vida2-$fuerza1;
        if ($result2 <0 ) {$result2 =0;}       
        updateVida($pokemon2,$result2);
        echo "Vida ".$pokemon2.": ".$result2."<br>";
        
        if($result1>$result2){
            winner($pokemon1,$pokemon2,$pokemon1);
        }
        if($result2>$result1){
            winner($pokemon1,$pokemon2,$pokemon2);
        }
        
        }
        ?>
    </body>
</html>

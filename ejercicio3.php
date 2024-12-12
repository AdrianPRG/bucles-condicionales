<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <img src="imagenes/poker.png" width="100px" class="mb-3">
        <h2 style="font-family:'Times New Roman', Times, serif;font-style:italic">Bienvenido al juego de cartas - ALG</h2>
        <hr>
        <?php
        
        $listaPalos=array("hearts","spades","clubs","diamonds");
        //Esta lista contendrá todos los palos y numeros (Cartas creadas)
        $listacartas = array();

        //Hacemos un bucle en el que primero,recorreremos cada palo (corazones,picas,etc)
        for ($i=0;$i<count($listaPalos);$i++){
            /* Cada palo puede tener 13 valores distintos, crearemos un bucle que creará cada numero de carta*/
            for ($x=1;$x<=13;$x++){
                /*Los naipes 1,11,12,13 tienen un valor distinto, asi que cuando salga
                uno de ellos, se aplicará el nombre correspondiente, si no es ningun naipe con nombre, se asignará el de la iteraccion actual*/
                switch($x){
                    case 1:
                        //Se guarda la carta con su correspondiente valor
                        $listacartas["ace_of_$listaPalos[$i]"]=$x;
                        break;  
                    case 11:
                        $listacartas["jack_of_$listaPalos[$i]"]=$x;
                        break;
                    case 12:
                        $listacartas["queen_of_$listaPalos[$i]"]=$x;
                        break;
                    case 13:
                        $listacartas["king_of_$listaPalos[$i]"]=$x;
                        break;
                    default:
                    $listacartas["$x" . "_of_$listaPalos[$i]"]=$x;
                        break;
                }
            }
        }

        //Se seleccionan las dos cartas
        $carta1 = array_rand($listacartas);
        do{
            $carta2 = array_rand($listacartas);
        }
        while($carta2==$carta1);

        //Este div colocará las dos cartas en horizontal para que se muestren
        echo "<div style='display: flex;text-align:center;justify-content:center'>";

        //Se mostrará la primera carta
            echo "<div class='ms-5'>
                <img src='imagenes/$carta1.png' width=170px>
            </div>";

        //Se mostrará la segunda carta
            echo "<div class='ms-5'>
                <img src='imagenes/$carta2.png' width=170px>
            </div>";
        
        echo "</div> <hr>";

        //Se comprueba el ganador de la comparacion
            if($listacartas[$carta1]>$listacartas[$carta2]){
                echo "<h3> Ganador de la comparacion: <br>" . $carta1 . "</h3>";
            }
            else if($listacartas[$carta1]<$listacartas[$carta2]){
                echo "<h3> Ganador de la comparacion: <br>" . $carta2 . "</h3>";
            }
            //Si hay empate, se muestra el siguiente mensaje
            else  echo "<h3> Pareja, los dos tienen valores iguales </h3>";

        ?>
    </div>
</html>
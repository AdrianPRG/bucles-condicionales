<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">

    <h1>Ejercicio 4</h1>
    <h3>Adrián López</h3>

    <img src="imagenes/caracruz.png" width="130px">


    <?php

    ejecutarApp();

    //Funcion principal que llama a las demas funciones
    function ejecutarApp(){
        $listaJugadores = array();
        creaArray($listaJugadores);
        usuarioObtieneMoneda($listaJugadores,"Jugador1");
        usuarioObtieneMoneda($listaJugadores,"Jugador2");
        MostrarMonedas($listaJugadores);

        Ganador($listaJugadores);
    }

    //Se crea el array asociativo para cada jugador
    function creaArray(&$listaPlayers){
        $listaPlayers["Jugador1"]=array();
        $listaPlayers["Jugador2"]=array();
    }

    //Funcion que dependiendo del resultado devuelve cara o cruz
    function SacarMoneda(){
        $random = random_int(0,1);
        if($random==1){
            return "cara";
        }
        else return "cruz";
    }

    //En esta funcion el usuario pasado por parametros obtendra sus 2 monedas, ademas, su puntuacion se inicializará a 0
    function usuarioObtieneMoneda(&$listaPlayers,$jugador){
        $listaPlayers[$jugador][0]=SacarMoneda();
        $listaPlayers[$jugador][1]=SacarMoneda();
        $listaPlayers[$jugador]["puntuacion"]=0;
    }

    //Se muestran las monedas del usuario
    function MostrarMonedas($listaPlayers){
        foreach ($listaPlayers as $nombreJugador => $jugador) {
            echo "<h3> $nombreJugador </h3> <hr> 
            <div style='display: flex; justify-content: center;'>
                <img src='./imagenes/" . $listaPlayers[$nombreJugador][0] . ".png' width='40px'>
                <img src='./imagenes/" . $listaPlayers[$nombreJugador][1] . ".png' width='40px'>
            </div>";        
        }  
    }

    function Ganador(&$listaPlayers) {
        // Contar caras de cada jugador
        foreach ($listaPlayers as $nombreJugador => $jugador) {
            foreach ($jugador as $moneda) {
                //Si se encuentra que la moneda es una cara, se sumará uno a la puntuacion del usuario
                if ($moneda == "cara") {
                    $listaPlayers[$nombreJugador]["puntuacion"] += 1; // Incrementar la puntuación
                }
            }
        }
        //Se comprueba quien es el ganador, en base a los puntos obtenidos, y se imprimen los resultados
        if($listaPlayers["Jugador1"]["puntuacion"]>$listaPlayers["Jugador2"]["puntuacion"]){            
            echo "<h2> Ganador jugador 1 </h2>";
        }
        else if($listaPlayers["Jugador1"]["puntuacion"]<$listaPlayers["Jugador2"]["puntuacion"]){
            echo "<h2> Ganador jugador 2 </h2>";
        }
        //Si no es ganador ninguno, se muestra empate
        else echo "<h2 style='color:blue'> EMPATE </h2>";
    }
    
    ?>
    </div>
</body>
</html>
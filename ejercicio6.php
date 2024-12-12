<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body>
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;" class="col-sm-4">
        <?php

        if(isset($_POST["cadena"]) && isset($_POST["ronda"]) && isset($_POST["listaPlayer1"]) && isset($_POST["listaPlayer2"])){
            
            $cadena = $_POST["cadena"];
            $ganada=$_POST["ganada"];
            $ronda=$_POST["ronda"];
            $listaPlayer1 = $_POST["listaPlayer1"];
            $listaPlayer2 = $_POST["listaPlayer2"];

            if($ganada==false){
                if($listaPlayer1[2]<=3 || $listaPlayer2[2]<=3){
                    SacarMano($listaPlayer1,$listaPlayer2);
                    DeterminarGanadorRonda($listaPlayer1,$listaPlayer2,$cadena);
                    $ronda++;
                }
                else{
                    if($listaPlayer1[2]>=3){
                        $cadena="Jugador 1 Es el Ganador";
                    }
                    else if($listaPlayer2[2]>=3){
                        $cadena="Jugador 2 es el ganador";
                    }
                    $ganada=true;
                }
            }
            else $cadena="Ya hay un ganador";

        }
        else{
            //Aqui estan definidos las variables que se usarán en el codigo
            $ganada = false;
            $cadena="";
            $ronda=0;
            //Recordatorio: Para pasar un array, SIEMPRE, hay que inicializarlo desde cero, por que aun que este bien definido, php dira
            //Que no se encuentra ningun dato POST/GET con el nombre que le hemos dado
            //Inicializarlo siemore
            $listaPlayer1 = ["Jugador1","null",0];
            $listaPlayer2 = ["Jugador2","null",0];
        }



        function SacarMano(&$listajugador1,&$listajugador2){
            $listaManos = array("Piedra","Papel","Tijeras","Lagarto","Spock");

            $listajugador1[1] = $listaManos[array_rand($listaManos)];
            $listajugador2[1] = $listaManos[array_rand($listaManos)];
            
        }

        function DeterminarGanadorRonda(&$listajugador1,&$listajugador2,&$cadena){
            switch($listajugador1[1]){
                case "Piedra":
                    if($listajugador2[1]=="Tijeras" || $listajugador2[1]=="Lagarto"){
                        $listajugador1[2]+=1;
                        $cadena="Jugador 1 ({$listajugador1[1]}) gana a Jugador2 ({$listajugador2[1]})";
                    }
                    else if($listajugador2[1]=="Papel" || $listajugador2[1]=="Spock"){
                        $listajugador2[2]+=1;
                        $cadena="Jugador 2 ({$listajugador2[1]}) gana a Jugador1 ({$listajugador1[1]})";

                    }
                    else $cadena="Ronda de empate";
                    break;
                case "Papel":
                    if($listajugador2[1]=="Piedra" || $listajugador2[1]=="Spock"){
                        $listajugador1[2]+=1;
                        $cadena="Jugador 1 ({$listajugador1[1]}) gana a Jugador2 ({$listajugador2[1]})";

                    }
                    else if($listajugador2[1]=="Tijeras" || $listajugador2[1]=="Lagarto"){
                        $listajugador2[2]+=1;
                        $cadena="Jugador 2 ({$listajugador2[1]}) gana a Jugador1 ({$listajugador1[1]})";
                    }
                    else $cadena="Ronda de empate";
                    break;
                case "Tijeras":
                    if($listajugador2[1]=="Papel" || $listajugador2[1]=="Lagarto"){
                        $listajugador1[2]+=1;
                        $cadena="Jugador 1 ({$listajugador1[1]}) gana a Jugador2 ({$listajugador2[1]})";
                    }
                    else if($listajugador2[1]=="Piedra" || $listajugador2[1]=="Spock"){
                        $listajugador2[2]+=1;
                        $cadena="Jugador 2 ({$listajugador2[1]}) gana a Jugador1 ({$listajugador1[1]})";

                    }
                    else $cadena="Ronda de empate";
                    break;
                case "Lagarto":
                    if($listajugador2[1]=="Spock" || $listajugador2[1]=="Papel"){
                        $listajugador1[2]+=1;
                        $cadena="Jugador 1 ({$listajugador1[1]}) gana a Jugador2 ({$listajugador2[1]})";

                    }
                    else if($listajugador2[1]=="Piedra" || $listajugador2[1]=="Tijeras"){
                        $listajugador2[2]+=1;
                        $cadena="Jugador 2 ({$listajugador2[1]}) gana a Jugador1 ({$listajugador1[1]})";

                    }
                    else $cadena="Ronda de empate";
                    break;
                case "Spock":
                    if($listajugador2[1]=="Tijeras" || $listajugador2[1]=="Piedra"){
                        $listajugador1[2]+=1;
                        $cadena="Jugador 1 ({$listajugador1[1]}) gana a Jugador2 ({$listajugador2[1]})";
                    }
                    else if($listajugador2[1]=="Lagarto" || $listajugador2[1]=="Papel"){
                        $listajugador2[2]+=1;
                        $cadena="Jugador 2 ({$listajugador2[1]}) gana a Jugador1 ({$listajugador1[1]})";
                    }
                    else $cadena="Ronda de empate";
                    break;
            }

        }

        ?>

            <form method="post">
                <h4 style="font-family:'Times New Roman', Times, serif;">Piedra, papel, tijeras, lagarto y spock <br> ALG</h4>
                <div style="justify-content: center;background-color:aliceblue;" class="mt-3 mb-3">
                    <?php  
                        foreach($listaPlayer1 as $valor){
                            echo '<input type="hidden" name="listaPlayer1[]" value="' . $valor . '">';
                        }
                        foreach ($listaPlayer2 as $valor2) {
                            echo '<input type="hidden" name="listaPlayer2[]" value="' . $valor2 . '">';
                        }
                    ?>
                    <input type="hidden" name="ganada" id="ganada" value="<?php echo $ganada ?>">
                    <input type="hidden" name="ronda" id="ronda" value="<?php echo $ronda ?>">
                    <h5>Ronda: <?php echo $ronda ?></h5>
                    <div style="display: flex;">
                        <div style="width: 100%;height:200px;background-color:#decd9e;padding-top:20px">
                            <h4>Jugador 1</h4>
                            <img src="../ejercicios/imagenes/<?php echo $listaPlayer1[1] ?>.png" style="padding-top:30px" width="50px" alt="Jugar">
                        </div>
                        <div style="width: 100%;height:200px;background-color:#91c981;padding-top:20px">
                            <h4>Jugador 2</h4>
                            <img src="../ejercicios/imagenes/<?php echo $listaPlayer2[1] ?>.png" style="padding-top:30px" width="50px" alt="Jugar">
                        </div>
                    </div>
                    <div style="justify-content:center;display:flex;flex-direction:column;align-items:center;padding:20px">
                        <input style="width: 400px;text-align:center" type="text" readonly  name="cadena" id="cadena" value="<?php echo $cadena ?>">
                        <input style="width:100px;margin-top:20px" class="form-control btn-primary btn" type="submit" value="Jugar" aria-describedby="helpId">
                    </div>
                </div>
            </form>
            <form>
                <input style="width:100px;margin-top:20px" value="Reset" class="form-control btn-secondary btn" type="submit" aria-describedby="helpId">
            </form>
        </div>
    </body>
    </html>
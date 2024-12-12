<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body style="background-color: #e0a0f2;">
        <?php 
        
        //Si esta definido los campos, es decir, ya ha empezado la "partida", se ejecuta el codigo principal
        if(isset($_POST["input"]) && isset($_POST["intento"]) && isset($_POST["random"])){
            $ganado=$_POST["gana"];
            $numero_obtenido = $_POST["input"];
            $intento = $_POST["intento"];
            $random = $_POST["random"];
            $texto = $_POST["txt"];


            if($ganado==true){
                $texto="No puedes volver a introducir";
            }else{
                //Si no se han acabado los intentos, el usuario puede permitir insertar numeros
                if($numero_obtenido==$random){
                    $intento--;
                    $texto="Ganaste!";
                    $ganado=true;
                }
                else{
                    if($intento!=0){
                        $intento--;
    
                               //Si el numero obtenido está a cinco posiciones, se imprime lo siguiente
                               if(abs($numero_obtenido-$random)<=5 || abs($random-$numero_obtenido)<=5){
                                   $texto="Calentito Totalis!";
                               }
                               //Si esta a mayor posicion, se calcula si es mayor a el o menor
                               else{
                                   if($numero_obtenido>$random){
                                       $texto= "Incorrecto, es mayor al valor";
                                   }
                                   else if ($numero_obtenido<$random){
                                       $texto=  "Incorrecto, es menor al valor";
                                   }
                               }
                           }
                   else $texto = "Te has quedado sin intentos";
                }
            }
        }
            
        //Si no, se inicializan los valores de intentos y random
        else{
            $texto="";
            $intento=6;
            $random = rand(1,30);
            $ganado=false;
        }
    
        ?>
        <div style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <div>
                <b style="font-family:'Times New Roman', Times, serif">Adivina el numero - ALG</b>
            </div>
            <div class="mt-4">
                <img src="imagenes/ej5.png" width="130px">
            </div>
            <div class="m-5 col-sm-8"> 
                <form method="post" action="ejercicio5.php">
                    <label for="input" style="font-family:'Times New Roman', Times, serif;font-size:x-large" class="form-label">Introduce un numero</label>
                    <input style="text-align: center;" type="number" required class="form-control" name="input" id="input" aria-describedby="helpId" placeholder="Numero.."/>
                    <input style="text-align: center;font-weight:bold;font-size:14px" type="text" readonly class="form-control mt-3 mb-2" name="txt" id="txt" value="<?php echo $texto  ?>">
                    <b> <?php ($intento>=1) ? print "Numero de intentos " . $intento : print "Se han acabado los intentos"  ?></b>
                    <input type="hidden" id="intento" name="intento" value="<?php echo $intento ?>">
                    <input type="hidden" id="random" name="random" value="<?php echo $random ?>">
                    <input type="hidden" id="gana" name="gana" value="<?php echo $ganado ?>">
                    <input type="submit" class="btn btn-primary mt-2">
                </form>
                <form method="get" action="ejercicio5.php">
                      <input type="submit" class="btn btn-secondary mt-3" value="Reiniciar">
                </form>
            </div>
        </div>
    </body>
</html>
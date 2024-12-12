<?php

if(isset($_POST["cabecera"]) && isset($_POST["cuerpo"]) && isset($_POST["pie"]) && isset($_POST["estilo"])){
    $cabecera = "";
    $cuerpo = "";
    $pie = "";
    $estilo = "";

    switch($_POST["cabecera"]){
        case "aot":
            $cabecera = "aot.php";
            break;
        case "op":
            $cabecera = "op.php";
            break;
        case "db":
            $cabecera = "db.php";
            break;
    }

    switch($_POST["cuerpo"]){
        case "imdb":
            $cuerpo = "cuerpo_imdb.php";
            break;
        case "mal":
            $cuerpo = "cuerpo_mal.php";
            break;
        case "rotten":
            $cuerpo = "cuerpo_rtt.php";
            break;
    }


    switch($_POST["pie"]){
        case "cc":
            $pie = "pie_crunchy.php";
            break;
        case "aflv":
            $pie = "pie_flv.php";
            break;
        case "prime":
            $pie=  "pie_prime.php";
            break;
    }

    switch ($_POST["estilo"]) {
        case "ant":
            $estilo = "antiguo.css";
            break;
        case "act":
            $estilo = "actual.css";
            break;
        case "fut":
            $estilo = "futurista.css";
            break;
    }

    echo "
    <html>
    <head>
    <link rel='stylesheet' href='" . $estilo . "' >
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    </head>";

    include $cabecera;
    include $cuerpo;
    include $pie;

   echo "</html>";

}
?>

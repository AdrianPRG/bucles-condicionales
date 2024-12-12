<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #cfe6d5;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;width:500px">
    <form method="post" action="../ejercicios/archivos_ej8/webcompleta.php">
            <div class="mb-3">
                <label for="cabecera" class="form-label">Cabecera</label>
                <div style="display: flex;">
                <img src="https://cdn-icons-png.flaticon.com/512/3596/3596232.png" class="me-3" width="70px">
                <select class="form-select form-select-lg" name="cabecera" id="cabecera">
                    <option value="aot" >Attack on Titan</option>
                    <option value="db">Dragon Ball</option>
                    <option value="op">One Piece</option>
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="cuerpo" class="form-label">Cabecera</label>
                <div style="display: flex;">
                <img src="https://cdn-icons-png.flaticon.com/512/2728/2728242.png" class="me-3" width="70px">
                <select class="form-select form-select-lg" name="cuerpo" id="cuerpo">
                    <option value="imdb" >IMDB</option>
                    <option value="mal">MyAnimeList</option>
                    <option value="rotten">Rotten Tomatoes</option>
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="pie" class="form-label">Pie de pagina</label>
                <div style="display: flex;">
                <img src="https://cdn-icons-png.flaticon.com/512/32/32206.png" class="me-3" width="70px">
                <select class="form-select form-select-lg" name="pie" id="pie">
                    <option value="cc" >Crunchyroll</option>
                    <option value="aflv">AnimeFLV</option>
                    <option value="prime">Prime Video</option>
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="estilo" class="form-label">CSS</label>
                <div style="display: flex;">
                <img src="https://cdn-icons-png.flaticon.com/512/29/29600.png" class="me-3" width="70px">
                <select class="form-select form-select-lg" name="estilo" id="estilo">
                    <option value="fut" >Futurista</option>
                    <option value="act">Estilo Actual</option>
                    <option value="ant">Antiguo</option>
                </select>
                </div>
            </div>
            <div class="mb-3 mt-4" >
                <input type="submit" class="form-control btn btn-primary" name="enviar" id="enviar" aria-describedby="helpId" placeholder="" />
                <small id="helpId" class="form-text text-muted">Pulse para enviar</small>
            </div>
    </form>
    </div>   
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginación</title>
    <link rel="stylesheet" href="estilos/login.css">
</head>

<body>
    <?php
    include_once 'includes/peliculas.php';
    $peliculas = new Peliculas(2,5);
    ?>
    <div id="container">
        <div id="paginas">
            <?php
            $peliculas->mostrarPaginas();
            ?>
        </div>
        <div class="peliculas"></div>
        <?php
        $peliculas->mostrarPeliculas();
        ?>
        <div id="paginas">
            <?php
            $peliculas->mostrarPaginas();
            ?>
        </div>
    </div>
</body>

</html>
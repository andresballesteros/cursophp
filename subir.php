<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivos</title>
    <link rel="stylesheet" href="estilos/login.css">
</head>

<body>

    <form action="includes/upload.php" method="post" enctype="multipart/form-data">
        <h2>Subir Archivo</h2>
        <input type="file" name="file" require>
        <p class="center"><input type="submit" value="Subir archivo"></p>
    </form>
</body>

</html>
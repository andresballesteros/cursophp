<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="estilos/login.css">
</head>

<body>

    <form action="email.php" method="post">
        <h2>Contacto</h2>
        <p>Nombre: <br>
            <input type="text" name="name" id="" required>
        </p>

        <p>
            Correo Electrónico: <br>
            <input type="email" name="email" id="" required>
        </p>

        <p>Comentario: <br>
            <textarea name="comment" id="" cols="30" rows="10" required></textarea>
        </p>
        <p class="center">
            <input type="submit" value="Enviar correo">
        </p>

    </form>

</body>

</html>
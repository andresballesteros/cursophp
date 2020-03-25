<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/login.css">
</head>

<body>
    <div id="menu">
        <ul>
            <li>Home</li>
            <li class="cerrar-sesion">
                <?php echo $user->getUserName(); ?>
                <a href="includes/logout.php">Cerrar sesión</a>
            </li>
        </ul>
    </div>
    <section>
        <h1>Bienvenido <?php echo $user->getNombre(); ?></h1>
    </section>
</body>

</html>
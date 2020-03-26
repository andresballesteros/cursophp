<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
    <link rel="stylesheet" href="estilos/login.css">
</head>

<body>
    <div id="main-container">
        <form id="nuevo-pendiente-container" action="" method="post">
            <p>Qué hacer<br>
                <input type="text" name="todo" id="todo">
            </p>
            <p>
                <input id="bEnviar" type="button" value="Añadir todo">
            </p>
        </form>
    </div>
    <div id="mostrar-todo-container">

    </div>

    <script src="js/main.js"></script>
    <script>
        cargarTodos();
    </script>

</body>

</html>
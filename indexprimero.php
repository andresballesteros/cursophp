<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar datos</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <header>
        <form action="index.php" method="POST">
            <input type="text" name="texto" id="texto">
            <input type="submit" value="Añadir pendiente">
        </form>

        <div>
            <form action="index.php" method="POST" id="formMostrarTodo">
                <input type="checkbox" name="mostrar_todo" onchange="mostrarTodo(this)" <?php if (isset($_POST['mostrar_todo'])) {
                                                                                            if ($_POST['mostrar_todo'] == 'on') {
                                                                                                echo 'checked';
                                                                                            }
                                                                                        } ?>>Mostrar Todo
            </form>
        </div>
    </header>
    <div>
        <section id="todolist">
            <?php
            include 'conexion.php';
            if ($conexion->connect_error) {

                die("Conexión fallida " . $conexion->connect_error);
            }

            if (isset($_POST['texto'])) {
                $texto = $_POST['texto'];
                if ($texto != "") {
                    $sql = "INSERT INTO todotable (texto,completado) VALUES ('$texto', false)";

                    if ($conexion->query($sql) === true) {
                        /*echo '<div>
            <form action=""><input type="checkbox">' . $texto . '</form></div> ';*/
                    } else {
                        die("Error al  ingresar registro: " . $conexion->error);
                    }
                }
            } else if (isset($_POST['completar'])) {
                $id = $_POST['completar'];
                $sql = "UPDATE todotable set completado = 1 where id = $id";
                if ($conexion->query($sql) === true) {
                } else {
                    die("Error al actualizar registro: " . $conexion->error);
                }
            } else if (isset($_POST['eliminar'])) {
                $id = $_POST['eliminar'];
                $sql = "DELETE FROM todotable WHERE id = $id";
                if ($conexion->query($sql) === true) {
                } else {
                    die("Error al eliminar el registro: " . $conexion->error);
                }
            }

            if (isset($_POST['mostrar_todo'])) {
                $ordenar = $_POST['mostrar_todo'];
                if ($ordenar == "on") {
                    $sql = "SELECT * FROM todotable ORDER BY completado desc";
                }
            } else {
                $sql = "SELECT * FROM todotable WHERE completado = 0";
            }

            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
            ?>
                <table>
                    <!--<tr>
                        <th>
                            <h3>Ok</h3>
                        </th>
                        <th>
                            <h3>Tarea</h3>
                        </th>
                        <th>
                            <h3>Eliminar</h3>
                        </th>
                    </tr>-->
                    <?php

                    while ($row = $resultado->fetch_assoc()) {
                    ?>
                        <tr <?php if ($row['completado'] == 1) {
                                echo 'class="deshabilitado"';
                            } ?>>
                            <form id="form<?php echo $row['id']; ?>" method="POST" action="">
                                <td><input name="completar" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type="checkbox" onchange="completarPendiente(this)" <?php if ($row['completado'] == 1) { ?>checked disabled <?php } ?>></td>
                                <td><?php echo $row['texto']; ?></td>
                            </form>
                            <form id="form_eliminar_<?php echo $row['id']; ?>" action="index.php" method="POST">
                                <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?>">
                                <td><input type="submit" value="X" style="background: crimson; color: white"></td>
                            </form>

                        </tr>


                <?php
                    }
                }
                $conexion->close();
                ?>
                </table>
        </section>


    </div>

    <script>
        function completarPendiente(e) {
            var id = "form" + e.id;
            var formulario = document.getElementById(id);
            formulario.submit();
        }

        function mostrarTodo(e) {
            var formulario = document.getElementById('formMostrarTodo');
            formulario.submit();
        }
    </script>
</body>

</html>
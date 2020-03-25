<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Usuario</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <header id="headerConsulta">
        <h6>Buscar nombre de ususario por Id</h6>
        <form action="consultaUsuario.php" method="POST">
            <input name="id" id="id" type="text" pattern="^[0-9]+">
            <input type="submit" value="Consultar">
        </form>
        <?php
        include 'conexion.php';

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            if ($id != null && $id != "" && is_numeric($id)) {
                $sql = "SELECT * FROM usuarios WHERE id = $id";

                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
        ?>
                        <h6><?php echo $row['nombre'] . " " . $row['apellido'] ?> </h6>
                    <?php
                    }
                } else {
                    ?>
                    <h5 class="error">
                        El id ingresado no pertenece a ningun usuario
                    </h5>
                <?php
                }
            } else {
                ?>
                <h5 class="error">
                    Debe ingresar un id.
                </h5>

        <?php

            }
        }

        $conexion->close();
        ?>
    </header>
</body>

</html>
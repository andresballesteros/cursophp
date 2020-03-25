<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Realizadas</title>
</head>

<body>
    <section>
        <?php include 'conexion.php' ?>
        <h1>Tareas realizadas</h1>
        <?php
        $sql = "SELECT * FROM todotable WHERE completado = 1";
        $realizadas = $conexion->query($sql);
        if ($realizadas->num_rows > 0) {
            while ($row = $realizadas->fetch_assoc()) {
        ?>
                <div>
                    <li><?php echo $row['texto'] ?></li>
                </div>
        <?php
            }
        }

        ?>
    </section>
</body>

</html>
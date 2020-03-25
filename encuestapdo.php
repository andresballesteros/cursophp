<?php
include_once 'includes/survey.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta PDO</title>
    <link rel="stylesheet" href="estiloencuesta.css">
</head>

<body>
    <form action="#" method="POST">
        <?php
        $survey = new Survey();
        $showResults = false;
        if (isset($_POST['lenguaje'])) {
            $showResults = true;
            $survey->setOptionSelected($_POST['lenguaje']);
            $survey->vote();
        }

        ?>
        <?php
        if ($showResults) {
            $lenguajes = $survey->showResult();
            echo '<h2>' . $survey->totalVotes() . ' votos totales</h2>';

            foreach ($lenguajes as $lenguaje) {
                $porcentaje = $survey->getPercentageVote($lenguaje['votos']);
                include 'vistas/vista-resultado.php';
            }
        } else {
            include 'vistas/vista-votacion.php';
        }
        ?>

    </form>

</body>

</html>
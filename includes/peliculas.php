<?php

include_once 'db.php';

class Peliculas extends DB
{

    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $error = false;
    private $paginacion;

    function __construct($nPorPagina, $npaginacion)
    {
        parent::__construct();

        $this->resultadosPorPagina = $nPorPagina;
        $this->indice = 0;
        $this->paginaActual = 1;
        $this->paginacion = $npaginacion;
        $this->calcularPaginas();
    }

    function calcularPaginas()
    {
        $query = $this->connect()->query('SELECT COUNT(*) AS total FROM pelicula');
        $this->nResultados = $query->fetch(PDO::FETCH_OBJ)->total;
        $this->totalPaginas = round($this->nResultados / $this->resultadosPorPagina);


        if (isset($_GET['pagina'])) {
            //validar que pagina sea un numero
            if (is_numeric($_GET['pagina'])) {
                if ($_GET['pagina'] >= 1 && $_GET['pagina'] <= $this->totalPaginas) {
                    //validar que pagina sea mayor o igual a 1 y menos o igual a total paginas
                    $this->paginaActual = $_GET['pagina'];
                    $this->indice = ($this->paginaActual - 1) * ($this->resultadosPorPagina);
                } else {
                    echo "No existe esa pagina";
                    $this->error = true;
                }
            } else {
                echo "Error al mostrar la pagina";
                $this->error = true;
            }
        }
    }

    function mostrarPeliculas()
    {
        if (!$this->error) {

            $query = $this->connect()->prepare('SELECT * FROM pelicula LIMIT :pos , :n');
            $query->execute(['pos' => $this->indice, 'n' => $this->resultadosPorPagina]);
            foreach ($query as $pelicula) {
                include 'vistas/vista-pelicula.php';
            }
        } else {
        }
    }

    function mostrarPaginas()
    {
        $actual = '';
        echo "<ul>";
        if ($this->paginaActual > 1) {
            echo '<li><a href="?pagina=' . ($this->paginaActual - 1) . '">&#60</a></li>';
        }
        for ($i = $this->paginaActual; $i < ($this->paginacion + $this->paginaActual); $i++) {

            if (($i) == $this->paginaActual) {
                $actual = ' class="actual" ';
            } else {
                $actual = '';
            }
            echo '<li><a ' . $actual . 'href="?pagina=' . ($i) . '">' . ($i) . '</a></li>';
            if ($i >= $this->totalPaginas) {
                break;
            }
        }
        if ($this->paginaActual < $this->totalPaginas) {
            echo '<li><a href="?pagina=' . ($this->paginaActual + 1) . '">&#62</a></li>';
        }
        echo "</ul>";
    }
}

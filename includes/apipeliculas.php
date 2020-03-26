<?php

include_once 'pelicula.php';

class ApipPliculas
{


    function getAll()
    {
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPeliculas();

        if ($res->rowCount() > 0) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'image' => $row['image']
                );
                array_push($peliculas['items'], $item);
            }

            $this->printJSON($peliculas);
        } else {
            $this->error('No hay elementos registrados');
        }
    }


    function getById($id)
    {
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();

        $res = $pelicula->obtenerPelicula($id);

        if ($res->rowCount() == 1) {
            $row = $res->fetch();
            $item = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'image' => $row['image']
            );
            array_push($peliculas['items'], $item);


            $this->printJSON($peliculas);
        } else {
            $this->error('No hay elementos registrados');
        }
    }


    function printJSON($array)
    {
        echo '<code>' . json_encode($array) . '</code>';
    }

    function error($mensaje)
    {
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }
}

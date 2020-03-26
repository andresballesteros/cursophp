<?php
include_once 'includes/apipeliculas.php';

$api = new ApipPliculas();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $api->getById($id);
    } else {
        $api->error('Los parametros son incorrectos');
    }
} else {
    $api->getAll();
}

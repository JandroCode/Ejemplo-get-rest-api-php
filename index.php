<?php


function getData()
{
    include_once("conexion.php");

    header('Content-Type:application/json');
    header('Access-Control-Allow-Origin:*');

    $objConnect = new Conexion();
    $conexion = $objConnect->connect();

    $videogames = array();
    $videogames['data'] = array();

    $sql = "SELECT * FROM videogames";
    $data = $conexion->prepare($sql);
    $data->execute();

    while ($output = $data->fetch(PDO::FETCH_ASSOC)) {
        extract($output);

        $info = array(
            'id' => $output['id'],
            'titulo' => $output['titulo'],
            'fecha_lanzamiento' => $output['fecha_lanzamiento'],
            'desarrolladora' => $output['desarrolladora']
        );
        array_push( $videogames['data'], $info);
    }

    echo json_encode($videogames);
}


getData();





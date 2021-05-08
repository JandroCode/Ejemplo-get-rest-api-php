<?php

include("datos_conexion.php");

class Conexion{
    function connect()
    {
        try{
            $conn = new PDO("mysql:host=".SERVER.";dbname=".DB_NAME, USER, PASS);
            return $conn;

        }catch(PDOException $e){
            die('Error de conexión ' .$e->getMessage());
        }

    }
}


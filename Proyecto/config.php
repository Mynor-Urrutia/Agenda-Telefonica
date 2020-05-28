<?php

    $host       = "localhost";
    $usuariodb  = "root";
    $password   = "";
    $nombredb   = "agenda";
    $dsn        = "mysql:host=$host; dbname=$nombredb";

    try{
        $conexion = new PDO($dsn, $usuariodb, $password);
    } catch(PDOException $error){
        echo $error->getMenssage();
    }

?>
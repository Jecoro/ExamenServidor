<?php
//Autor:Jesus Cortazar Romera
$servername = "localhost";
$database = "logIn";
$username = "usuario";
$password = "usuario";
//Variables de conexion y consulta para conectar con la bbdd

try {
    $connection = new PDO("mysql:host=".$servername.";dbname=".$database, $username, $password);
    
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
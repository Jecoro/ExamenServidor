<?php
$servername = "localhost";
$database = "logIn";
$username = "usuario";
$password = "usuario";


try {
    $connection = new PDO("mysql:host=".$servername.";dbname=".$database, $username, $password);
    
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
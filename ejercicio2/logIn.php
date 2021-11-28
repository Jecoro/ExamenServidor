<?php
//Autor: Jesus Cortazar Romera
include('config.php');
session_start();
//Iniciamos la sesion
echo '<link rel="stylesheet" href="styless.css">';
if (isset($_POST['login'])) {
    //Obtenemos los datos del form
    $username = $_POST['username'];
    $password = $_POST['password'];
    //Consulta select con el username para comprobar si existe en la bbdd luego comprobaremos si la contraseña es correcta, si no lo es o si la consulta no obtuvo nada se mostrará mensajes de error
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">La combinacion de usuario y contraseña no es correcta</p>';
        echo "<a href='formulario.html'>Volver</a>";
    } else {
        if (($password == $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'];
            echo ('<p class="success">Hola, bienvenido de nuevo a nuestra aplicación '.$_SESSION['username'] ."</p>");//Utilizamos los datos almacenados en la sesion para mostrar el username.
        } else {
            echo '<p class="error">La combinacion de usuario y contraseña no es correcta</p>';
            echo "<a href='formulario.html'>Volver</a>";
        }
    }
    
}

?>  

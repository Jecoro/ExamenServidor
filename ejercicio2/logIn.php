<?php

include('config.php');
session_start();
echo '<link rel="stylesheet" href="styless.css">';
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

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
            echo ('<p class="success">Hola, bienvenido de nuevo a nuestra aplicación '.$_SESSION['username'] ."</p>");
        } else {
            echo '<p class="error">La combinacion de usuario y contraseña no es correcta</p>';
            echo "<a href='formulario.html'>Volver</a>";
        }
    }
    
}

?>  

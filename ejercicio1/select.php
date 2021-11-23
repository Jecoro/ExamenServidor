<?php
$servername = "localhost";
$database = "lindavista";
$username = "lectura";
$password = "lectura";
$campo = $_POST['tipocasa'];

echo '<link rel="stylesheet" href="styless.css">';
$conexión = mysqli_connect($servername, $username, $password, $database);
// 1) Conexión
if ($conexión = mysqli_connect($servername, $username, $password, $database)) {
    $consulta = "SELECT * FROM viviendas 
    WHERE (tipo = '$campo') ";
    // 3) Ejecutar la orden y obtener datos
    $datos = mysqli_query($conexión, $consulta);
    echo'<table>';
    echo "<tr>
             <th>ID</th>
             <th>TIPO</th>
             <th>ZONA</th>
             <th>DIRECCION</th>
             <th>Nº DORMITORIOS</th>
             <th>PRECIO</th>
             <th>TAMAÑO</th>
             <th>EXTRAS</th>
             <th>FOTO</th>
             <th>OBSERVACIONES</th>
            </tr>";
    // 4) Ir Imprimiendo las filas resultantes
    while ($fila = mysqli_fetch_array($datos)) {
        echo"<tr>";
        echo "<td>".$fila["id"]."</td>";
        echo "<td>".$fila["tipo"]."</td>";
        echo "<td>".$fila["zona"]."</td>";
        echo "<td>".$fila["direccion"]."</td>";
        echo "<td>".$fila["ndormitorios"]."</td>";
        echo "<td>".$fila["precio"]."</td>";
        echo "<td>".$fila["tamaño"]."</td>";
        echo "<td>".$fila["extras"]."</td>";
        echo "<td>".$fila["foto"]."</td>";
        echo "<td>".$fila["observaciones"]."</td>";
    }
    echo"</table>";
} else {
    echo "<p> MySQL no conoce ese usuario y password</p>";
}

<?php
$servername = "localhost";
$database = "lindavista";
$username = "usuario";
$password = "usuario";

$tipo = $_POST['tipocasa'];
$zona = $_POST['zona'];
$direccion=$_POST['direccion'];
if (isset($_POST['value'])){
$ndormitorios = $_POST['dormitorios'];}else{$ndormitorios=3;}
$precio = $_POST['precio'];
$tamaño = $_POST['tamaño'];
$foto = $_POST['foto'];
$extrasBBDD="";
$observaciones=$_POST['observaciones'];
if((empty($_POST['direccion']))|(empty($_POST['tamaño']))|(empty($_POST['precio']))){
      
      if(empty($_POST['direccion'])){
            echo "No ha introducido la direccion <br>";
      }
      if(empty($_POST['precio'])||!is_numeric($precio) || $precio < 1 || $precio != round($precio)){
            echo "No ha introducido un precio adecuado <br>";
      }
      if(empty($_POST['tamaño'])||!is_numeric($tamaño) || $tamaño < 1 || $tamaño != round($tamaño)){
            echo "No ha introducido un tamaño adecuado <br>";
      }
      if(empty($_POST['foto'])){
            echo "No ha introducido un tamaño adecuado <br>";
      }else{
            $op=substr($foto,strlen($foto)-3, strlen($foto));
            if (strcasecmp ($op , "png" )!=0 && strcasecmp ($op , "jpeg" )!=0 && strcasecmp ($op , "jpg" )!=0) {
                  echo "No ha introducido una foto (formato png,jepg o jpg)'";
            } 
      }
            
      
}else{ 
      
//Connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO `viviendas`(`tipo`, `zona`, `direccion`, `ndormitorios`,
                                `precio`, `tamaño`, `extras`, `foto`, `observaciones`) 
                                VALUES ('$tipo','$zona','$direccion','$ndormitorios','$precio',
                                '$tamaño','$extrasBBDD','$foto','$observaciones')"; 

if (mysqli_query($conn, $sql)) {
      echo "<ul>";
      echo "<li>Tipo de vivienda: ",$tipo,"</li>";
      echo "<li>Zona: ",$zona,"</li>";      
      echo "<li>Nº Dormitorios: ",$ndormitorios,"</li>";
      echo "<li>Precio: ",$precio,"</li>"; 
      echo "<li>Tamaño: ",$tamaño,"</li>";  
      if(!empty($_POST['extras'])){
            echo"<li>Extras: </li>"; 
            // Ciclo para mostrar las casillas checked checkbox.
            foreach($_POST['extras'] as $selected){
            echo $selected."</br>";// Imprime resultados
            
            }
            
      }

      echo "<li>Foto: ",$foto,"</li>"; 
      echo "</ul>"; 
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      
}
mysqli_close($conn);
      
}
echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';

  
?>
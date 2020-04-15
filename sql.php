<?php

$valor1=10;
$valor2=3;
$res=13;
$enlace=new mysqli("remotemysql.com", "iTBH43wE7L", "raPtoIWc4M", "iTBH43wE7L");
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}
//print_r($enlace);
//$consula1 = "SELECT * FROM sumas";
$consulta="INSERT INTO sumas VALUES (NULL,1,2,3)";
$enlace->query($consulta);
//print_r($resul);
//if ($enlace->query($consulta) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $consulta . "<br>" . $conn->error;
//}
$enlace->close();

?>

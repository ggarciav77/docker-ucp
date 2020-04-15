<?php
require_once("nusoap.php");
$server = new soap_server();

$ns = "Suma";
$server->configureWSDL('Suma', $ns);
$server->wsdl->schemaTargetNamespace = $ns;

// Cambiamos la llamada para añadirle los parámetros de entrada y salida y el namespace
$server->register('SumarNumeros', array('valor1' => 'xsd:integer', 'valor2' => 'xsd:integer'), array('return' => 'xsd:integer'), $ns); 

function SumarNumeros($valor1, $valor2){
 $res = $valor1 + $valor2;
 $enlace = new mysqli("remotemysql.com", "iTBH43wE7L", "raPtoIWc4M", "iTBH43wE7L");
 $consulta = "INSERT INTO sumas VALUES (NULL,$valor1,$valor2,$res)";
 $enlace->query($consulta);
 $enlace->close();
 return $res;
}
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>

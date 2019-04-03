<?php 
session_start();
$Usuario		= "root";
$Password		= "";
$Servidor		= "localhost";
$BaseDeDatos	= "chat";

	$conn = new mysqli($Servidor,$Usuario,$Password,$BaseDeDatos);
	
	if ($conn->connect_error) {
		die("Conexion Fallida: ".$conn->connect_error);
	}
	//echo "Conexión  Exitosa";
 ?>
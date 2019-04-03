<?php 
include_once 'conexion.php';

 $username = $_POST['username'];
 $password = $_POST['password'];
 //login
 $sql = "SELECT * FROM users where nickname = '$username' AND password = '$password' ";
 $resultado = $conn->query($sql);

 if ($resultado->num_rows >0) {
	
	while ($row = $resultado->fetch_assoc()) {
		$_SESSION['nick'] = $row['nickname'];
 		$_SESSION['sala'] = $_POST['sala'];
	}
 	
 	#header("Location:sala.php");
 	echo "1";
 }else{
	echo "0";
 }
 
?>
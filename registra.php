<?php 

include_once 'conexion.php';

//registrar usuario
$nick = $_POST['nick'];
$mail = $_POST['email'];
$password = ($_POST['password']);	

 $sql = "INSERT INTO users (nickname, email, password) values('$nick', '$mail', '$password')";

 $conn->query($sql);

 ?>
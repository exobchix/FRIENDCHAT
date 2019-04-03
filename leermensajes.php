<?php

include_once 'conexion.php';

//registrar usuario

if (isset($_POST['nick'])){
  $sala = $_POST['donde'];
  $user_id = $_POST['user_id'];
  $nick = $_POST['nick'];
  $message = $_POST['message'];
  $now = new DateTime('now');
  $fecha = $now->format('Y-m-d h:i:s');

  $sql = "INSERT INTO messages (description, nickname, created_at, user_id, sala) values('$message','$nick','$fecha','$user_id','$sala')";
  $conn->query($sql);
}else{

//Consultar Mensajes
  if ($_GET['sala']) {
    
    $sla = $_GET['sala'];
    $sqlmsg = "SELECT * FROM messages where sala = '$sla'";

  }else{
    
    $sqlmsg = "SELECT * FROM messages where sala = '$sala'";

  }
  
  $msg = $conn->query($sqlmsg,);

  if ($msg->num_rows >0) {

      while ($row = $msg->fetch_assoc()) {
        $nick = $row['nickname'];
        $descrip = $row['description'];
        $fecha = date_create($row['created_at']);  
        echo "<tr>";
        echo "<td>".date_format($fecha,'d-m-Y H:i:s')."</td>";
        echo "<td><b>".$nick."</b>: </td>";
        echo "<td>".$descrip."</td>";
        echo "</tr>";
      }  
  }
}
 ?>


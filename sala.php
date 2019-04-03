<?php	
include_once 'conexion.php';
if (isset($_SESSION['nick'])) {
    $user = $_SESSION['nick'];
    $sala = $_SESSION['sala']; 
    $sql = "SELECT * FROM users where nickname = '$user' ";
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()){
      $id = $row['id'];
    }

}else{
  header("Location: ./");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FRIENDCHAT</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery.min.js"></script>
</head>
<body>
<header>
	<center><h3>FRIENDCHAT</h3></center>
</header>
<div class="container">

<div class="col-md-8 col-md-offset-2" >
  <div class="panel panel-primary">
  <div class="panel-heading">
  <div class="row">
              <div class="col-xs-5">
               <h4><?php echo $user; ?></h4>
              </div>
              <div class="col-xs-3">
               <h4>SALA <?php echo $sala; ?></h4>
              </div>
              <div class="col-xs-3">
                <a href="logout.php" class="btn btn-danger col-md-offset-10">Salir</a>
              </div>
  </div>
 
  </div>
  <div  class="panel-body" >
  <table  class="table table-bordered " data-toggle="table" >
      <thead>
        <th class="col-md-1 text-center" data-field="date" data-sortable="true">Fecha</th>
        <th class="col-md-1 text-center" data-field="name" data-sortable="true">NickName</th>
        <th class="col-md-1 text-center" data-field="msg" data-sortable="true">Mensaje</th>
      </thead>
  </table>
 
   <div class="table-responsive" id="chat"  style="max-height: 300px; overflow-y: scroll;" >
    <table  class="table table-striped " data-toggle="table" >
      <tbody id="cuerpo">      
      </tbody>
    </table>
  </div>

  </div>
  <div class="panel-footer">
  	<form id="send-message" method="post" accept-charset="UTF-8" role="form" onsubmit="return false;">
  	 <div class="form-group col-md-3">
     <label for="exampleInputEmail1">NickName</label>
     <h4><?php echo $user; ?></h4>
     <input type="hidden"  name="user_id" value="<?php echo $id; ?>">
     <input type="hidden"  id= "donde" name="donde" value="<?php echo $sala; ?>">
     <input type="hidden"  name="nick" value="<?php echo $user; ?>" >
     </div>
     <div class="form-group col-md-6">
  		<textarea class="form-control" id="message" name="message" ></textarea>
  	</div>
  	<button type="submit" class="btn btn-success btn-lg" onclick="sendmessage();">ENVIAR</button>
  	</form>
    <br>
  </div>
</div>
</div>
</div> 
 <script>  
  var seconds = 1000; // intervalo de actualizar div
  var sala = "<?php echo $sala; ?>";  
  var urlPHP = "leermensajes.php"; // el archivo de proceso php
  
  function sendmessage(){
 	$.ajax({
			type: "POST",
			url: urlPHP,
			data:$("#send-message").serialize(),
			success: function(respuesta) {			      
        $("#cuerpo").html(respuesta);        
        $("#message").val("");        
		  }
		});
  }   
     
  function readmessage(){
    var proceso = urlPHP+"?sala="+sala;
    $("#chat").scrollTop(500);
    $("#cuerpo").load(proceso);
    $("#cuerpo").fadeIn("slow");
    
  }
   
  setInterval('readmessage()',seconds);
 
</script>
 
</body>
</html>
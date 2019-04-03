<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Friend-Chat</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Entrar</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Registrar</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;" onsubmit="return false;">
									<div class="form-group">
									<label>SELECCIONE SALA:</label>
									<select id="sala" name="sala">
  									<option value="A">A</option>
  									<option value="B">B</option>
  									<option value="C">C</option>
  									<option value="D">D</option>
  									<option value="E">E</option>
									</select><br>
									</div>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nick" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button onclick="login();" tabindex="4" class="form-control btn btn-primary" >ENTRAR</button>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;" onsubmit="return false;">
									<div class="form-group">
										<input type="text" name="nick" id="nick" tabindex="1" class="form-control" placeholder="Nick"  >
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" >
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña" >
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button onclick="enviadatos();" tabindex="4" class="form-control btn btn-primary" >REGISTRAR</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	function login(){
		$.ajax({
			type: "POST",
			url: "login.php",
			data:$("#login-form").serialize(),
			beforeSend:function(){
				//mientras se ejecuta el archivo
				$('#login-form').html("<div id='temporal'></div>");
				$("#temporal").html("<p>VERIFICANDO</p>");
			},
			success: function(data) {
				if (data == "1") {
		    		window.location = "sala.php";
				}else{
					window.location = "index.php";
					$('#login-form').html('REGISTRATE!!!');
				}
				console.log(data);
	    }
		});
	}

	function enviadatos(){
		
	var n=document.getElementById('nick').value;
	var e=document.getElementById('email').value;
	var p=document.getElementById('password').value;

	if(n != null && e != null && p != null){
		$.ajax({
			type: "POST",
			url: "registra.php",
			data:$("#register-form").serialize(),
			beforeSend:function(){
				//mientras se ejecuta el archivo
				$('#register-form').html("<div id='temporal'></div>");
				$("#temporal").html("Enviando mensaje...");
			},
			success: function() {
		    	$('#register-form').html("<div id='message'></div>");
		        $('#message').html("<h2>Tus datos han sido guardados correctamente!</h2>");
		        window.location = "index.php";
		        }
		});
		  
	}else{ alert("No deje campos vacios"); }

		}
</script>

	<script>
	$(function() {
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
});
	</script>
</body>
</html>
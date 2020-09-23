<!DOCTYPE html>
<html>
<head>
	<title>Acceso</title>
    <!-- Required meta tags -->
    <meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes" charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body class="body">
	<div class="wrapper">
  	<!-- -------------------------------------------HEADER -->
		<header class="header">
			<section class="header-col">
			<a href="index.php" ><img src="img/palomaB.png" class="imgP" style="margin-right:10vw"></a>
			</section>
      		<section class="header-col">	
				<h2>ACCESO</h2>
			</section>
      		<section class="header-col">
			</section>
		</header>
    <!---------------------------------------------Seccion CENTRO-->
    	<section id="sCen" class="cenLogim" style="vertical-align:middle; height:auto;">
			<form ACTION="" METHOD = "POST" >
				<br><br><br><br>
				<h3>Ingresa tus datos</h3>
				<br>
				<input type ="text"; name= "username" autofocus placeholder="Usuario" required> <br><br>
				<input type ="password" maxlength="8" name="password" placeholder="Contraseña" required> <br><br>
				<input class="login" type ="submit"; value="ENTRAR">
			</form>
		</section>
    <!---------------------------------------------Seccion FOOTER-->
		<footer class="footer">
			<section class="footer-col">
				<span>¡Cuentanos tu experiencia!</span>
			</section>
			<section class="footer-col">
				<span>Copyrights &copy; 2019 Find A Way</span>
			</section>
			<section class="footer-col">
				<span>¿Tienes dudas? | </span>
				<a type="buttom" id="qYa" onclick="loadDoc(1)">Preguntas Frecuetes</a>
			</section>
		</footer>
	</div>
	<!-- Personal JS -->
    <script src="scripts/vistaContenido.js" type="text/javascript"></script>
    <script src="scripts/vinculacion.js" type="text/javascript"></script>
</body>
</html>

<?php
if(isset($_POST['username']) ){
  $user=$_POST['username'];
  $pass=$_POST['password'];
  if(!empty($user)){
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $db_name = "findaway";
    $tbl_name = "usuarios";
    
    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
   
    if ($conexion->connect_error) {
      echo "Falló la conexión ".$link->connect_error."<br/>";
    }
   
    $buscarUsuario = "SELECT * FROM $tbl_name WHERE usuario=\"$user\" AND password=\"$pass\" ";
   
	echo $buscarUsuario;
    if( !$conexion->query($buscarUsuario) ){
        echo $conexion->error;
	}
	else{
		$result = $conexion->query($buscarUsuario);
		$count=0;
		$count = mysqli_num_rows($result);
		$usuario = $result->fetch_array(MYSQLI_ASSOC);
		$user = $usuario['id_usuario'];
		$pass = $usuario['usuario'];
		
		if ( $count == 1) {  
			echo "<form ACTION='index.php' METHOD = 'POST' >".
					"<input type ='text' name='idUser' value='$user'> ".
					"<input type ='password' name='usuario' value='$pass'> ".
					"<input id='entrar' type ='submit'>".
				"</form>". 
				"<script> document.getElementById('entrar').click();".
				"</script>";
			echo "entre";
		}
		else{
			echo "<script> alert('Verifique sus credenciales'); history.back(); </script>";
		}
	}
    mysqli_close($conexion);
  }
}
?>
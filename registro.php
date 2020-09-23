<!DOCTYPE html>
<html lang="en">

<head>
 <title>Registro</title>
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
				<h2>REGISTRO</h2>
			</section>
      <section class="header-col">
			</section>
    </header> 
    <!---------------------------------------------Seccion CENTRO-->
    	<section id="sCen" class="cenLogim" style="vertical-align:middle; height:auto;">
        <form action="registro.php" method="post">
          <br><br>
          <h3>Crea una cuenta</h3>
          
          <!--Nombre Usuario-->
          <br>
          <input type="text" name="nombre" maxlength="32" placeholder="Nombre"  required>
          <br/><br/>
          <input type="text" name="username" maxlength="32" placeholder="Usuario"  required>
          <br/><br/>
          <input type="text" name="email" maxlength="32" placeholder="Correo" required>
          <br/><br/>
          <!--Password-->
          <input type="password" id="pass2" name="password" maxlength="8" placeholder="Contraseña" required>
        
          <br/><br/>
          <input class="login" type="submit" name="submit" value="Registrarme">
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
   
    $buscarUsuario = "SELECT * FROM $tbl_name WHERE usuario =\"$user\" ";
   
    if( !$conexion->query($buscarUsuario) ){
        echo $conexion->error;
    }
    $result = $conexion->query($buscarUsuario);
    $count = mysqli_num_rows($result);
   
    if ($count == 1) {
       echo "<script> alert('El nombre de usuario ya ha sido tomado'); history.back(); </script>";
    }
    else{
      $nombre=$_POST['nombre'];
      $pass=$_POST['password'];
      $email=$_POST['email'];
  
       $query = "INSERT INTO $tbl_name (nombre,usuario, password,email) ".
                "VALUE ('$nombre','$user', '$pass','$email')";
       if ( $conexion->query($query) ) {
           echo "<script> alert('Usuario creado correctamente');".
                 " location.replace('login.php')</script>";
       }
       else {
           echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
         }
    }
    mysqli_close($conexion);
  }
}
?>

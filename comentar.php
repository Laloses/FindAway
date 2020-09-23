<?php
header("Content-Type: text/plain"); 

if(isset($_REQUEST['idUser']) ){
  $id_ruta = $_REQUEST["idRuta"];
  $id_usuario = $_REQUEST["idUser"];
  $mensaje= utf8_encode($_REQUEST["mensaje"]);
 
  if(!empty($idUser)){
    $conexion = new mysqli("localhost", "root", "", "findaway");

    $fecha = $conexion->query("SELECT CURDATE()");
    $fecha = $fecha->fetch_array(MYSQLI_ASSOC);
    $fecha = $fecha["CURDATE()"];

    $usuario = $conexion->query("SELECT nombre FROM usuarios WHERE id_usuario=$id_usuario");
    
    $usuario = $usuario->fetch_array(MYSQLI_ASSOC);
    $usuario = $usuario["nombre"];

		$query = "INSERT INTO comentarios
		          (id_ruta, id_usuario, fecha, mensaje)
			        value ($id_ruta,$id_usuario,$fecha,$mensaje)";
		 
		if( $conexion->query(query) ) {
      $data = array();
      $data["usuario"] = "$usuario";
      $data["fecha"] = "$fecha";
      $data["mensaje"] = "$mensaje";
      echo json_encode($data);
      flush();
    }
    else {
      echo $conexion->error;
    }
    $usuario->free();
    $conexion->close();
  }
}
else{
  $data = array();
  $data['usuario'] = "oalla";
  $data['fecha'] = "asas";
  $data['mensaje'] = "asas";
  echo json_encode($data);
}
?>

<?php
require 'scripts/conexion.php';
    
class Datos{
<<<<<<< HEAD
    public $conexion;
=======
    private $conexion;
>>>>>>> 01fc15f7be5713c6cd4ceb1e91b51916cb1d72cc
    
    function __construct(){
        $this->conexion = new conectarDB();
    }
<<<<<<< HEAD

    //**************************************FUNCION PARA LLENAR LOS DATOS DE UNA ZONA CUANDO SE HACE CLICK
    public function llenarTabla($lugar){
        $consulta="SELECT rutas.id_ruta, rutas.nombre, rutas.descripcion, rutas.mapa, calificaciones.cant_estrellas FROM rutas LEFT JOIN calificaciones ON rutas.id_ruta=calificaciones.id_ruta WHERE rutas.nombre_destino = '".$lugar."' ORDER BY calificaciones.cant_estrellas DESC";
        
        $lRutas = $this->conexion->consultar($consulta);
        //Ciclo para imprimir n rutas acomodadas por mayor calificacion
        while( $arrayRutas = $lRutas->fetch_array(MYSQLI_ASSOC) ){
=======
    public function llenarTabla($lugar){
        $consulta="SELECT rutas.nombre, rutas.descripcion, rutas.mapa, calificaciones.cant_estrellas FROM rutas LEFT JOIN calificaciones ON rutas.id_ruta=calificaciones.id_ruta WHERE rutas.nombre_destino = '".$lugar."' ORDER BY calificaciones.cant_estrellas DESC";
        
        $lRutas = $this->conexion->consultar($consulta);
        //Ciclo para imprimir n rutas acomodadas por mayor calificacion
        while($arrayRutas = $lRutas->fetch_array(MYSQLI_ASSOC)){
>>>>>>> 01fc15f7be5713c6cd4ceb1e91b51916cb1d72cc
            $nomRuta = utf8_encode($arrayRutas['nombre']);
            $descRuta = utf8_encode($arrayRutas['descripcion']);
            $mapRuta = utf8_encode($arrayRutas['mapa']);
            $cantEstrellas = floatval($arrayRutas['cant_estrellas']);
<<<<<<< HEAD
            $idRuta = utf8_encode($arrayRutas['id_ruta']);
            //Guardamos esos datos en una etiqueta de link para que mustre los datos cuando se dé click
            $ref='<a class="nombreRuta fil-content" href="#Iruta" onclick="llenarInfo(\''.$nomRuta.'\',\''.$descRuta.'\',\''.$idRuta.'\',\''.$mapRuta.'\', loadMap)">';
            
            //Le agregamos al link los datos para que se van a ver en el lado derecho
            echo $ref."<div class='fil-col'>".
                            "<span>".$nomRuta."</span>".
                      "</div>".
                      "<div class='fil-col'>".
                            "<img src='img/estrellas/".$cantEstrellas.".png' class='imgE'>".
                      "</div></a>";

        }
        $lRutas->free();
    }

    //**************************************FUNCION PARA CALIFICAR UNA RUTAS
    public function calificar(){
        $idRuta= $_GET['r'];
        $idUser= base64_decode(base64_decode($_GET['id']));
        $consulta="SELECT rutas.id_ruta, rutas.nombre FROM rutas WHERE id_ruta=$idRuta";
=======
            $ref='<a class="nombreRuta fil-content" href="#Iruta" onclick="llenarInfo(\''.$nomRuta.'\',\''.$descRuta.'\',\''.$mapRuta.'\', loadMap)">';
            
            echo $ref."<div class='fil-col'><span>".$nomRuta."</span></div><div class='fil-col'><img src='img/estrellas/".$cantEstrellas.".png' class='imgE'></div></a>";
        }
        $lRutas->free();
    }
    public function calificar(){
        $consulta="SELECT rutas.nombre FROM rutas LEFT JOIN calificaciones ON rutas.id_ruta=calificaciones.id_ruta ORDER BY calificaciones.cant_estrellas DESC";
>>>>>>> 01fc15f7be5713c6cd4ceb1e91b51916cb1d72cc
        $lRutas = $this->conexion->consultar($consulta);
        
        echo "<style>
            [type=radio] {  /*quitar los radio bottoms */
                position:absolute;
                width: 0;
                height: 0;
            }
            .rating > label{
              background-color: white; /* Start color when not clicked */
            }
            [type=radio]:hover + img{ /* Set color when star hover */
                background-color: #363B7C;
            } 
            [type=radio]:checked + img{ /* Set color when star checked */
                background-color: #363B7C;
            }
            .rating label:hover ~ label{ /* Set color when star checked */
<<<<<<< HEAD
                background-color: #363B7C;
=======
                background-color: #363B7C ;
>>>>>>> 01fc15f7be5713c6cd4ceb1e91b51916cb1d72cc
            }
            .rating label[backbackground-color=#363B7C] ~ label{
                background-color: #363B7C
            }
        </style>
<<<<<<< HEAD
        <form action='' method='post'>";
=======
        <form>";
>>>>>>> 01fc15f7be5713c6cd4ceb1e91b51916cb1d72cc
        while($arrayRutas = $lRutas->fetch_array(MYSQLI_ASSOC)){
            $nomRuta = utf8_encode($arrayRutas['nombre']);
            
            $contenido = "<div class='container rating'>
<<<<<<< HEAD
                            <label class=''><input name='5' onclick='document.getElementById(\"go\").click()' value='5' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class=''><input name='4' onclick='document.getElementById(\"go\").click()' value='4' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class=''><input name='3' onclick='document.getElementById(\"go\").click()' value='3' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class=''><input name='2' onclick='document.getElementById(\"go\").click()' value='2' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class=''><input name='1' onclick='document.getElementById(\"go\").click()' value='1' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <section class='nombreRuta' style='width:19%'><span>".$nomRuta."</span></section>
                            <input type='text' name='id_ruta' value='$idRuta' hidden>
                            <input type='text' name='id_usuario' value='$idUser' hidden>
                            <input id='go' type='submit' hidden>
=======
                            <label class='imgE'><input name='".$nomRuta."' value='5' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='4' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='3' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='2' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='1' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <section class='nombreRuta' style='width:19%'><span>".$nomRuta."</span></section>
>>>>>>> 01fc15f7be5713c6cd4ceb1e91b51916cb1d72cc
                        </div>";
            echo $contenido."</form>";
            
        }
        $lRutas->free();
    }
}
?>

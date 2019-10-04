<?php
require 'scripts/conexion.php';
    
class Datos{
    private $conexion;
    
    function __construct(){
        $this->conexion = new conectarDB();
    }
    public function llenarTabla($lugar){
        $consulta="SELECT rutas.nombre, rutas.descripcion, rutas.mapa, calificaciones.cant_estrellas FROM rutas LEFT JOIN calificaciones ON rutas.id_ruta=calificaciones.id_ruta WHERE rutas.nombre_destino = '".$lugar."' ORDER BY calificaciones.cant_estrellas DESC";
        
        $lRutas = $this->conexion->consultar($consulta);
        //Ciclo para imprimir n rutas acomodadas por mayor calificacion
        while($arrayRutas = $lRutas->fetch_array(MYSQLI_ASSOC)){
            $nomRuta = utf8_encode($arrayRutas['nombre']);
            $descRuta = utf8_encode($arrayRutas['descripcion']);
            $mapRuta = utf8_encode($arrayRutas['mapa']);
            $cantEstrellas = floatval($arrayRutas['cant_estrellas']);
            $ref='<a class="nombreRuta fil-content" href="#Iruta" onclick="llenarInfo(\''.$nomRuta.'\',\''.$descRuta.'\',\''.$mapRuta.'\', loadMap)">';
            
            echo $ref."<div class='fil-col'><span>".$nomRuta."</span></div><div class='fil-col'><img src='img/estrellas/".$cantEstrellas.".png' class='imgE'></div></a>";
        }
        $lRutas->free();
    }
    public function calificar(){
        $consulta="SELECT rutas.nombre FROM rutas LEFT JOIN calificaciones ON rutas.id_ruta=calificaciones.id_ruta ORDER BY calificaciones.cant_estrellas DESC";
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
                background-color: #363B7C ;
            }
            .rating label[backbackground-color=#363B7C] ~ label{
                background-color: #363B7C
            }
        </style>
        <form>";
        while($arrayRutas = $lRutas->fetch_array(MYSQLI_ASSOC)){
            $nomRuta = utf8_encode($arrayRutas['nombre']);
            
            $contenido = "<div class='container rating'>
                            <label class='imgE'><input name='".$nomRuta."' value='5' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='4' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='3' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='2' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <label class='imgE'><input name='".$nomRuta."' value='1' type='radio'/><img src='img/estrellaT.png' class='imgE'></label>
                            <section class='nombreRuta' style='width:19%'><span>".$nomRuta."</span></section>
                        </div>";
            echo $contenido."</form>";
            
        }
        $lRutas->free();
    }
}
?>

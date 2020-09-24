<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1, shrink-to-fit=no; charset=utf-8">
    <!-- Personal JS -->
    <script src="scripts.js" type="text/javascript"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Find A Way</title>
  </head>
  <!-- -------------------------------------------------------------------------------------------------------------------------- -->
  <!-- -------------------------------------------BODY -->
  <body class="body" id="body">
       <section id="sCen" class="tituloCal bordes">
        <h1 hidden>SECTION DER</h1>
            <h2><img class="imgBu" src="img/estrellaB.png">Califica la ruta<img class="imgBu" src="img/estrellaB.png"></h2>
                <section id="ruta" class="containRuta">
                <?php
                
                        require 'scripts/Datos.php';
                        $tabla = new Datos();
                        $tabla->calificar();

                        if( isset($_POST['id_ruta']) ){
                            $idRuta=$_POST['id_ruta'];
                            $idUser=$_POST['id_usuario'];

                            if(isset($_POST['5'])){
                                $cal=$_POST['5'];
                            }
                            else
                            if(isset($_POST['4'])){
                                $cal=$_POST['4'];
                            }
                            else
                            if(isset($_POST['3'])){
                                $cal=$_POST['3'];
                            }
                            else
                            if(isset($_POST['2'])){
                                $cal=$_POST['2'];
                            }
                            else
                            if(isset($_POST['1'])){
                                $cal=$_POST['1'];
                            }
                            //Verificamos si ya habia una calificacion para esa ruta y usuario
                            $consulta="SELECT cant_estrellas FROM calificaciones WHERE id_usuario=$idUser AND id_ruta=$idRuta";
                            $result = $tabla->conexion->consultar($consulta);
                            $count = mysqli_num_rows($result);
                            //Si no hay lo insertamos como nuevo
                            if($count < 1){
                                $consulta="INSERT INTO calificaciones(id_usuario,id_ruta,cant_estrellas) value($idUser,$idRuta,$cal)";
                                if( $tabla->conexion->consultar($consulta) ){
                                    echo "<script> alert('Gracias por calificar'); window.opener.location.reload(1);; window.close(); </script>";
                                }
                            }
                            //Sino le hacemos update
                            else{
                                //Tenemos que sacar el promedio de las calificaciones
                                $calOriginal = $result->fetch_array(MYSQLI_ASSOC);
                                $calOriginal = $calOriginal['cant_estrellas'];
                                $cal = ceil( (($cal + $calOriginal)/2) );
                                $consulta="UPDATE calificaciones SET cant_estrellas=$cal WHERE id_usuario=$idUser AND id_ruta=$idRuta";
                                if( $tabla->conexion->consultar($consulta) ){
                                    echo "<script> alert('Gracias por calificar'); window.opener.location.reload(1); window.close(); </script>";
                                }
                            }

                        }
                ?>
                </section>
        </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
=======
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1, shrink-to-fit=no; charset=utf-8">
    <!-- Personal JS -->
    <script src="scripts.js" type="text/javascript"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Find A Way</title>
  </head>
  <!-- -------------------------------------------------------------------------------------------------------------------------- -->
  <!-- -------------------------------------------BODY -->
  <body class="body" id="body">
  <div class="wrapper">
  <!-- -------------------------------------------------------------------------------------------------------------------------- -->
  <!-- -------------------------------------------HEADER -->
  <header class="header">
      <section class="header-col">
          <a href="index.php" ><img src="img/palomaB.png" class="imgP" style="margin-right:10vw"></a>
      </section>
      <section class="header-col">
          <!--<h1 id="TituloPag">Find a Way</h1>-->
          <img src="img/logo.png" class="logo">
      </section>
      <section class="header-col">
      </section>
  </header>

       <section id="sDer" class="infoRuta bordes">
        <h1 hidden>SECTION DER</h1>
            <h1><img class="imgBu" src="img/estrellaB.png">Califica la ruta<img class="imgBu" src="img/estrellaB.png"></h1>
                <section id="ruta" class="containRuta">
                    <?php
                        require 'scripts/Datos.php';
                        $tabla = new Datos();
                        $tabla->calificar();
                    ?>
                </section>
        </section>

      <!-- -------------------------------------------------------------------------------------------------------------------------- -->
    <!---------------------------------------------Seccion FOOTER-->
    <footer class="footer">
        <section class="footer-col">
            <span>¡Cuentanos tu experiencia!</span>
        </section>
        <section class="footer-col">
            <span style="display:inline">Copyrights &copy; 2019 Find A Way</span>
        </section>
        <section class="footer-col">
            <span>¿Tienes dudas? | </span>
            <a type="buttom" id="qYa" onclick="loadDoc(1)">Preguntas Frecuetes</a>
        </section>
    </footer>
    </div>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
>>>>>>> 01fc15f7be5713c6cd4ceb1e91b51916cb1d72cc

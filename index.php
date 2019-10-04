<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes" charset="UTF-8">
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
    
    <!-- -------------------------------------------------------------------------------------------------------------------------- -->
    <!---------------------------------------------Seccion IZQUIERDA-->
    <section id="sIzq" class="position-fixed izq">
        <h1 hidden >SECTION IZQ</h1>
<!---------------------------------------------Buscar --
        <button type="button" class="boton bordes btn btn-outline-info" ddata-placement="left" title="Búsqueda" onclick="funcionParaSolicitarBusqueda">
            <img class="imgBtn" src="img/busquedaB.png">
        </button>
-->
        <!---------------------------------------------Limpiar -->
        <h1>Limpia</h1>
        <button type="button" onclick="clearMap()" class="boton bordes btn btn-outline-info" data-toggle="tooltip collapse" data-placement="left"  data-target=".multi-collapse" aria-expanded="false" title="Limpiar selección" aria-controls="buscar infoRuta" >
            <img class="imgBtn" src="img/nuevaB.png" >
        </button>
        <!---------------------------------------------Calificar -->
        <h1>Califica</h1>
        <button type="button" onclick="window.open('calificar.php','','height=700; width=600; left=400;')" data-toggle="tooltip collapse" data-placement="left" title="Calificar ruta" class="boton bordes btn btn-outline-info">
            <img src="img/estrellaB.png" class="imgBtn">
        </button>
        <section class="redes bordes">
            <h5>REDES</h5>
            <a><img src="img/insta.png" class="redes-logo"></a><br>
            <a><img src="img/face.png" class="redes-logo"></a><br>
            <a><img src="img/twitter.png" class="redes-logo"></a><br>
        </section>
    </section>
    
    <!-- -------------------------------------------------------------------------------------------------------------------------- -->
    <!---------------------------------------------Seccion CENTRO-->
    <section id="sCen" class="cen">
        <h1 hidden>SECTION CEN</h1>
<!--        <div id="buscar">
            <form>
                <input class="search bordes2" type="search" placeholder="Búsqueda">
            </form>
        </div>
-->
        <br>
        <section class="mapa bordes2" style="height:35vw;">
                <iframe id="main-map" src="https://www.google.com/maps/d/embed?mid=1sAdyj55AKuJ4RV2gjA0Q4rBM8q-VsDi5" frameborder="0" height="100%" width="99%" scrolling="no"></iframe>
        </section>
            <div class="infoRuta bordes2 collapse" id="infoRuta">
                <h1 id="Iruta">Información Ruta</h1>
                <section id="ruta" class="ruta">
                </section>
            </div>
    </section>
    
    <!-- -------------------------------------------------------------------------------------------------------------------------- -->
    <!---------------------------------------------Seccion DERECHA-->
    <section id="sDer" class="position-fixed der bordes">
        <h1 hidden>SECTION DER</h1>
            <h3><img class="imgBu" src="img/busquedaB.png"> Zonas</h3>
                <div class="fil-header">
                    <a id="CU-h" type="botton" class="btn btn-link" data-toggle="collapse" data-target="#CU-c" aria-controls="CU-c">
                    Ciudad Universitaria (CU)
                    </a>
                </div>
                        <div id="CU-c" class="collapse" aria-labelledby="CU-h" data-parent="#sDer">
                                <?php
                                    require 'scripts/Datos.php';
                                    $tabla = new Datos();
                                    $tabla->llenarTabla('CU');
                                ?>
                        </div>
                <div class="fil-header">
                    <a id="CAPU-h" type="botton" class="btn btn-link" data-toggle="collapse" data-target="#CAPU-c" aria-controls="CAPU-c">
                    Central de Autobuses de Puebla (CAPU)
                    </a>
                </div>
                        <div id="CAPU-c" class="collapse" aria-labelledby="CAPU-h" data-parent="#sDer">
                                <?php
                                    $tabla = new Datos();
                                    $tabla->llenarTabla('CAPU');
                                ?>
                        </div>
                <div class="fil-header">
                   <a id="Loreto-h" type="botton" class="btn btn-link" data-toggle="collapse" data-target="#Loreto-c" aria-controls="Loreto-c">
                    Los fuertes de Loreto
                    </a>
                </div>
                        <div id="Loreto-c" class="collapse" aria-labelledby="Loreto-h" data-parent="#sDer">
                                <?php
                                    $tabla = new Datos();
                                    $tabla->llenarTabla('Fuertes');
                                ?>
                        </div>
                <div class="fil-header">
                    <a id="Ange-h" type="botton" class="btn btn-link" data-toggle="collapse" data-target="#Ange-c" aria-controls="Ange-c">
                    Angelópolis centro comercial
                    </a>
                </div>
                        <div id="Ange-c" class="collapse" aria-labelledby="Ange-h" data-parent="#sDer">
                                <?php
                                    $tabla = new Datos();
                                    $tabla->llenarTabla('Angelopolis');
                                ?>
                        </div>
                <div class="fil-header">
                    <a id="CCU-h" type="botton" class="btn btn-link" data-toggle="collapse" data-target="#CCU-c" aria-controls="CCU-c">
                    Complejo Cultural Universitario (CCU)
                    </a>
                </div>
                        <div id="CCU-c" class="collapse" aria-labelledby="CCU-h" data-parent="#sDer">
                                <?php
                                    $tabla = new Datos();
                                    $tabla->llenarTabla('CCU');
                                ?>
                        </div>
    </section>
    <!-- -------------------------------------------------------------------------------------------------------------------------- -->
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
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Personal JS -->
    <script src="scripts/vistaContenido.js" type="text/javascript"></script>
    <script src="scripts/vinculacion.js" type="text/javascript"></script>
  </body>
</html>

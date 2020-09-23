<!DOCTYPE html>
<html lang="es" ng-app="FindAway" ng-cloak>
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes" charset="utf-8">
    <!--Angular-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Find A Way</title>
  </head>

  <!-- -------------------------------------------BODY -->
  <body class="body" id="body" ng-controller="Rutas">
  <div class="wrapper">

  <!-- -------------------------------------------HEADER -->
  <header class="header">
      <section class="header-col">
          <a <?php if(!isset($_POST['idUser'])) echo 'href="index.php"' ?> ><img src="img/palomaB.png" class="imgP" style="margin-right:10vw"></a>
      </section>
      <section class="header-col">
          <!--<h1 id="TituloPag">Find a Way</h1>-->
          <img src="img/logo.png" class="logo">
      </section>
      <section class="header-col">
            <input type="text" id='idRuta' hidden value="algo">
        <?php 
            if(isset($_POST['idUser'])){ 
                $user=$_POST['idUser'];
                $usuario=$_POST['usuario'];
                echo "<span id='idUser' hidden>$user</span>";
                echo "<h2> $usuario </h2>
                    <button class='login' onclick='location.replace(\"index.php\")'>Salir</button>";
            }
            else{
                echo "<button class='login' onclick='location.assign(\"login.php\")'>Iniciar sesión</button>";
                echo "<button class='login' onclick='location.assign(\"registro.php\")'>Registrarse</button>";
            }
        ?>
      </section>
  </header>
    
    <!---------------------------------------------Seccion IZQUIERDA-->
    <section id="sIzq" class="position-fixed izq">
        <h1 hidden >SECTION IZQ</h1>
        <div id="infoRuta" class="infoRuta bordes2" ng-hide="!mostrar">
            <h2 class='infoC'>{{nomRutaSel}}</h2>
            <section class='ruta'>
                <section class='infoC'>
                    <img ng-src='img/camiones/{{nomRutaSel}}.jpg' class='imgCamion'>
                </section>
                <section class='descripcionC'>
                    <p>{{descRutaSel}}</p>
                </section>
            </section>
        </div>
    </section>
    
    <!---------------------------------------------Seccion CENTRO-->
    <section id="sCen" class="cen" style="right:8%; ">
        <h1 hidden>SECTION CEN</h1>
        <!---------------------------------------Para implementar una busqueda de paradas o cosas -->
<!--            <div id="buscar">
            <form>
                <input class="search bordes2" type="search" placeholder="Búsqueda">
            </form>
        </div>
-->
        <!---------------------------------------------Buscar --
        <button type="button" class="boton bordes btn btn-outline-info" ddata-placement="left" title="Búsqueda" onclick="funcionParaSolicitarBusqueda">
            <img class="imgBtn" src="img/busquedaB.png">
        </button>
-->
        
        <section id="mapa" class="mapa bordes2" style="height:36vw;">
                <iframe id="main-map" src="https://www.google.com/maps/d/embed?mid=1Eii0TX7oziPNwNbeJQZw0ZcgKkPlpwd-" frameborder="0" height="100%" width="100%" scrolling="no"></iframe>
        </section>

        <!---------------------------------------------BOTONES/HERRAMIENTAS -->
        <section class="tools" ng-controller="tools">

            <!---------------------------------------------Limpiar -->
            <span class="titleBtn">Refrescar</span>
            <button type="button" ng-click="clearMap();" class="boton bordes btn btn-outline-info" data-toggle="tooltip collapse" data-placement="left"  data-target=".multi-collapse" aria-expanded="false" title="Limpiar selección" aria-controls="buscar infoRuta" >
                <img class="imgBtn" src="img/nuevaB.png" >
            </button>

            <!---------------------------------------------Calificar -->
            <span class="titleBtn">Califica</span>
            <?php
                if( isset($user) ){
                    $user = base64_encode(base64_encode($user));
                    echo "<button id='calificar' type='button' onclick='window.open('calificar.php?id=$user&r={{id_ruta}}','','height=210; width=600; left=400;')' class='boton bordes btn btn-outline-info' data-toggle='tooltip collapse' data-placement='left' title='Calificar ruta' > ".
                        "<img src='img/estrellaB.png' class='imgBtn'>".
                        "</button>";
                }
                else{
                    echo "<button id='calificar' type='button' onclick=\"alert('Por favor inicie sesión para comentar')\" class='boton bordes btn btn-outline-info' data-toggle='tooltip collapse' data-placement='left' title='Calificar ruta' > ".
                        "<img src='img/estrellaB.png' class='imgBtn'>".
                        "</button>";
                }
            ?>
            <!---------------------------------------------Redes -->
            <section class="redes bordes2">
                <red ng-repeat="red in redes">
                    <a href={{red.href}}>
                        <img ng-src={{red.foto}} class="redes-logo">
                    </a>
                </red>
            </section>
        </section>
        <!--/TOOLS-->
        <!---------------------------------------------COMENTARIOS -->
        <!--Comentar-->
        <section id="comentarios" class='comentarios bordes2' ng-show="mostrar">
            <section action='comentar.php' class='comment bordes2'>
                <section class='datosComment bordes2'>
                    <p> DEJA TU COMENTARIO </p>
                </section>
                <section class='mensajeComment bordes2'>
                    <textarea  id='mensaje' maxlenght='500' cols='100' rows='10' style='width:100%; max-width:100%; height:3vw; border:none; resize:vertical'></textarea>
                </section>
                <button class='boton bordes btn btn-outline-info' onclick='comentar()' style='color:brown; margin-left:86%; margin-top:1%;margin-bottom:1%;' > Comentar </button>
            </section>
        </section>
        <!--Otros comentarios-->
        <!--<section id="masComentarios" class='comentarios bordes2' hidden>
            <section class='comment bordes2' ng-repeat="">
                <section class='datosComment bordes2'>
                    <span id='userComment' class='comment-col'></span>
                    <span id='dateComment' class='comment-col'></span>
                </section>
                <section class='mensajeComment bordes2'>
                    <textarea id='mensajeDB' maxlenght='500' cols='100' rows='10' style='width:100%; max-width:100%; height:3vw; border:none; resize:vertical' readonly></textarea>
                </section>
            </section>
        </section>-->
    </section>
    
    <!---------------------------------------------Seccion DERECHA-->
    <section id="sDer" class="position-fixed der bordes" ng-class="{'after-cloak3':true}">
        <h1 hidden>SECTION DER</h1>
            <h3><img class="imgBu" src="img/busquedaB.png"> Zonas</h3>
                <zona ng-repeat="zona in zonas">
                    <div class="fil-header">
                        <a id="{{zona.destino}}-h" type="botton"class="btn btn-link" data-toggle="collapse" data-target="#{{zona.destino}}-c" aria-controls="{{zona.destino}}-c">
                            <div ng-switch="zona.destino">
                                <div ng-switch-when="CU">
                                    Ciudad Universitaria (CU)
                                </div>
                                <div ng-switch-when="CAPU">
                                    CAPU
                                </div>
                                <div ng-switch-when="Fuertes">
                                    Los Fuertes de Loreto
                                </div>
                                <div ng-switch-when="Angelopolis">
                                    Angelópolis
                                </div>
                                <div ng-switch-when="CCU">
                                    Complejo Cultural Universitario (CCU)
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="{{zona.destino}}-c" class="collapse" aria-labelledby="{{zona.destino}}-h" data-parent="#sDer">
                        <div ng-repeat="ruta in zona.rutas">
                            <a class="fil-content" ng-href="#Iruta" ng-click='LlenarInfo(ruta.nomRuta,ruta.descRuta,ruta.idRuta,ruta.mapRuta);'>
                                <div class='fil-col'>
                                    <span class="nombreRuta" ng-cloak>{{ruta.nomRuta}}</span>
                                </div>
                                <div class='fil-col'>
                                    <img ng-src='img/estrellas/{{ruta.cantEstrellas}}.png' class='imgE'>
                                </div>
                            </a>
                        </div>
                    </div>
                </zona>
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
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Personal JS -->
    <script src="scripts/vistaContenido.js" type="text/javascript"></script>
    <script src="scripts/vinculacion.js" type="text/javascript"></script>
    <script src="scripts/controlador.js"></script><!--Angular-->
  </body>
</html>

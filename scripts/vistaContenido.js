function mostrarInfo(){
    var ob = document.getElementById("infoRuta");
    ob.style.display="block";
}
function vaciarInfo(){
     //Get the section  element with id="ruta"
    var list = document.getElementById("ruta");
    // As long as <section id="ruta" class="ruta"> has a child node, remove it
    if(list.hasChildNodes()){
        while( list.hasChildNodes() ) {
            list.removeChild(list.lastChild);
        }
    }
}
function quitarInfo(){
    var ob = document.getElementById("infoRuta");
    ob.style.display="none";
    vaciarInfo();
}
function llenarInfo(nomRuta,descRuta,mapRuta,callback){
    callback(mapRuta);
    var contenido = "<section class='ruta'><section class='infoC'><img src='img/camiones/"+nomRuta+".jpg' class='imgCamion'><span class='nombreRuta'><br>"+nomRuta+"</span></section><section class='descripcionC'><p>"+descRuta+"</p></section></section>"
    document.getElementById('ruta').insertAdjacentHTML('beforeend', contenido);
    mostrarInfo();
}
//Funcion para cargar cada mapa
function loadMap(mapRuta){
    document.getElementById('main-map').src = mapRuta;
//    var ruta10="https://www.google.com/maps/d/embed?mid=1_hCLxFvRH0-V_tvteuGLWY9xNlk&hl=es-419";
//    document.getElementById('main-map').src = ruta10;
    vaciarInfo();
}
//Funcion para limpiar el mapa
function clearMap(){
    document.getElementById('main-map').src = "https://www.google.com/maps/d/embed?mid=1sAdyj55AKuJ4RV2gjA0Q4rBM8q-VsDi5";
    quitarInfo();
}

function calificar(){
    var pagina="calificar.php";
    if( window.confirm('¿Esta siendo redirigido para guardar su partida, desea ir?') ){
        window.open(pagina,"","width=500, height=500, fullscren=yes");
    }
}
//Funcion para agregar la página de preguntas y respuestas
function loadDoc(opc){
         var xhttp = getObjXMLHttpRequest();
         xhttp.open('GET','q&a.php',true);
         xhttp.onreadystatechange = function(){
         if (this.readyState == 4 && this.status == 200){
             switch(opc){
                //Case de la página q&a
                 case 1: document.getElementById("body").innerHTML = xhttp.responseText;
                break;
             }
         }
         };
         xhttp.send();
     }
//Funcion para detectar navegadores del innerHTML
function getObjXMLHttpRequest(){
    var http;
    if(window.ActiveXObject){
        http= new ActiveXObject("Msxml2.XMLHttp");
     return http;         
    }
    else{
        http = new XMLHttpRequest();
        return http;
    }
}

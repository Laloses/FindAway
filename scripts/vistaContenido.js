function mostrarInfo(){
    var ob = document.getElementById("infoRuta");
    ob.style.display="block";
    try {
        ob = document.getElementById("comentarios");
        ob.style.display="block";
    } catch (error) {}
}
function quitarInfo(){
    var ob = document.getElementById("infoRuta");
    ob.style.display="none";
    try {
        ob = document.getElementById("comentarios");
        ob.style.display="none";
    } catch (error) {}
    vaciarInfo();
}
function vaciarInfo(){
     //Get the section  element with id="ruta"
    var list = document.getElementById("infoRuta");
    // As long as <section id="ruta" class="ruta"> has a child node, remove it
    if(list.hasChildNodes()){
        while( list.hasChildNodes() ) {
            list.removeChild(list.lastChild);
        }
    }
    try {
        list = document.getElementById("comentarios");
        if(list.hasChildNodes()){
            while( list.hasChildNodes() ) {
                list.removeChild(list.lastChild);
            }
        }
    } catch (error) {}
}
function llenarInfo(nomRuta,descRuta,id_ruta,mapRuta,callback){
    //Llama a la funcion loadmap
    callback(mapRuta);

    var contenido = "<h2 class='infoC'>"+nomRuta+"</h2>"+
                    "<section class='ruta' class='ruta'>"+
                        "<section class='infoC'>"+
                            "<img src='img/camiones/"+nomRuta+".jpg' class='imgCamion'>"+
                        "</section>"+
                        "<section class='descripcionC'>"+
                            "<p>"+descRuta+"</p>"+
                        "</section>"+
                    "</section>";
    document.getElementById('infoRuta').insertAdjacentHTML('beforeend', contenido);
    document.getElementById('mapa').style.width = '90%';
    document.getElementById('sCen').style.marginLeft = '14%';
    
    //Agregar opcion de comentar sobre esa ruta
    try {
        var comentario = "<section action='comentar.php' class='comment bordes2'>"+
                            "<section class='datosComment bordes2'>"+
                                "<p> DEJA TU COMENTARIO </p>"+
                            "</section>"+
                            "<section class='mensajeComment bordes2'>"+
                                "<textarea  id='mensaje' maxlenght='500' cols='100' rows='10' style='width:100%; max-width:100%; height:3vw; border:none; resize:vertical'></textarea>"+
                            "</section>"+
                            "<button class='boton bordes btn btn-outline-info' onclick='comentar()' style='color:brown; margin-left:86%; margin-top:1%;margin-bottom:1%;' > Comentar </button>"+
                        "</section>";
        document.getElementById('comentarios').insertAdjacentHTML('beforeend', comentario);
    } catch (error) {}
    
    //Agregar opcion de calificar sobre esa ruta
    var url = document.getElementById('calificar').getAttribute('onclick');
    url+='&r='+id_ruta+'\","","height=210; width=600; left=400;")';
    document.getElementById('calificar').setAttribute("onclick",url);

    //Guardamos el valor de la ruta seleccionada
    document.getElementById('idRuta').value=id_ruta;
    mostrarInfo();
}
//Funcion para cargar cada mapa
function loadMap(mapRuta){
    document.getElementById('main-map').src = mapRuta;
    vaciarInfo();
}
//Funcion para limpiar el mapa
function clearMap(){
    document.getElementById('main-map').src = "https://www.google.com/maps/d/embed?mid=1Eii0TX7oziPNwNbeJQZw0ZcgKkPlpwd-";
    document.getElementById('mapa').style.width = '100%';
    document.getElementById('sCen').style.marginLeft = 'auto';
    quitarInfo();
}
//Funcion para comentar
function comentar(){
    if(!document.getElementById('userComment')){

        document.getElementById('masComentarios').removeAttribute("hidden");
        var comentario = "<section class='comment bordes2'>"+
                            "<section class='datosComment bordes2'>"+
                                "<span id='userComment' class='comment-col'></span>"+
                                "<span id='dateComment' class='comment-col'></span>"+
                            "</section>"+
                            "<section class='mensajeComment bordes2'>"+
                                "<textarea id='mensajeDB' maxlenght='500' cols='100' rows='10' style='width:100%; max-width:100%; height:3vw; border:none; resize:vertical' readonly></textarea>"+
                            "</section>"+
                        "</section>";
        document.getElementById('masComentarios').insertAdjacentHTML('beforeend', comentario);
    }

    //ajax
    var xhttp = getXMLHttpRequest();

	xhttp.onreadystatechange = function(){
	    if (this.readyState == 4 && this.status == 200)
		{
            //Para cargar los datos devueltos por comentar PHP 
            query = JSON.parse('{'+this.responseText+'}') ;
            //query = eval('{'+this.responseText+'}') ;
            alert(JSON.parse('{'+this.responseText+'}'));   
            //Se insertan los datos en el apartado de comentario recien creado
            document.getElementById('userComment').innerHTML= query.usuario;
            document.getElementById('dateComment').innerHTML=query.fecha;
            document.getElementById('mensajeDB').innerHTML=query.mensaje;
		}
    };
    //Se manda a guardar el comentario
    xhttp.open("POST", "comentar.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var datos="idUser="+document.getElementById("idUser").value;
    datos+="&idRuta="+document.getElementById("idRuta").value;
    datos+="&mensaje="+document.getElementById("mensaje").value;
    xhttp.send(datos);
}

function getXMLHttpRequest()
{
    var objetoAjax;
	try{
	    objetoAjax = new XMLHttpRequest();
	}catch(err1){
	    try{
		    // 
		    objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
	    }catch(err2){
	        try{
		        // IE5 y IE6
			    objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
		    }catch(err3){
                objetoAjax = false;
			}
		}
	}
	return objetoAjax;
}
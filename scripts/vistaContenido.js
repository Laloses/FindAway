//Funcion para cargar cada mapa
function loadMap(mapRuta){
    document.getElementById('main-map').src = mapRuta;
}
//Funcion para comentar
function comentar(){
    if(!document.getElementById('userComment')){
        document.getElementById('masComentarios').removeAttribute("hidden");
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
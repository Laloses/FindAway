angular.module("FindAway",[])
.controller("Rutas",["$scope","$http",function($scope,$http){
    $scope.destinos = ["CU","CAPU","Fuertes","Angelopolis","CCU"];
    $scope.zonas = [];
    $scope.mostrar = false;

    //Para llenar las rutas de una zona
    $scope.getRutas = function(destino){
        var rutas = []; //No dejar las variables fuera del contexto que no pertenecen
        $http.get("scripts/DatosRuta.php?destino="+destino)
        .then(function(response){
            response.data.forEach(ruta => {
                var arrayRuta = {
                    nomRuta: ruta.nomRuta,
                    descRuta: ruta.descRuta,
                    mapRuta: ruta.mapRuta,
                    cantEstrellas: ruta.cantEstrellas,
                    idRuta: ruta.idRuta
                };
                rutas.push(arrayRuta);
                arrayRuta = [];
            });
        })
        return rutas;
    }

    //Llenamos todas las rutas de cada zona
    $scope.destinos.forEach(dest => {
        var rutasTemp = $scope.getRutas(dest);
        var datosRuta = {
            destino: dest,
            rutas: rutasTemp
        }
        $scope.zonas.push(datosRuta);
    });

    //Cada que se haga click en una ruta
    $scope.LlenarInfo = function(nomRuta,descRuta,id_ruta,mapRuta){
        $scope.mostrar = true; //Para mostrar id=sIzq con ng-hide
        loadMap(mapRuta);
        $scope.nomRutaSel = nomRuta;
        $scope.descRutaSel = descRuta;
        $scope.id_ruta = id_ruta;
        
        $("#mapa").css("width","90%");
        $("#sCen").css("margin-left","14%");
        
        //Agregar opcion de calificar sobre esa ruta
        var url = $("#calificar").attr("onclick");
        url+='&r='+id_ruta+'\","","height=210; width=600; left=400;")';
        $("#calificar").attr("onclick",url);
    
        //Guardamos el valor de la ruta seleccionada
        $("#idRuta").val(id_ruta);

        //mostramos la seccion de info
        setTimeout(() => {
            $("#sIzq").css("margin-left",".5vw");
        }, 100);
        $scope.$digest();

    }
}])
.controller("tools",function($scope){
    //Funcion para limpiar el mapa
    $scope.clearMap = function(){
        //ocultamos info ruta
        $("#sIzq").css("margin-left","-50%");
        setTimeout(() => {
            $scope.mostrar = false;
            $("#sIzq").css("margin-left","-20%");//2da vez para que no tarde en regresar
            $('#main-map').attr("src","https://www.google.com/maps/d/embed?mid=1Eii0TX7oziPNwNbeJQZw0ZcgKkPlpwd-");
            $("#mapa").css("width","100%");
            $("#sCen").css("margin-left","auto");
        }, 150);
        $scope.$digest();
    }
    //Redes sociales
    $scope.redes =[
        {
            href: "https://www.instagram.com/laloses/",
            foto: "img/insta.png"
        },
        {
            href: "https://fb.me/Laloses",
            foto: "img/face.png"
        },
        {
            href: "https://twitter.com/Laloses",
            foto: "img/twitter.png"
        },
    ];
})
;
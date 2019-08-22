
//VARIABLES GENERALES
//declaras fuera del ready de jquery
var nuevos_marcadores = [];
var marcadores_bd= [];
var mapa = null; //VARIABLE GENERAL PARA EL MAPA
//FUNCION PARA QUITAR MARCADORES DE MAPA
function limpiar_marcadores(lista)
{
    for(i in lista)
    {
        //QUITAR MARCADOR DEL MAPA
        lista[i].setMap(null);
    }
}
$(document).on("ready", function(){


    //VARIABLE DE FORMULARIO
    var formulario = $("#frm_map");
    var punto = new google.maps.LatLng(-0.9388103139408172,-78.60137939453125);
    var config = {
        zoom:11,
        center:punto,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    mapa = new google.maps.Map( $("#mapa")[0], config );
    google.maps.event.addListener(mapa, "click", function(event){
        var coordenadas = event.latLng.toString();

        coordenadas = coordenadas.replace("(", "");
        coordenadas = coordenadas.replace(")", "");

        var lista = coordenadas.split(",");

        var direccion = new google.maps.LatLng(lista[0], lista[1]);
        //PASAR LA INFORMACIoN AL FORMULARIO

        formulario.find("input[name='rucN']").focus();
        formulario.find("input[name='cx']").val(lista[0]);
        formulario.find("input[name='cy']").val(lista[1]);


        var marcador = new google.maps.Marker({
            //titulo:prompt("Titulo del marcador?"),
            position:direccion,
            map: mapa,
            animation:google.maps.Animation.DROP,
            draggable:false
        });
        //VIDEO 15
        $("#collapseCero").collapse('hide');
        $("#collapseOne").collapse('show');
        $("#collapseTwo").collapse('hide');
        //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
        nuevos_marcadores.push(marcador);

        google.maps.event.addListener(marcador, "click", function(){

        });

        //BORRAR MARCADORES NUEVOS
        limpiar_marcadores(nuevos_marcadores);
        marcador.setMap(mapa);
    });


    //CENTRAR EL MARCADOR AL SELECCIONARLO
    $("#select_resultados").on("click, change", function(){
        //PEQUEÑA VALIDACION
        if($(this).children().length<1)
        {
            return false;//NO HACER NADA, AL NO TENER ITEMS
        }
        var cx = $("#select_resultados option:selected").data("cx");
        var cy = $("#select_resultados option:selected").data("cy");
        //Crear variable coordenada
        var myLatLng = new google.maps.LatLng(cx, cy);
        //VARIABLE MAPA
        mapa.setCenter(myLatLng);
    });

    //CARGAR PUNTOS AL TERMINAR DE CARGAR LA P�GINA
    listar();//FUNCIONA, AHORA A GRAFICAR LOS PUNTOS EN EL MAPA
});
//FUERA DE READY DE JQUERY
//FUNCTION PARA RECUPERAR PUNTOS DE LA BD
function listar()
{//1
    //ANTES DE LISTAR MARCADORES
    //SE DEBEN QUITAR LOS ANTERIORES DEL MAPA
    limpiar_marcadores(marcadores_bd);
    var f_eliminar = $("#formulario_eliminar");
    $.ajax({//ajax
        type:"POST",
        url:"../iajax.php",
        dataType:"JSON",
        data:"&tipo=listar",
        success:function(data){
            if(data.estado=="ok")
            {//7
                //alert("Hay puntos en la BD");
                $.each(data.mensaje, function(i, item){//2
                    //OBTENER LAS COORDENADAS DEL PUNTO
                    var posi = new google.maps.LatLng(item.cx, item.cy);//bien
                    //CARGAR LAS PROPIEDADES AL MARCADOR
                    var marca = new google.maps.Marker({//marcador
                        idMarcador:item.ruc,
                        position:posi,
                        titulo: item.Titulo,
                        direccion: item.direccion,
                        canton: item.canton,
                        cx:item.cx,
                        cy:item.cy,
                        user: item.user
                    });//marcador
                    var ruc = item.ruc;
                    var win = new google.maps.InfoWindow({
                        content: '<div style="width: auto; height: auto;"><h1>'+item.Titulo+'</h1><br><h3>'+item.direccion+','+item.canton+'</h3><p style="color: white;">'+ruc+' </p><p><a href="php/carrito.php?ruc='+ruc+'#carrito'+'">Ver Productos</a><p> </div>'
                    });

                    //AGREGAR EVENTO CLICK AL MARCADOR
                    google.maps.event.addListener(marca, "click", function(){//3
                        $("#collapseCero").collapse('hide');
                        $("#collapseOne").collapse('hide');
                        $("#collapseTwo").collapse('show');
                        win.open(mapa,marca);
                        //alert("Hiciste click en "+marca.idMarcador + " - " + marca.titulo) ;
                        //SOLO MOVER CUANDO SE MARQUE EL CHECKBOX DEL FORMULARIO
                        if($("#opc_edicion").prop("checked"))
                        {//4
                            //HACER UN MARCADOR DRAGGABLE
                            marca.setOptions({draggable: true});

                            google.maps.event.addListener(marca, 'dragend', function(event) {//5
                                //AL FINAL DE MOVE EL MARCADOR
                                //ESTE MISMO YA SE ACTUALIZA CON LAS NUEVAS COORDENADAS
                                //alert(marca.position);
                                var coordenadas = event.latLng.toString();
                                coordenadas = coordenadas.replace("(", "");
                                coordenadas = coordenadas.replace(")", "");
                                var lista = coordenadas.split(",");
                                f_eliminar.find("input[name='cx']").val(lista[0]);
                                f_eliminar.find("input[name='cy']").val(lista[1]);
                            } );//5
                        }//4
                        else
                        {//6

                            f_eliminar.find("input[name='user']").val(marca.user);
                            f_eliminar.find("input[name='titulo']").val(marca.titulo);
                            f_eliminar.find("input[name='cx']").val(marca.cx);
                            f_eliminar.find("input[name='cy']").val(marca.cy);
                            f_eliminar.find("input[name='ruc']").val(marca.idMarcador);
                            f_eliminar.find("input[name='direccion']").val(marca.direccion);
                            f_eliminar.find("input[name='canton']").val(marca.canton);
                        }//6
                        limpiar_marcadores(nuevos_marcadores);
                    }); //3
                    //AGREGAR EL MARCADOR A LA VARIABLE MARCADORES_BD
                    marcadores_bd.push(marca);
                    //UBICAR EL MARCADOR EN EL MAPA
                    marca.setMap(mapa);
                });//2
            }//7
            else
            {
                alert("NO hay puntos en la BD");
            }
        },
        beforeSend:function(){

        },
        complete:function(){

        }
    }); //ajax
}//1
//PLANTILLA AJAX



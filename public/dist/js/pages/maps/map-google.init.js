/*************************************************************************************/
// -->Template Name: Bootstrap Press Admin
// -->Author: Themedesigner
// -->Email: niravjoshi87@gmail.com
// -->File: google_map_init
/*************************************************************************************/

$(function() {
 

    //******************************************//
    // Markers
    //******************************************//
    var map_2;
    map_2 = new GMaps({
        div: '#map',
        lat: -0.9352100,
        lng: -78.6155400
    });
    map_2.addMarker({
        lat: -0.9330774,
        lng: -78.61666,
        title: 'Nombre del Negocio',
        details: {
            database_id: 42,
            author: 'HPNeo'
        },
        click: function(e) {
            if (console.log)
                console.log(e);
            alert('You clicked in this marker');
        }
    });
    map_2.addMarker({
        lat: -0.9330774,
        lng: -78.61666,
        title: 'Nombre del Negocio',
        infoWindow: {
            content: '<p>Información del negocio</p>'
        }
    });

   
});
$("#province").change(function (event) {
    // alert('fghj');
    if (event.target.value != '') {
        clean_parish();
        var url = "/cusubambav2/public/cantons/" + event.target.value + "";
        $.get(url, function (response, state) {
            $("#canton").empty();
            $("#canton").append("<option value='' >-</option>");
            for (i = 0; i < response.length; i++) {
                $("#canton").append("<option value='" + response[i].id + "' >" + response[i].name_canton + "</option>")
            }
        });
    } else {
        $("#canton").empty();
        $("#canton").append("<option value='' >Seleccione...</option>");
        clean_parish();
    }

});

$("#canton").change(function (event) {
    //  alert('fghj');
    if (event.target.value != '') {
        var url = "/cusubambav2/public/parishes/" + event.target.value + "";
        $.get(url, function (response, state) {
            $("#parish").empty();
            $("#parish").append("<option value='' >-</option>");
            for (i = 0; i < response.length; i++) {
                $("#parish").append("<option value='" + response[i].id + "'>" + response[i].name_parish + "</option>")
            }
        });
    } else {
        clean_parish();
    }
});

function clean_parish() {
    $("#parish").empty();
    $("#parish").append("<option value='' >Seleccione...</option>");
}

$("#province").change(function(event){
  // alert('fghj');
    var url = "/vozapp_project/public/cantons/"+event.target.value+"";
    $.get(url,function(response, state){
       $("#canton").empty();
        for(i=1; i<response.length; i++){
            $("#canton").append("<option value='"+response[i].name_canton+"' >" +response[i].name_canton+"</option>")
        }
    });
});

$("#canton").change(function(event){
    //  alert('fghj');
    var url = "/vozapp_project/public/parishes/"+event.target.value+""
    $.get(url,function(response, state){
        $("#parish").empty();
        for(i=0; i<response.length; i++){
            $("#parish").append("<option value='"+response[i].name_parish+"'>" +response[i].name_parish+"</option>")
        }
    });
});


$(document).ready(function(){
    $('#alert').hide();
    //ELIMINAR//
    $('.destroy_news').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "La noticia será eliminada",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, ¡eliminar!",
            cancelButtonText: "No, ¡cancelar!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((r)=>{
            if (r.value) {
                var row = $(this).parents('tr');
                var form = $(this).parents('form');
                var url = form.attr('action');

                $('#alert').show();

                $.post(url, form.serialize(), function(result){
                    row.fadeOut();
                    $('#alert').html(result.message).removeClass("alert alert-info").addClass("alert alert-danger").delay(2000).fadeOut(3000);
                    //$('#total_product').html(result.total);

                }).fail(function (){
                    $('#alert').html('Algo salio mal :(').removeClass("alert alert-danger").addClass("alert alert-info").delay(2000).fadeOut(3000);
                });
            }else {
                return false;
            }
        });
    });
});

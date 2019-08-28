
$(document).ready(function(){
    $('#alert').hide();
    //ELIMINAR//
    $('.btn-delete').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "La categoría será eliminado",
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
                    $('#alert').html(result.message).removeClass("alert-success").removeClass("alert-info").addClass("alert alert-danger").delay(2000).fadeOut(3000);
                    //$('#total_product').html(result.total);

                }).fail(function (){
                    $('#alert').html('La categoría no se elimino, porque tiene productos asociados.').removeClass("alert-success").removeClass("alert alert-danger").addClass('alert alert-info').delay(2000).fadeOut(3000);;
                });
            }else {
                return false;
            }
        });
    });

});
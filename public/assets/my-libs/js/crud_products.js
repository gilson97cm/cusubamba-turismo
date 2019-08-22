
$(document).ready(function(){
    $('#alert').hide();
    //AGREGAR//
   /* $('#btn-add').click(function(){
        var categoria_= $('#categoria_p').val();
        var negocio_ = $('#negocio_p').val();
        var nombre_ = $('#nombre_p').val();
        var descripcion_ = $('#descripcion_p').val();
        var precio_ = $('#precio_p').val();
        var stock_ = $('#stock_p').val();

        var route = $('#createP').attr('action');
        var token  =$('#token').val();
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token},
            type:'POST',
            dataType: 'JSON',
            data:{
                negocio: negocio_,
                categoria: categoria_,
                nombre: nombre_,
                descripcion: descripcion_,
                precio: precio_,
                stock: stock_
            },
            success:function(result){
                $('#nombre_p').val("");
                $('#descripcion_p').val("");
                $('#precio_p').val("");
                $('#stock_p').val("");
                $('#alert').fadeIn().html(result.message).removeClass("alert-danger").addClass("alert alert-success").fadeOut(3000);
            }
        });
    });*/

    //EDITAR//
    /*$('#btn-edit').click(function(){
        var categoria_e= $('#categoria_e').val();
        var negocio_e = $('#negocio_p').val();
        var nombre_e = $('#nombre_e').val();
        var descripcion_e = $('#descripcion_e').val();
        var precio_e = $('#precio_e').val();
        var stock_e = $('#stock_e').val();
        var code_e = $('#code_e').val();

        var route = $('#editP').attr('action');
        var token_e  =$('#token_e').val();

        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN':token_e},
            type:'PUT',
            dataType: 'JSON',
            data:{
                negocio: negocio_e,
                categoria: categoria_e,
                nombre: nombre_e,
                descripcion: descripcion_e,
                precio: precio_e,
                stock: stock_e,
                code: code_e
            },
            success:function(result){
                $('#alert').fadeIn()
                    .html(result.message)
                    .removeClass("alert-danger")
                    .removeClass("alert-success")
                    .addClass("alert alert-info").delay(2000).fadeOut(3000);
            }
        });
    });*/

    //ELIMINAR//
    $('.btn-delete').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "El producto será eliminado",
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
                    $('#alert').html(result.message).removeClass("alert-success").addClass("alert alert-danger").delay(2000).fadeOut(3000);
                    //$('#total_product').html(result.total);

                }).fail(function (){
                    $('#alert').html('Algo salio mal :(');
                });
            }else {
                return false;
            }
        });
    });

});


$(document).ready(function(){
    $('#alert').hide();
    //ELIMINAR NOTICIAS//
    $('.destroy-news').click(function(){
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

    //ELIMINAR LEYENDAS//
    $('.destroy-legends').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "La leyenda será eliminada",
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

    //ELIMINAR ACTIVIDADES//
    $('.destroy-activities').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "La actividad será eliminada",
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

    //ELIMINAR LUGARES//
    $('.destroy-places').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "El lugar será eliminado",
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

    //ELIMINAR EVENTOS//
    $('.destroy-events').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "El evento será eliminado",
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

    //ELIMINAR USUARIOS solo cambiara el estado activo a inactivo//
    $('.destroy-users').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "El usuario cambiara de estado a INACTIVO",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, ¡cambiar!",
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

    //ELIMINAR ROLES
    $('.destroy-roles').click(function(){
        swal.fire({
            title: "¿Está seguro?",
            text: "El rol será eliminado",
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

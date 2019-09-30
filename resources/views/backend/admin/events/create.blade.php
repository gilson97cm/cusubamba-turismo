@extends('backend.admin.layout')
@section('css')
    <link href="{{asset('vendor/fullcalendar/libs/fullcalendar.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('vendor/fullcalendar/dist/calendar.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/my-libs/my-styles.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/toast/toastr.css')}}" rel="stylesheet">

@endsection

@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Calendario</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Eventos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Calendario</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 col-md-12"></div>
            <div class="col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('events.index')
                            <a href="{{route('events.index')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="mdi mdi-format-list-bulleted"></i> Lista de eventos
                            </a>
                        @endcan
                    </div>
                    <div class="card-body b-l calender-sidebar">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-12"></div>
        </div>
    </div>

    {!! Form::open(['route' => ['events.store'], 'method' => 'POST', 'id' =>'form-calendar']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => ['events.update'], 'method' => 'POST', 'id' =>'form-calendar-edit']) !!}
    {!! Form::close() !!}
    <!-- Modal Add New Event with click-->
        <div class="modal fade bd-example-modal-lg" id="my-event" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Crear Evento</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="event-create"
                                class="btn btn-success save-event waves-effect waves-light">Crear Evento
                        </button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->
        <!-- Modal Edit New Event with click-->
        <div class="modal fade bd-example-modal-lg" id="my-event-edit" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Editar Evento</strong></h4>
                       <div class="pull-right" >
                           <button type="button" class="btn btn-danger btn-sm delete-event waves-effect waves-light"
                                   data-dismiss="modal">Eliminar
                           </button>
                           <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Cerrar
                           </button>
                       </div>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->
        <div style="display: none;">
            @include('backend.admin.events.partials.form')
        </div>

@endsection

@section('scripts')
    <script src="{{asset('vendor/fullcalendar/libs/fullcalendar.min.js')}}"></script>
    //CUSTOM
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>

    //TOAST
    <script src="{{asset('assets/libs/toastr/build/toastr.min.js')}}"></script>



    <script>
        !function ($) {
            "use strict";

            var CalendarApp = function () {
                this.$body = $("body"),
                    this.$calendar = $('#calendar'),
                    this.$event = ('#calendar-events div.calendar-events'),
                    this.$categoryForm = $('#add-new-event form'),
                    this.$extEvents = $('#calendar-events'),
                    this.$modal = $('#my-event'),
                    this.$modal_edit = $('#my-event-edit'),
                    this.$saveCategoryBtn = $('.save-category'),
                    this.$calendarObj = null
            };
                /* on select */ //agregar evento
                CalendarApp.prototype.onSelect = function (eventObj, date, allDay) {
                    var $this = this;
                    $this.$modal.modal({
                        backdrop: 'static',
                    });
                    $('.cls').val("");
                    $('#preview').attr('src', '{{asset('assets/images/sin_img.jpg')}}');
                    $('#btn-quitar').css('display','');
                    var originalEventObject = eventObj.data('eventObject');
                    var copiedEventObject = $.extend({}, originalEventObject);
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.end = date;
                    copiedEventObject.allDay = allDay;

                    var start_event_ = copiedEventObject.start.format("YYYY-MM-DD HH:m");
                    var end_event_ = copiedEventObject.end.format("YYYY-MM-DD HH:m");
                    var all_day_event_ = 0;


                    if ($('#drop-remove').is(':checked')) {
                        eventObj.remove();
                    }

                    var form = $('<form id="frm-event" enctype="multipart/form-data" > </form>');
                    form.append($('#form-event'));


                    $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                        form.submit();
                    });

                    $this.$modal.find('form').on('submit', function () {
                        var name_event_ = form.find("textarea[name='name_event']").val();
                        var location_ = form.find("input[name='location_event']").val();
                        var description_ = form.find("textarea[name='description_event']").val();
                        var category_id_ = form.find("select[name='event_category_id']").val();
                        var start_ = form.append("<input type='hidden' value='"+start_event_+"' name ='start_event' />" );
                        var end = form.append("<input type='hidden' value='"+end_event_+"' name ='end_event' />" );

                        //Guardamos el evento creado en base de datos
                        var route = $('#form-calendar').attr('action');
                        var crsfToken = document.getElementsByName("_token")[0].value;

                        if (name_event_ !== null && name_event_.length != 0 && location_ !== null && location_.length != 0 && description_ !== null && description_.length != 0 && category_id_ > 0) {

                            if (start_event_ == end_event_){
                                all_day_event_ = 1;
                                form.append("<input type='hidden' value='"+all_day_event_+"' name ='all_day_event' />" );
                            }
                            else{
                                all_day_event_ = 0;
                                form.append("<input type='hidden' value='"+all_day_event_+"' name ='all_day_event' />" );
                            }

                            var datos = new FormData($('#frm-event')[0]); //se cargan todos los in puts del formulario

                            $.ajax({
                                url: route,
                                type: "POST",
                                data: datos,
                                contentType: false,
                                processData: false,
                                headers: {
                                        "X-CSRF-TOKEN": crsfToken
                                    },
                                success: function (events) {
                                    console.log('Evento creado');
                                    $('#calendar').fullCalendar('refetchEvents');
                                    toastr.success(name_event_+'<br/>'+'Inicio: '+start_event_+'<br/>'+'Fin: '+end_event_, 'Evento creado con exito!'+'<br/>', { "closeButton": true , positionClass: 'toastr toast-bottom-left', containerId: 'toast-bottom-left' });
                                    $('.cls').val("");
                                    $('#preview').attr('src', '{{asset('assets/images/sin_img.jpg')}}');
                                },
                                error: function (json) {
                                    console.log("Error al crear evento");
                                }
                            });
                            $this.$modal.modal('hide');
                        } else {
                            toastr.info('Asegurese de que todos los campos esten llenos', 'Campos incompletos!', { "closeButton": true , positionClass: 'toastr toast-bottom-left', containerId: 'toast-bottom-left' });

                        }
                        return false;

                    });
                    $this.$calendarObj.fullCalendar('unselect');
                },

                //evento para editar las horas
                CalendarApp.prototype.eventResize = function (calEvent, jsEvent, view) {
                    var start = calEvent.start.format("YYYY-MM-DD HH:mm");
                    var back = calEvent.className;

                    if (calEvent.end) {
                        var end = calEvent.end.format("YYYY-MM-DD HH:mm");
                        // var e = end.setDate(end.getDate() -1);
                        if (calEvent.end.format("HH:mm") == calEvent.start.format("HH:mm"))
                            var allDay = 1;
                        else
                            var allDay = 0;
                    } else {
                        var end = 'NULL';
                        var allDay = 1;
                    }
                    var crsfToken = document.getElementsByName("_token")[0].value;
                    $.ajax({
                        url: 'actualizar-evento',
                        data: 'title=' + calEvent.title + '&start=' + start + '&end=' + end + '&id=' + calEvent.id + '&back=' + back + '&allday=' + allDay,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (json) {
                            console.log("Updated Successfully Resize");
                        },
                        error: function (json) {
                            console.log("Error al actualizar evento");
                        }
                    });
                },

                /* on click on event */ //actualizar evento
                CalendarApp.prototype.onEventClick = function (calEvent, jsEvent, view) {
                    var $this = this;
                    $('#btn-quitar').css('display','none');

                    var form = $("<form id='frm-event-edit' enctype='multipartform-data'></form>");
                    ///en el siguiente form se cargan los datos para editar el evento
                    form.append($('#form-event'));
                    form.append("<input type='hidden' name= 'id' value='"+calEvent.id+"' />");
                    form.find("textarea[name='name_event']").val(calEvent.title);
                    form.find("input[name='location_event']").val(calEvent.location);
                    form.find("textarea[name='description_event']").val(calEvent.description);
                    form.find("select[name='color_event']").val(calEvent.className);
                    form.find("select[name='event_category_id']").val(calEvent.category_event);
                    form.find("img[id='preview']").attr('src',calEvent.avatar);
                    form.append("<hr> <div class='pull-right'> <button type='submit' class='btn btn-success waves-effect waves-light'>Actualizar</button></div>");

                    $this.$modal_edit.modal({
                        backdrop: 'static'
                    });

                    $this.$modal_edit.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                        $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                            var crsfToken = document.getElementsByName("_token")[0].value;
                            //   var con = confirm("Esta seguro que desea eliminar el evento");
                            // if (con) {
                            $.ajax({
                                url: 'eliminar-evento',
                                data: 'id=' + calEvent.id,
                                headers: {
                                    "X-CSRF-TOKEN": crsfToken
                                },
                                type: "POST",
                                success: function () {
                                    $('#calendar').fullCalendar('removeEvents', calEvent.id);
                                    console.log("Evento eliminado");
                                },
                                error: function (json) {
                                    console.log("Error al eliminar evento");
                                }
                            });
                            //return (ev._id == calEvent._id);
                        });
                        toastr.error('', 'Evento eliminado!', { "closeButton": true , positionClass: 'toastr toast-bottom-left', containerId: 'toast-bottom-left' });

                        $this.$modal_edit.modal('hide');
                    });
                    $this.$modal_edit.find('form').on('submit', function () {

                        var crsfToken = document.getElementsByName("_token")[0].value;

                        var datos = new FormData($('#frm-event-edit')[0]); //se cargan todos los in puts del formulario

                        $.ajax({
                            url: 'actualizar-evento-form',
                            type: "POST",
                            data:datos,
                            contentType: false,
                            processData: false,
                            headers: {
                                "X-CSRF-TOKEN": crsfToken
                            },
                            success: function (json) {
                                console.log("Updated Successfully oneventClick");
                                $('#calendar').fullCalendar('refetchEvents');
                                toastr.info('','Evento actualizado con exito!', { "closeButton": true , positionClass: 'toastr toast-bottom-left', containerId: 'toast-bottom-left' });
                            },
                            error: function (json) {
                                console.log("Error al actualizar evento");
                            }
                        });
                        $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                        $this.$modal_edit.modal('hide');
                        return false;
                    });

                },

                CalendarApp.prototype.enableDrag = function () {
                    //init events
                    $(this.$event).each(function () {
                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()), // use the element's text as the event title
                        };
                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);
                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 999,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0 //  original position after the drag
                        });
                    });
                },


                //evento para actualizar arrastrando el eventp por el calendario
                CalendarApp.prototype.eventDrop = function (calEvent, delta) {
                    var start = calEvent.start.format("YYYY-MM-DD HH:mm");

                    if (calEvent.end) {
                        var end = calEvent.end.format("YYYY-MM-DD  HH:mm");
                        if (calEvent.end.format("HH:mm") == calEvent.start.format("HH:mm"))
                            var allDay = 1;
                        else
                            var allDay = 0;
                        // alert(end);
                    } else {
                        var end = 'NULL';
                        var allDay = 1;
                        //alert(end);
                    }

                    var back = calEvent.className;

                    var crsfToken = document.getElementsByName("_token")[0].value;

                    $.ajax({
                        url: 'actualizar-evento',
                        data: 'title=' + calEvent.title + '&start=' + start + '&end=' + end + '&id=' + calEvent.id + '&back=' + back + '&allday=' + allDay,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (json) {
                            $('#calendar').fullCalendar('refetchEvents');
                            console.log("Updated Successfully eventdrop");
                        },
                        error: function (json) {
                            console.log("Error al actualizar eventdrop");
                        }
                    });
                },


                /* Initializing */
                CalendarApp.prototype.init = function () {
                    this.enableDrag();
                    /*  Initialize the calendar  */
                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();
                    var form = '';
                    var today = new Date($.now());

                    //aqui se define que atributos va a tener el evento
                    var event = {
                        id              : '123',
                        title           : 'New Event',
                        url             : 'http://thearena.com/',
                        start           : "Sun, 18 Jul 2010 13:00:00 EST",
                        end             : "Sun, 18 Jul 2010 17:00:00 EST",
                        allDay          : false,

                        location        : 'The Arena',
                        description     : 'Big Event',
                        avatar          : 'temp/avatar_events/sin_img.jpg',
                        category_event  : 'CULTURALES',

                        editable        : true
                    };
                    this.$calendar.fullCalendar( 'renderEvent', event, true ) // Add Event to fullCalendar
                    //end

                    var $this = this;
                    $this.$calendarObj = $this.$calendar.fullCalendar({
                        //  timeZone: 'local',
                        slotDuration: '00:15:00',
                        /* If we want to split day time each 15minutes */
                        minTime: '08:00:00',
                        maxTime: '17:00:00',
                        defaultView: 'month',
                        handleWindowResize: true,

                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        buttonText: {
                            today: 'Hoy',
                            month: 'Mes',
                            week: 'Semana',
                            day: 'Día',
                        },

                        events: {url: 'eventos-registrados'},
                        editable: true,
                        droppable: true, // this allows things to be dropped onto the calendar !!!
                        eventLimit: 4, // allow "more" link when too many events
                        selectable: true,
                        resizable: true,

                   /*     drop: function (date, allDay) {
                            $this.onDrop($(this), date, allDay);
                        },*/
                        select: function (date) {
                            $this.onSelect($(this), date, true);
                        },
                        eventClick: function (calEvent, jsEvent, view) {
                            $this.onEventClick(calEvent, jsEvent, view);
                        },
                        eventResize: function (calEvent, jsEvent, view) {
                            $this.eventResize(calEvent, jsEvent, view);
                        },
                        eventDrop: function (calEvent, delta) {
                            $this.eventDrop(calEvent, delta);
                        },


                        eventMouseover: function (event, jsEvent, view) {

                            var start = (event.start.format("HH:mm"));
                            var back = event.className;
                            if (event.end) {
                                var end = event.end.format("HH:mm");
                            } else {
                                var end = "17:00";
                            }
                            if (event.allDay) {
                                var allDay = "Si";
                                start = "08:00";
                            } else {
                                var allDay = "No";
                            }
                            var tooltip = '<div class="tooltipevent card text-white ' + back + ' mb-3 " style="width: 20rem; max-width: 20rem; position:absolute;z-index:10001;">' +
                                            '<div class="card-header"><h5>'+event.title+'</h5></div>'+
                                            '<div class="card-body">'+
                                            '<label class="card-title" style="margin-right: 10px">Todo el día: </label> <label>'+allDay+'</label> <br>'+
                                            '<label class="card-title" style="margin-right: 49px">Inicio: </label><label>'+start+'</label><br>'+
                                            '<label class="card-title" style="margin-right: 63px">Fin: </label><label >'+end+'</label><br>'+
                                            '<label class="card-title">Descripción: </label><br>'+
                                            '<p class="card-text " align="justify" >'+event.description+'</p>'+
                                            '</div>'+
                                            '</div>';
                            $("body").append(tooltip);
                            $(this).mouseover(function (e) {
                                $(this).css('z-index', 10000);
                                $('.tooltipevent').fadeIn('500');
                                $('.tooltipevent').fadeTo('10', 1.9);
                            }).mousemove(function (e) {
                                $('.tooltipevent').css('top', e.pageY + 10);
                                $('.tooltipevent').css('left', e.pageX + 20);
                            });
                        },

                        eventMouseout: function (calEvent, jsEvent) {
                            $(this).css('z-index', 8);
                            $('.tooltipevent').remove();
                        },

                    });

                },

                //init CalendarApp
                $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
        }(window.jQuery),

//initializing CalendarApp
            $(window).on('load', function () {
                $.CalendarApp.init();
            });


    </script>


    //agregar evento
    <script>
        function changeProfile() {
            $('#avatar_event').click();
        }

        $('#avatar_event').change(function () {
            var imgPath = this.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                readURL(this);

            } else
                alert("Elija imágenes (jpg, jpeg, png).")
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };
//                $("#remove").val(0);
            }
        }

        function removeImage() {
            $('#preview').attr('src', '{{asset('assets/images/sin_img.jpg')}}');
            $('#avatar_event').val("");
//            $("#remove").val(1);
        }
    </script>





    <script>
        function aMayusculas(obj, id) {
            obj = obj.toUpperCase();
            document.getElementById(id).value = obj;
        }
    </script>



@endsection



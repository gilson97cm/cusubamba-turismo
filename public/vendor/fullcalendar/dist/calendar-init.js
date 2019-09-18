!function ($) {
    "use strict";

    var CalendarApp = function () {
        this.$body = $("body"),
            this.$calendar = $('#calendar'),
            this.$event = ('#calendar-events div.calendar-events'),
            this.$categoryForm = $('#add-new-event form'),
            this.$extEvents = $('#calendar-events'),
            this.$modal = $('#my-event'),
            this.$saveCategoryBtn = $('.save-category'),
            this.$calendarObj = null
    };


    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date, allDay, element) {
        var $this = this;
        // retrieve the dropped element's stored Event Object
        var originalEventObject = eventObj.data('eventObject');
        var $categoryClass = eventObj.attr('data-class');
        var $description = eventObj.attr('description');
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);
        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.end = date;
        copiedEventObject.allDay = allDay;
        //copiedEventObject.description = element;

        if ($description)
            copiedEventObject['category-description'] = [$description];

        if ($categoryClass)
            copiedEventObject['className'] = [$categoryClass];

        if ($('#drop-remove').is(':checked')) {
            eventObj.remove();
        }

        //Guardamos el evento creado en base de datos
        var name_event = copiedEventObject.title;
        var start_event = copiedEventObject.start.format("YYYY-MM-DD HH:mm");
        var end_event = copiedEventObject.end.format("YYYY-MM-DD HH:mm");
        var color_event = $categoryClass;
        var description = $description;

        var route = $('#form-calendar').attr('action');
        var crsfToken = document.getElementsByName("_token")[0].value;
        var allday = 0;

        if (start_event == end_event)
            allday = 1;
        else
            allday = 0;

        $.ajax({
            url: route,
            data: 'name_event=' + name_event + '&description=' + description + '&start_event=' + start_event + '&end_event=' + end_event + '&allDay=' + allday + '&color_event=' + color_event, //datos que envia el formulario via ajax (back es background)
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": crsfToken
            },
            success: function (events) {
                console.log('Evento creado');
                $('#calendar').fullCalendar('refetchEvents');
            },
            error: function (json) {
                console.log("Error al crear evento");
            }
        });

    },

        /* on select */ //agregar evento
        CalendarApp.prototype.onSelect = function (eventObj, date, allDay) {
            var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });

            var originalEventObject = eventObj.data('eventObject');
            //    var $categoryClass = eventObj.attr('data-class');
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.end = date;
            copiedEventObject.allDay = allDay;

            var start_event = copiedEventObject.start.format("YYYY-MM-DD HH:m");
            var end_event = copiedEventObject.end.format("YYYY-MM-DD HH:m");
            // var allday = copiedEventObject.allDay = allDay;
            var allday = 0;

            //if ($categoryClass)
            //  copiedEventObject['className'] = [$categoryClass];

            if ($('#drop-remove').is(':checked')) {
                eventObj.remove();
            }

            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'>" +
                    "<div class='form-group'>" +
                    "<label class='control-label'>Seleccione una categoria</label>" +
                    "<select class='form-control' name='category-events'>" +
                    "</select>" +
                    "</div>" +
                    "</div>")
                .find("select[name='category-events']")

                .append("<?php foreach($categories as $category){ " +
                    "<option value='category->id'>category->name</option> " +
                    "}?>")

            form.find(".row")
                .append("<div class='col-md-6'>" +
                    "<div class='form-group'>" +
                    "<label class='control-label'>Nombre:</label>" +
                    "<input class='form-control' placeholder='Nombre' type='text' name='title'/>" +
                    "</div>" +
                    "<div class='form-group'>" +
                    "<label class='control-label'>Descripción:</label>" +
                    "<textarea class='form-control' placeholder='Descripción:' type='text' name='title'/>" +
                    "</div>" +
                    "</div>")

                .append("<div class='col-md-6'>" +
                    "<div class='form-group'>" +
                    "<label class='control-label'>Seleccione un color;</label>" +
                    "<select class='form-control' name='category'>" +
                    "</select>" +
                    "</div>" +
                    "</div>")

                .find("select[name='category']")
                .append("<option value='bg-danger'> Rojo</option>")
                .append("<option value='bg-success'>Verde</option>")
                .append("<option value='bg-primary'>Morado</option>")
                .append("<option value='bg-info'>Azul</option>")
                .append("<option value='bg-warning'>Amarillo</option></div></div>");



            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var hour = form.find("input[name='hour']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                //Guardamos el evento creado en base de datos


                var route = $('#form-calendar').attr('action');

                var crsfToken = document.getElementsByName("_token")[0].value;

                if (title !== null && title.length != 0) {

                    if (start_event == end_event)
                        allday = 1;
                    else
                        allday = 0;

                    $.ajax({
                        url: route,
                        data: 'name_event=' + title + '&start_event=' + start_event + '&end_event=' + end_event + '&allDay=' + allday + '&color_event=' + categoryClass, //datos que envia el formulario via ajax (back es background)
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": crsfToken
                        },
                        success: function (events) {
                            console.log('Evento creado');
                            $('#calendar').fullCalendar('refetchEvents');
                        },
                        error: function (json) {
                            console.log("Error al crear evento");
                        }
                    });
                    $this.$modal.modal('hide');
                } else {
                    alert('You have to give a title to your event');
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
            var form = $("<form></form>");
            form.append("<label>Change event name</label>");
            ///en el siguiente form se cargan los datos para editar el evento
            form.append("<div class='input-group'>" +
                "<input class='form-control' name='title' type=text value='" + calEvent.title + "' />" +
                "<input type='hidden' name='id' value='" + calEvent.id + "'> " +
                "<span class='input-group-btn'> " +
                "<button type='submit' class='btn btn-success waves-effect waves-light'>" +
                "<i class='fa fa-check'></i> Save</button>" +
                "</span></div>");
            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
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
                            $('#calendar').fullCalendar('removeEvents', calEvent._id);
                            console.log("Evento eliminado");
                        }
                    });


                    //return (ev._id == calEvent._id);
                });
                $this.$modal.modal('hide');
            });

            $this.$modal.find('form').on('submit', function () {
                calEvent.title = form.find("input[name=title]").val();
                calEvent.id = form.find("input[name=id]").val();

                var crsfToken = document.getElementsByName("_token")[0].value;
                $.ajax({
                    url: 'actualizar-evento-form',
                    data: 'title=' + calEvent.title + '&id=' + calEvent.id,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                    success: function (json) {
                        console.log("Updated Successfully oneventClick");
                    },
                    error: function (json) {
                        console.log("Error al actualizar evento");
                    }
                });
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                $this.$modal.modal('hide');
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
                    console.log("Updated Successfully eventdrop");
                },
                error: function (json) {
                    console.log("Error al actualizar eventdrop");
                }
            });
        },

        CalendarApp.prototype.eventRender = function (calEvent, element) {
            //element.attr("description", calEvent.description_event)
            element.attr("description", calEvent.description)
            //element.find("input[name='category-description']", calEvent.description).val();

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
                    day: 'Día'
                },
                events: {url: 'eventos-registrados'},
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                eventLimit: 4, // allow "more" link when too many events
                selectable: true,
                resizable: true,

                drop: function (date, allDay, element) {
                    $this.onDrop($(this), date, allDay, element);
                },
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
                eventRender: function (calEvent, element) {
                    $this.eventRender(calEvent, element);
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
                    var tooltip = '<div class="tooltipevent ' + back + ' " style="width:200px;height:100px;color:white;position:absolute;z-index:10001;">' + '<center>' + event.title + '</center>' + 'Todo el dia: ' + allDay + '<br>' + 'Inicio: ' + start + '<br>' + 'Fin: ' + end + '</div>';
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

            //on new event
            this.$saveCategoryBtn.on('click', function () {
                var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
                var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
                var description = $this.$categoryForm.find("input[name='category-description']").val();
                if (categoryName !== null && categoryName.length != 0) {
                    $this.$extEvents.append('<div class="calendar-events m-b-20" ' +
                        'data-class="bg-' + categoryColor + '" ' +
                        'style="position: relative;">' +
                        '<i class="fa fa-circle text-' + categoryColor + ' m-r-10" >' +
                        '</i>' + categoryName + '' +
                        '</div>')
                    $this.enableDrag();
                }

            });
        },

        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

//initializing CalendarApp
    $(window).on('load', function () {

        $.CalendarApp.init()
    });

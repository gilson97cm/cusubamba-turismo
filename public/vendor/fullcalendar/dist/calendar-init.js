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
    CalendarApp.prototype.onDrop = function (eventObj, date, allDay) {
        var $this = this;
        // retrieve the dropped element's stored Event Object
        var originalEventObject = eventObj.data('eventObject');
        var $categoryClass = eventObj.attr('data-class');
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);
        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;

        if ($categoryClass)
            copiedEventObject['className'] = [$categoryClass];
        // render the event on the calendar
        // $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            eventObj.remove();
        }

        //Guardamos el evento creado en base de datos
        var name_event = copiedEventObject.title;
        // var description_event = copiedEventObject.description;
        var start_event = copiedEventObject.start.format("YYYY-MM-DD HH:MM");
        //  var time_event = copiedEventObject.time_format("HH:MM");
        // var des = $('#des').val();
        var color_event = $categoryClass;
        var route = $('#form-calendar').attr('action');
        var crsfToken = document.getElementsByName("_token")[0].value;

        $.ajax({
            url: route,
            data: 'name_event=' + name_event + '&start_event=' + start_event + '&color_event=' + color_event, //datos que envia el formulario via ajax (back es background)
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
        /* on click on event */
        CalendarApp.prototype.onEventClick = function (calEvent, jsEvent, view) {
            var $this = this;
            var form = $("<form></form>");
            form.append("<label>Change event name</label>");
            ///en el siguiente form se cargan los datos para editar el evento
            form.append("<div class='input-group'>" +
                "<input class='form-control' name='title' type=text value='" + calEvent.title + "' />" +
                "<input type='hidden' name='id' value='" + calEvent.id + "'> " +
                "<input type='hidden' name='start' value='" + calEvent.start.format("YYYY-MM-DD HH:MM") + "'> " +
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
                calEvent.start = form.find("input[name=start]").val();
                //var back = calEvent.className;

                var  crsfToken = document.getElementsByName("_token")[0].value;
                $.ajax({
                    url:'actualizar-evento',
                    data: 'title=' + calEvent.title + '&start=' + calEvent.start +  '&id=' + calEvent.id ,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                    success: function (json) {
                        console.log("Updated Successfully");
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
        /* on select */
        CalendarApp.prototype.onSelect = function (eventObj, date, allDay) {
            var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });

            // var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            var start_event = copiedEventObject.start.format("YYYY-MM-DD HH:MM");

            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            // $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }

            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                //Guardamos el evento creado en base de datos


                var route = $('#form-calendar').attr('action');

                var crsfToken = document.getElementsByName("_token")[0].value;


                if (title !== null && title.length != 0) {
                        $.ajax({
                            url: route,
                            data: 'name_event=' + title + '&start_event=' + start_event + '&color_event=' + categoryClass, //datos que envia el formulario via ajax (back es background)
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
        CalendarApp.prototype.enableDrag = function () {
            //init events
            $(this.$event).each(function () {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
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
        }
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
            slotDuration: '00:15:00',
            /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',
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
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            resizable: true,

            drop: function (date) {
                $this.onDrop($(this), date, true);
            },
            select: function (date) {
                $this.onSelect($(this), date, true);
            },
            eventClick: function (calEvent, jsEvent, view) {
                $this.onEventClick(calEvent, jsEvent, view);
            },
            eventResize: function (event) {
                var start = event.start.format("YYYY-MM-DD HH:MM");
                var back = event.className;
                var allDay = event.allDay;
                if (event.end) {
                    var end = event.end.format("YYYY-MM-DD HH:MM");
                } else {
                    var end = 'NULL';
                }
               var crsfToken = document.getElementsByName("_token")[0].value;
                $.ajax({
                    url: 'actualizar-evento',
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id + '&back=' + back + '&allday=' + allDay,
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                    success: function (json) {
                        console.log("Updated Successfully");
                    },
                    error: function (json) {
                        console.log("Error al actualizar evento");
                    }
                });
            },
            eventMouseover: function (event, jsEvent, view) {

                var start = (event.start.format("HH:mm"));
                var back = event.className;
                if (event.end) {
                    var end = event.end.format("HH:mm");
                } else {
                    var end = "No definido";
                }
                if (event.allDay) {
                    var allDay = "Si";
                } else {
                    var allDay = "No";
                }
                var tooltip = '<div class="tooltipevent '+back+' " style="width:200px;height:100px;color:white;position:absolute;z-index:10001;">' + '<center>' + event.title + '</center>' + 'Todo el dia: ' + allDay + '<br>' + 'Inicio: ' + start + '<br>' + 'Fin: ' + end + '</div>';
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
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="calendar-events m-b-20" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-circle text-' + categoryColor + ' m-r-10" ></i>' + categoryName + '</div>')
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

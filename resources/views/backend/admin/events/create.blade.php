@extends('backend.admin.layout')
@section('css')
    <link href="{{asset('vendor/fullcalendar/libs/fullcalendar.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendor/fullcalendar/dist/calendar.css')}}" rel="stylesheet" />
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
    {{--<div class="container-fluid">
        <div class="panel panel-default">
            <!-- Content Header (Page header) -->
            <div class="panel-body">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Eventos</h4>
                                </div>
                                <div class="box-body">
                                    <!-- the events -->
                                    <div id="external-events">
                                        <div class="external-event bg-green">Entrega de boletines</div>
                                        <div class="external-event bg-yellow">Reunion padres de familia</div>
                                        <div class="external-event bg-aqua">Reunion de profesores</div>
                                        <div class="external-event bg-light-blue">Salida pedagogica</div>
                                        <div class="checkbox">
                                            <label for="drop-remove">
                                                <input type="checkbox" id="drop-remove">
                                                Eliminar al asignar
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Crear evento</h3>
                                </div>
                                <div class="box-body">
                                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                        <ul class="fc-color-picker" id="color-chooser">
                                            <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                            <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- /btn-group -->
                                    <div class="input-group">
                                        <input id="new-event" type="text" class="form-control" placeholder="Titulo de evento">

                                        <div class="input-group-btn">
                                            <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Agregar</button>
                                        </div>
                                        <!-- /btn-group -->
                                    </div><br/><br/>
                                    <!-- /input-group -->
                                    {!! Form::open(['route' => ['events.store'], 'method' => 'POST', 'id' =>'form-calendar']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-3 border-right p-r-0">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title m-t-10">Drag & Drop Event</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="calendar-events" class="">
                                                <div class="calendar-events m-b-20" data-class="bg-info"><i class="fa fa-circle text-info m-r-10"></i>Event One</div>
                                                <div class="calendar-events m-b-20" data-class="bg-success"><i class="fa fa-circle text-success m-r-10"></i> Event Two</div>
                                                <div class="calendar-events m-b-20" data-class="bg-danger"><i class="fa fa-circle text-danger m-r-10"></i>Event Three</div>
                                                <div class="calendar-events m-b-20" data-class="bg-warning"><i class="fa fa-circle text-warning m-r-10"></i>Event Four</div>
                                            </div>
                                            <!-- checkbox -->
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="drop-remove">
                                                <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                            </div>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                                <i class="ti-plus"></i> Add New Event
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body b-l calender-sidebar">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::open(['route' => ['events.store'], 'method' => 'POST', 'id' =>'form-calendar']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => ['events.update'], 'method' => 'POST', 'id' =>'form-calendar-edit']) !!}
    {!! Form::close() !!}
        <!-- BEGIN MODAL -->
        <div class="modal none-border" id="my-event">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Add Event</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" id="event-create"  class="btn btn-success save-event waves-effect waves-light">Create Eventooo</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add Category -->
        <div class="modal fade none-border" id="add-new-event">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Add</strong> a category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                        <option value="inverse">Inverse</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Saveeee</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
    </div>

@endsection

@section('scripts')
    <script src="{{asset('vendor/fullcalendar/libs/fullcalendar.min.js')}}"></script>
    <script src="{{asset('vendor/fullcalendar/dist/calendar-init.js')}}"></script>
@endsection



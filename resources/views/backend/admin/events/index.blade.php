@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
    <link href="{{asset('vendor/fullcalendar/dist/calendar.css')}}" rel="stylesheet"/>
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Lista de Eventos</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Eventos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lista</li>
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
            <div class="col-lg-auto col-md-12">
                <div id="alert">
                </div>
                @include('flash::message')
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('events.create')
                            <a href="{{route('events.create')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="fa fa-plus"></i> Calendario
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    {{ Form::open(['route' => 'events.index', 'method' => 'GET', 'class' => 'form-inline pull-left']) }}
                                    <div class="form-group">
                                        {{ Form::text('start_event',null,  ['class' => 'form-control my-border margin-search','placeholder'=>'F. inicio', 'onfocus' => 'this.type = "date"']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('end_event',null,  ['class' => 'form-control my-border margin-search','placeholder'=>'F. fin', 'onfocus' => 'this.type = "date"']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('name_event', null, ['class' => 'form-control my-border margin-search', 'placeholder' => 'Nombre']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('description_event', null, ['class' => 'form-control my-border margin-search' , 'placeholder' => 'Descripción']) }}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-search margin-search">
                                            <span class="mdi mdi-magnify"></span>Buscar
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{route('events.index')}}" class="btn btn-default btn-add">
                                            <span class="mdi mdi-filter"></span> Ver Todo
                                        </a>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class=" form-group col-lg-12">
                                <table class="table table-striped table-hover table-responsive">
                                    <thead>
                                    <tr class="thead-tr">
                                        <th width="15%">Inicio</th>
                                        <th width="15%">Fin</th>
                                        <th width="5%">Categoría</th>
                                        <th width="10%">Imágen</th>
                                        <th width="30%">Titulo</th>
                                        <th width="40%">Detalles</th>
                                        <th width="2%" colspan="3">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td> {{$event->start_event}} </td>
                                            <td> {{$event->end_event}} </td>
                                            <td> <strong>{{$event->category->name_event_category}}</strong> </td>
                                            <td style=" vertical-align: middle;" align="center"><img
                                                    src="{{asset($event->avatar_event)}}" alt="img" width="80px"
                                                    height="50px"></td>
                                            <td class="expandDiv"><strong>{{$event->name_event}}</strong></td>
                                            <td class="expandDiv" align="justify">{!! $event->description_event !!}</td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('events.show')
                                                    <a href="#responsive-modal{{$event->id}}" data-toggle="modal"
                                                       class="btn btn-sm btn-primary my_button">
                                                        Ver
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('events.destroy')
                                                    {!! Form::open(['route' => ['events.destroy.list', $event->id], 'method' => 'DELETE']) !!}
                                                    <a href="#" disabled="true"
                                                       class="btn btn-sm btn-danger destroy-events" id="destroy_events">Eliminar</a>
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg" id="responsive-modal{{$event->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><strong>Detalle del Evento</strong></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="form-event">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div align="center">
                                                                                {{Form::label('avatar_event', 'Portada:',['class' => 'my-label'])}}
                                                                                <br>
                                                                                <img id="" src="{{asset($event->avatar_event)}}"
                                                                                     width="80%" height="160px" class="my-border"/><br/>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8" >
                                                                    <div class="row">
                                                                        <div class="col-md-6 my-border-right">
                                                                            <div class="form-group">
                                                                                {{Form::label('event_category_id', 'Categoría:',['class' => ' my-label'])}}
                                                                                <br>
                                                                                {{Form::label('name_event', $event->category->name_event_category,[])}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 my-border-right">
                                                                            <div class='form-group'>
                                                                                {{Form::label('color_event', 'Color:',['class' => ' my-label'])}}
                                                                                <div class="{{$event->color_event}}" style=" width: 20px; height: 15px" ></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class='col-md-6 my-border-right'>
                                                                            <div class='form-group'>
                                                                                {{Form::label('name_event', 'Titulo:',['class' => ' my-label'])}}
                                                                               <p align="justify">{{$event->name_event}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 my-border-right">
                                                                            <div class='form-group'>
                                                                                {{Form::label('location_event', 'Lugar:',['class' => ' my-label'])}}
                                                                                <br>
                                                                                {{Form::label('location_event', $event->location_event,[])}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 my-border-right">
                                                                            <div class='form-group'>
                                                                                {{Form::label('name_event', 'Inicio:',['class' => ' my-label'])}}
                                                                                <p align="justify">{{$event->start_event}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 my-border-right">
                                                                            <div class='form-group'>
                                                                                {{Form::label('end_event', 'Fin:',['class' => ' my-label'])}}
                                                                                <br>
                                                                                {{Form::label('end_event', $event->end_event,[])}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class='form-group'>
                                                                        {{Form::label('description_event', 'Descripción:',['class' => ' my-label'])}}
                                                                        <p align="justify">{{$event->description_event}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $events->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/my-libs/js/destroy.js')}}"></script>
    <script src="{{asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.expander/jquery.expander.js')}}"></script>
    <script src="{{asset('vendor/jquery.expander/expand.js')}}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>

@endsection

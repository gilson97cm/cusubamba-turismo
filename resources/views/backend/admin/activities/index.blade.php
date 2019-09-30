@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Lista de Actividades</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Actividades</a></li>
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
                <div  id="alert">
                </div>
                @include('flash::message')
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('activities.create')
                            <a href="{{route('activities.create')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="fa fa-plus"></i> Publicar Actividad
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    {{ Form::open(['route' => 'activities.index', 'method' => 'GET', 'class' => 'form-inline pull-left']) }}
                                   <div class="form-group">
                                       {{ Form::select('activity_category_id', $categories, null, ['class' => 'form-control my-border margin-search', 'placeholder' => 'Categoria']) }}
                                   </div>
                                    <div class="form-group">
                                        {{ Form::text('name_activity', null, ['class' => 'form-control my-border margin-search', 'placeholder' => 'Nombre','onkeypress' => 'return validar_caracteres(event)']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('description_activity', null, ['class' => 'form-control my-border margin-search' , 'placeholder' => 'Detalle','onkeypress' => 'return validar_caracteres(event)']) }}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-search margin-search">
                                            <span class="mdi mdi-magnify"></span>Buscar
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{route('activities.index')}}" class="btn btn-default btn-add">
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
                                        <th width="15%">Publicada el:</th>
                                        <th width="6%">Categoría</th>
                                        <th width="10%">Imágen</th>
                                        <th width="30%">Nombre</th>
                                        <th width="40%">Descripción</th>
                                        <th width="2%" colspan="3">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($activities as $activity)
                                        <tr>
                                            <td>{{$activity->created_at}}</td>
                                            <td>{{$activity->category->name_activity_category}}</td>
                                            <td style=" vertical-align: middle;" align="center"><img src="{{asset($activity->avatar_activity)}}" alt="img" width="80px" height="50px"></td>
                                            <td class="expandDiv" > <strong>{{$activity->name_activity}}</strong> </td>
                                            <td class="expandDiv"  align="justify">{!! $activity->description_activity !!}</td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('activities.show')
                                                    <a href="{{route('activities.show', $activity->id)}}"
                                                       class="btn btn-sm btn-primary my_button">
                                                        Ver
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('activities.edit')
                                                    <a href="{{route('activities.edit', $activity->id)}}"
                                                       class="btn btn-sm btn-secondary" >
                                                        Editar
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('activities.destroy')
                                                    {!! Form::open(['route' => ['activities.destroy', $activity->id], 'method' => 'DELETE']) !!}
                                                    <a href="#" disabled="true"  class="btn btn-sm btn-danger destroy-activities" id="destroy_activities" >Eliminar</a>
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $activities->render() !!}
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
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>


    <!-- READ MORE -->
    <script>
        $(document).ready(function() {

            $('td.expandDiv').expander({
                slicePoint: 125, //It is the number of characters at which the contents will be sliced into two parts.
                widow: 2,
                expandSpeed: 0, // It is the time in second to show and hide the content.
                //userCollapseText: '' // Specify your desired word default is Less.
            });

            //$('div.expandDiv').expander();
        });
    </script>

@endsection

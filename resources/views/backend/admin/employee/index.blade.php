@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Módulo Empleados</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Empleados</a></li>
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
                        <label class="my-label">  Empleados</label>
                        @can('employees.create')
                            <a href="{{route('employees.create')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                Crear
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class=" form-group col-lg-12">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr class="thead-tr">
                                        <th width="50px">Cédula</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Rol</th>
                                        <th>Cargo</th>

                                        <th colspan="3">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($people as $ud)
                                        <tr>
                                            <td>{{$ud->id_card_person}}</td>
                                            <td>{{$ud->name_person}}</td>
                                            <td>{{$ud->last_name_person}}</td>
                                            <td>{{$ud->email}}</td>
                                            <td>{{$ud->phone_person}}</td>
                                            <td>{{$ud->name}}</td>
                                            <td>{{$ud->position_person}}</td>
                                            <td width="10px">
                                                @can('employees.show')
                                                    <a href="{{route('employees.show', [$ud->id_card_person])}}"
                                                       class="btn btn-sm btn-primary my_button">
                                                        Ver
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px">
                                                @can('employees.edit')
                                                    <a href="{{route('employees.edit', [$ud->id_card_person])}}"
                                                       class="btn btn-sm btn-secondary">
                                                        Editar
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px">
                                                    {!! Form::open(['route' => ['employees.destroy', $ud['id_card_person']],'method' => 'DELETE' ]) !!}
                                                @can('employees.destroy')
                                                    <a href="#" class="btn btn-sm btn-danger btn-destroy">Eliminar</a>
                                                @endcan
                                                    {!! Form::close() !!}

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $people->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/my-libs/js/crud_role.js')}}"></script>
    <script src="{{asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>
@endsection

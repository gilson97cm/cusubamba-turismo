@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Lista de Usuarios inactivos</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Usuarios Inactivos</a></li>
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
                        @can('users.index')
                            <a href="{{route('users.index')}}"
                               class="btn btn-sm btn-primary pull-right ">
                                <i class="mdi mdi-format-list-bulleted"></i>Lista de Usuarios
                            </a>
                        @endcan
                        <span></span>
                        @can('users.create')
                            <a href="{{route('users.create')}}"
                               class="btn btn-sm btn-info my_button pull-right " style="margin-right: 3px">
                                <i class="mdi mdi-plus"></i>Registrar Usuario
                            </a>
                        @endcan

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    {{ Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'form-inline pull-left']) }}
                                    <div class="form-group">
                                        {{ Form::text('id_card_user', null, ['class' => 'form-control my-border margin-search','onkeypress' => 'return validar_numeros(event)', 'placeholder' => 'Cédula']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('name_user', null, ['class' => 'form-control my-border margin-search','onkeypress' => 'return validar_letras(event)', 'placeholder' => 'Nombre']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('last_name_user', null, ['class' => 'form-control my-border margin-search','onkeypress' => 'return validar_letras(event)', 'placeholder' => 'Apellido']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('email', null, ['class' => 'form-control my-border margin-search','onkeypress' => 'return validar_email(event)', 'placeholder' => 'Correo']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('position_user', null, ['class' => 'form-control my-border margin-search','onkeypress' => 'return validar_letras(event)', 'placeholder' => 'Crargo']) }}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-search margin-search">
                                            <span class="mdi mdi-magnify"></span>Buscar
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{route('users.index')}}" class="btn btn-default btn-add">
                                            <span class="mdi mdi-filter"></span> Ver Todo
                                        </a>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                        <hr>

                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                            <tr class="thead-tr">
                                <th width="10%">Avatar</th>
                                <th width="10%">Cédula</th>
                                <th width="20%">Nombre</th>
                                <th width="20%">Apellido</th>
                                <th width="10%">Correo</th>
                                <th width="10%">Teléfono</th>
                                <th width="10%">Rol</th>

                                <th width="10%" colspan="2">&nbsp;</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><img src="{{asset($user->avatar_user)}}" alt="users" class="rounded-circle"
                                             width="50px" height="50px"></td>
                                    <td>{{$user->id_card_user}}</td>
                                    <td>{{$user->name_user}}</td>
                                    <td>{{$user->last_name_user}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_user}}</td>
                                    @foreach ($user->roles as $role)
                                        <td>{{$role->name}}</td>
                                    @endforeach
                                    <td width="10px">
                                        @can('users.show')
                                            <a href="{{route('users.show', [$user->id])}}"
                                               class="btn btn-sm btn-primary my_button">
                                                Ver
                                            </a>
                                        @endcan
                                    </td>
                                    <td width="10px">
                                        @can('users.destroy')
                                            {!! Form::open(['route' => ['users.active', $user->id], 'method' => 'PUT']) !!}
                                            <input type="submit" class="btn btn-sm btn-secondary" value="Activar">
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->render() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>
@endsection

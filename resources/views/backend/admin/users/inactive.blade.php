@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Módulo Usuarios</h4>
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
                        <label class="my-label"> Usuarios</label>
                        @can('users.create')
                            <a href="{{route('users.create')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                Crear
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">

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
                                            {!! Form::open(['route' => ['users.active', $user->id], 'method' => 'DELETE']) !!}
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

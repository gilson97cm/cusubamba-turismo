@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Módulo Usuarios</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('dashboard')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <label class="card-title my-label" >Información del Usuario</label>
                    </div>
                    <div class="card-body">

                            <div class="row">
                                <div class="col-lg-1 col-md-12 col-sm-12"></div>
                                <div class="col-lg-3 col-md-12 col-sm-12 my-profile">
                                    <p><strong>Cédula: </strong> {{$user->id_card_user}}</p>
                                    <p><strong>Nombres: </strong> {{$user->name_user}}</p>
                                    <p><strong>Apellidos: </strong> {{$user->last_name_user}}</p>
                                    <p><strong>Fecha de Nacimiento: </strong> {{$user->birth_date_user}}</p>
                                    <p><strong>Género: </strong> {{$user->genre_user}}</p>
                                </div>
                                <div class="col-lg-1 col-md-12 col-sm-12"></div>
                                <div class="col-lg-3 col-md-12 col-sm-12 my-profile">
                                    <p><strong>Correo: </strong> {{$user->email}}</p>
                                    <p><strong>Teléfono: </strong> {{$user->phone_user}}</p>
                                </div>
                                <div class="col-lg-1 col-md-12 col-sm-12"></div>
                                <div class="col-lg-3 col-md-12 col-sm-12 my-profile">
                                    <p><strong>Provincia: </strong> {{$user->province_user}}</p>
                                    <p><strong>Canton: </strong> {{$user->canton_user}}</p>
                                    <p><strong>Parroquia: </strong> {{$user->parish_user}}</p>
                                    <p><strong>Dirección: </strong> {{$user->address_user}}</p>
                                </div>
                            </div>


                            <hr>
                        @foreach($user->roles as $role)
                            <p><strong>Rol: </strong> {{$role->name}}</p>
                        @endforeach
                            <p><strong>Estado: </strong> {{$user->state_user}}</p>
                            <p><strong>Fecha en que fué registrado: </strong> {{$user->created_at}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection

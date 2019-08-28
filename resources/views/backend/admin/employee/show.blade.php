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
                            <li class="breadcrumb-item"><a href="#">Empleado</a></li>
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
                        <label class="card-title my-label" >Información de Empleados</label>
                    </div>
                    <div class="card-body">
                        @foreach($employee as $usr)
                            <div class="row">
                                <div class="col-lg-1 col-md-12 col-sm-12"></div>
                                <div class="col-lg-3 col-md-12 col-sm-12 my-profile">
                                    <p><strong>Cédula: </strong> {{$usr->id_card_person}}</p>
                                    <p><strong>Nombres: </strong> {{$usr->name_person}}</p>
                                    <p><strong>Apellidos: </strong> {{$usr->last_name_person}}</p>
                                    <p><strong>Fecha de Nacimiento: </strong> {{$usr->birthdate_person}}</p>
                                    <p><strong>Género: </strong> {{$usr->genre_person}}</p>
                                </div>
                                <div class="col-lg-1 col-md-12 col-sm-12"></div>
                                <div class="col-lg-3 col-md-12 col-sm-12 my-profile">
                                    <p><strong>Correo: </strong> {{$usr->email}}</p>
                                    <p><strong>Teléfono: </strong> {{$usr->phone_person}}</p>
                                </div>
                                <div class="col-lg-1 col-md-12 col-sm-12"></div>
                                <div class="col-lg-3 col-md-12 col-sm-12 my-profile">
                                    <p><strong>Provincia: </strong> {{$usr->province_person}}</p>
                                    <p><strong>Canton: </strong> {{$usr->canton_person}}</p>
                                    <p><strong>Parroquia: </strong> {{$usr->parish_person}}</p>
                                    <p><strong>Dirección: </strong> {{$usr->address_person}}</p>
                                </div>
                            </div>


                            <hr>
                            <p><strong>Rol: </strong> {{$usr->name}}</p>
                            <p><strong>Estado: </strong> {{$usr->state_user}}</p>
                            <p><strong>Fecha en que fué registrado: </strong> {{$usr->created_at}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection

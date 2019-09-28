@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
    @endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Acerca del Rol</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Roles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalle</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       <div class="card-title">Detalle del Rol {{$role->name}}</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-12"></div>
                                <div class="col-lg-8 col-md-12">
                                    <table class="table table-striped table-responsive-lg">
                                        <tr>
                                            <td width="20px"><strong>Nombre: </strong></td>
                                            <td width="20px">{{$role->name}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20px"><strong>URL amigable:: </strong> </td>
                                            <td width="20px">{{$role->slug}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20px"><strong>Descripcion: </strong></td>
                                            <td width="20px">{{$role->description}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Permiso Especial:</strong></td>
                                            <td>
                                                @if($role->special == 'all-access')
                                                    <label class="label label-success my-label">Acceso total.</label>
                                                @elseif($role->special == 'no-access' )
                                                    <label class="label label-danger my-label">Acceso bloqueado.</label>
                                                @else
                                                    <label class="label label-info my-label">Sin permisos especiales.</label>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <div class="col-lg-2 col-md-12" ></div>
                        </div>
                        <hr>
                        <label class="my-label"><strong>Lista de permisos:</strong></label>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="form-group col-lg-8">

                                    <table class="table table-striped">
                                        <thead >
                                        <tr class="thead-tr">
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($role->permissions as $permission)
                                            <tr>
                                                <td>{{$permission->name}}</td>
                                                <td>{{$permission->description ?: 'N/A'}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

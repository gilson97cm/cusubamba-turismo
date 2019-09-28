@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
    @endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Módulo Roles</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Roles</a></li>
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
                        <label class="my-label">  Roles</label>
                        @can('roles.create')
                            <a href="{{route('roles.create')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                Crear
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-8">
                                <div class="page-header">
                                    {{ Form::open(['route' => 'roles.index', 'method' => 'GET', 'class' => 'form-inline pull-left']) }}
                                    <div class="form-group">
                                        {{ Form::text('name', null, ['class' => 'form-control my-border margin-search','onkeypress' => 'return validar_letras(event)', 'placeholder' => 'Nombre']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('description', null, ['class' => 'form-control my-border margin-search','onkeypress' => 'return validar_letras(event)', 'placeholder' => 'Descripción']) }}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-search margin-search">
                                            <span class="mdi mdi-magnify"></span>Buscar
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{route('roles.index')}}" class="btn btn-default btn-add">
                                            <span class="mdi mdi-filter"></span> Ver Todo
                                        </a>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <hr>
                       <div class="row">
                           <div class="col-lg-2"></div>
                           <div class=" form-group col-lg-8">
                               <table class="table table-striped table-hover">
                                   <thead>
                                   <tr class="thead-tr">
                                       <th width="50px">Rol</th>
                                       <th>Descripción</th>
                                       <th colspan="3">&nbsp;</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($roles as $role)
                                       <tr>
                                           <td>{{$role->name}}</td>
                                           <td>{{$role->description}}</td>
                                           <td width="10px">
                                               @can('roles.show')
                                                   <a href="{{route('roles.show', $role->id)}}"
                                                      class="btn btn-sm btn-primary my_button">
                                                       Ver
                                                   </a>
                                               @endcan
                                           </td>
                                           <td width="10px">
                                               @can('roles.edit')
                                                   @if($role->name != "Administrador")
                                                   <a href="{{route('roles.edit', $role->id)}}"
                                                      class="btn btn-sm btn-secondary">
                                                       Editar
                                                   </a>
                                                   @else
                                                       <button disabled="true"  class="btn btn-sm btn-secondary">Editar</button>
                                                   @endif
                                               @endcan
                                           </td>
                                           <td width="10px">
                                               @can('roles.destroy')
                                                   @if($role->name != "Administrador")
                                                   {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                                                   <a href="#" class="btn btn-sm btn-danger destroy-roles">Eliminar</a>
                                                   {!! Form::close() !!}
                                                   @else
                                                       <button disabled="true"  class="btn btn-sm btn-danger btn-destroy">Eliminar</button>
                                                   @endif
                                               @endcan
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                               {!! $roles->render() !!}
                           </div>
                           <div class="col-lg-2"></div>
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
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>
@endsection

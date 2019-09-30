@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    @endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{$role->name}}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Roles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
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
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors-> all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <label class="my-label">Editar Rol</label>
                        @can('roles.index')
                            <a href="{{route('roles.index')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="mdi mdi-format-list-bulleted"></i>Lista de Roles
                            </a>
                        @endcan
                        <span></span>
                        @can('roles.create')
                            <a href="{{route('roles.create')}}"
                               class="btn btn-sm btn-default my-button-create pull-right ">
                                <i class="mdi mdi-plus"></i>Crear Rol
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT', 'novalidate']) !!}
                        @include('backend.admin.roles.partials.form')
                        <div class="form-group">
                            {{Form::submit('Actualizar' , ['class' => 'btn btn-sm btn-primary my_button']) }}
                            <a href="{{route('roles.index')}}" class="btn btn-sm btn-secondary">Cancelar</a>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>
    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#name, #slug").stringToSlug({
                callback: function(text){
                    $('#slug').val(text);
                }
            });
        });
    </script>
@endsection

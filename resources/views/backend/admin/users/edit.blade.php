@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Editar Usuario</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Usuario</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('dashboard')
    <!-- Row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editar datos de Usuario</h4>
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
                    {{--   @foreach($employee as $emplo) --}}
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'novalidate']) !!}
                    @include('backend.admin.users.partials.form')
                    <div class="card-footer">
                        <div class="form-group m-b-0 text-right">
                            <button type="submit" class="btn btn-info waves-effect waves-light my_button" >Editar</button>
                            <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    {{--@endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection
@section('scripts')
    <script src="{{asset('assets/my-libs/js/province_canton_parish.js')}}"></script>
    <script src="{{asset('assets/my-libs/js/pass.js')}}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>
@endsection

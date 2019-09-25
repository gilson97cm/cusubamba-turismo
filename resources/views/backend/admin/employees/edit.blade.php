@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Editar Empleado</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Empleado</a></li>
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
                        <h4 class="card-title">Perfil de Empleado</h4>
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
                        {!! Form::model($employee, ['route' => ['employees.update', $employee->id_person], 'method' => 'PUT']) !!}
                        <div class="card-body">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group row">
                                    {{Form::label('id_card_person', 'Cédula:',['class' => ' col-sm-3 text-right  my-label'])}}
                                    <div class="col-sm-9">
                                        {{Form::text('id_card_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Cédula']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        {{Form::label('name_person', 'Nombre:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-9">
                                            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                                            {{Form::text('name_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Nombre']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        {{Form::label('last_name_person', 'Apellido:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-9">
                                            {{Form::text('last_name_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Apellido']) }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        {{Form::label('birthdate_person', 'F. de Nacimiento:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-9">
                                            {{Form::date('birthdate_person', null , ['class' => 'form-control my-border', 'placeholder' => 'F. de NAcimiento']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row ">
                                        {{Form::label('genre_person', 'Género:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-3 p-t-5">
                                            <label class="container">
                                                {{Form::radio('genre_person', 'Masculino')}} Masculino.
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-sm-3 p-t-5">
                                            <label class="container">
                                                {{Form::radio('genre_person', 'Femenino')}} Femenino.
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        {{Form::label('province_person', 'Provincia:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-9">
                                            <select name="province_person" id="province" class="form-control my-border" style="text-transform: uppercase;">
                                                <option style="background: #f2f2f2" name="" id ="" value="{{$employee->province_person}}">{{$employee->province_person}}</option>
                                                @foreach($provinces as $province)
                                                    <option name="" value="{{$province->name_province}}">{{$province->name_province}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        {{Form::label('canton_person', 'Cantón:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-9">
                                            <select name="canton_person" id="canton" class="form-control my-border" style="text-transform: uppercase;">
                                                <option style="background: #f2f2f2" name="" id ="" value="{{$employee->canton_person}}" >{{$employee->canton_person}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        {{Form::label('parish_person', 'Parroquia:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-9">
                                            <select name="parish_person" id="parish" class="form-control my-border" style="text-transform: uppercase;">
                                                <option style="background: #f2f2f2" name="" id ="" value="{{$employee->parish_person}}">{{$employee->parish_person}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group row">
                                        {{Form::label('address_person', 'Dirección:',['class' => ' col-sm-3 text-right  my-label'])}}
                                        <div class="col-sm-9">
                                            {{Form::text('address_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Dirección']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group row ">
                                            {{Form::label('phone_person', 'Teléfono:',['class' => ' col-sm-3 text-right  my-label'])}}
                                            <div class="col-sm-9">
                                                {{Form::text('phone_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Teléfono']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group row">
                                            {{Form::label('rol', 'Rol:',['class' => ' col-sm-3 text-right  my-label'])}}
                                            <div class="col-sm-9">
                                                <select name="rol" id="rol" class="form-control my-border">
                                                    <option style="background: #f2f2f2" name="" value=""></option>
                                                    @foreach($roles as $role)
                                                        <option name="" value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group row ">
                                            {{Form::label('state_user', 'Estado:',['class' => ' col-sm-3 text-right  my-label'])}}
                                            <div class="col-sm-3 p-t-5">
                                                <label class="container">
                                                    {{Form::radio('state_user', 'Activo')}} Activo.
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-sm-3 p-t-5 ">
                                                <label class="container">
                                                    {{Form::radio('state_user', 'Inactivo')}} Inactivo.
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group row ">
                                            {{Form::label('email', 'Correo:',['class' => ' col-sm-3 text-right  my-label'])}}
                                            <div class="col-sm-9">
                                                {{Form::text('email', null , ['class' => 'form-control my-border', 'placeholder' => 'Correo']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group row ">
                                            {{Form::label('position_person', 'Cargo:',['class' => ' col-sm-3 text-right  my-label'])}}
                                            <div class="col-sm-9">
                                                {{Form::text('position_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Cargo','onkeypress' => 'events']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">
                                        <div id="accordion" class="accordion">
                                            <div class="card m-b-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                                                    {{Form::label('collapseOne', 'Cambiar contraseña:',['class' => ' card-title col-sm-5 text-right  my-label'])}}
                                                </div>
                                                <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-12">
                                                            <div class="form-group row">
                                                                {{Form::label('password', 'Cotraseña:',['class' => ' col-sm-3 text-right  my-label'])}}

                                                                <div class="col-sm-8">
                                                                    <input type="password" name="password" class="form-control my-border" id="password" placeholder="Contraseña" >
                                                                </div>
                                                                <div class="col-sm-1 p-t-5">
                                                                    <i class="fa fa-eye" id="show" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-lg-12">
                                                            <div class="form-group row ">
                                                                {{Form::label('password_confirmation', 'Confirmar Contraseña:',['class' => ' col-sm-3 text-right  my-label'])}}
                                                                <div class="col-sm-8">
                                                                    <input type="password" name="password_confirmation" class="form-control my-border" id="confirm-pass" placeholder="Confirmar Contraseña" >
                                                                </div>
                                                                <div class="col-sm-1 p-t-5">
                                                                    <i class="fa fa-eye " id="confirm-show" ></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group m-b-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light my_button" >Editar</button>
                                <a href="{{route('employees.index')}}" class="btn btn-secondary">Cancelar</a>
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

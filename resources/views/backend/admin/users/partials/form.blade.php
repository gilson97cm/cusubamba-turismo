<div class="card-body">
    <div class="col-sm-12 col-lg-6">
        <div class="form-group row">
            {{Form::label('id_card_user', 'Cédula:',['class' => ' col-sm-3 text-right  my-label'])}}

            <div class="col-sm-9">
                {{Form::text('id_card_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Cédula','onkeypress' => 'return validar_numeros(event)']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('name_user', 'Nombre:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    {{Form::text('name_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Nombre','onkeypress' => 'return validar_letras(event)']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('last_name_user', 'Apellido:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::text('last_name_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Apellido','onkeypress' => 'events']) }}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('birth_date_user', 'F. de Nacimiento:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::date('birth_date_user', null , ['class' => 'form-control my-border', 'placeholder' => 'F. de NAcimiento']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row ">
                {{Form::label('genre_user', 'Género:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-3 p-t-5">
                    <label class="container">
                        {{Form::radio('genre_user', 'Masculino')}} Masculino.
                        <span class="checkmark my-border-checkbox"></span>
                    </label>
                </div>
                <div class="col-sm-3 p-t-5">
                    <label class="container">
                        {{Form::radio('genre_user', 'Femenino')}} Femenino.
                        <span class="checkmark my-border-checkbox"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('province_user', 'Provincia:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    @if(isset($user))
                        <select name="province_user" id="province" class="form-control my-border"
                                style="text-transform: uppercase;">
                            <option style="background: #f2f2f2" name="" id=""
                                    value="{{$user->province_user}}">{{$user->province_user}}</option>
                            @foreach($provinces as $province)
                                <option name=""
                                        value="{{$province->name_province}}">{{$province->name_province}}</option>
                            @endforeach
                        </select>
                    @else
                        {!! Form::select('province_user', $provinces, null,['id'=>'province', 'placeholder' => 'Seleccione...', 'class' => 'form-control my-border']) !!}

                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('canton_user', 'Cantón:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    @if(isset($user))
                        <select name="canton_user" id="canton" class="form-control my-border" style="text-transform: uppercase;">
                            <option style="background: #f2f2f2" name="" id ="" value="{{$user->canton_user}}" >{{$user->canton_user}}</option>
                        </select>
                    @else
                        {!! Form::select('canton_user',['placeholder'=>'Seleccione...'], null,['id'=>'canton', 'class' => 'form-control my-border']) !!}
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('parish_user', 'Parroquia:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    @if(isset($user))
                        <select name="parish_user" id="parish" class="form-control my-border" style="text-transform: uppercase;">
                            <option style="background: #f2f2f2" name="" id ="" value="{{$user->parish_user}}" >{{$user->parish_user}}</option>
                        </select>
                    @else
                    {!! Form::select('parish_user',['placeholder'=>'Seleccione...'], null,['id'=>'parish', 'class' => 'form-control my-border']) !!}
                    @endif

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('address_user', 'Dirección:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::text('address_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Dirección']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body bg-light">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row ">
                {{Form::label('phone_user', 'Teléfono:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::text('phone_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Teléfono','onkeypress' => 'events']) }}

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row ">
                {{Form::label('email', 'Correo:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::email('email', null , ['class' => 'form-control my-border', 'placeholder' => 'Correo','onkeypress' => 'return validar_email(event)']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row ">
                {{Form::label('position_user', 'Cargo:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::text('position_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Cargo','onkeypress' => 'return validar_caracteres(event)']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('rol', 'Rol:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    @if(isset($user))
                        <select name="rol" id="rol" class="form-control my-border">
                            @foreach($user->roles as $role)
                                <option style="background: #f2f2f2" name="" value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            @foreach($roles as $role)
                                <option name="" value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    @else
                    {!! Form::select('rol', $roles, null,['id'=>'rol', 'placeholder' => 'Seleccione...', 'class' => 'form-control my-border']) !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row ">
                {{Form::label('state_user', 'Estado:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-3 p-t-5">
                    <label class="container">
                        {{Form::radio('state_user', 'ACTIVO')}} Activo.
                        <span class="checkmark my-border-checkbox"></span>
                    </label>
                </div>
                <div class="col-sm-3 p-t-5 ">
                    <label class="container">
                        {{Form::radio('state_user', 'INACTIVO')}} Inactivo.
                        <span class="checkmark my-border-checkbox"></span>
                    </label>
                </div>
            </div>
        </div>
        @if(isset($user))
            <div class="col-sm-12 col-lg-6">

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
        @else
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group row">
                            {{Form::label('password', 'Cotraseña:',['class' => ' col-sm-3 text-right  my-label'])}}

                            <div class="col-sm-8">
                                <input type="password" name="password" onkeypress="return validar_caracteres(event)"
                                       class="form-control my-border" id="password" placeholder="Contraseña">
                            </div>
                            <div class="col-sm-1 p-t-5">
                                <i class="fa fa-eye" id="show"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group row ">
                            {{Form::label('password_confirmation', 'Confirmar Contraseña:',['class' => ' col-sm-3 text-right  my-label'])}}
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" onkeypress="return validar_caracteres(event)"
                                       class="form-control my-border" id="confirm-pass" placeholder="Confirmar Contraseña">
                            </div>
                            <div class="col-sm-1 p-t-5">
                                <i class="fa fa-eye " id="confirm-show"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif

    </div>



</div>


<div class="card-body">
    <div class="col-sm-12 col-lg-6">
        <div class="form-group row">
            {{Form::label('id_card_person', 'Cédula:',['class' => ' col-sm-3 text-right  my-label'])}}

            <div class="col-sm-9">
                {{Form::text('id_card_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Cédula','onkeypress' => 'return validar_numeros(event)']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('name_person', 'Nombre:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    {{Form::text('name_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Nombre','onkeypress' => 'return validar_letras(event)']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('last_name_person', 'Apellido:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::text('last_name_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Apellido','onkeypress' => 'events']) }}

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
                    {!! Form::select('province_person', $provinces, null,['id'=>'province', 'placeholder' => 'Seleccione...', 'class' => 'form-control my-border']) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('canton_person', 'Cantón:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {!! Form::select('canton_person',['placeholder'=>'Seleccione...'], null,['id'=>'canton', 'class' => 'form-control my-border']) !!}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('parish_person', 'Parroquia:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {!! Form::select('parish_person',['placeholder'=>'Seleccione...'], null,['id'=>'parish', 'class' => 'form-control my-border']) !!}

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
            <div class="form-group row ">
                {{Form::label('phone_person', 'Teléfono:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::text('phone_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Teléfono','onkeypress' => 'events']) }}

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

        <div class="col-sm-12 col-lg-6">
            <div class="form-group row ">
                {{Form::label('position_person', 'Cargo:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {{Form::text('position_person', null , ['class' => 'form-control my-border', 'placeholder' => 'Cargo','onkeypress' => 'return validar_caracteres(event)']) }}
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('rol', 'Rol:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-9">
                    {!! Form::select('rol', $roles, null,['id'=>'rol', 'placeholder' => 'Seleccione...', 'class' => 'form-control my-border']) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row">
                {{Form::label('password', 'Cotraseña:',['class' => ' col-sm-3 text-right  my-label'])}}

                <div class="col-sm-8">
                    <input type="password" name="password" onkeypress = "return validar_caracteres(event)"  class="form-control my-border" id="password" placeholder="Contraseña">
                </div>
                <div class="col-sm-1 p-t-5">
                    <i class="fa fa-eye" id="show" ></i>
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
        <div class="col-sm-12 col-lg-6">
            <div class="form-group row ">
                {{Form::label('password_confirmation', 'Confirmar Contraseña:',['class' => ' col-sm-3 text-right  my-label'])}}
                <div class="col-sm-8">
                    <input type="password" name="password_confirmation" onkeypress = "return validar_caracteres(event)" class="form-control my-border" id="confirm-pass" placeholder="Confirmar Contraseña">
                </div>
                <div class="col-sm-1 p-t-5">
                    <i class="fa fa-eye " id="confirm-show" ></i>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="card-body">
    <div class="form-group m-b-0 text-right">
        <button type="submit" class="btn btn-info waves-effect waves-light my_button" >Registrar</button>
        <a href="{{route('employees.index')}}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>

<div class="form-body">
    <div class="card-body">
        <div class="row p-t-20">
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('id_card_user', 'Cédula:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::text('id_card_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Cédula',
                    'onkeypress' => 'return validar_numeros(event)',
                    'required',
                    'data-validation-required-message' => 'Ingrese la Cédula.']) }}
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-success">
                    {{Form::label('name_user', 'Nombre:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::text('name_user', null , ['class' => 'form-control my-border capitalize-word', 'placeholder' => 'Nombre',
                    'onkeypress' => 'return validar_letras(event)',
                    'required',
                    'data-validation-required-message' => 'Ingrese el Nombre.']) }}
                    </div>
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('last_name_user', 'Apellido:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::text('last_name_user', null , ['class' => 'form-control my-border capitalize-word', 'placeholder' => 'Apellido',
                    'onkeypress' => 'return validar_letras(event)',
                    'required',
                    'data-validation-required-message' => 'Ingrese el Apellido.']) }}
                    </div>
                </div>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('birth_date_user', 'Fecha de Nacimiento:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::date('birth_date_user', null , ['class' => 'form-control my-border', 'placeholder' => 'F. de NAcimiento',
                    'required',
                    'data-validation-required-message' => 'Seleccione una Fecha.']) }}
                        <small class="form-control-feedback">El usuario debe ser mayor de edad.</small>
                    </div>

                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('genre_user', 'Género:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        <label class="container">
                            {{Form::radio('genre_user', 'Masculino')}} Masculino.
                            <span class="checkmark my-border-checkbox"></span>
                        </label>
                        <label class="container">
                            {{Form::radio('genre_user', 'Femenino')}} Femenino.
                            <span class="checkmark my-border-checkbox"></span>
                        </label>
                    </div>
                </div>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-success">
                    {{Form::label('province_user', 'Provincia:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    @if(isset($user))
                        <div class="controls">
                            <select name="province_user" id="province" class="form-control my-border"
                                    style="text-transform: uppercase;" required
                                    data-validation-required-message="Seleccione una Provincia.">
                                <option style="background: #f2f2f2" name="" id=""
                                        value="{{$user->province_user}}">{{$user->province_user}}</option>
                                @foreach($provinces as $province)
                                    <option name=""
                                            value="{{$province->name_province}}">{{$province->name_province}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="controls">
                            {!! Form::select('province_user', $provinces, null,['id'=>'province',
                            'placeholder' => 'Seleccione...', 'class' => 'form-control my-border',
                            'required',
                            'data-validation-required-message' => 'Seleccione una Provincia.']) !!}
                        </div>
                    @endif
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('canton_user', 'Cantón:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    @if(isset($user))
                        <div class="controls">
                            <select name="canton_user" id="canton" class="form-control my-border"
                                    style="text-transform: uppercase;" required
                                    data-validation-required-message="Seleccione un Cantón.">
                                <option style="background: #f2f2f2" name="" id=""
                                        value="{{$user->canton_user}}">{{$user->canton_user}}</option>
                            </select>
                        </div>
                    @else
                        <div class="controls">
                            {!! Form::select('canton_user',[], null,['id'=>'canton',
                         'class' => 'form-control my-border',
                         'placeholder'=>'Seleccione...',
                         'required',
                         'data-validation-required-message' => 'Seleccione un Cantón.']) !!}
                        </div>
                    @endif

                </div>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-success">
                    {{Form::label('parish_user', 'Parroquia:',['class' => 'control-label  my-label'])}}
                    <span class="text-danger">*</span>
                    @if(isset($user))
                        <div class="controls">
                            <select name="parish_user" id="parish" class="form-control my-border"
                                    style="text-transform: uppercase;" required
                                    data-validation-required-message="Seleccione una Parroquia.">
                                <option style="background: #f2f2f2" name="" id=""
                                        value="{{$user->parish_user}}">{{$user->parish_user}}</option>
                            </select>
                        </div>
                    @else
                        <div class="controls">
                            {!! Form::select('parish_user',[], null,['id'=>'parish',
                        'class' => 'form-control my-border',
                        'placeholder'=>'Seleccione...',
                        'required',
                        'data-validation-required-message' => 'Seleccione una Parroquia.']) !!}
                        </div>
                    @endif
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('address_user', 'Dirección:',['class' => 'control-label  my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::text('address_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Dirección',
                        'onkeypress' => 'return validar_letras(event)',
                        'required',
                        'data-validation-required-message' => 'Ingrese la Dirección (Nombre de las calles).']) }}
                    </div>
                </div>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-success">
                    {{Form::label('phone_user', 'Teléfono:',['class' => 'control-label  my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::text('phone_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Teléfono',
                    'onkeypress' => 'events',
                    'required',
                    'data-validation-required-message' => 'Ingrese el número de teléfono (móvil).']) }}
                    </div>
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('email', 'Correo:',['class' => 'control-label  my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::email('email', null , ['class' => 'form-control my-border', 'placeholder' => 'Correo',
                    'onkeypress' => 'return validar_email(event)',
                    'required',
                    'data-validation-required-message' => 'Ingrese el correo.']) }}
                        <small>El correo debe existir.</small>
                    </div>
                </div>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-success">
                    {{Form::label('position_user', 'Cargo:',['class' => 'control-label  my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::text('position_user', null , ['class' => 'form-control my-border', 'placeholder' => 'Cargo',
                    'onkeypress' => 'return validar_caracteres(event)',
                    'required',
                   'data-validation-required-message' => 'Ingrese el cargo que ocupa en el GAD (Presidente, Secretari@, Vocal, etc).']) }}
                    </div>
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    {{Form::label('rol', 'Rol:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    @if(isset($user))
                        <div class="controls">
                            <select name="rol" id="rol" class="form-control my-border"
                                    required data-validation-required-message="Seleccione un Rol.">
                                @foreach($user->roles as $role)
                                    <option style="background: #f2f2f2" name=""
                                            value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                @foreach($roles as $role)
                                    <option name="" value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="controls">
                            {!! Form::select('rol', $roles, null,['id'=>'rol', 'placeholder' => 'Seleccione...',
                            'class' => 'form-control my-border',
                            'required',
                            'data-validation-required-message' => 'Seleccione un Rol.']) !!}
                        </div>
                    @endif
                </div>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group has-success">
                    {{Form::label('state_user', 'Estado:',['class' => 'control-label my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        <label class="container">
                            {{Form::radio('state_user', 'ACTIVO')}} Activo.
                            <span class="checkmark my-border-checkbox"></span>
                        </label>
                        <label class="container">
                            {{Form::radio('state_user', 'INACTIVO')}} Inactivo.
                            <span class="checkmark my-border-checkbox"></span>
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <!--/row-->
    @if(isset($user))
        <!-- CAMPOS CONTRASEÑA DE EDITAR USUARIO-->
            <div id="accordion" class="accordion">
                <div class="card m-b-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                        {{Form::label('collapseOne', 'Cambiar contraseña:',['class' => ' card-title control-label my-label'])}}
                    </div>
                    <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    {{Form::label('password', 'Cotraseña:',['class' => 'control-label  my-label'])}}
                                    <span class="text-danger">*</span>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password"
                                               class="form-control my-border"
                                               id="password" placeholder="Contraseña">
                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-eye"
                                                                                              id="show"></i></span>
                                        </div>
                                    </div>
                                    <small class="form-control-feedback">Mínimo 8 caracteres.</small>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('password_confirmation', 'Confirmar Contraseña:',['class' => 'control-label my-label'])}}
                                    <span class="text-danger">*</span>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password_confirmation"
                                               class="form-control my-border" id="confirm-pass"
                                               placeholder="Confirmar Contraseña">

                                        <div class="input-group-append">
                                                            <span class="input-group-text"> <i class="fa fa-eye "
                                                                                               id="confirm-show"></i></span>
                                        </div>
                                    </div>
                                    <small class="form-control-feedback">Vuelva a escribir la
                                        contraseña.
                                    </small>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                </div>
            </div>
    @else
        <!-- CAMPOS CONTRASEÑA DE CREAR USUARIO-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-success">
                        {{Form::label('password', 'Cotraseña:',['class' => 'control-label  my-label'])}}
                        <span class="text-danger">*</span>
                       <div class="controls">
                           <div class="input-group mb-3">
                               <input type="password" name="password"
                                      onkeypress="return validar_email(event)"
                                      class="form-control my-border" id="password"
                                      placeholder="Contraseña" required data-validation-required-message="Ingrese la contraseña."/>

                               <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="show"></i>
                                </span>
                               </div>
                           </div>
                           <small class="form-control-feedback">Mínimo 8 caracteres.</small>
                       </div>
                       </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('password_confirmation', 'Confirmar Contraseña:',['class' => ' control-label  my-label'])}}
                        <span class="text-danger">*</span>
                       <div class="controls">
                           <div class="input-group mb-3">
                               <input type="password" name="password_confirmation"
                                      onkeypress="return validar_email(event)"
                                      class="form-control my-border" id="confirm-pass"
                                      placeholder="Confirmar Contraseña" required data-validation-required-message="Confirme la contraseña.">
                               <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye " id="confirm-show"></i>
                                </span>
                               </div>
                           </div>
                           <small class="form-control-feedback">Vuelva a escribir la contraseña.</small>
                       </div>

                    </div>
                </div>
                <!--/span-->
            </div>
        @endif

    </div>

</div>

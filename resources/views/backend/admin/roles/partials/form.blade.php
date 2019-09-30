<div class="row">
    <div class="col-sm-12 col-lg-5">
        <div class="form-group">
            {{Form::label('name', 'Nombre del Rol:',['class' => 'my-label'])}}
            <span class="text-danger">*</span>
               <div class="controls">
                   {{Form::text('name', null , ['class' => 'form-control my-border',
                   'onkeypress' => 'return validar_caracteres(event)',
                   'required',
                   'data-validation-required-message' => 'Ingrese un Nombre.']) }}
               </div>
        </div>
        <div class="form-group">
            {{Form::label('slug', 'URL amigable:',['class' => 'my-label'])}}
            <span class="text-danger">*</span>
           <div class="controls">
               {{Form::text('slug', null , ['class' => 'form-control my-border', 'readonly' => 'readonly',
           'onkeypress' => 'return validar_caracteres(event)',
           'required',
           'data-validation-required-message' => 'Cree una url amigable (ej: administrador-sistema).']) }}
           </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-1"> </div>
    <div class="col-sm-12 col-lg-5">
        <div class="form-group row">
            {{Form::label('description', 'Descripcion:',['class' => 'my-label'])}}
            {{Form::textarea('description', null , ['class' => ' md-textarea form-control my-border', 'rows' => '5',
            'onkeypress' => 'return validar_caracteres(event)']) }}
        </div>
    </div>

</div>
<hr>
<h3>Permiso especial</h3>
<br>
<div class="row">
    <div class="col-lg-auto col-sm-12">
        <div class="form-group">
            <label class="container">
                {{Form::radio('special', 'all-access')}} Acceso Total.
                <span class="checkmark my-border-checkbox"></span>
            </label>
        </div>
    </div>
    <div class="col-lg-auto col-sm-12">
        <div class="form-group">
            <label class="container">
                {{Form::radio('special', 'no-access')}} Ningun acceso.
                <span class="checkmark my-border-checkbox"></span>
            </label>
        </div>
    </div>
    <div class="col-lg-auto col-sm-12">
        <div class="form-group">
            <label class="container">
                {{Form::radio('special', ' ')}} Sin permisos especiales.
                <span class="checkmark my-border-checkbox"></span>
            </label>
        </div>
    </div>
</div>


<hr>
<h3>Lista de permisos</h3>

<div class="row">
    <div class="form-group col-lg-auto">
        <ul class="list-unstyled">
            @foreach($permissions as $permission)
                <li class="list-group-item list-group-item-action" id="{{$permission->id}} ">
                    <label class="container">
                        {{Form::checkbox('permissions[]', $permission->id, null)}}
                        <strong>{{$permission->name}}</strong>
                        <em>({{$permission->description ?: 'N/A'}})</em>
                        <span class="checkmark my-border-checkbox"></span>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>




<div id="form-event">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div align="center">
                        {{Form::label('avatar_event', 'Imagen:',['class' => 'my-label'])}}
                        <br>
                        <img id="preview" src="{{asset('assets/images/sin_img.jpg')}}"
                             width="80%" height="160px" class="my-border"/><br/>
                        {{Form::file('avatar_event',['class'=>'img_none cls', 'id' => 'avatar_event'])}}
                        <br>
                        <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
                        <div align="center">
                            <a href="javascript:changeProfile()" class="btn btn-info btn-sm">Cambiar</a>
                            |
                            <a style="color: white" id="btn-quitar" href="javascript:removeImage()"
                               class="btn btn-danger btn-sm">Quitar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('event_categories_id', 'Categoría:',['class' => ' my-label'])}}
                        <span class="text-danger">*</span>
                        <div class="controls">
                            {{ Form::select('event_categories_id', $categories, null, ['class' => 'form-control my-border margin-search cls',
                            'placeholder' => '-',
                            'required',
                            'data-validation-required-message'=> 'Seleccione una Categoría.']) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='form-group'>
                        {{Form::label('color_event', 'Color:',['class' => ' my-label'])}}
                        <span class="text-danger">*</span>
                      <div class="controls">
                          <select class='form-control my-border cls' name='color_event' required data-validation-required-message = 'Seleccione un Color.'>
                              <option value="" disabled selected> -</option>
                              <option class="text-danger" value="bg-danger">&#9724; ROJO</option>
                              <option class="text-success" value="bg-success">&#9724; VERDE</option>
                              <option class="text-primary" value="bg-primary">&#9724; MORADO</option>
                              <option class="text-info" value="bg-info">&#9724; AZUL</option>
                              <option class="text-warning" value="bg-warning">&#9724; AMARILLO</option>
                              <option class="text-amaranto" value="bg-amaranto" >&#9724; AMARANTO</option>
                              <option class="text-jade" value="bg-jade" >&#9724; JADE</option>
                              <option class="text-fucsia" value="bg-fucsia" >&#9724; FUCSIA</option>
                              <option class="text-turquesa" value="bg-turquesa" >&#9724; TURQUESA</option>
                              <option class="text-naranja" value="bg-naranja" >&#9724; NARANJA</option>
                          </select>
                      </div>
                    </div>

                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        {{Form::label('name_event', 'Titulo:',['class' => ' my-label'])}}
                        <span class="text-danger">*</span>
                        <div class="controls">
                            {{Form::textarea('name_event', null , ['class' => 'form-control my-border cls upletter',
                                        'id'=> 'add_event',
                                        'rows' => '4',
                                        'onkeypress' => 'return validar_caracteres(event)',
                                        'onblur' => 'aMayusculas(this.value,this.id)',
                                        'required',
                                        'data-validation-required-message' => 'Ingrese un Nombre.']) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='form-group'>
                        {{Form::label('location_event', 'Lugar:',['class' => ' my-label'])}}
                        <span class="text-danger">*</span>
                        <div class="controls">
                            {{Form::text('location_event', null , ['class' => 'form-control my-border cls',
                                       'onkeypress' => 'return validar_caracteres(event)',
                                       'required',
                                        'data-validation-required-message' => 'Ingrese un Lugar.']) }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class='form-group'>
                {{Form::label('description_event', 'Descripción:',['class' => ' my-label'])}}
                <span class="text-danger">*</span>
                <div class="controls">
                    {{Form::textarea('description_event', null , ['class' => ' md-textarea form-control my-border cls',
                    'onkeypress' => 'return validar_caracteres(event)',
                    'required',
                    'data-validation-required-message' => 'Ingrese un Lugar.']) }}
                </div>
            </div>
        </div>
    </div>
</div>

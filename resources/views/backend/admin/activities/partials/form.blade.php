<div class="row">
    <div class="col-sm-12 col-lg-1"></div>
    <div class="col-sm-12 col-lg-4">
        <div class="form-group row container-fluid">
            <center>
                {{Form::label('avatar_activity', 'Imagen:',['class' => 'my-label'])}}
                <br>

                @if(isset($activity))
                    <img id="preview" src="{{asset($activity->avatar_activity)}}" width="300px" height="290px"
                         class="my-border"/><br/>
                @else
                    <img id="preview" src="{{asset('assets/images/sin_img.jpg')}}" width="300px" height="290px"
                         class="my-border"/><br/>
                @endif

                {{Form::file('avatar_activity',['class'=>'img_none', 'id' => 'avatar_activity'])}}

                <br>
                <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
                <a href="javascript:changeProfile()" class="btn btn-info btn-sm">Cambiar</a> |
                <a style="color: white" href="javascript:removeImage()" class="btn btn-danger btn-sm">Quitar</a>
            </center>

        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <br>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    {{Form::label('activity_categories_id', 'Categoría:',['class' => ' my-label'])}}
                    <span class="text-danger">*</span>
                  <div class="controls">
                      {{ Form::select('activity_categories_id', $categories, null, ['class' => 'form-control my-border margin-search',
                      'placeholder' => '-',
                      'required' => 'required',
                      'data-validation-required-message' =>'Seleccione una categoría']) }}
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    {{Form::label('name_activity', 'Nombre:',['class' => 'my-label'])}}
                    <span class="text-danger">*</span>
                    <div class="controls">
                        {{Form::text('name_activity', null , ['class' => 'form-control my-border upletter',
                            'id'=> 'add_activity',
                            'onkeypress' => 'return validar_caracteres(event)',
                            'onblur' => 'aMayusculas(this.value,this.id)',
                            'required' => 'required',
                            'data-validation-required-message' =>'Ingrese un nombre.']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    {{Form::label('description_activity', 'Descripción:',['class' => 'my-label'])}}
                    <span class="text-danger">*</span>
                    {{Form::textarea('description_activity', null , ['class' => ' md-textarea form-control my-border']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-12 col-lg-4"></div>
    <div class="col-sm-12 col-lg-4">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3 col-lg-3"></div>
                <div class="col-sm-3 col-lg-3">
                    {{Form::submit('Guardar' , ['class' => 'btn btn-primary my_button']) }}
                </div>
                <div class="col-sm-3 col-lg-3">
                    <a href="{{route('activities.index')}}" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="col-sm-3 col-lg-3"></div>

            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4"></div>
</div>





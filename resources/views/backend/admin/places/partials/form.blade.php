<div class="row">
    <div class="col-sm-12 col-lg-1"></div>
    <div class="col-sm-12 col-lg-4">
        <div class="form-group row container-fluid">
            <center>
                {{Form::label('avatar_place', 'Imagen:',['class' => 'my-label'])}}
                <br>

                @if(isset($place))
                    <img id="preview" src="{{asset($place->avatar_place)}}" width="300px" height="290px"
                         class="my-border"/><br/>
                @else
                    <img id="preview" src="{{asset('assets/images/sin_img.jpg')}}" width="300px" height="290px"
                         class="my-border"/><br/>
                @endif

                {{Form::file('avatar_place',['class'=>'img_none', 'id' => 'avatar_place'])}}

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
                <div class="form-group row">
                    {{Form::label('place_category_id', 'Categoría:',['class' => ' my-label'])}}
                    {{ Form::select('place_category_id', $categories, null, ['class' => 'form-control my-border margin-search', 'placeholder' => '-']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    {{Form::label('name_place', 'Nombre:',['class' => 'my-label'])}}
                    {{Form::text('name_place', null , ['class' => 'form-control my-border upletter',
                            'id'=> 'add_place',
                            'onkeypress' => 'return validar_caracteres(event)',
                            'onblur' => 'aMayusculas(this.value,this.id)']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    {{Form::label('description_place', 'Descripción:',['class' => 'my-label'])}}
                    {{Form::textarea('description_place', null , ['class' => ' md-textarea form-control my-border']) }}
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-sm-12 col-lg-12">
        <div class="form-group">
           <h4>Lista de Actividades:</h4>
            <br>

            <table class="table table-striped table-hover table-responsive">
                <thead>
                <tr class="thead-tr">
                    <th width="5%"></th>
                    <th width="15%">Publicada el:</th>
                    <th width="5%">Categoría</th>
                    <th width="10%">Imágen</th>
                    <th width="30%">Nombre</th>
                    <th width="35%" style="text-align: left">Descripción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td style="vertical-align: middle" >
                            <label class="container">
                                {{Form::checkbox('activities[]', $activity->id, null)}}
                                <span class="checkmark my-border-checkbox"></span>
                            </label>
                        </td>
                        <td>{{$activity->created_at}}</td>
                        <td>{{$activity->category->name_activity_category}}</td>
                        <td style=" vertical-align: middle;" align="center"><img src="{{asset($activity->avatar_activity)}}" alt="img" width="80px" height="50px"></td>
                        <td class="expandDiv" > <strong>{{$activity->name_activity}}</strong> </td>
                        <td class="expandDiv"  align="justify">{!! $activity->description_activity !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $activities->render() !!}

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
                    <a href="{{route('places.index')}}" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="col-sm-3 col-lg-3"></div>

            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4"></div>
</div>





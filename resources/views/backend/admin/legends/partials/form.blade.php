<div class="row">
    <div class="col-sm-12 col-lg-1"></div>
    <div class="col-sm-12 col-lg-4">
        <div class="form-group row container-fluid">
            <center>
                {{Form::label('avatar_legend', 'Imagen:',['class' => 'my-label'])}}
                <br>

                @if(isset($legend))
                    <img id="preview" src="{{asset($legend->avatar_legend)}}" width="300px" height="290px" class="my-border"/><br/>
                @else
                    <img id="preview" src="{{asset('assets/images/sin_img.jpg')}}" width="300px" height="290px" class="my-border"/><br/>
                @endif

                {{Form::file('avatar_legend',['class'=>'img_none', 'id' => 'avatar_legend'])}}

                <br>
                <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
                <a href="javascript:changeProfile()" class="btn btn-info btn-sm">Cambiar</a> |
                <a style="color: white" href="javascript:removeImage()" class="btn btn-danger btn-sm">Quitar</a>
            </center>

        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <br>
    <!--  <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group row">
                    {{--Form::label('date_legends', 'Fecha:',['class' => ' my-label'])}}
                    {{ Form::date('date_legends', new \DateTime(), ['class' => 'form-control my-border']) --}}
        </div>
    </div>
</div> -->
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    {{Form::label('title_legend', 'Titulo:',['class' => 'my-label'])}}
                    {{Form::text('title_legend', null , ['class' => 'form-control my-border']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    {{Form::label('description_legend', 'Detalle:',['class' => 'my-label'])}}
                    {{Form::textarea('description_legend', null , ['class' => ' md-textarea form-control my-border']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-12 col-lg-4" ></div>
    <div class="col-sm-12 col-lg-4" >
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3 col-lg-3"></div>
                <div class="col-sm-3 col-lg-3">
                    {{Form::submit('Guardar' , ['class' => 'btn btn-primary my_button']) }}
                </div>
                <div class="col-sm-3 col-lg-3">
                    <a href="{{route('legends.index')}}" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="col-sm-3 col-lg-3"></div>

            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4"></div>
</div>





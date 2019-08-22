<div class="row">
    <div class="col-sm-12 col-lg-1"></div>
    <div class="col-sm-12 col-lg-5">
        <div class="form-group row container-fluid">
            <center>
                {{Form::label('avatar_news', 'Imagen:',['class' => 'my-label'])}}
                <br>

                @if(isset($news))
                    <img id="preview" src="{{$news->avatar_news}}" width="300px" height="290px" class="my-border"/><br/>
                @else
                    <img id="preview" src="{{asset('assets/images/sin_img.jpg')}}" width="300px" height="290px" class="my-border"/><br/>
                @endif

                {{Form::file('avatar_news',['class'=>'img_none', 'id' => 'avatar_news'])}}
                <br>
                <!--<input type="hidden" style="display: none" value="0" name="remove" id="remove">-->
                <a href="javascript:changeProfile()" class="btn btn-info btn-sm">Cambiar</a> |
                <a style="color: white" href="javascript:removeImage()" class="btn btn-danger btn-sm">Quitar</a>
            </center>

        </div>
    </div>
    <div class="col-sm-12 col-lg-5">
        <br>
       <!--  <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group row">
                    {{--Form::label('date_news', 'Fecha:',['class' => ' my-label'])}}
                    {{ Form::date('date_news', new \DateTime(), ['class' => 'form-control my-border']) --}}
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group row">
                    {{Form::label('title_news', 'Titulo:',['class' => 'my-label'])}}
                    {{Form::text('title_news', null , ['class' => 'form-control my-border']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group row">
                    {{Form::label('detail_news', 'Detalle:',['class' => 'my-label'])}}
                    {{Form::textarea('detail_news', null , ['class' => ' md-textarea form-control my-border', 'rows' => '9' ]) }}
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
                        <a href="{{route('news.index')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                    <div class="col-sm-3 col-lg-3"></div>

                </div>
            </div>
    </div>
    <div class="col-sm-12 col-lg-4"></div>
</div>



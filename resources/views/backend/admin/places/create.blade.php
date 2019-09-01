@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Crear Lugar</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Lugar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('dashboard')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-auto col-md-12">
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
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('places.index')
                            <a href="{{route('places.index')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="mdi mdi-format-list-bulleted"></i>Lista de Lugares
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['places.store'], 'files' => 'true']) !!}
                        @include('backend.admin.places.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/my-libs/js/inputs.js')}}"></script>

    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>

    <script>
        function changeProfile() {
            $('#avatar_place').click();
        }
        $('#avatar_place').change(function () {
            var imgPath = this.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Elija imágenes (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };
//                $("#remove").val(0);
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{asset('assets/images/sin_img.jpg')}}');
//            $("#remove").val(1);
        }
    </script>


    <script>
        CKEDITOR.config.height = 300;
        CKEDITOR.config.width = 'auto';
        CKEDITOR.replace('description_place');
    </script>

    <script>
        function aMayusculas(obj, id) {
            obj = obj.toUpperCase();
            document.getElementById(id).value = obj;
        }
    </script>

@endsection

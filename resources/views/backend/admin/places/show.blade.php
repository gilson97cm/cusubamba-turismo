@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Lugar</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Lugar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ver</li>
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
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('places.edit')
                            <a href="{{route('places.edit',$place->id)}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="mdi mdi-pencil"></i>Editar Lugar
                            </a>
                        @endcan
                        <span></span>
                        @can('places.create')
                            <a href="{{route('places.create')}}"
                               class="btn btn-sm btn-default my-button-create pull-right ">
                                <i class="mdi mdi-plus"></i>Publicar Lugar
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <span><strong>Fecha: </strong>{{$place->created_at}}</span>
                        <br>
                        <span><strong>Última Actualización: </strong>{{$place->updated_at}}</span>
                        <hr>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class=" form-group col-lg-10 ">
                                <h2  class="align-my-text">{{$place->name_place}}</h2>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="form-group col-lg-10 content-my-img" >
                                <img src="{{asset($place->avatar_place)}}" class="my-img">
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class=" form-group col-lg-10 align-my-paragraph" >
                                {!! $place->description_place !!}
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <hr>
                        <a class="float-right" href="{{route('places.index')}}">Volver a la Lista de Lugares</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>
@endsection

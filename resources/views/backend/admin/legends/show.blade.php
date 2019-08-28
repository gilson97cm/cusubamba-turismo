@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Leyenda</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Leyenda</a></li>
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
                        <label class="my-label">Leyenda:</label>
                        @can('legends.edit')
                            <a href="{{route('legends.edit', $legend->id)}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="fa fa-pencil"></i> Editar Leyenda
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class=" form-group col-lg-10 ">
                                <h2  class="align-my-text">{{$legend->title_legend}}</h2>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="form-group col-lg-10 content-my-img" >
                                <img src="{{asset($legend->avatar_legend)}}" class="my-img">
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class=" form-group col-lg-10 align-my-paragraph" >
                                {!! $legend->description_legend !!}
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <hr>
                        <a class="float-right" href="{{route('legends.index')}}">Volver a la Lista de Noticias</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

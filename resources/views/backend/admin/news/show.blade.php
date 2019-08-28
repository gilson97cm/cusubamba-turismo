@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Noticia</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Noticia</a></li>
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
                    <label class="my-label">Noticia:</label>
                    @can('news.edit')
                        <a href="{{route('news.edit', $news->id)}}"
                           class="btn btn-sm btn-primary my_button pull-right ">
                           <i class="fa fa-pencil"></i> Editar Noticia
                        </a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class=" form-group col-lg-10 ">
                            <h2  class="align-my-text">{{$news->title_news}}</h2>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="form-group col-lg-10 content-my-img" >
                                <img src="{{asset($news->avatar_news)}}" class="my-img">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class=" form-group col-lg-10 align-my-paragraph" >
                            {!! $news->detail_news !!}
                            <a class="float-right" href="{{route('news.index')}}">Volver a la Lista de Noticias</a>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

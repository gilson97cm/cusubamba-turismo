@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/tb_products.css')}}">
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
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <label class="my-label">Noticia</label>
                    @can('news.create')
                        <a href="{{route('news.create')}}"
                           class="btn btn-sm btn-primary my_button pull-right ">
                            Crear
                        </a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class=" form-group col-lg-10">
                            <h2>{{$news->title_news}}</h2>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="form-group col-lg-10">
                            <img src="{{$news->avatar_news}}" class="img-responsive">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class=" form-group col-lg-10">
                            <p>{!! $news->detail_news !!}</p>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

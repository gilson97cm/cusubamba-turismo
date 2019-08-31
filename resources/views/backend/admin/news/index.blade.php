@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Lista de Noticias</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Noticias</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lista</li>
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
                <div id="alert">
                </div>
                @include('flash::message')
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('news.create')
                            <a href="{{route('news.create')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="fa fa-plus"></i> Publicar Noticia
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    {{ Form::open(['route' => 'news.index', 'method' => 'GET', 'class' => 'form-inline pull-left']) }}
                                    <div class="form-group">
                                        {{ Form::date('created_at',null,  ['class' => 'form-control my-border margin-search']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('title_news', null, ['class' => 'form-control my-border margin-search', 'placeholder' => 'Titulo']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('detail_news', null, ['class' => 'form-control my-border margin-search' , 'placeholder' => 'Detalle']) }}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-search margin-search">
                                            <span class="mdi mdi-magnify"></span>Buscar
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{route('news.index')}}" class="btn btn-default btn-add">
                                            <span class="mdi mdi-filter"></span> Ver Todo
                                        </a>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class=" form-group col-lg-12">
                                <table class="table table-striped table-hover table-responsive">
                                    <thead>
                                    <tr class="thead-tr">
                                        <th width="15%">Fecha</th>
                                        <th width="10%">Imágen</th>
                                        <th width="33%">Titulo</th>
                                        <th width="43%">Detalles</th>
                                        <th width="2%" colspan="3">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $news_)
                                        <tr>
                                            <td> {{$news_->created_at}} </td>
                                            <td style=" vertical-align: middle;" align="center"><img
                                                    src="{{asset($news_->avatar_news)}}" alt="img" width="80px"
                                                    height="50px"></td>
                                            <td class="expandDiv"><strong>{{$news_->title_news}}</strong></td>
                                            <td class="expandDiv" align="justify">{!! $news_->detail_news !!}</td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('news.show')
                                                    <a href="{{route('news.show', $news_->id)}}"
                                                       class="btn btn-sm btn-primary my_button">
                                                        Ver
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('news.edit')
                                                    <a href="{{route('news.edit', $news_->id)}}"
                                                       class="btn btn-sm btn-secondary">
                                                        Editar
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('news.destroy')
                                                    {!! Form::open(['route' => ['news.destroy', $news_->id], 'method' => 'DELETE']) !!}
                                                    <a href="#" disabled="true"
                                                       class="btn btn-sm btn-danger destroy-news" id="destroy_news">Eliminar</a>
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $news->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/my-libs/js/destroy.js')}}"></script>
    <script src="{{asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.expander/jquery.expander.js')}}"></script>
    <script src="{{asset('vendor/jquery.expander/expand.js')}}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>

@endsection

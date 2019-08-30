@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Noticias</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Noticias</a></li>
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
                        <label class="my-label">  Noticias</label>
                        @can('news.create')
                            <a href="{{route('news.create')}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="fa fa-plus"></i> Publicar Noticia
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class=" form-group col-lg-10">
                                <table class="table table-striped table-hover table-responsive">
                                    <thead>
                                    <tr class="thead-tr">
                                        <th width="14%">Imágen</th>
                                        <th width="37%">Titulo</th>
                                        <th width="47%">Detalles</th>
                                        <th width="2%" colspan="3">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $news_)
                                        <tr>
                                            <td style=" vertical-align: middle;" align="center"><img src="{{asset($news_->avatar_news)}}" alt="img" width="80px" height="50px"></td>
                                            <td class="expandDiv" > <strong>{{$news_->title_news}}</strong> </td>
                                            <td class="expandDiv"  align="justify">{!! $news_->detail_news !!}</td>
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
                                                       class="btn btn-sm btn-secondary" >
                                                        Editar
                                                    </a>
                                                @endcan
                                            </td>
                                            <td width="10px" style=" vertical-align: middle;">
                                                @can('news.destroy')
                                                    {!! Form::open(['route' => ['news.destroy', $news_->id], 'method' => 'DELETE']) !!}
                                                    <a href="#" disabled="true"  class="btn btn-sm btn-danger destroy-news" id="destroy_news" >Eliminar</a>
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $news->render() !!}
                            </div>
                            <div class="col-lg-1"></div>
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

@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/my-styles.css')}}">
    <link rel="stylesheet" href="{{asset('custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Actividad</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Actividad</a></li>
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
                        @can('activities.edit')
                            <a href="{{route('activities.edit',$activity->id)}}"
                               class="btn btn-sm btn-primary my_button pull-right ">
                                <i class="mdi mdi-pencil"></i>Editar Actividad
                            </a>
                        @endcan
                        <span></span>
                        @can('activities.create')
                            <a href="{{route('activities.create')}}"
                               class="btn btn-sm btn-default my-button-create pull-right ">
                                <i class="mdi mdi-plus"></i>Publicar Actividad
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <span><strong>Fecha: </strong>{{$activity->created_at}}</span>
                        <br>
                        <span><strong>Última Actualización: </strong>{{$activity->updated_at}}</span>
                        <hr>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class=" form-group col-lg-10 ">
                                <h2  class="align-my-text">{{$activity->name_activity}}</h2>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="form-group col-lg-10 content-my-img" >
                                <img src="{{asset($activity->avatar_activity)}}" class="my-img">
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class=" form-group col-lg-10 align-my-paragraph" >
                                {!! $activity->description_activity !!}
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <hr>
                        <a class="float-right" href="{{route('activities.index')}}">Volver a la Lista de Actividades</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

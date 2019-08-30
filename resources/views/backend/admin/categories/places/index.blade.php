@extends('backend.admin.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/my-libs/custom-table.css')}}">
@endsection
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Categorías</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Categoría de Lugares</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Nueva</li>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabla de Categorías de Lugares</h4>
                    </div>
                    <div class="card-body">
                        <div id="alert">
                        </div>
                        <h6 class="card-subtitle"></h6>
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr class="thead-tr">
                                <th width="40%">Nombre</th>
                                <th width="50%">Descripcion</th>
                                <th width="10%" colspan="2" style="vertical-align: center">
                                    @can('categoriesP.search')
                                    <Button id="btn_search_add" class="btn btn-sm btn-add"
                                            style="border: white solid 1px;"><i class="mdi mdi-plus"></i> Agregar
                                    </Button>
                                    @endcan
                                </th>
                            </tr>

                            {{-- formulario para agregar --}}
                            <tr id="tr_add" class="thead-add" style="background: rgb(227,255,229)">
                                {!! Form::open(['route' => ['categoriesP.store'], 'method' => 'POST']) !!}
                                @csrf
                                @include('backend.admin.categories.places.partials.form')
                                <th width="10px" colspan="2" style="vertical-align: middle;">
                                    @can('categoriesP.create')
                                        <button type="submit" class="btn btn-success btn-sm btn-add " id="btn-add"
                                                name="btn-add"><i class="mdi mdi-plus"></i> Agregar
                                        </button>
                                    @endcan
                                </th>
                                {!! Form::close() !!}
                            </tr>

                            {{--formulario para buscar --}}
                            <tr id="tr_search" class="thead-add">
                                {!! Form::open(['route' => ['categoriesP.search'], 'method' => 'GET']) !!}
                                @csrf
                                @include('backend.admin.categories.places.partials.form')
                                <th width="10px" style="vertical-align: middle">
                                    @can('categoriesP.search')
                                        <button type="submit"
                                                class="btn btn-success btn-sm btn-search " id="btn-search"
                                                name="btn-search"><i class="fa fa-search"></i> buscar
                                        </button>
                                    @endcan
                                </th>
                                <th width="10px" style="vertical-align: middle">
                                    @can('categoriesP.search')
                                        <a href="{{route('categoriesP.index')}}" class="btn btn-success btn-sm btn-add "
                                           id="btn-add"
                                           name="btn-add"><i class="mdi mdi-filter"></i> Todo
                                        </a>
                                    @endcan
                                </th>
                                {!! Form::close() !!}
                            </tr>

                            </thead>
                            <tbody id="">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="expandDiv" align="center"> <strong>{{$category->name_place_category}}</strong> </td>
                                    <td class="expandDiv" align="justify">{{$category->description_place_category}}</td>
                                    <td width="10px" style="vertical-align: middle">
                                        @can('categoriesP.edit')
                                            <a class="btn btn-info btn-sm btn-edit " data-toggle="modal"
                                               href="#responsive-modal{{$category->id}}">
                                                <li class="fa fa-pencil"></li>
                                                Editar
                                            </a>
                                        @endcan
                                    </td>
                                    <td width="10px" style="vertical-align: middle">
                                        {!! Form::open(['route' => ['categoriesP.destroy', $category->id], 'method' => 'DELETE']) !!}
                                        @can('categoriesP.destroy')
                                            <a href="#"
                                               class="btn btn-danger btn-sm btn-delete destroy-category-activity">
                                                <li class="fa fa-trash-o"></li>
                                                Eliminar
                                            </a>
                                        @endcan
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                                <!-- sample modal content -->
                                <div id="responsive-modal{{$category->id}}" class="modal fade"
                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Categoría </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">
                                                    ×
                                                </button>
                                            </div>
                                            {!! Form::model($category, ['route' => ['categoriesP.update',$category->id], 'method' => 'PUT']) !!}
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">

                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('name_place_category', 'Nombre:',['class' => 'my-label'])}}
                                                    {{Form::text('name_place_category', null , [
                                                            'id' => 'edit_category',
                                                            'onkeypress' => 'return validar_letras(event)',
                                                            'onblur' => 'aMayusculas(this.value,this.id)',
                                                            'class' => 'form-control upletter']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('description_place_category', 'Descripción:',['class' => 'my-label'])}}
                                                    {{Form::text('description_place_category', null , [
                                                            'onkeypress' => 'return validar_caracteres(event)',
                                                            'class' => 'form-control']) }}
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="btn-edit" name="btn-edit"
                                                        class="btn btn-success btn-sm btn-add waves-effect waves-light">
                                                    Actualizar
                                                </button>
                                                <button type="button"
                                                        class="btn btn-danger btn-sm btn-search waves-effect"
                                                        data-dismiss="modal">Cerrar
                                                </button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('assets/my-libs/js/categories.js')}}"></script>
    <script src="{{asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/my-libs/js/inputs.js')}}"></script> //inputs.js incluye la accion del boton search_add
    <script src="{{asset('vendor/jquery.expander/jquery.expander.js')}}"></script>
    <script src="{{asset('vendor/jquery.expander/expand.js')}}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
    </script>

    <script src="{{asset('assets/my-libs/js/validateNumber.js')}}"></script>
    <script>
        function aMayusculas(obj, id) {
            obj = obj.toUpperCase();
            document.getElementById(id).value = obj;
        }
    </script>
@endsection
@extends('backend.admin.layout')
@section('breadcrumb')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Tablero</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tablero</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('dashboard')
    <div class="page-content-wrap">

        <!-- START WIDGETS -->
        <div class="row">
            <div class="col-md-3">

                <!-- START WIDGET SLIDER -->
                <div class="widget widget-default widget-carousel">
                    <div class="owl-carousel" id="owl-example">
                        <div>
                            <div class="widget-title">Total roles</div>
                            <div class="widget-subtitle">{{\Carbon\Carbon::today()->diffForHumans()}}</div>
                            <div class="widget-int">{{\Caffeinated\Shinobi\Models\Role::count()}}</div>
                        </div>
                        <div>
                            <div class="widget-title">Total de Permisos</div>
                            <div class="widget-subtitle">Available To Rent</div>
                            <div class="widget-int">{{\Caffeinated\Shinobi\Models\Permission::count()}}</div>
                        </div>
                        <div>
                            <div class="widget-title">Total de Empleados</div>
                            <div class="widget-subtitle">Currently Booked</div>
                            <div class="widget-int">{{\App\Person::count()}}</div>
                        </div>
                    </div>
                    <div class="widget-controls">
                        {{--<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"--}}
                        {{--data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>--}}
                    </div>
                </div>
                <!-- END WIDGET SLIDER -->

            </div>
            <div class="col-md-3">

                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon" onclick="location.href='{{--url('admin/tasks')--}}';">
                    <div class="widget-item-left">
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{--App\Persona::where('active',1)->where('seen',0)->count()--}}</div>
                        <div class="widget-title">Total de Personas</div>
                        <div class="widget-subtitle">In your tasks list</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET MESSAGES -->

            </div>
            <div class="col-md-3">

                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon"
                     onclick="location.href='{{'#'}}';">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{--App\Usuario::where('active',1)->count()--}}</div>
                        <div class="widget-title">Empleados Registrados</div>
                        <div class="widget-subtitle">Active Employee</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET REGISTRED -->

            </div>
            <div class="col-md-3">

                <!-- START WIDGET CLOCK -->
                <div class="widget widget-danger widget-padding-sm">
                    <div class="widget-big-int plugin-clock">00:00</div>
                    <div class="widget-subtitle plugin-date">Cargando...</div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                    <div class="widget-buttons widget-c1">
                        <div class="col">
                            <p>Fecha y Hora Actual</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{--
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Employee</th>
                        <th>Employee Info</th>
                        <th>Operation</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activities as $key => $activities)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$activities->emp_name}}</td>
                            <td>{{$activities->emp_info}}</td>
                            <td>{!! $activities->operation !!}</td>
                            <td>{{$activities->created_at->diffForHumans()}}</td>
                            <td><a class="btn btn-danger" href="{{url('admin/emp/activities/delete/'.$activities->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($activities->count()>0)
                    {{$activities->render()}}
                @endif
            </div>
            --}}
        </div>
        <!-- END DASHBOARD CHART -->

    </div>
@endsection

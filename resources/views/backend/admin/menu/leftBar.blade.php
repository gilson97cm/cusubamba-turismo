<aside class="left-sidebar">
<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">

            <!-- User Profile-->
            <li>
                <!-- User Profile-->
                <div class="user-profile d-flex no-block ">
                    <div class="user-pic"><img src="{{asset('assets/images/users/1.jpg')}}" alt="users" class="rounded-circle" width="50" /></div>
                    <div class="user-content hide-menu m-l-10">
                        <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h4 class="m-b-0 user-name font-medium">
                                {{DB::table('people')
                                ->where('id_card_person',Auth::user()->person_id_card)
                                ->value('name_person')
                                }}</h4>
                            <span class="op-5 user-email">{{Auth::user()->email}}</span>
                        </a>

                    </div>
                </div>
                <!-- End User Profile-->
            </li>
            <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Contenido</span></li>
            {{--TABLERO--}}
            <li class="sidebar-item"><a href="{{route('home')}}" class="sidebar-link"><i class="mdi mdi-home"></i> <span class="hide-menu">Inicio</span></a></li>
            {{--END TABLERO--}}

            {{--NOTICIAS--}}
            @can('news.index')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="hide-menu">Noticias</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('news.create')
                            <li class="sidebar-item"><a href="{{route('news.create')}}" class="sidebar-link"><i class="mdi mdi-plus"></i> <span class="hide-menu">Agregar Noticia</span></a></li>
                        @endcan
                        @can('news.index')
                            <li class="sidebar-item"><a href="{{route('news.index')}}" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i> <span class="hide-menu">Lista de Noticias</span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{--END NOTICIAS--}}

            {{--ACTIVIDADES--}}
            @can('activities.index')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Actividades</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('categoriesA.index')
                            <li class="sidebar-item"><a href="{{route('categoriesA.index')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Categoría de Actividades</span></a></li>
                        @endcan
                        @can('activities.create')
                            <li class="sidebar-item"><a href="{{route('activities.create')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Agregar Actividad</span></a></li>
                        @endcan
                        @can('activities.index')
                            <li class="sidebar-item"><a href="{{route('activities.index')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Lista de Actividades</span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{--END ACTIVIDADES--}}

            {{--LUGARES--}}
            @can('places.index')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Lugares</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('categoriesP.index')
                            <li class="sidebar-item"><a href="{{route('categoriesP.index')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Categoría de Lugares</span></a></li>
                        @endcan
                        @can('places.create')
                            <li class="sidebar-item"><a href="{{route('places.create')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Agregar Lugar</span></a></li>
                        @endcan
                        @can('places.index')
                            <li class="sidebar-item"><a href="{{route('places.index')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Lista de Lugares</span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{--END LUGARES--}}

            {{--EVENTOS--}}
            @can('events.index')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Eventos</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('categoriesE.index')
                            <li class="sidebar-item"><a href="{{route('categoriesE.index')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Categoría de Evento</span></a></li>
                        @endcan
                        @can('events.create')
                            <li class="sidebar-item"><a href="{{route('events.create')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Calendario</span></a></li>
                        @endcan
                        @can('events.index')
                            <li class="sidebar-item"><a href="{{route('events.index')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Lista de Eventos</span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{--END EVENTOS--}}

            {{--LEYENDAS--}}
            @can('legends.index')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-document"></i><span class="hide-menu">Leyendas</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('legends.create')
                            <li class="sidebar-item"><a href="{{route('legends.create')}}" class="sidebar-link"><i class="mdi mdi-plus"></i> <span class="hide-menu">Agregar Leyenda</span></a></li>
                        @endcan
                        @can('legends.index')
                            <li class="sidebar-item"><a href="{{route('legends.index')}}" class="sidebar-link"><i class="mdi mdi-format-list-bulleted"></i> <span class="hide-menu">Lista de Leyendas</span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{--END LEYENDAS--}}

            <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>

            {{--EMPLEADOS--}}
            @can('employees.index')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Empleados </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('employees.create')
                            <li class="sidebar-item"><a href="{{route('employees.create')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Agregar Empleado </span></a></li>
                        @endcan
                        @can('employees.index')
                            <li class="sidebar-item"><a href="{{route('employees.index')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Lista de Empleados </span></a></li>
                        @endcan
                        @can('employees.inactive')
                            <li class="sidebar-item"><a href="{{route('employees.inactive')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Empleados Inactivos </span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{--END EMPLEADOS--}}

            {{--ROLES--}}
            @can('roles.index')
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Roles </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @can('roles.create')
                            <li class="sidebar-item"><a href="{{route('roles.create')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Agregar Rol</span></a></li>
                        @endcan
                        @can('roles.index')
                            <li class="sidebar-item"><a href="{{route('roles.index')}}" class="sidebar-link"><i class="mdi mdi-table"></i> <span class="hide-menu">Lista de Roles</span></a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{--END ROLES--}}






        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>

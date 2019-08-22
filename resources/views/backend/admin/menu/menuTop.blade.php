<header class="topbar">
<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <a class="navbar-brand" href="#">
            <!-- Logo icon -->
            <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon-->
            <!--  <img src="{{--asset('assets/images/logo-icon.png')--}}" alt="homepage" class="dark-logo" /> -->
                <!-- Light Logo icon -->
            <!--  <img src="{{--asset('assets/images/logo-light-icon.png')--}}" alt="homepage" class="light-logo" /> -->
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
                <!-- dark Logo text -->
                <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
            </span>
        </a>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Toggle which is visible on mobile only -->
        <!-- ============================================================== -->
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-left mr-auto">
            <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>


            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                <form class="app-search position-absolute">
                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                </form>
            </li>
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-right">

            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown"role="button" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                    <span class="with-arrow"><span class="bg-danger"></span></span>
                    <ul class="list-style-none">
                        <li>
                            <div class="drop-title text-white bg-danger">
                                <h4 class="m-b-0 m-t-5">4 Pedidos</h4>
                                <span class="font-light">Notificaciones</span>
                            </div>
                        </li>
                        <li>
                            <div class="message-center message-body">
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img"> <img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Descripción del pedido.</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img"> <img src="{{asset('assets/images/users/2.jpg')}}" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">Descripción del pedido.</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img"> <img src="{{asset('assets/images/users/3.jpg')}}" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">Descripción del pedido.</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img"> <img src="{{asset('assets/images/users/4.jpg')}}" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">Descripción del pedido.</span> <span class="time">9:08 AM</span> </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link text-center link text-dark" href="javascript:void(0);"> <b>Ver Todos los Pedidos</b> <i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                    <span class="with-arrow"><span class="bg-primary"></span></span>
                    <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                        <div class=""><img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="img-circle" width="60"></div>
                        <div class="m-l-10">
                            <h5 class="m-b-0">{{DB::table('people')
                                ->where('id_card_person',Auth::user()->person_card_id)
                                ->value('name_person')
                                }}</h5>
                            <p class=" m-b-0">{{ Auth::user()->email }} </p>

                        </div>
                    </div>

                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-bag m-r-5 m-l-5"></i>Ver Perfil</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i>Configuración</a>
                    <a class="dropdown-item"  id="sa-warning" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off m-r-5 m-l-5"></i>Cerrar Sesión</a>

                </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
        </ul>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</header>

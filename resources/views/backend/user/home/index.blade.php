<!DOCTYPE html>
<html lang="es">
<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cusubamba</title>

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('vendor/users/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/users/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/users/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/users/plugins/selectbox/select_option1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/users/plugins/datepicker/datepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/users/plugins/isotope/jquery.fancybox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/users/plugins/isotope/isotope.css')}}">
    <!-- REVOLUTION SLIDER -->
    <link rel="stylesheet" href="{{asset('vendor/users/plugins/revolution/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/users/plugins/revolution/css/layers.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/users/plugins/revolution/css/navigation.css')}}">


    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700' rel='stylesheet' type='text/css'>

    <!-- CUSTOM CSS -->
    <link href="{{asset('vendor/users/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/users/css/news.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/users/css/colors/green.css')}}" id="option_color">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('vendor/users/img/favicon.png')}}"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>


<body class="body-wrapper  changeHeader ">
<div class="main-wrapper">

    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-default navbar-main navbar-fixed-top    " role="navigation">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown singleDrop active">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Inicio </a>
                        </li>
                        <li class="dropdown megaDropMenu ">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                               data-hover="dropdown" data-delay="300" data-close-others="true" aria-expanded="false">¿Dónde
                                ir?</a>
                            <ul class="row dropdown-menu">
                                <?php $count = 0;  ?>
                                @foreach ($place_categories as $category)
                                    <li class="col-sm-3 col-xs-12">
                                        <ul class="list-unstyled">
                                            <li>{{$category->name_place_category}}</li>
                                            @foreach($category->places as $place)
                                                <li class="">
                                                    <a href="#">{{$place->name_place}}</a>
                                                </li>
                                                <?php $count++;  ?>
                                                @if($count == 4)
                                                    @break
                                                @endif
                                            @endforeach
                                            <li class=""><a href="javascript:void(0)">Ver Todo</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown megaDropMenu ">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                               data-hover="dropdown" data-delay="300" data-close-others="true" aria-expanded="false">¿Qúe
                                Hacer?</a>
                            <ul class="row dropdown-menu">
                                <?php $count = 0;  ?>
                                @foreach ($activity_categories as $category)
                                    <li class="col-sm-3 col-xs-12">
                                        <ul class="list-unstyled">
                                            <li>{{$category->name_activity_category}}</li>
                                            @foreach($category->activities as $activity)
                                                <li class=""><a href="#">{{$activity->name_activity}}</a>
                                                </li>
                                                <?php $count++;  ?>
                                                @if($count == 4)
                                                    @break
                                                @endif
                                            @endforeach
                                            <li class=""><a href="javascript:void(0)">Ver Todo</a>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown singleDrop ">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Eventos</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class=""><a href="accordion-and-toggles.html">Calendario</a></li>
                            </ul>
                        </li>
                        <li class="dropdown singleDrop ">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Noticias</a>
                        </li>
                        <li class="dropdown singleDrop ">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Leyendas</a>
                        </li>
                        <li class="dropdown searchBox">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><span class="searchIcon"><i
                                        class="fa fa-search" aria-hidden="true"></i></span></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                    <span class="input-group">
                      <input type="text" class="form-control" placeholder="Search..." aria-describedby="basic-addon2">
                      <span class="input-group-addon" id="basic-addon2">Search</span>
                    </span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>


    <!-- BANNER -->
    <section class="bannercontainer">

        <div id="rev_slider_wrapper1" class="rev_slider_wrapper fullscreen-container" data-alias="christmas-snow-scene"
             data-source="gallery" style="background-color:transparent;padding:0px;">
            <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
            <div id="rev_slider_container" class="rev_slider custom_rev_slider fullscreenbanner" style="display:none;"
                 data-version="5.4.1">
                <ul>
                    <!-- SLIDE 1 -->
                    <?php $count = 0;  ?>
                    @foreach($events as $event)
                        <li data-transition="parallaxvertical">
                            <!-- MAIN IMAGE -->
                            <img src="{{asset($event->avatar_event)}}" alt="slidebg1"
                                 data-bgparallax="3" class="rev-slidebg"
                                 data-no-retina>

                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"
                                 data-x="center" data-hoffset=""
                                 data-y="center" data-voffset="-105"
                                 data-width="['autp']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['center']"
                                 data-fontsize="['20', '30', '30', '25']"
                                 data-color="#fff"
                                 style="z-index: 1; text-transform: uppercase;">
                                <strong>Inicio: </strong>{{$event->start_event}} -
                                <strong>Fin: </strong> {{$event->end_event}}
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                                 data-x="center" data-hoffset=""
                                 data-y="center" data-voffset="-50"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['center']"
                                 data-fontsize="['64', '54', '44', '34']"
                                 data-color="#fff"
                                 data-fontweight="bold"

                                 style="z-index: 1; text-transform: uppercase;">{{$event->name_event}}

                            </div>

                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                                 data-x="center" data-hoffset=""
                                 data-y="center" data-voffset="20"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['center']"
                                 data-fontsize="['14', '14', '14', '14']"
                                 data-color="#fff"
                                 data-visibility="['on','on','off','off']"

                                 style="z-index: 1;">{{$event->description_event}}

                            </div>


                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"
                                 data-y="center"
                                 data-x="center"
                                 data-hoffset=""
                                 data-voffset="['108', '108', 15, '15']"
                                 data-width="auto"
                                 data-height="auto"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['center']"
                                 data-lineheight="['45', '40', '35', '30']"
                                 data-color="#FFF"
                                 data-border="0"
                                 data-paddingleft="30"
                                 data-paddingright="30"
                                 style="z-index: 500; border-radius: 4px">
                                <span class="page-scroll"><a target="_blank" href="">Ver más</a></span>
                            </div>
                        </li>
                    <?php $count++;  ?>
                    @if($count == 4)
                        @break
                    @endif
                @endforeach

                <!-- SLIDE 2 -->
                    <li data-transition="parallaxvertical">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('vendor/users/img/home/slider/slider-02.jpg')}}" alt="slidebg1"
                             data-bgparallax="3" class="rev-slidebg"
                             data-no-retina>

                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"
                             data-x="center" data-hoffset=""
                             data-y="center" data-voffset="-105"
                             data-width="['auto']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center']"
                             data-fontsize="['30', '30', '30', '25']"
                             data-color="#fff"
                             style="z-index: 1; text-transform: uppercase; ">Discover The Most Amazing

                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                             data-x="center" data-hoffset=""
                             data-y="center" data-voffset="-50"
                             data-width="['auto']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center']"
                             data-fontsize="['64', '54', '44', '34']"
                             data-color="#fff"
                             data-fontweight="bold"

                             style="z-index: 1; text-transform: uppercase;">Travel Template

                        </div>

                        <!-- LAYER NR. 3 -->

                        <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="20"
                             data-width="['auto']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center']"
                             data-fontsize="['14', '14', '14', '14']"
                             data-color="#fff"
                             data-visibility="['on','on','off','off']"

                             style="z-index: 1;">Maecenas nec sodales justo. Vivamus auctor pulvinar mattis. Ut at
                            elementum nunc. Quisque condimentum ligula ante, non <br> luctus enim pulvinar sed. Fusce
                            quis congue odio.

                        </div>


                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"
                             data-y="center"
                             data-x="center"
                             data-hoffset=""
                             data-voffset="['108', '108', 15, '15']"
                             data-width="auto"
                             data-height="auto"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center']"
                             data-lineheight="['45', '40', '35', '30']"
                             data-color="#FFF"
                             data-border="0"
                             data-paddingleft="30"
                             data-paddingright="30"

                             style="z-index: 500; border-radius: 4px"><span class="page-scroll"><a target="_blank"
                                                                                                   href="">Buy Now</a></span>
                        </div>
                    </li>

                    <!-- slide 3   -->
                    <li data-transition="parallaxvertical">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('vendor/users/img/home/slider/slider-03.jpg')}}" alt="slidebg1"
                             data-bgparallax="3" class="rev-slidebg"
                             data-no-retina>

                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"
                             data-x="left"
                             data-y="center"
                             data-hoffset="['20', '40', '80', '60']"
                             data-voffset="['-105']"
                             data-width="['auto']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['left']"
                             data-fontsize="['30', '30', '30', '25']"
                             data-color="#fff"
                             style="z-index: 1; text-transform: uppercase; ">Enjoy Ultimate Freedom

                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                             data-x="left"
                             data-y="center"
                             data-hoffset="['20', '40', '80', '60']"
                             data-voffset="-50"
                             data-width="['auto']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['left']"
                             data-fontsize="['64', '54', '44', '34']"
                             data-color="#fff"
                             data-fontweight="bold"

                             style="z-index: 1; text-transform: uppercase;">Bootstrap Theme

                        </div>

                        <!-- LAYER NR. 3 -->

                        <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                             data-x="left"
                             data-y="center"
                             data-hoffset="['20', '40', '80', '60']"
                             data-voffset="20"
                             data-width="['auto']"
                             data-height="['auto']"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['left']"
                             data-fontsize="['14', '14', '14', '14']"
                             data-color="#fff"
                             data-visibility="['on','on','off','off']"

                             style="z-index: 1;">Aenean congue nisi elit, vitae viverra leo luctus et. Donec interdum
                            erat id mi scelerisque, vitae ullamcorper lorem gravida. <br> Nunc sed maximus ante. Nulla
                            dictum turpis vitae vehicula auctor.

                        </div>


                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"
                             data-x="['left','left','left','left']"
                             data-y="center"
                             data-hoffset="['20', '40', '80', '60']"
                             data-voffset="['108', '108', 15, '15']"
                             data-width="auto"
                             data-height="auto"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['left']"
                             data-lineheight="['45', '40', '35', '30']"
                             data-color="#FFF"
                             data-border="0"
                             data-paddingleft="30"
                             data-paddingright="30"

                             style="z-index: 500; border-radius: 4px"><span class="page-scroll"><a target="_blank"
                                                                                                   href="">Buy Now</a></span>
                        </div>
                    </li>

                    <!-- SLIDE 4 -->
                    <li data-transition="parallaxvertical">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('vendor/users/img/home/slider/slider-01.jpg')}}" alt="slidebg1"
                             data-bgparallax="3" class="rev-slidebg"
                             data-no-retina>

                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="container">
                            <div class="tp-caption tp-resizeme slide-layer-1" id="slide-layer-1"
                                 data-x="left"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="['-105']"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-fontsize="['30', '30', '25', '16']"
                                 data-color="#fff"
                                 data-visibility="['on', 'on', 'on', 'on']"
                                 style="z-index: 1; text-transform: uppercase; ">Discover The Most Amazing

                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                                 data-x="left"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="-50"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-fontsize="['64', '54', '44', '34']"
                                 data-color="#fff"
                                 data-fontweight="bold"

                                 style="z-index: 1; text-transform: uppercase;">Travel Template

                            </div>

                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption tp-resizeme slide-layer-2" id="slide-layer-2"
                                 data-x="left"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="20"
                                 data-width="['auto']"
                                 data-height="['auto']"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-fontsize="['14', '14', '14', '14']"
                                 data-color="#fff"
                                 data-visibility="['on','on','off','off']"

                                 style="z-index: 1;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex consequat.

                            </div>


                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption tp-resizeme slide-layer-4" id="slide-layer-4"
                                 data-x="['left','left','left','left']"
                                 data-y="center"
                                 data-hoffset="['20', '40', '80', '60']"
                                 data-voffset="['108', '108', 15, '15']"
                                 data-width="auto"
                                 data-height="auto"
                                 data-type="text"
                                 data-responsive_offset="on"
                                 data-frames='[{"delay":1400,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['left']"
                                 data-lineheight="['45', '40', '35', '30']"
                                 data-color="#FFF"
                                 data-border="0"
                                 data-paddingleft="30"
                                 data-paddingright="30"
                                 data-visibility="['on','on','on','on']"
                                 style="z-index: 500; border-radius: 4px">
                                <span class="page-scroll"><a target="_blank" href="">Buy Now</a></span>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->
    </section>


    <!-- SEARCH TOUR -->
    <section class="darkSection_ col-xs-12">
        <div class="container">
            <div class="row gridResize">
                <div align="center">
                    <div class="sectionTitleDouble">
                        <h2>Cusubamba tierra de <span>folklor</span> y <span>cultura</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS -->
    <section class="newsSection ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span class="lightBg">Noticias</span></h2>
                        <p>Informate con las noticias más relevantes.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $count = 0;  ?>
                @foreach($news as $news_)
                    <div class="news col-sm-4 col-xs-12">
                        <div class="ourPackage">
                            <div class="ourPackageImg">
                                <img class="img" src="{{asset($news_->avatar_news)}}" alt="">
                            </div>
                            <div class="ourPackageContent">
                                <h4>{{$news_->title_news}}</h4>
                                <p>{{$news_->created_at}}</p>
                                <a href=""
                                   class="btn buttonCustomPrimary">Leer Más</a>
                            </div>
                        </div>
                    </div>
                    <?php $count++;  ?>
                    @if($count == 6)
                        @break
                    @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="btnArea">
                        <a href="" class="btn buttonTransparent">Ver más Noticias</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- TOP PLACES -->
    <section class="mainContentSection packagesSection places-bg" >

           <div class="container">
               <div class="row">
                   <div class="col-xs-12">
                       <div class="sectionTitle">
                           <h2><span class="lightBg_">¿Dónde Ir?</span></h2>
                           <p class="lightBg_">Ven y disfruta de un ambiente agradable en nuestros lugares.</p>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <?php $count = 0;  ?>
                   @foreach($places as $place)
                       <div class="col-sm-4 col-xs-12">
                           <div class="thumbnail deals">
                               <img src="{{asset($place->avatar_place)}}" alt="deal-image">
                               <a href="" class="pageLink"></a>
                               <div class="caption" align="center">
                                   <h4><a href="single-package-right-sidebar.html"
                                          class="captionTitle">{{$place->name_place}}</a>
                                   </h4>
                                   <div class="expandDiv" align="justify">
                                       <p>{!! $place->description_place !!}</p>
                                   </div>
                                   <div class="detailsInfo">
                                       <ul class="list-inline detailsBtn">
                                           <li><a href='booking-1.html' class="btn buttonTransparent">Ver más</a></li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <?php $count++;  ?>
                       @if($count == 6)
                           @break
                       @endif
                   @endforeach
               </div>
               <div class="row">
                   <div class="col-xs-12">
                       <div class="btnArea">
                           <a href="" class="btn buttonTransparent_">Ver todo</a>
                       </div>
                   </div>
               </div>
           </div>

    </section>

    <!-- TOP ACTIVITIES -->
    <section class="mainContentSection packagesSection activities-bg" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span class="lightBg_">¿Qué HAcer?</span></h2>
                        <p class="lightBg_">Ven y realiza varias actividades.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $count = 0;  ?>
                @foreach($activities as $activity)
                    <div class="col-sm-4 col-xs-12">
                        <div class="thumbnail deals">
                            <img src="{{asset($activity->avatar_activity)}}" alt="deal-image">
                            <a href="" class="pageLink"></a>
                            <div class="caption" align="center">
                                <h4><a href="single-package-right-sidebar.html"
                                       class="captionTitle">{{$activity->name_activity}}</a>
                                </h4>
                                <div class="expandDiv" align="justify">
                                    <p>{!! $activity->description_activity !!}</p>
                                </div>
                                <div class="detailsInfo">
                                    <ul class="list-inline detailsBtn">
                                        <li><a href='' class="btn buttonTransparent">Ver más</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++;  ?>
                    @if($count == 6)
                        @break
                    @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="btnArea">
                        <a href="" class="btn buttonTransparent_">ver todo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROMOTION PARALLAX -->
    <section class="promotionWrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="promotionTable">
                        <div class="promotionTableInner">
                            <div class="promotionInfo">
                                <span>Winter Promotion</span>
                                <h2>Greek Island Vacetion Tour</h2>
                                <ul class="list-inline rating">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <p>$599 per person - 5 nights</p>
                                <a href="single-package-right-sidebar.html" class="btn buttonCustomPrimary">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DESTINATIONS -->
    <section class="whiteSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span>Our Destinations</span></h2>
                        <p>Nullam vitae risus commodo arcu tincidunt ultricies</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="media destinations">
                        <a class="media-left" href="destination-cities.html">
                            <img class="media-object" src="img/home/destination.jpg" alt="Destination">
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading">Choose <br>Your Destination</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <div class="clearfix">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-minus" aria-hidden="true"></i>Asia</li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Aenean</a></li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Etiam</a></li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Donec</a></li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-minus" aria-hidden="true"></i>Europe</li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Maecenas</a>
                                    </li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Cras
                                            Sagittis</a></li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Vestibulum</a>
                                    </li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-minus" aria-hidden="true"></i>America</li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Morbi Sed</a>
                                    </li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Pellentesque</a>
                                    </li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Proin</a></li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-minus" aria-hidden="true"></i>Africa</li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Duis Eu</a>
                                    </li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Morbi Nisl</a>
                                    </li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Curabitur</a>
                                    </li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-minus" aria-hidden="true"></i>Australia</li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Vivamus</a>
                                    </li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Nibh Odio</a>
                                    </li>
                                    <li><a href="destination-single-city.html"><i class="fa fa-square"
                                                                                  aria-hidden="true"></i>Dictum</a></li>
                                </ul>
                            </div>
                            <div class="media-btn">
                                <a href="destination-cities.html" class="btn buttonTransparent">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COUNTING PARALLAX -->
    <section class="countUpSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="counter">179</div>
                        <h5>Destinations</h5>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-gift" aria-hidden="true"></i>
                        </div>
                        <div class="counter">48</div>
                        <h5>tour pack</h5>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-smile-o" aria-hidden="true"></i>
                        </div>
                        <div class="counter">4562</div>
                        <h5>happy clients</h5>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                        </div>
                        <div class="counter">24</div>
                        <h5>hours support</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TOUR PACKAGES -->
    <section class="whiteSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="sectionTitle">
                        <h2><span>Our Packages</span></h2>
                        <p>Ut facilisis facilisis metus quis semper</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="filter-container isotopeFilters">
                        <ul class="list-inline filter">
                            <li class="active"><a href="#" data-filter="*">All Places</a></li>
                            <li><a href="#" data-filter=".asia">Asia</a></li>
                            <li><a href="#" data-filter=".america">America</a></li>
                            <li><a href="#" data-filter=".africa">Africa</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row isotopeContainer">
                <div class="col-sm-4 isotopeSelector asia">
                    <article class="">
                        <figure>
                            <img src="img/home/packages/packages-1.jpg" alt="">
                            <h4>Vestibulum Tour</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="single-package-fullwidth.html">
                                    <div class="overlayInfo">
                                        <h5>from <span>$399</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>27 Jan, 2017</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
                <div class="col-sm-4 isotopeSelector america africa">
                    <article class="">
                        <figure>
                            <img src="img/home/packages/packages-2.jpg" alt="">
                            <h4>Maecenas Tour</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="single-package-fullwidth.html">
                                    <div class="overlayInfo">
                                        <h5>from <span>$599</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>09 Feb, 2017</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
                <div class="col-sm-4 isotopeSelector africa">
                    <article class="">
                        <figure>
                            <img src="img/home/packages/packages-3.jpg" alt="">
                            <h4>Lobortis Tour</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="single-package-fullwidth.html">
                                    <div class="overlayInfo">
                                        <h5>from <span>$299</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>14 Feb, 2017</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
                <div class="col-sm-4 isotopeSelector asia america">
                    <article class="">
                        <figure>
                            <img src="img/home/packages/packages-4.jpg" alt="">
                            <h4>Leo Lacus Tour</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="single-package-fullwidth.html">
                                    <div class="overlayInfo">
                                        <h5>from <span>$399</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>11 Jan, 2017</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
                <div class="col-sm-4 isotopeSelector america">
                    <article class="">
                        <figure>
                            <img src="img/home/packages/packages-5.jpg" alt="">
                            <h4>Nullam Tour</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="single-package-fullwidth.html">
                                    <div class="overlayInfo">
                                        <h5>from <span>$199</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>02 Feb, 2017</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
                <div class="col-sm-4 isotopeSelector africa asia">
                    <article class="">
                        <figure>
                            <img src="img/home/packages/packages-6.jpg" alt="">
                            <h4>Hendrerit Tour</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="single-package-fullwidth.html">
                                    <div class="overlayInfo">
                                        <h5>from <span>$799</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>26 Feb, 2017</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </section>


    <!-- INQUIRY MODAL -->
    <div class="modal fade bookingModal modalBook" id="inquiryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Inquiry About Tour</h4>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" id="yourName" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="yourEmail" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn buttonCustomPrimary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer>
        <div class="footer clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent">
                            <a href="index.html" class="footer-logo"><img src="img/logo-color-sm.png" alt="footer-logo"></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute </p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent">
                            <h5>contact us</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod.</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-home" aria-hidden="true"></i>61 Park Street, Fifth Avenue, NY</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>[88] 657 524 332</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a
                                        href="mailTo:info@star-travel.com">info@star-travel.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent imgGallery">
                            <h5>Gallery</h5>
                            <div class="row">
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-1.jpg"><img
                                            src="img/home/gallery/thumb-gallery-1.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-2.jpg"><img
                                            src="img/home/gallery/thumb-gallery-2.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-3.jpg"><img
                                            src="img/home/gallery/thumb-gallery-3.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-4.jpg"><img
                                            src="img/home/gallery/thumb-gallery-4.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-5.jpg"><img
                                            src="img/home/gallery/thumb-gallery-5.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="fancybox-pop" href="img/home/gallery/gallery-6.jpg"><img
                                            src="img/home/gallery/thumb-gallery-6.jpg" alt="image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="footerContent">
                            <h5>newsletter</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do. </p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your email"
                                       aria-describedby="basic-addon21">
                                <span class="input-group-addon" id="basic-addon21"><i class="fa fa-long-arrow-right"
                                                                                      aria-hidden="true"></i></span>
                            </div>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyRight clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 col-xs-12">
                        <ul class="list-inline">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                        <div class="copyRightText">
                            <p>Copyright © 2016. All Rights Reserved by <a target="_blank"
                                                                           href="http://www.iamabdus.com/">Abdus</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<!-- JAVASCRIPTS -->
<script src="{{asset('vendor/users/plugins/jquery/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/selectbox/jquery.selectbox-0.1.3.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('vendor/users/plugins/jquery/waypoints.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/counter-up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/isotope/isotope.min.js')}}"></script>
<script src="{{asset('vendor/users/plugins/isotope/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('vendor/users/plugins/isotope/isotope-triger.js')}}"></script>
<script src="{{asset('vendor/users/plugins/countdown/jquery.syotimer.js')}}"></script>
<script src="{{asset('vendor/users/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('vendor/users/js/custom.js')}}"></script>
<script src="{{asset('vendor/jquery.expander/jquery.expander.js')}}"></script>
<script>
    $(document).ready(function () {

        $('div.expandDiv').expander({
            slicePoint: 250, //It is the number of characters at which the contents will be sliced into two parts.
            widow: 2,
            expandSpeed: 0, // It is the time in second to show and hide the content.
            //userCollapseText: '' // Specify your desired word default is Less.
        });

        //$('div.expandDiv').expander();
    });
</script>

</body>

</html>


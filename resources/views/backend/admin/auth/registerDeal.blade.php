
<!DOCTYPE html>
<html dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="../image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Registrar Negocio - Admin</title>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/libs/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/my-libs/my-styles.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- CALL API-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3.2/jquery.easing.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDY_2V-J-h-ePbRzXc0M9tU3xzX1c7YF1U"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <!-- CALL API -->
  <script  src = "{{asset('assets/my-libs/js/map.js')}}"></script>
</head>

<body>
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('assets/images/background/login-register.jpg')}}) no-repeat center center;">

        <div class="container-fluid " style="margin-left: 5%;">
            <div class="row" >
                <div class="col-8 justify-content-center align-items-center" >
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Marque su Negocio</h4>
                            <form action=""  class="form-group">
                                <div class="intro intro-cuerpo" id = "mapa" style=" width: 100%; height: 400px;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-box on-sidebar">
            <div>
                <div class="logo">
                    <span class="db"><img src="{{asset('assets/images/logo-icon.png')}}" alt="logo" /></span>
                    <span class="db"><img src="{{asset('assets/images/logo-text.png')}}" alt="logo" /></span>
                    <h5 class="font-medium m-b-20">Registrar Negocio</h5>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors-> all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal m-t-20 needs-validation" id="frm_map" method="POST" action="{{route('deals.store')}}"  novalidate>
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-briefcase"></i></span>
                                    </div>
                                    <input type="hidden" name="cedula" value="{{ Auth::user()->id}}">
                                    <input type="text" name="rucN" class="form-control" onkeypress="return validar_numeros(event)" placeholder="Ruc" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('rucN')}}">
                                    <div class="invalid-tooltip">
                                        Ingrese el Ruc.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-id-badge"></i></span>
                                    </div>
                                    <input type="text" name="nombreN" class="form-control" onkeypress="return validar_caracteres(event)" placeholder="Nombre del Negocio" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('nombreN')}}">
                                    <div class="invalid-tooltip">
                                        Ingrese el Nombre de su Negocio.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-direction"></i></span>
                                    </div>
                                    {{--!! Form::select('province_deal', $provinces, null,['id'=>'province', 'placeholder' => 'Provincia...', 'class' => 'form-control']) !!--}}

                                    <input type="text" name="province_deal" class="form-control" onkeypress="return validar_letras(event)" placeholder="Provincia" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('province_deal')}}">
                                    <div class="invalid-tooltip">
                                        Ingrese una Provincia.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-direction-alt"></i></span>
                                    </div>
                                    {{--!! Form::select('canton_deal',['placeholder'=>'Cantón...'], null,['id'=>'canton', 'class' => 'form-control']) !!--}}

                                    <input type="text" name="canton_deal" class="form-control" onkeypress="return validar_letras(event)" placeholder="Canton" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('canton_deal')}}">
                                    <div class="invalid-tooltip">
                                        Ingrese un Cantón.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-direction-alt"></i></span>
                                    </div>
                                    {{--!! Form::select('parish_deal',['placeholder'=>'Parroquia...'], null,['id'=>'parish', 'class' => 'form-control']) !!--}}

                                    <input type="text" name="parish_deal" class="form-control" onkeypress="return validar_letras(event)" placeholder="Parroquia" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('parish_deal')}}">
                                    <div class="invalid-tooltip">
                                        Ingrese una Parroquia.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-id-badge"></i></span>
                                    </div>
                                    <input type="text" name="direccion" class="form-control" onkeypress="return validar_caracteres(event)" placeholder="Dirección" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('direccion')}}">
                                    <div class="invalid-tooltip">
                                        Ingrese la dirección.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-location-pin"></i></span>
                                    </div>
                                    <input type="text" name="cx"  readonly class="form-control"  placeholder="Longitud" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('cx')}}" >
                                    <div class="invalid-tooltip">
                                        Elija un lugar en el mapa.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon11"><i class="ti-location-pin"></i></span>
                                    </div>
                                    <input type="text"  name="cy" readonly class="form-control" placeholder="Latitud" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('cy')}}">
                                    <div class="invalid-tooltip">
                                        Elija un lugar en el mapa.
                                    </div>
                                </div>
                            </div>


                            <div class="form-group text-center ">
                                <div class="col-xs-12 p-b-20 ">
                                    <button class="btn btn-block btn-lg btn-info my_button" type="submit ">Terminar Registro</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->

<!-- This Page JS -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDY_2V-J-h-ePbRzXc0M9tU3xzX1c7YF1U&amp;sensor=true"></script>
<script src="{{asset('assets/libs/gmaps/gmaps.min.js')}}"></script>
<script src="{{asset('dist/js/pages/maps/map-google.init.js')}}"></script>
<script src="{{asset('assets/my-libs/js/province_canton_parish.js')}}"></script>
<script src="{{asset('assets/my-libs/js/inputs.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

<!-- script de entrada a la pagina de registro del negocio -->
<script>
    swal("Buen Trabajo", "Hemos registrado sus datos, a continuación registraremos su negocio.", "success");
</script>

<script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
</script>

<!-- SCRIPT PARA VALIDAR LOS CAMPOS -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();

                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
</script>

</body>


</html>


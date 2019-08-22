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
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Iniciar Sesión -  Administrador</title>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/my-libs/my-styles.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
        <div class="auth-box customLogin">
            <div id="loginform">
                <div class="logo">
                    <span class="db"><img src="{{asset('assets/images/logo-text.png')}}" alt="logo" /></span>
                    <h5 class="font-medium m-b-20">Iniciar Sesión</h5>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form  method="post" class="form-horizontal m-t-20 needs-validation" id="" action="{{route('login')}}" novalidate>
                            {!! csrf_field() !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1" required="">
                                <div class="invalid-tooltip">
                                    El campo está vacío o el usuario no existe.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required="">
                                <div class="invalid-tooltip">
                                    El campo está vacío o la contraseña NO es la correcta.
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Recordarme</label>
                                        <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Olvidaste la contraseña?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-xs-12 p-b-20">
                                    <button class="btn btn-block btn-lg btn-info my_button" type="submit">Entrar</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div id="recoverform">
                <div class="logo">
                    <span class="db"><img src="{{asset('assets/images/logo-icon.png')}}" alt="logo" /></span>
                    <h5 class="font-medium m-b-20">Recuperar mi contraseña</h5>
                    <span>Ingrese su correo electronico le enviaremos las Instrucciones!</span>
                </div>
                <div class="row m-t-20">
                    <!-- Form -->
                    <form class="col-12 needs-validation" action="" novalidate>
                        <!-- email -->
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control form-control-lg" type="email" required="" placeholder="ejemplo@algo.com">
                                <div class="invalid-tooltip">
                                    Ingrese su Correo.
                                </div>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Recuperar</button>
                            </div>
                        </div>
                        <br>
                        <div class="form-group m-b-0 m-t-10">
                            <div class="col-sm-12 text-center">
                                <a href="javascript:void(0)" id="to-login" class="text-dark "></i>Volver</a>
                            </div>
                        </div>
                    </form>
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
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').on("click", function() {
        $("#loginform").fadeIn();
        $("#recoverform").slideUp();
    });
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
</body>


</html>

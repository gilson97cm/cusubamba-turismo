<!DOCTYPE html>
<html dir="ltr" lang="es">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Registrarse - Admin</title>
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <!-- Customizar fecha de nacimiento datepicker -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}">

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
    <!-- ======= auth-wrapper d-flex no-block justify-content-center align-items-center col-lg-12======================================================= -->
    <div class="container-fluid d-flex no-block justify-content-center align-content-center" style="background:url({{asset('assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="row p-t-40">
                    <div class="card" style="background-color: rgba(0,0,0,0.5)">
                        <div class="card-body">
                            <div class="auth-box">
                                <div>
                                    <div class="logo">
                                        <span class="db"><img src="{{asset('assets/images/logo-light-icon.png')}}" alt="logo" /></span>
                                        <span class="db"><img src="{{asset('assets/images/logo-light-text.png')}}" alt="logo" /></span>

                                        <h5 class="font-medium m-b-20 my-color">Formulario de Registro</h5>
                                    </div>
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
                                <!-- Form -->

                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST" id="form-register" class="form-horizontal m-t-20 needs-validation" action="{{route('register')}}" novalidate>
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11" id="1">

                                                                <div class="input-group mb-3" >
                                                                    <label for="cedula" class="my-text-span"></label>
                                                                    <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon11"><i class="ti-id-badge"></i></span>
                                                                    </div>
                                                                    <input type="text" name="cedula" id="cedula" onkeypress="return validar_numeros(event)" class="form-control" placeholder="Cédula" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('cedula')}}">
                                                                    </div>
                                                                    <div class="invalid-tooltip">
                                                                        Ingrese su Cédula de Identidad.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">r
                                                        <div class="col-sm-11">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon11"><i class="ti-id-badge"></i></span>
                                                                </div>
                                                                <input type="text" name="nombre" class="form-control" onkeypress="return validar_letras(event)" placeholder="Nombre" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('nombre')}}">
                                                                <div class="invalid-tooltip">
                                                                    Ingrese su Nombre.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                          <div class="col-sm-11">
                                                              <div class="input-group mb-3">
                                                                  <div class="input-group-prepend">
                                                                      <span class="input-group-text" id="basic-addon11"><i class="ti-id-badge"></i></span>
                                                                  </div>
                                                                  <input type="text" name="apellido" onkeypress="return validar_letras(event)" class="form-control" placeholder="Apellido" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('apellido')}}">
                                                                  <div class="invalid-tooltip">
                                                                      Ingrese su Apellido.
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                          <div class="col-sm-11">
                                                              <div class="input-group mb-3">
                                                                  <div class="input-group-prepend">
                                                                      <span class="input-group-text" id="basic-addon11"><i class="ti-calendar"></i></span>
                                                                  </div>
                                                                  <input type="text" name="fecha" class="form-control" placeholder="Fecha de Nacimiento" aria-label="" aria-describedby="basic-addon11" id="mdate"  required value="{{old('fecha')}}">
                                                                  <div class="invalid-tooltip">
                                                                      Seleccione una Fecha.
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                               <div class="col-sm-5 p-t-5">
                                                                   <label class="container my-color">
                                                                       {{Form::radio('genre_person', 'Masculino')}} Masculino.
                                                                       <span class="checkmark"></span>
                                                                   </label>
                                                               </div>
                                                               <div class="col-sm-5 p-t-5">
                                                                   <label class="container my-color">
                                                                       {{Form::radio('genre_person', 'Femenino')}} Femenino.
                                                                       <span class="checkmark"></span>
                                                                   </label>
                                                               </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon11"><i class="ti-mobile"></i></span>
                                                                    </div>
                                                                    <input type="text" name="telefono" onkeypress="return validar_numeros(event)" class="form-control" placeholder="Télefono" aria-label="" aria-describedby="basic-addon11" required value="{{old('telefono')}}">
                                                                    <div class="invalid-tooltip">
                                                                        Ingrese un número de Teléfono.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon11"><i class="ti-direction-alt"></i></span>
                                                                    </div>
                                                                    {{--!! Form::select('province_person', $provinces, null,['id'=>'province', 'placeholder' => 'Provincia...', 'class' => 'form-control']) !! --}}
                                                                    <input type="text" name="province_person" onkeypress="return validar_letras(event)" class="form-control" placeholder="Provincia" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('province_person')}}">

                                                                    <div class="invalid-tooltip">
                                                                        Elija una Provincia.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon11"><i class="ti-direction-alt"></i></span>
                                                                    </div>
                                                                    {{--!! Form::select('canton_person',['placeholder'=>'Cantón...'], null,['id'=>'canton', 'class' => 'form-control']) !!--}}

                                                                    <input type="text" name="canton_person" onkeypress="return validar_letras(event)" class="form-control" placeholder="Canton" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('canton_person')}}">
                                                                    <div class="invalid-tooltip">
                                                                        Elija un Cánton.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11">
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon11"><i class="ti-direction-alt"></i></span>
                                                                </div>
                                                                    {{--!! Form::select('parish_person',['placeholder'=>'Parroquia...'], null,['id'=>'parish', 'class' => 'form-control']) !!--}}

                                                                    <input type="text" name="parish_person" onkeypress="return validar_letras(event)" class="form-control" placeholder="Parroquia" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('parish_person')}}">
                                                                    <div class="invalid-tooltip">
                                                                    Elija una Parroquia.
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11">
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon11"><i class="ti-direction-alt"></i></span>
                                                                </div>
                                                                <input type="text"  name="direccion" class="form-control" onkeypress="return validar_caracteres(event)" placeholder="Dirección" aria-label="" aria-describedby="basic-addon11" required value="{{old('direccion')}}">
                                                                <div class="invalid-tooltip">
                                                                    Ingrese una Dirección.
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11">
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon11"><i class="ti-email"></i></span>
                                                                </div>
                                                                <input type="text" name="email"class="form-control" placeholder="Correo" aria-label="" aria-describedby="basic-addon11" required="" value="{{old('email')}}">
                                                                <div class="invalid-tooltip">
                                                                    Ingrese un Correo.
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                            <div class="col-sm-11">
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon11"><i class="ti-key"></i></span>
                                                                </div>
                                                                    <input type="password" name="password" onkeypress="return validar_caracteres(event)"  id="pwd" class="form-control" placeholder="Contraseña" aria-label="" aria-describedby="basic-addon11" required />
                                                                    <small class="form-text text-active my-text-span" id="spn"   >*La contraseña debe tener mínimo 9 caracteres.</small>
                                                                <div class="invalid-tooltip">
                                                                    Ingrese una Contraseña.
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-8"></div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-10">
                                                         <div class="col-sm-11">
                                                             <div class="input-group mb-3">
                                                                 <div class="input-group-prepend">
                                                                     <span class="input-group-text" id="basic-addon11"><i class="ti-check"></i></span>
                                                                 </div>
                                                                    <input type="password" name="password_confirmation" onkeypress="return validar_caracteres(event)" id="pwdc"  class="form-control" placeholder="Confirmar Contraseña" aria-label="" aria-describedby="basic-addon11" required />
                                                                 <small class="form-text text-active my-text-span" id="spn"   >*Vuelve a ingresar su contraseña para confirmar.</small>
                                                                 <div class="invalid-tooltip">
                                                                     El campo está vacío repita su contraseña.
                                                                 </div>
                                                             </div>
                                                         </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-4">
                                                        <div class="form-group row p-t-15">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 ">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" required="">
                                                            <label class="custom-control-label my-color" for="customCheck1">Acepto los <a class="my_text" href="javascript:void(0)">Terminos y Condiciones</a></label>
                                                            <div class="invalid-feedback">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center ">
                                                   <div class="row">
                                                       <div class="col-lg-4"></div>
                                                       <div class="col-lg-4">
                                                           <div class="col-xs-12 p-b-20 ">
                                                               <button class="btn btn-block btn-lg btn-info my_button " type="submit " >Registrarme</button>
                                                           </div>
                                                       </div>
                                                       <div class="col-lg-4"></div>
                                                   </div>
                                                </div>
                                                <div class="form-group m-b-0 m-t-10 ">
                                                    <div class="col-sm-12 text-center my-color">
                                                        Ya tengo una cuenta? <a href="{{route('login')}}" class="text-info m-l-5 my_text "><b>Iniciar Sesión</b></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-1"></div>
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
<script src="{{asset('assets/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js')}}"></script>
<script src="{{asset('assets/my-libs/js/province_canton_parish.js')}}"></script>
<script src="{{asset('assets/my-libs/js/inputs.js')}}"></script>

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
            var succes_ = 0;
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        succes_ = 1;
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    if(succes_ == 1){




    }
</script>
<!-- customizar datepicker -->
<script>
    $('#mdate').bootstrapMaterialDatePicker({weekStart: 0, time: false });
</script>
<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(4000);
</script>

</body>


</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Connexion | Tableau de bord</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/src/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('backend/layouts/vertical-dark-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/layouts/vertical-dark-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/layouts/vertical-dark-menu/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('backend/fonts.googleapis.com/css33d1.css?family=Nunito:400,600,700') }}" rel="stylesheet">
    <link href="{{ asset('backend/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/layouts/vertical-dark-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/src/assets/css/light/authentication/auth-cover.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('backend/layouts/vertical-dark-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/src/assets/css/dark/authentication/auth-cover.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="form">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
                <div class="d-lg-flex col-lg-6 col-xl-7 col-12 align-items-center">
                    <div class="flex-row text-center mx-auto">
    
                        <img src="{{asset('backend/login.gif')}}" alt="IP87" width="auto" height="auto" class="img-fluid authentication-cover-img">
    
                    </div>
                </div>
                
                @yield('content')
            
            </div>
    
        </div>
        
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('backend/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->
    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            @if (session('success'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    iconColor: 'white',
                    color: 'white',
                    background: '#15C162B6',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
    
                })
                Toast.fire({
                    text: "{{ session('success') }}",
                    icon: "success",
                });
            @endif
            @if (session('warning'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    iconColor: 'white',
                    color: 'white',
                    background: '#C1B615B6',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
    
                })
                Toast.fire({
                    text: "{{ session('warning') }}",
                    icon: "warning",
                });
            @endif
            @if (session('error'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    iconColor: 'white',
                    color: 'white',
                    background: '#E864C5B0',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
    
                })
    
                Toast.fire({
                    text: "{{ session('error') }}",
                    icon: "error",
                });
            @endif
            @if ($errors->any())
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    iconColor: 'white',
                    color: 'white',
                    background: '#E864C593',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
    
                })
                Toast.fire({
                    icon: 'error',
                    title: "{{ $errors->first() }}",
                })
            @endif
        </script>
    
    </body>
    
    </html>
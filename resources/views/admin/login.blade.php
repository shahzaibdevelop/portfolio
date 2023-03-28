<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Shahzaib Hassan - Login">
    <meta name="author" content="Shahzaib Hassan">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="adminassets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>Shahzaib Hassan - Login</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="adminassets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="adminassets/css/style.css" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="adminassets/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="adminassets/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="adminassets/switcher/css/switcher.css" rel="stylesheet">
    <link href="adminassets/switcher/demo.css" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader" >
            <img src="assets/images/logo2.gif" width="500px" height="450px" class="loader-img" alt="Loader" style="position: absolute;top:50px;">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- Theme-Layout -->

                <!-- CONTAINER OPEN -->
             

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <div class="col col-login mx-auto ">
                            <div class="text-center">
                                <a href="index.html"><img src="assets/images/logo2.gif" width="300px" height="180px" class="header-brand-img" alt=""></a>
                            </div>
                        </div>
                        <form class="login100-form validate-form" action="login" method="POST">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Login
                            </span>
                            <div class="panel panel-primary">
                              
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="email" placeholder="Email" name="email" value="{{old('email')}}">
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="password" placeholder="Password" name="password" value="{{old('password')}}">
                                            </div>
                                            
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="login100-form-btn btn-primary">
                                                        Login
                                                </button>
                                            </div>
                                           
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="adminassets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="adminassets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="adminassets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="adminassets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="adminassets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="adminassets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="adminassets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="adminassets/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="adminassets/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="adminassets/switcher/js/switcher.js"></script>

</body>

</html>
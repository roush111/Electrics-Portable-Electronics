<?php
    session_start();
    include('../config/dbconn.php');
    
    if (isset($_SESSION['id'])){
        header('Location:user_index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-Commerce</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="../index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Roushan Prasad" data-placement="bottom">
                    Electrics - Portable Electronics
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url('data:image/jpeg;base64,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WO+3P+yfirHduiuzS0/+tMXK/wC83E985+LsdXBerFfBIREynGM859suntO3+rD8Xkc+Gl7Zd/R2sx45/B0OkczuUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQU3HOOqprimuDTCsbxmJiamHq6G+2sUs8ek1605fkTT3dHreWOERqY3Pn2eNSni0UFFBRQUUFFBRQUUFFBTcdRrsbXc4ZMRKMtLDLvEStbTn7WXiZwx8nH/baP8AjA9py9rL8THDHyVG30o7Yx8HG8r28SnJGMR2KG0UFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQU46YviUHEoOJQcSg4lBxKDiUHEoOJQcSg4lBxKDiUHEoOJQcSg4lBxKDiUHEoOJQcSg4lBxKDiUHEoOJQcSg4lBxKDiUHEoOJQcSg4lBxKDiUHFFNctFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBTjoclFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBRQUUFFBTjpjkooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKRQ5KKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCnHQ5aKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCkUOSigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigooKKCigp//2Q==')"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="user_login.php">
                        <div class="header header-primary text-center">
                            User Login
                        </div><br>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" name="password" placeholder="Password" class="form-control" />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="bbtn btn-primary btn-round btn-lg btn-block" name="submit">Login</button>
                        </div>
                        <div class="pull-left">
                            <h6>
                                <a href="user_signup.php" class="link">Create User Account</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="" class="link">Forgot Password?</a>
                            </h6>
                        </div>
                    </form>
                    <br>
                    <?php

                                    if (
                                        isset($_SESSION['msg'])){
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);

                                    }
                                    ?>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright">
                    <a href="admin_login_page.php">&copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> </a> Designed and Coded by Roushan Prasad
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
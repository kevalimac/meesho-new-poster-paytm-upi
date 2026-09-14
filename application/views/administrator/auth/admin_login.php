<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/administrator/assets/')  ?>" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Login - Online Shopping</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(ICON)  ?>" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo base_url('assets/administrator/')  ?>assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/js/helpers.js"></script>

</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="<?php base_url(); ?>" class="app-brand-link gap-2">
                                <img src="<?= base_url(DARK_LOGO); ?>" alt="Logo" width="160px">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 text-center">Welcome to Online Shopping! 👋</h4>
                        <small class="mb-4  text-center">Please sign-in to your account and start the adventure</small>

                        <form id="" class="mb-3 mt-3" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control" id="email" name="userName" placeholder="Enter your email or username" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <!-- <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a> -->
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="btn btn-primary d-grid w-100" type="submit" name="submit" value="Sign in">
                            </div>
                        </form>

                        <!-- <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p> -->
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo base_url('assets/administrator/')  ?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/administrator/')  ?>assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping - Admin Login</title>
</head>

<body>
    <section class="wrapper">
        <div class="content">
            <header>
                <img src="<?= base_url(ICON); ?>" alt="Logo" width="200px">
            </header>
            <section>
                <form method="post" class="login-form">
                    <div class="input-group">
                        <label for="username">Username or Email</label>
                        <input type="text" placeholder="Username or Email" name="userName" id="username">
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Password" id="password" name="password">
                    </div>
                    <div class="input-group">
                        <input class="login-btn" type="submit" name="submit" value="Login">
                    </div>
                </form>
            </section>
        </div>
    </section>
</body>

</html>

<style>
    @import url("https://fonts.googleapis.com/css?family=Inter");

    body {
        font-family: "Inter", sans-serif;
        background-color: #020305;
        margin: 0;
        height: 100vh;
    }

    .wrapper {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .wrapper .content {
        background-color: #0f171f;
        padding: 30px 15px;
        border-radius: 10px;
        width: 100%;
        max-width: 500px;
        min-width: 200px;
    }

    .wrapper .content button {
        padding: 15px;
        width: 150px;
        border: unset;
        background: #020305;
        border-radius: 50px;
        color: #333;
        cursor: pointer;
    }

    .wrapper .content button:focus {
        outline: none;
    }

    .wrapper .content header {
        text-align: center;
    }

    .wrapper .content header h1 {
        color: #fff;
        margin-top: 0;
        font-size: 230%;
    }

    .wrapper .content .login-form {
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    .wrapper .content .login-form .input-group {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
        width: 100%;
        max-width: 310px;
    }

    .wrapper .content .login-form .input-group input {
        padding: 15px;
        font-size: 13px;
        border-radius: 50px;
        tranistion: background 0.5s;
        -webkit-tranistion: background 0.5s;
    }

    .wrapper .content .login-form .input-group label {
        color: #999;
        font-size: 12px;
        margin-bottom: 3px;
        margin-left: 16px;
    }

    .wrapper .content .login-form .input-group button {
        background-color: #3d3ec2;
        border: unset;
        color: #fff;
        align-self: center;
        margin-top: 15px;
        transition: background 0.5s;
        -webkit-transition: background 0.5s;
    }

    .wrapper .content .login-form .input-group button:hover {
        background-color: #020305;
    }

    .wrapper .content footer {
        padding-top: 15px;
        text-align: center;
    }

    .wrapper .content footer a {
        color: #999;
        text-decoration: none;
        font-size: 11px;
    }

    @media screen and (max-width: 720px) {
        .wrapper .content {
            padding-right: 0;
            padding-left: 0;
            margin: 0 10px;
        }
    }

    .login-btn {
        padding: 15px;
        width: 150px;
        border: unset;
        background: #020305;
        border-radius: 50px;
        color: #333;
        cursor: pointer;
        background-color: #3d3ec2;
        border: unset;
        color: #fff;
        align-self: center;
        margin-top: 15px;
        transition: background 0.5s;
        -webkit-transition: background 0.5s;
    }
</style> -->
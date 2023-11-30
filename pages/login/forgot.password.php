<?php
require '../../includes/conn.php';
session_start();

if (isset($_SESSION['role'])) {
    header("location: pages/dashboard/index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password | BED Taguig</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <a href="../../index2.html">
                    <!-- <img height="90" width="90" src="../../docs/assets/img/logo.png" alt="logo-signin"> -->
                    <h3><b>Saint Francis of Assisi College - Bacoor</b></h3>
                    <h5>Online Grade System</h5>
                </a>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-auto">
                            <img class="d-block mx-auto mt-3" src="../../docs/assets/img/logo.png" alt="logo-signin">
                        </div>
                        <div class="col-md">
                            <p class="login-box-msg">Enter your registered email address to retrieve a new password for
                                your account.</p>
                            <form action="userData/ctrl.forgot.password.php" method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="Username">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <button type="submit" name="submit" class="btn btn-danger btn-block">Submit</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <p class="mb-1">
                                    <a href="login.php">Log in</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>


                <p class="mb-0">
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- alert -->


    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="../../plugins/toastr/toastr.min.js"></script>

    <?php
    if (isset($_SESSION['email_error'])) {
        echo "<script>
    $(function() {
      toastr.error('Email is incorrect.','Error')
    });
    </script>";
    } elseif (isset($_SESSION['email_success'])) {
        echo "<script>
    $(function() {
      toastr.success('Password reset confirmation has sent to your email.','Success')
    });
    </script>";
    }
    session_destroy();

    ?>

</body>

</html>
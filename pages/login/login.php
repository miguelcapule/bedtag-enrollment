<?php
require '../../includes/conn.php';
ob_start();
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
  <title>Log In | BED Taguig</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
  <div class="card card-danger">
    <div class="card-header bg-danger text-center">
      
            <img class="mb-2" height="90" width="90" src="../../docs/assets/img/logo.png" alt="logo-signin">
            <h3><b>Saint Francis of Assisi College - Taguig</b></h3>
            <h5><b>BED Enrollment</b> System</h5>
     
    </div>
    <div class="card-body">
      <div class="container">
        <div class="row">
          <!-- <div class="col-auto">
             <a href="https://www.stfrancislp.com/">
                 <img class="d-block mx-auto mt-3" src="../../docs/assets/img/logo.png" alt="logo-signin">
             </a>
          </div> -->
          <div class="col-md-8 mx-auto">
            <p class="login-box-msg">Sign in to your account.</p>
            <form action="userData/ctrl.login.php" method="POST">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <button type="submit" name="submit" class="btn btn-danger btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
              <p class="mb-1">
                <a href="forgot.password.php">I forgot my password</a>
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
if (isset($_SESSION['password_incorrect'])) {
  echo "<script>
    $(function() {
      toastr.error('Password is incorrect.','Error')
    });
    </script>";
} elseif (isset($_SESSION['username_incorrect'])) {
  echo "<script>
    $(function() {
      toastr.error('Username is incorrect.','Error')
    });
    </script>";
}
session_destroy();

?>

</body>
</html>

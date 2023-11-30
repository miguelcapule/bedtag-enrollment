<?php
require '../../includes/session.php';

$teacher_id = $_GET['teacher_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Teacher | BED Taguig</title>

    <?php include '../../includes/links.php'; ?>

</head>

<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include '../../includes/navbar.php' ?>

        <?php include '../../includes/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Teacher</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"></a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <form action="userData/ctrl.edit.teacher.php?teacher_id=<?php echo $teacher_id;?>" enctype="multipart/form-data" method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">Teacher Info</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <?php
                                        $teacher_info = mysqli_query($conn, "SELECT * FROM tbl_teachers WHERE teacher_id = '$teacher_id'");
                                        while ($row = mysqli_fetch_array($teacher_info)) {
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group mb-4">
                                            <div class="custom-file">
                                                <div class="text-center">
                                                    <img class="img-fluid img-bordered img-circle p-1"
                                                        src="data:image/jpeg;base64, <?php echo base64_encode($row['img']); ?> "
                                                        alt="User profile picture" style="width: 145px; height: 145px; margin-bottom: 10px;">
                                                </div>
                                                <div class="row">
                                                    <div class="form-group mr-auto ml-auto col-md-6">
                                                        <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="image" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button type="submit" name="upload"
                                                            class="btn bg-primary btn-default input-group-text">
                                                            Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mt-5">
                                            <div class="input-group col-sm-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="firstname"
                                                    value="<?php echo $row['teacher_fname']?>" placeholder="First name">
                                            </div>


                                            <div class="input-group col-sm-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="lastname"
                                                    value="<?php echo $row['teacher_lname']?>" placeholder="Last name">
                                            </div>

                                            <div class="input-group col-sm-4 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="midname"
                                                    value="<?php echo $row['teacher_mname']?>" placeholder="Middle name">
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <div class="input-group col-sm-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" name="email"
                                                    value="<?php echo $row['email']?>" placeholder="Email Address" required>
                                            </div>

                                            <div class="input-group col-sm-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="username"
                                                    value="<?php echo $row['username']?>" placeholder="Username" required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <div class="input-group col-sm-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password">
                                            </div>


                                            <div class="input-group col-sm-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" name="password2"
                                                    placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm float-right ml-2"
                                            name="submit">Submit
                                            </button>
                                    </div>
                                </form>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include '../../includes/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include '../../includes/script.php'; ?>
</body>

</html>
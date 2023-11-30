<?php
require '../../includes/session.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student's Curriculum | BED Taguig</title>

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
                            <h1 class="m-0">Student's Curriculum</h1>
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
                                <form method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">Select Student</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Student</label>
                                                    <select class="form-control select2" name="stud_id"
                                                        style="width: 100%;" required>
                                                        <option selected disabled>Select Student</option>
                                                        <?php
                                                        $stud_info = mysqli_query($conn, "SELECT stud_id, CONCAT(lastname, ', ', firstname, ' ', middlename) as fullname FROM tbl_students ORDER BY lastname ASC");
                                                        while ($row = mysqli_fetch_array($stud_info)) {
                                                            ?>
                                                            <option value="<?php echo $row['stud_id'] ?>"><?php echo $row['fullname'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm float-right ml-2"
                                            name="submit">Search
                                            Curriculum</button>
                                        <button type="submit" class="btn btn-primary btn-sm float-right"
                                            name="submit" value="empty">Search
                                            Empty Curriculum</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($_POST['submit'])) {
                                    $stud_id = $_POST['stud_id'];

                                    if ($_POST['submit'] != "empty") {
                                        header("location: ../forms/student.data.curriculum.php?stud_id=".$stud_id);

                                    } else {
                                        header("location: ../forms/student.empty.curriculum.php?stud_id=".$stud_id);

                                    }
                                }
                                ?>
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
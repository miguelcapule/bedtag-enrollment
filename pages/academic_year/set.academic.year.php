<?php
require '../../includes/session.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Set Semester and Academic Year | BED Taguig</title>

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
                            <h1 class="m-0">Set Semester and Academic Year</h1>
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
                        <div class="col-md-8">
                            <div class="card">
                                <form action="userData/ctrl.add.student.php" enctype="multipart/form-data" method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">Current Sem and A.Y. <b>(<?php echo $_SESSION['active_semester'] .', '. $_SESSION['active_acadyear']?>)</b></h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4 mt-4">
                                            <div class="input-group col-sm-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>Active Sem
                                                            </b></span>
                                                    </div>
                                                    <select class="form control select2 select2-purple custom-select"
                                                        data-placeholder="Select Semester"
                                                        data-dropdown-css-class="select2-purple" name="act_sem">
                                                        <option value="" disabled></option>
                                                        <?php $sltd_sem = mysqli_query($conn, "SELECT * FROM tbl_active_semesters LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_active_semesters.semester_id") or die(mysqli_error($conn));
                                                        while ($row1 = mysqli_fetch_array($sltd_sem)) {
                                                        ?>
                                                        <option value="<?php echo $row1['semester_id'];  ?>">
                                                            <?php echo $row1['semester'];
                                                                ?></option>
                                                        <?php $get_sem = mysqli_query($conn, "SELECT * FROM tbl_semesters WHERE semester_id NOT IN (" . $row1['semester_id'] . ")") or die(mysqli_error($conn));
                                                            while ($row = mysqli_fetch_array($get_sem)) {
                                                            ?>
                                                        <option value="<?php echo $row['semester_id']; ?>">
                                                            <?php echo $row['semester'];
                                                            }
                                                        } ?></option>
                                                    </select>
                                            </div>
                                            <div class="input-group col-sm-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>Active A.Y.
                                                            </b></span>
                                                    </div>
                                                    <select class="form-control select2 select2-purple custom-select"
                                                        name="act_acadyear"
                                                        data-placeholder="Select Active Academic Year"
                                                        data-dropdown-css-class="select2-purple" name="act_acadyear">
                                                        <option value="" disabled></option>
                                                        <?php $get_actacad = mysqli_query($conn, "SELECT * FROM tbl_active_acadyears LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_active_acadyears.ay_id") or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($get_actacad)) {
                                                        ?>
                                                        <option value="<?php echo $row['ay_id']; ?>">
                                                            <?php echo $row['academic_year']; ?></option>
                                                        <?php $get_acad = mysqli_query($conn, "SELECT * FROM tbl_acadyears WHERE  ay_id NOT IN (" . $row['ay_id'] . ")") or die(mysqli_error($conn));
                                                            while ($row2 = mysqli_fetch_array($get_acad)) {
                                                            ?>
                                                        <option value="<?php echo $row2['ay_id']; ?>">
                                                            <?php echo $row2['academic_year'];
                                                            }
                                                        } ?></option>

                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm float-right ml-2"
                                            name="submit">Submit
                                            </button>
                                    </div>
                                </form>
                                <!-- /.card-footer-->
                            </div>
                            <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage A.Y.</h3>
                                        <div class="card-tools">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                            name="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                <th>Academic Year</th>
                                                <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $ay_info = mysqli_query($conn, "SELECT * FROM tbl_acadyears");
                                                    while ($row = mysqli_fetch_array($ay_info)) {
                                                ?>
                                                <tr>
                                                <td><?php echo $row['academic_year']; ?></td>
                                                <td>
                                                    <a type="button" href="edit.teacher.php?ay_id=<?php echo $row['ay_id']; ?>" class="btn btn-primary btn-sm m-1">
                                                    Edit
                                                    </a>
                                                    <button class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#modal-md<?php echo $row['ay_id']; ?>">Delete</button>
                                                    
                                                </td>
                                                </tr>
                                                <!-- Modal for grade input -->
                                                <div class="modal fade" id="modal-md<?php echo $row['ay_id']; ?>">
                                                    <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h4 class="modal-title text-danger"><b>Delete Academic Year</b></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row justify-content-center">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <p>Are you sure you want to delete <b><?php echo strtoupper($row['academic_year']); ?></b>?</p>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <a href="userData/ctrl.del.teacher.php?ay_id=<?php echo $row['ay_id'];?>" type="submit" name="submit" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage Semester</h3>
                                        <div class="card-tools">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                            name="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="example3" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                <th>Semester</th>
                                                <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sem_info = mysqli_query($conn, "SELECT * FROM tbl_semesters");
                                                    while ($row = mysqli_fetch_array($sem_info)) {
                                                ?>
                                                <tr>
                                                <td><?php echo $row['semester']; ?></td>
                                                <td>
                                                    <a type="button" href="edit.teacher.php?semester_id=<?php echo $row['semester_id']; ?>" class="btn btn-primary btn-sm m-1">
                                                    Edit
                                                    </a>
                                                    <button class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#modal-md<?php echo $row['semester_id']; ?>">Delete</button>
                                                    
                                                </td>
                                                </tr>
                                                <!-- Modal for grade input -->
                                                <div class="modal fade" id="modal-md<?php echo $row['semester_id']; ?>">
                                                    <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h4 class="modal-title text-danger"><b>Delete Academic Year</b></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row justify-content-center">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <p>Are you sure you want to delete <b><?php echo strtoupper($row['semester']); ?></b>?</p>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <a href="userData/ctrl.del.teacher.php?semester_id=<?php echo $row['semester_id'];?>" type="submit" name="submit" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
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
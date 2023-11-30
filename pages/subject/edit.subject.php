<?php
require '../../includes/session.php';

$subject_id = $_GET['subject_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Subject | BED Taguig</title>

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
                            <h1 class="m-0">Edit Subject</h1>
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
                                <form action="userData/ctrl.edit.subject.php?subject_id=<?php echo $subject_id?>" enctype="multipart/form-data" method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">Subject Info</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <?php
                                    $subject_info = mysqli_query($conn, "SELECT * FROM tbl_subjects LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects.grade_level_id WHERE subject_id = '$subject_id'");
                                    while ($row = mysqli_fetch_array($subject_info)) {
                                    ?>
                                    <div class="card-body">
                                    <div class="row mb-4 mt-4 ">
                                        <div class="input-group col-md-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Code</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="subject_code"
                                                placeholder="Enter Subject Code" value="<?php echo $row['subject_code']?>" required>
                                        </div>


                                        <div class="input-group col-md-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Description</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="subject_description"
                                                placeholder="Enter Subject Description" value="<?php echo $row['subject_description']?>" required>
                                        </div>

                                    </div>
                                    <div class="row mb-4 mt-4 ">

                                        <div class="input-group col-md-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Grade Level</b></span>
                                            </div>
                                            <select class="form-control select2 select2-info custom-select"
                                                data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Grade Level" name="grade_level" required>
                                                <option value="<?php echo $row['grade_level_id']; ?>">
                                                    <?php echo $row['grade_level']; ?></option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_grade_levels WHERE grade_level_id NOT IN ('$row[grade_level_id]' ,15, 14)");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['grade_level_id'] . '">' . $row2['grade_level'] . '</option>';
                                                }
                                                ?>
                                            </select>
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
<?php
require '../../includes/session.php';

$subject_id = $_GET['subject_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit SHS Subject | BED Taguig</title>

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
                            <h1 class="m-0">Edit SHS Subject</h1>
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
                                <form action="userData/ctrl.edit.subject.senior.php?subject_id=<?php echo $subject_id;?>" enctype="multipart/form-data" method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">SHS Subject Info</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <?php
                                    $subect_info = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior 
                                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
                                    LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
                                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
                                    LEFT JOIN tbl_efacadyears ON tbl_efacadyears.efacadyear_id = tbl_subjects_senior.efacadyear_id
                                    WHERE subject_id = '$subject_id'");
        
                                    while ($row = mysqli_fetch_array($subect_info)) {
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


                                    <div class="row mb-4 ">

                                        <div class="input-group col-md-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Lecture Unit(s)</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="lec_units"
                                                placeholder="Enter No. of Unit(s)"  value="<?php echo $row['lec_units']?>">
                                        </div>

                                        <div class="input-group col-md-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Laboratory Unit(s)</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="lab_units"
                                                placeholder="Enter No. of Unit(s)"  value="<?php echo $row['lab_units']?>">
                                        </div>

                                        <div class="input-group col-md-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Total Unit(s)</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="total_units"
                                                placeholder="Enter Total Unit(s)"  value="<?php echo $row['total_units']?>">
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">

                                        <div class="input-group col-md-7 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Pre-Requisites</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="prerequisites"
                                                placeholder="Enter Pre-Requisites" value="<?php echo $row['pre_requisites']?>">
                                        </div>

                                        <div class="input-group col-md-5 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>E.A.Y</b></span>
                                            </div>
                                            <select class="form-control select2 select2-info custom-select"
                                                data-dropdown-css-class="select2-info"
                                                data-placeholder="Effective Academic" name="eay" required>
                                                <option selected value="<?php echo $row['efacadyear_id']; ?>">
                                                    <?php echo $row['efacadyear']; ?></option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear_id NOT IN ('$row[efacadyear_id]') ");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['efacadyear_id'] . '">' . $row2['efacadyear'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row mb-4 mt-4 ">

                                        <div class="input-group col-md-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Semester</b></span>
                                            </div>
                                            <select class="form-control select2 select2-info custom-select"
                                                data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Semester" name="semester" required>
                                                <option selected value="<?php echo $row['semester_id']; ?>">
                                                    <?php echo $row['semester']; ?></option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_semesters WHERE semester_id NOT IN ('$row[semester_id]')");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['semester_id'] . '">' . $row2['semester'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="input-group col-md-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Grade Level</b></span>
                                            </div>
                                            <select class="form-control select2 select2-info custom-select"
                                                data-dropdown-css-class="select2-info"
                                                data-placeholder="Select Grade Level" name="grade_level" required>
                                                <option value="<?php echo $row['grade_level_id']; ?>">
                                                    <?php echo $row['grade_level']; ?></option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_grade_levels WHERE grade_level_id NOT IN ('$row[grade_level_id]') LIMIT 13, 2");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['grade_level_id'] . '">' . $row2['grade_level'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="input-group col-md-4 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Strand</b></span>
                                            </div>
                                            <select class="form-control select2 select2-info custom-select"
                                                data-dropdown-css-class="select2-info" data-placeholder="Select Strand"
                                                name="strand_name" required>
                                                <option value="<?php echo $row['strand_id'] ?>">
                                                    <?php echo $row['strand_name'] ?></option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * from tbl_strands WHERE strand_id NOT IN ('$row[strand_id]')");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['strand_id'] . '">' . $row2['strand_name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                            }
                                        ?>
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
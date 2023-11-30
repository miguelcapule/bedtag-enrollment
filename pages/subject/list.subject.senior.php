<?php
require '../../includes/session.php';

if (isset($_POST['grade_level'])) {
    $grade_level = $_POST['grade_level'];
} else {
    $grade_level = 'Grade 11';
}

if (isset($_POST['strand_name'])) {
    $strand_name = $_POST['strand_name'];
} else {
    $strand_name = 'ABM';
}

if (isset($_POST['eay'])) {
    $eay = $_POST['eay'];
} else {
    $eay = 6;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SHS Subject List | BED Taguig</title>

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
              <h1 class="m-0">SHS Subject List</h1>
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
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">SHS Subject List for <b><?php echo $grade_level .' - '. $strand_name?></b></h3>
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <form method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control select2 select2-info custom-select" data-dropdown-css-class="select2-info" data-placeholder="Select Grade Level" name="grade_level" required>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * from tbl_grade_levels WHERE grade_level = '$grade_level'");
                                    while ($row2 = mysqli_fetch_array($query)) {
                                        echo '<option selected value="' . $row2['grade_level'] . '">' . $row2['grade_level'] . '</option>';
                                    }
                                    ?>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * from tbl_grade_levels WHERE grade_level NOT IN ('$grade_level') LIMIT 13, 2");
                                    while ($row2 = mysqli_fetch_array($query)) {
                                        echo '<option value="' . $row2['grade_level'] . '">' . $row2['grade_level'] . '</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control select2 select2-info custom-select" data-dropdown-css-class="select2-info" data-placeholder="Select Strand" name="strand_name" required>
                                <?php
                                $query = mysqli_query($conn, "SELECT * from tbl_strands WHERE strand_name = '$strand_name'");
                                while ($row2 = mysqli_fetch_array($query)) {
                                    echo '<option selected value="' . $row2['strand_name'] . '">' . $row2['strand_name'] . '</option>';
                                }
                                ?>
                                <?php
                                $query = mysqli_query($conn, "SELECT * from tbl_strands WHERE strand_name NOT IN ('$strand_name')");
                                while ($row2 = mysqli_fetch_array($query)) {
                                    echo '<option value="' . $row2['strand_name'] . '">' . $row2['strand_name'] . '</option>';
                                }
                                ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <select class="form-control select2 select2-info custom-select"
                                                data-dropdown-css-class="select2-info"
                                                data-placeholder="Effective Academic" name="eay" required>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear_id = '$eay'");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option selected value="' . $row2['efacadyear_id'] . '">' . $row2['efacadyear'] . '</option>';
                                                }
                                                ?>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM tbl_efacadyears WHERE efacadyear_id NOT IN ('$eay')");
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $row2['efacadyear_id'] . '">' . $row2['efacadyear'] . '</option>';
                                                }
                                                ?>
                                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
          </div>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Pre-Requisites</th>
                    <th>Grade Level</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $get_subjects = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior
                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
                    LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
                    LEFT JOIN tbl_efacadyears ON tbl_efacadyears.efacadyear_id = tbl_subjects_senior.efacadyear_id
                    WHERE tbl_grade_levels.grade_level IN ('$grade_level') AND tbl_strands.strand_name IN ('$strand_name') AND tbl_efacadyears.efacadyear_id IN ('$eay') ORDER BY tbl_subjects_senior.semester_id ASC, subject_id") or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($get_subjects)) {
                ?>
                <tr>
                    <td><?php echo $row['subject_code']; ?></td>
                    <td><?php echo $row['subject_description']; ?></td>
                    <td><?php echo $row['total_units']; ?></td>
                    <td><?php echo $row['pre_requisites']; ?></td>
                    <td><?php echo $row['grade_level']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                  <td>
                    <a type="button" href="edit.subject.senior.php?subject_id=<?php echo $row['subject_id']; ?>" class="btn btn-primary btn-sm m-1">
                      Edit
                    </a>
                    <button class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#modal-md<?php echo $row['subject_id']; ?>">Delete</button>
                    
                  </td>
                </tr>
                <!-- Modal for grade input -->
                <div class="modal fade" id="modal-md<?php echo $row['subject_id']; ?>">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title text-danger"><b>Delete Subject</b></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            <div class="row justify-content-center">
                              <div class="col-sm-12">
                                <div class="form-group">
                                    <p>Are you sure you want to delete <b><?php echo $row['subject_code'] .' '. $row['subject_description']; ?></b>?</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="userData/ctrl.del.subject.senior.php?subject_id=<?php echo $row['subject_id'];?>" type="submit" name="submit" class="btn btn-danger">Delete</a>
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
          <!-- /.card-body -->
          <div class="card-footer"></div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

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
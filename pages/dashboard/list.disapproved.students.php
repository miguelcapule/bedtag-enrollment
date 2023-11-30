<?php

require '../../includes/conn.php';
session_start();
ob_start();

require '../../includes/session.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Disapproved Students List | BED Taguig</title>

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
              <h1 class="m-0">Disapproved Students List</h1>
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
            <h3 class="card-title">Disapproved Students List</h3>
            <div class="card-tools">
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-md">Set Payment Status</button> -->
            </div>
          </div>
          <div class="card-body">
            <form method="GET">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search student">
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
                  <th>Image</th>
                  <th>Student ID</th>
                  <th>Fullname</th>
                  <th>Grade Level</th>
                  <th>Student Type</th>
                  <th>Date Applied</th>
                  <th>Remark</th>
                  <th>Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['search'])) {
                    $search = addslashes($_GET['search']);

                    $student_info = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname)  as fullname
                    FROM tbl_schoolyears 
                    LEFT JOIN tbl_students ON tbl_students.student_id = tbl_schoolyears.student_id
                    LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_schoolyears.strand_id
                    LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_schoolyears.grade_level_id
                    LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_schoolyears.semester_id
                    LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_schoolyears.ay_id
                    WHERE tbl_schoolyears.ay_id = '$_SESSION[active_acadyear_id]'
                    AND (tbl_schoolyears.semester_id = '$_SESSION[active_semester_id]' OR tbl_schoolyears.semester_id = '0')
                    AND (remark = 'Disapproved')
                    AND (student_fname LIKE '%$search%'
                    OR student_mname LIKE '%$search%'
                    OR student_lname LIKE '%$search%'
                    OR strand_name LIKE '%$search%'
                    OR strand_def LIKE '%$search%'
                    OR grade_level LIKE '%$search%'
                    OR stud_no LIKE '%$search%')
                    ORDER BY sy_id DESC");

                    while ($row = mysqli_fetch_array($student_info))  {
                ?>
                <tr>
                  <td>
                    <?php
                      if (!empty(base64_encode($row['img']))) {
                        echo '<img src="data:image/jpeg;base64,'  . base64_encode($row['img']) . '" class="img zoom " alt="User image" style="height: 80px; width: 100px">';
                      } else {
                        echo ' <img src="../../docs/assets/img/user.png" class="img zoom" alt="User image"  style="height: 80px; width: 100px">';
                      } ?>
                  </td>
                  <td><?php echo $row['stud_no']?></td>
                  <td><?php echo $row['fullname']?></td>
                  <td>
                    <?php
                      if (empty($row['strand_name'])) {
                    ?>
                      <?php echo $row['grade_level']?>
                    <?php
                      } else {
                      ?>
                        <?php echo $row['grade_level'] .' - '. $row['strand_name']?>
                      <?php
                      }
                    ?>
                    
                  </td>
                  <td><?php echo $row['stud_type']?></td>
                  <td><?php echo $row['date_enrolled']?></td>
                  <td><?php echo $row['remark']?></td>
                  <td>
                    <form method="POST" action="userData/ctrl.edit.enrolled.students.php?sy_id=<?php echo $row['sy_id']?>&search=<?php echo $search;?>">
                    <?php
                      if ($_SESSION['role'] == 'Registrar') {
                        if ($row['remark'] == 'Confirmed' || $row['remark'] == 'Disapproved') {
                          ?>
                            <button name="submit" value="Approved" type="submit" class="btn btn-success btn-sm m-1">Approve</button>
                          <?php
                        } else {
                          ?>
                            <button name="submit" value="Disapproved" type="submit" class="btn btn-danger btn-sm m-1">Disapprove</button>
                          <?php
                        }
                      } elseif (($_SESSION['role'] == 'Admission')) {
                        if ($row['remark'] == 'Pending' || $row['remark'] == 'Canceled') {
                          ?>
                            <button name="submit" value="Confirmed" type="submit" class="btn btn-success btn-sm m-1">Confirm</button>
                          <?php
                        } else {
                          ?>
                            <button name="submit" value="Canceled" type="submit" class="btn btn-danger btn-sm m-1">Cancel</button>
                          <?php
                        }
                      }
                    ?>
                    
                    <a href="" class="btn btn-info btn-sm m-1">Update</a>
                    <a href="" class="btn btn-info btn-sm m-1">Subjects</a>
                    <button type="button" class="btn btn-primary btn-sm m-1" data-toggle="dropdown">
                      Forms
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="../forms/pre-en-data.php?student_id=<?php echo $row['student_id']?>">Pre-Enrollment</a></li>
                      <li class="dropdown-item"><a href="../forms/student.data.curriculum.php?student_id=<?php echo $row['student_id']?>">Curriculum w/ data</a></li>
                      <li class="dropdown-divider"></li>
                      <li class="dropdown-item"><a href="../forms/student.permanent.record.php?student_id=<?php echo $row['student_id']?>">Permanent Record</a></li>
                      <li class="dropdown-item"><a href="../grade/summary.grade.php?student_id=<?php echo $row['student_id']?>">Summary of Grade</a></li>
                    </ul>
                    </form>
                  </td>
                </tr>
                <!-- Modal for grade input -->
                <div class="modal fade" id="modal-md<?php echo $row['student_id']; ?>">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Select Payment Status for <b>
                              <?php echo strtoupper($row['fullname']); ?>
                            </b></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="userData/ctrl.edit.student.php?student_id=<?php echo $row['student_id']?>"
                          method="POST">
                          <div class="modal-body">
                            <div class="row justify-content-center">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>Payment Status</label>
                                  <select class="form-control select2" name="status">
                                    <option selected><?php echo $row['accounting_status']?></option>
                                    <?php
                                    if ($row['accounting_status'] == "Paid") {
                                    ?>
                                    <option>Unpaid</option>
                                    <?php
                                    } else {
                                    ?>
                                    <option>Paid</option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php
                }}
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
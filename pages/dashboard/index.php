<?php
require '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | BED Taguig</title>

  <?php include '../../includes/links.php'; ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
              <h1 class="m-0">Dashboard</h1>
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
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-md">
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <?php
                        $total_stud = mysqli_query($conn, "SELECT * FROM tbl_schoolyears WHERE remark = 'Approved' AND ay_id = '$_SESSION[active_acadyear_id]' AND semester_id IN ('$_SESSION[active_semester_id]', '0')");
                        $total = mysqli_num_rows($total_stud);
                        ?>
                        <h3>
                          <?php echo $total; ?>
                        </h3>

                        <p>Enrolled Students</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-check"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Super Administrator" || $_SESSION['role']== "Registrar" || $_SESSION['role']== "Principal" || $_SESSION['role']== "Accounting" || $_SESSION['role']== "Admission" || $_SESSION['role']== "Adviser" || $_SESSION['role']== "Teacher" ? "../dashboard/list.enrolled.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <?php
                        $pending_stud = mysqli_query($conn, "SELECT * FROM tbl_schoolyears WHERE remark = 'Pending' AND ay_id = '$_SESSION[active_acadyear_id]' AND semester_id IN ('$_SESSION[active_semester_id]', '0')");
                        $total = mysqli_num_rows($pending_stud);
                        ?>
                        <h3>
                          <?php echo $total; ?>
                        </h3>

                        <p>Pending Students</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Super Administrator" || $_SESSION['role']== "Registrar" || $_SESSION['role']== "Principal" || $_SESSION['role']== "Accounting" || $_SESSION['role']== "Admission" || $_SESSION['role']== "Adviser" || $_SESSION['role']== "Teacher" ? "../dashboard/list.pending.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                      <div class="inner">
                        <?php
                        $new_stud = mysqli_query($conn, "SELECT * FROM tbl_schoolyears WHERE remark = 'Approved' AND stud_type = 'New' AND ay_id = '$_SESSION[active_acadyear_id]' AND semester_id IN ('$_SESSION[active_semester_id]', '0')");
                        $total = mysqli_num_rows($new_stud);
                        ?>
                        <h3>
                          <?php echo $total; ?>
                        </h3>

                        <p>New Students</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Super Administrator" || $_SESSION['role']== "Registrar" || $_SESSION['role']== "Principal" || $_SESSION['role']== "Accounting" || $_SESSION['role']== "Admission" || $_SESSION['role']== "Adviser" || $_SESSION['role']== "Teacher" ? "../dashboard/list.new.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <?php
                        $old_stud = mysqli_query($conn, "SELECT * FROM tbl_schoolyears WHERE remark = 'Approved' AND stud_type = 'Old' AND ay_id = '$_SESSION[active_acadyear_id]' AND semester_id IN ('$_SESSION[active_semester_id]', '0')");
                        $total = mysqli_num_rows($old_stud);
                        ?>
                        <h3>
                          <?php echo $total; ?>
                        </h3>

                        <p>Old Students</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Super Administrator" || $_SESSION['role']== "Registrar" || $_SESSION['role']== "Principal" || $_SESSION['role']== "Accounting" || $_SESSION['role']== "Admission" || $_SESSION['role']== "Adviser" || $_SESSION['role']== "Teacher" ? "../dashboard/list.old.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <?php
                        $total_stud = mysqli_query($conn, "SELECT * FROM tbl_schoolyears WHERE remark = 'Disapproved' AND ay_id = '$_SESSION[active_acadyear_id]' AND semester_id IN ('$_SESSION[active_semester_id]', '0')");
                        $total = mysqli_num_rows($total_stud);
                        ?>
                        <h3>
                          <?php echo $total; ?>
                        </h3>

                        <p>Disapproved Students</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-times"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Super Administrator" || $_SESSION['role']== "Registrar" || $_SESSION['role']== "Principal" || $_SESSION['role']== "Accounting" || $_SESSION['role']== "Admission" || $_SESSION['role']== "Adviser" || $_SESSION['role']== "Teacher" ? "../dashboard/list.disapproved.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                      <div class="inner">
                        <?php
                        $total_stud = mysqli_query($conn, "SELECT * FROM tbl_schoolyears WHERE remark = 'Disapproved' AND ay_id = '$_SESSION[active_acadyear_id]' AND semester_id IN ('$_SESSION[active_semester_id]', '0')");
                        $total = mysqli_num_rows($total_stud);
                        ?>
                        <h3>
                          <?php echo $total; ?>
                        </h3>

                        <p>Online Inquiries</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-globe"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Super Administrator" || $_SESSION['role']== "Registrar" || $_SESSION['role']== "Principal" || $_SESSION['role']== "Accounting" || $_SESSION['role']== "Admission" || $_SESSION['role']== "Adviser" || $_SESSION['role']== "Teacher" ? "../dashboard/online.inquiries.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
              </div>
          </div>
          <?php
          if ($_SESSION['role'] == "Student1") {
          ?>
          <div class="row">
          <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-info">
                        <?php
                        $student_info = mysqli_query($conn, "SELECT *, CONCAT(lastname, ', ', firstname, ' ', middlename) AS fullname FROM tbl_students
                        LEFT JOIN tbl_schoolyears ON tbl_schoolyears.stud_id = tbl_students.stud_id
                        LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                        LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
                        WHERE semester_id IN ('$_SESSION[active_semester_id]', '0')
                        AND ay_id = '$_SESSION[active_acadyear_id]'
                        AND tbl_students.stud_id = '$_SESSION[id]'");

                        $row = mysqli_fetch_array($student_info);

                        ?>
                        <h3 class="widget-user-username">
                          <?php echo $row['fullname'] ?>
                        </h3>
                        <h5 class="widget-user-desc">
                          <?php echo $row['course_abv'] .' - '. $row['year_abv']?>
                        </h5>
                      </div>
                      <div class="widget-user-image">
                        <?php
                        if (!empty($row['img'])) {
                        ?>
                        <img class="img-circle elevation-2" style="width: 95px; height: 95px;" src="data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>" alt="User Avatar">
                        <?php
                        } else {
                        ?>
                        <img class="img-circle elevation-2" style="width: 95px; height: 95px;" src="../../docs/assets/img/user.png" alt="User Avatar">
                        <?php
                        }
                        ?>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <?php
                              $enrolled_subj = mysqli_query($conn, "SELECT * FROM tbl_enrolled_subjects WHERE stud_id = '$_SESSION[id]' AND acad_year = '$_SESSION[active_acadyear_id]' AND semester = '$_SESSION[active_semester_id]'");
                              $total = mysqli_num_rows($enrolled_subj);
                              ?>
                              <h5 class="description-header">
                                <?php echo $total; ?>
                              </h5>
                              <span class="description-text">Subjects</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <?php
                              $sum = 0;
                              $sum1 = 0;
                              $i = 0;
                              while ($row = mysqli_fetch_array($enrolled_subj)) {
                                $sum = $row['ofgrade'] + $sum;
                                $sum1 = $row['numgrade'] + $sum1;
                                $i++;
                              }
                              $gwa = number_format($sum / $i, 2, '.', '');
                              $gwa1 = number_format($sum1 / $i, 2, '.', '');
                              ?>
                              <h5 class="description-header">
                                <?php echo $gwa1; ?>
                              </h5>
                              <span class="description-text">GWA</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4">
                            <div class="description-block">
                              <?php
                              if ($gwa <= 74) {
                                $remark = "Failed";
                                $color = "danger";

                              } else {
                                $remark = "Passed";
                                $color = "success";

                              }
                              ?>
                              <h5 class="description-header text-<?php echo $color ?>"><b>
                                  <?php echo $remark ?>
                                </b></h5>
                              <span class="description-text">Remark</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                </div>
              </div>
          </div>
          <?php } ?>

          <!-- /.row -->
          <!-- Main row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
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
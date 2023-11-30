<?php
require '../../includes/session.php';

if (isset($_GET['stud_id'])) {
    $stud_id = $_GET['stud_id'];
} else {
  $stud_id = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student's Summary Grade | BED Taguig</title>

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
              <h1 class="m-0">Summary of Grade</h1>
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
            <?php
            $student_info = mysqli_query($conn, "SELECT CONCAT(lastname, ', ' , firstname , ' ', middlename) AS fullname FROM tbl_students WHERE stud_id = '$stud_id'");
            $row = mysqli_fetch_array($student_info);
            ?>
            <h3 class="card-title"><b><?php echo $row['fullname']; ?>'s</b> Grade for <b><?php echo $_SESSION['active_acadyear']?></b></h3>

              <div class="card-tools">
              </div>
          </div>
          <div class="card-body">
            <table id="example3" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Subject Code</th>
                  <th>Subject Description</th>
                  <th>Prelim</th>
                  <th>Midterm</th>
                  <th>Finalterm</th>
                  <th>Numerical Grade</th>
                  <th>Final Grade</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sy_info = mysqli_query($conn, "SELECT * FROM tbl_schoolyears
                LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                LEFT JOIN tbl_semesters ON tbl_schoolyears.sem_id = tbl_semesters.semester
                LEFT JOIN tbl_year_levels ON tbl_schoolyears.year_id = tbl_year_levels.year_id 
                WHERE stud_id = '$stud_id'
                ORDER BY tbl_year_levels.year_id ASC, tbl_semesters.sem_id ASC");
                while ($row = mysqli_fetch_array($sy_info)) {

                ?>
                <tr>
                  <td><b><?php echo $row['year_level'].' - '. $row['semester']?></b></td>
                  <td><b><?php echo $row['course']?></b></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <?php
                    $enrolled_subjects = mysqli_query($conn, "SELECT * FROM tbl_enrolled_subjects
                    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
                    LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
                    WHERE tbl_enrolled_subjects.stud_id = '$stud_id' AND tbl_subjects_new.course_id = '$row[course_id]' AND acad_year = '$row[ay_id]' AND semester = '$row[semester]'");

                    while ($row2 = mysqli_fetch_array($enrolled_subjects)) {

                      $faculty_info = mysqli_query($conn, "SELECT *, CONCAT(faculty_lastname, ', ', faculty_firstname, ' ', faculty_middlename) AS faculty_name FROM tbl_faculties_staff
                      LEFT JOIN tbl_schedules ON tbl_schedules.faculty_id = tbl_faculties_staff.faculty_id WHERE class_id = '$row2[class_id]'");

                      $row3 = mysqli_fetch_array($faculty_info);
                ?>
                
                <tr>
                  <td><?php echo $row2['subj_code']?></td>
                  <td><?php echo $row2['subj_desc']?><br>Instructor: <?php echo $row3['faculty_name']?></td>
                  <?php
                  if ($_SESSION['role'] == "Student" && $row['accounting_status'] == "Unpaid") {
                  ?>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <?php
                  } else {
                  ?>
                  <td><?php echo $row2['prelim']?></td>
                  <td><?php echo $row2['midterm']?></td>
                  <td><?php echo $row2['finalterm']?></td>
                  <td><?php echo $row2['numgrade']?></td>
                  <td><?php echo $row2['ofgrade']?></td>
                </tr>
                <?php
                  }
                    }
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
<?php
require '../../includes/session.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Inquiries | BED Taguig</title>

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
              <h1 class="m-0">Online Inquiries</h1>
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
            <h3 class="card-title">Online Inquiries</h3>
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
                  <th>Email</th>
                  <th>Date Applied</th>
                  <th>Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['search'])) {
                    $search = addslashes($_GET['search']);

                    $student_info = mysqli_query($conn, "SELECT *, CONCAT(tbl_students.student_lname, ', ', tbl_students.student_fname, ' ', tbl_students.student_mname)  as fullname
                    FROM tbl_students
                    WHERE (student_fname LIKE '%$search%'
                    OR student_mname LIKE '%$search%'
                    OR student_lname LIKE '%$search%'
                    OR stud_no LIKE '%$search%')
                    ORDER BY student_lname");

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
                  <td><?php echo $row['email']?></td>
                  <td><?php echo $row['date_ap']?></td>
                  <td>
                    <a href="edit.student.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-info btn-sm m-1">Update</a>
                    <button class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#modal-md<?php echo $row['student_id']; ?>">Delete</button>
                  </td>
                </tr>
                <!-- Modal for grade input -->
                <!-- Modal for grade input -->
                <div class="modal fade" id="modal-md<?php echo $row['student_id']; ?>">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title text-danger"><b>Delete User</b></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            <div class="row justify-content-center">
                              <div class="col-sm-12">
                                <div class="form-group">
                                    <p>Are you sure you want to delete <b><?php echo strtoupper($row['fullname']); ?></b>?</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="userData/ctrl.del.student.php?student_id=<?php echo $row['student_id'];?>" type="submit" name="submit" class="btn btn-danger">Delete</a>
                          </div>
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
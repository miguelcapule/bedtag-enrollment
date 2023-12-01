<?php
require '../../includes/session.php';

$strand_id = $_GET['strand_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Strand | BED Taguig</title>

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
                            <h1 class="m-0">Edit Strand</h1>
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
                                <form action="userData/ctrl.edit.strand.php?strand_id=<?php echo $strand_id?>" enctype="multipart/form-data" method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">Strand Info</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <?php
                                    $strand_info = mysqli_query($conn, "SELECT * FROM tbl_strands WHERE strand_id = '$strand_id'");
                                    while ($row = mysqli_fetch_array($strand_info)) {
                                    ?>
                                    <div class="card-body">
                                    <div class="row mb-4 mt-4 ">
                                        <div class="input-group col-md-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Strand Name</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="strand_name"
                                                placeholder="Enter Strand Name" value="<?php echo $row['strand_name']?>" required>
                                        </div>


                                        <div class="input-group col-md-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>Strand Description</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="strand_description"
                                                placeholder="Enter Strand Description" value="<?php echo $row['strand_def']?>" required>
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
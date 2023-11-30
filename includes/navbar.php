<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-danger navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <?php
    if ($_SESSION['role'] == "Super Administrator") {
        $sa_info = mysqli_query($conn, "SELECT * FROM tbl_master_key WHERE mk_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($sa_info);

    } elseif ($_SESSION['role'] == "Registrar") {
        $registrar_info = mysqli_query($conn, "SELECT * FROM tbl_registrars WHERE reg_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($registrar_info);

    } elseif ($_SESSION['role'] == "Principal") {
        $principal_info = mysqli_query($conn, "SELECT * FROM tbl_principals WHERE prin_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($principal_info);

    } elseif ($_SESSION['role'] == "Accounting") {
        $accounting_info = mysqli_query($conn, "SELECT * FROM tbl_accountings WHERE acc_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($accounting_info);

    } elseif ($_SESSION['role'] == "Admission") {
        $admission_info = mysqli_query($conn, "SELECT * FROM tbl_admissions WHERE admission_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($admission_info);

    } elseif ($_SESSION['role'] == "Teacher") {
        $teacher_info = mysqli_query($conn, "SELECT * FROM tbl_teachers WHERE teacher_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($teacher_info);

    } elseif ($_SESSION['role'] == "Adviser") {
        $adviser_info = mysqli_query($conn, "SELECT * FROM tbl_adviser WHERE ad_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($adviser_info);

    } elseif ($_SESSION['role'] == "Student") {
        $student_info = mysqli_query($conn, "SELECT * FROM tbl_students WHERE student_id = '$_SESSION[id]'");
        $row = mysqli_fetch_array($student_info);

    }

    ?>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img style="width: 30px; height: 30px;" src="data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>" class="user-image img-circle img-size-32">
                <span class="badge badge-warning navbar-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <div class="dropdown-item">
                    <div class="media">
                        <?php
                        if (!empty($row['img'])) {
                        ?>
                        <img style="width: 50px; height: 50px;" src="data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <?php
                        } else {
                        ?>
                        <img style="width: 50px; height: 50px;" src="../../docs/assets/img/user.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <?php
                        }
                        ?>
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            <b>
                                <?php echo $_SESSION['name']; ?>
                            </b>
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm"><?php echo $row['email']?></p>
                        <p class="text-sm text-muted"><i class="far fa-user mr-1"></i><?php echo $row['username']?></p>
                    </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="../user/edit.account.php" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Edit Account
                </a>
                <div class="dropdown-divider"></div>
                <a href="../login/userData/ctrl.logout.php" class="dropdown-item dropdown-footer"><b>Log Out</b></a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
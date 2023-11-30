<?php
include '../../../includes/conn.php';
ob_start();
session_start();

//check users
if (isset($_POST['submit']) || isset($_SESSION['update_success'])) {

    if (isset($_SESSION['update_success'])) {
        $username = $_SESSION['username'];
        unset($_SESSION['username']);
        $password = $_SESSION['password'];
        unset($_SESSION['password']);

        unset($_SESSION['email']);

    } else {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    $master_key = mysqli_query($conn, "SELECT * FROM tbl_master_key WHERE username = '$username'");
    $numrow_mk = mysqli_num_rows($master_key);
    
    $registrar = mysqli_query($conn, "SELECT * FROM tbl_registrars WHERE username = '$username'");
    $numrow_reg = mysqli_num_rows($registrar);
    
    $principal = mysqli_query($conn, "SELECT * FROM tbl_principals WHERE username = '$username'");
    $numrow_prin = mysqli_num_rows($principal);
    
    $accounting = mysqli_query($conn, "SELECT * FROM tbl_accountings WHERE username = '$username'");
    $numrow_acc = mysqli_num_rows($accounting);
    
    $admission = mysqli_query($conn, "SELECT * FROM tbl_admissions WHERE username = '$username'");
    $numrow_admission = mysqli_num_rows($admission);
    
    $teacher = mysqli_query($conn, "SELECT * FROM tbl_teachers WHERE username = '$username'");
    $numrow_teacher = mysqli_num_rows($teacher);
    
    $adviser = mysqli_query($conn, "SELECT * FROM tbl_adviser WHERE username = '$username'");
    $numrow_adviser = mysqli_num_rows($adviser);
    
    $student = mysqli_query($conn, "SELECT * FROM tbl_students WHERE username = '$username'");
    $numrow_student = mysqli_num_rows($student);

    if ($numrow_mk > 0) {
        $row = mysqli_fetch_array($master_key);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Super Administrator";
            $_SESSION['id'] = $row['mk_id'];
            $_SESSION['name'] = $row['name'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }
    } elseif ($numrow_reg > 0) {
        $row = mysqli_fetch_array($registrar);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Registrar";
            $_SESSION['id'] = $row['reg_id'];
            $_SESSION['name'] = $row['reg_lname'] . ", " . $row['reg_fname'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }

    } elseif ($numrow_prin > 0) {
        $row = mysqli_fetch_array($principal);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Principal";
            $_SESSION['id'] = $row['prin_id'];
            $_SESSION['name'] = $row['prin_lname'] . ", " . $row['prin_fname'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }

    } elseif ($numrow_acc > 0) {
        $row = mysqli_fetch_array($accounting);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Accounting";
            $_SESSION['id'] = $row['acc_id'];
            $_SESSION['name'] = $row['accounting_lname'] . ", " . $row['accounting_fname'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }

    } elseif ($numrow_admission > 0) {
        $row = mysqli_fetch_array($admission);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Admission";
            $_SESSION['id'] = $row['admission_id'];
            $_SESSION['name'] = $row['admission_lname'] . ", " . $row['admission_fname'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }

    } elseif ($numrow_teacher > 0) {
        $row = mysqli_fetch_array($teacher);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Teacher";
            $_SESSION['id'] = $row['teacher_id'];
            $_SESSION['name'] = $row['teacher_lname'] . ", " . $row['teacher_fname'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }

    } elseif ($numrow_adviser > 0) {
        $row = mysqli_fetch_array($adviser);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Adviser";
            $_SESSION['id'] = $row['ad_id'];
            $_SESSION['name'] = $row['ad_lname'] . ", " . $row['ad_fname'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }

    } elseif ($numrow_student > 0) {
        $row = mysqli_fetch_array($student);
        $hashedpass = password_verify($password, $row['password']);

        if ($hashedpass == true) {
            $_SESSION['role'] = "Student";
            $_SESSION['id'] = $row['student_id'];
            $_SESSION['name'] = $row['student_lname'] . ", " . $row['student_fname'];

            header("location: ../../dashboard/index.php");

        } else {
            $_SESSION['password_incorrect'] = true;
            header("location: ../login.php");
        }

    } else {
        $_SESSION['username_incorrect'] = true;
        header("location: ../login.php");
    }
}
?>
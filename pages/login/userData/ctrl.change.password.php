<?php
include '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $password = mysqli_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_escape_string($conn, $_POST['confirm_password']);

    if ($password == $confirm_password) {
        $hashed_password = password_hash($confirm_password, PASSWORD_DEFAULT);

        $_SESSION['password'] = $password;
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];

        $activation_code = mysqli_real_escape_string($conn, $_POST['activation_code']);

        $check_username_sa = mysqli_query($conn, "SELECT * FROM tbl_super_admins WHERE username = '$username'") or die(mysqli_error($conn));
        $count_sa = mysqli_num_rows($check_username_sa);

        $check_username_admins = mysqli_query($conn, "SELECT * FROM tbl_admins WHERE username = '$username'") or die(mysqli_error($conn));
        $count_admins = mysqli_num_rows($check_username_admins);

        $check_username_faculties_staff = mysqli_query($conn, "SELECT * FROM tbl_faculties_staff WHERE username = '$username'") or die(mysqli_error($conn));
        $count_faculties_staff = mysqli_num_rows($check_username_faculties_staff);

        $check_username_students = mysqli_query($conn, "SELECT * FROM tbl_students WHERE username = '$username'") or die(mysqli_error($conn));
        $count_students = mysqli_num_rows($check_username_students);

        if ($count_sa > 0) {
            $row = mysqli_fetch_array($check_username_sa);
            $password_update = mysqli_query($conn, "UPDATE tbl_super_admins SET password = '$hashed_password' WHERE username = '$username'");

        } elseif ($count_admins > 0) {
            $row = mysqli_fetch_array($check_username_admins);
            $password_update = mysqli_query($conn, "UPDATE tbl_admins SET password = '$hashed_password' WHERE username = '$username'");

        } elseif ($count_faculties_staff > 0) {
            $row = mysqli_fetch_array($check_username_faculties_staff);
            $password_update = mysqli_query($conn, "UPDATE tbl_faculties_staff SET password = '$hashed_password' WHERE username = '$username'");

        } elseif ($count_students > 0) {
            $row = mysqli_fetch_array($check_username_students);
            $password_update = mysqli_query($conn, "UPDATE tbl_students SET password = '$hashed_password' WHERE username = '$username'");

        } else {

        }

        $_SESSION['update_success'] = true;
        header("location: ctrl.login.php");


    }


}
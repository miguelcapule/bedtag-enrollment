<?php
include '../../../includes/session.php';

if (isset($_POST['submit'])) {

    $strand_name = mysqli_real_escape_string($conn, $_POST['strand_name']);
    $strand_def = mysqli_real_escape_string($conn, $_POST['strand_def']);

    $check_double = mysqli_query($conn, "SELECT * FROM tbl_strands
     WHERE strand_name = '$strand_name' AND strand_def = '$strand_def'") or die(mysqli_error($conn));

    $result = mysqli_num_rows($check_double);

    if ($result == 0) {
        $insertSub = mysqli_query($conn, "INSERT INTO tbl_strands (strand_name, strand_def) VALUES ('$strand_name', '$strand_def')") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../add.strand.php');
    } else {
        $_SESSION['strand_exists'] = true;
        header('location: ../add.strand.php');
    }
}
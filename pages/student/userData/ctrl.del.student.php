<?php
include '../../../includes/session.php';

$student_id = $_GET['student_id'];

mysqli_query($conn, "DELETE FROM tbl_students WHERE student_id = '$student_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.students.php');

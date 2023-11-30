<?php
include '../../../includes/session.php';

$teacher_id = $_GET['teacher_id'];

mysqli_query($conn, "DELETE FROM tbl_teachers WHERE teacher_id = '$teacher_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.teacher.php');

<?php
include '../../../includes/session.php';

$subject_id = $_GET['subject_id'];

mysqli_query($conn, "DELETE FROM tbl_subjects_senior WHERE subject_id = '$subject_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.subject.senior.php');

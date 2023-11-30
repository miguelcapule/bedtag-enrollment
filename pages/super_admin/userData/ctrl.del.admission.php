<?php
include '../../../includes/session.php';

$admission_id = $_GET['admission_id'];

mysqli_query($conn, "DELETE FROM tbl_admissions WHERE admission_id = '$admission_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.admission.php');

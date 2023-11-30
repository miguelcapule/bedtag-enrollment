<?php
include '../../../includes/session.php';

$reg_id = $_GET['reg_id'];

mysqli_query($conn, "DELETE FROM tbl_registrars WHERE reg_id = '$reg_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.registrar.php');

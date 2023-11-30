<?php
include '../../../includes/session.php';

$ad_id = $_GET['ad_id'];

mysqli_query($conn, "DELETE FROM tbl_adviser WHERE ad_id = '$ad_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.adviser.php');

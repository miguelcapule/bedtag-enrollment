<?php
include '../../../includes/session.php';

$acc_id = $_GET['acc_id'];

mysqli_query($conn, "DELETE FROM tbl_accountings WHERE acc_id = '$acc_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.accounting.php');

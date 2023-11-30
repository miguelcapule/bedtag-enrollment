<?php
include '../../../includes/session.php';

$prin_id = $_GET['prin_id'];

mysqli_query($conn, "DELETE FROM tbl_principals WHERE prin_id = '$prin_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.principal.php');

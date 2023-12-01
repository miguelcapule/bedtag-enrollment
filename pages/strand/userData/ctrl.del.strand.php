<?php
include '../../../includes/session.php';

$strand_id = $_GET['strand_id'];

mysqli_query($conn, "DELETE FROM tbl_strands WHERE strand_id = '$strand_id'") or die(mysqli_error($conn));
$_SESSION['success'] = true;
header('location: ../list.strand.php');

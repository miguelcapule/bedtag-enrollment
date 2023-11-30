<?php
include '../../../includes/session.php';

$search = $_GET['search'];
$sy_id = $_GET['sy_id'];
$student_id = $_GET['student_id'];

if (isset($_POST['submit2'])) {

} else {
    $remark = $_POST['submit'];
    $student_info = mysqli_query($conn, "UPDATE tbl_schoolyears SET remark = '$remark' WHERE sy_id = '$sy_id'");
    $_SESSION['success'] = true;
    header('location: ../list.enrolled.students.php?search='. $search);

}




?>
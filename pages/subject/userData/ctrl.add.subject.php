<?php
include '../../../includes/session.php';

if (isset($_POST['submit'])) {

    $subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
    $subject_description = mysqli_real_escape_string($conn, $_POST['subject_description']);
    $grade_level = mysqli_real_escape_string($conn, $_POST['grade_level']);


    $check_double = mysqli_query($conn, "SELECT * FROM tbl_subjects
     LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects.grade_level_id 
     WHERE subject_code = '$subject_code' AND subject_description = '$subject_description' AND tbl_subjects.grade_level_id = '$grade_level'") or die(mysqli_error($conn));

    $result = mysqli_num_rows($check_double);

    if ($result == 0) {
        $insertSub = mysqli_query($conn, "INSERT INTO tbl_subjects (subject_code, subject_description, grade_level_id) VALUES ('$subject_code', '$subject_description', '$grade_level')") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../add.subject.php');
    } else {
        $_SESSION['subject_exists'] = true;
        header('location: ../add.subject.php');
    }
}
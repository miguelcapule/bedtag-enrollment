<?php
include '../../../includes/session.php';

$subject_id = $_GET['subject_id'];

if (isset($_POST['submit'])) {

    $sub_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
    $sub_desc = mysqli_real_escape_string($conn, $_POST['subject_description']);
    $lec = mysqli_real_escape_string($conn, $_POST['lec_units']);
    $lab = mysqli_real_escape_string($conn, $_POST['lab_units']);
    $total = mysqli_real_escape_string($conn, $_POST['total_units']);
    $prereq = mysqli_real_escape_string($conn, $_POST['prerequisites']);
    $sem = mysqli_real_escape_string($conn, $_POST['semester']);
    $grd_lvl = mysqli_real_escape_string($conn, $_POST['grade_level']);
    $strand = mysqli_real_escape_string($conn, $_POST['strand_name']);
    $eay = mysqli_real_escape_string($conn, $_POST['eay']);

    $check_double = mysqli_query($conn, "SELECT * FROM tbl_subjects_senior 
    -- LEFT JOIN tbl_grade_levels ON tbl_grade_levels.grade_level_id = tbl_subjects_senior.grade_level_id
    -- LEFT JOIN tbl_semesters ON tbl_semesters.semester_id = tbl_subjects_senior.semester_id
    -- LEFT JOIN tbl_strands ON tbl_strands.strand_id = tbl_subjects_senior.strand_id
    WHERE subject_code = '$sub_code' AND subject_description = '$sub_desc' AND lec_units = '$lec' AND lab_units = '$lab' AND total_units = '$total' AND pre_requisites='$prereq' AND grade_level_id = '$grd_lvl' AND semester_id = '$sem' AND strand_id = '$strand' AND efacadyear_id = '$eay'") or die(mysqli_error($conn));

    $result = mysqli_num_rows($check_double);

    if ($result > 0) {
        $_SESSION['subject_exists'] = true;
        header('location: ../edit.subject.senior.php?subject_id=' . $subject_id);
    } else {
        $update = mysqli_query($conn, "UPDATE tbl_subjects_senior SET subject_code = '$sub_code', subject_description = '$sub_desc', lec_units = '$lec', lab_units = '$lab', total_units = '$total', pre_requisites = '$prereq',  grade_level_id = '$grd_lvl', semester_id = '$sem', strand_id = '$strand', efacadyear_id = '$eay' WHERE subject_id = '$subject_id'") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../edit.subject.senior.php?subject_id=' . $subject_id);
    }
}
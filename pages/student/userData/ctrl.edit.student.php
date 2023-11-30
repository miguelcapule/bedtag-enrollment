<?php
include '../../../includes/session.php';

if ($_SESSION['role'] == "Registrar") {
    $stud_id = $_GET['student_id'];
} elseif ($_SESSION['role'] == "Student") {
    $stud_id = $_SESSION['id'];
}

if (isset($_POST['submit'])) {

    $stud_no = mysqli_real_escape_string($conn, $_POST['stud_no']);
    $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $midname = mysqli_real_escape_string($conn, $_POST['midname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $date_birth = mysqli_real_escape_string($conn, $_POST['date_birth']);
    $place_birth = mysqli_real_escape_string($conn, $_POST['place_birth']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $landline = mysqli_real_escape_string($conn, $_POST['landline']);
    $cellphone = mysqli_real_escape_string($conn, $_POST['cellphone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $focc = mysqli_real_escape_string($conn, $_POST['focc']);
    $fcontact = mysqli_real_escape_string($conn, $_POST['fcontact']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $mocc = mysqli_real_escape_string($conn, $_POST['mocc']);
    $mcontact = mysqli_real_escape_string($conn, $_POST['mcontact']);
    $guardname = mysqli_real_escape_string($conn, $_POST['guardname']);
    $gaddress = mysqli_real_escape_string($conn, $_POST['gaddress']);
    $gcontact = mysqli_real_escape_string($conn, $_POST['gcontact']);
    $last_attend = mysqli_real_escape_string($conn, $_POST['last_attend']);
    $prev_grade_level = mysqli_real_escape_string($conn, $_POST['prev_grade_level']);
    $sch_year = mysqli_real_escape_string($conn, $_POST['sch_year']);
    $sch_address = mysqli_real_escape_string($conn, $_POST['sch_address']);
    $fage = mysqli_real_escape_string($conn, $_POST['fage']);
    $mage = mysqli_real_escape_string($conn, $_POST['mage']);
    $flandline = mysqli_real_escape_string($conn, $_POST['flandline']);
    $mlandline = mysqli_real_escape_string($conn, $_POST['mlandline']);
    $femail = mysqli_real_escape_string($conn, $_POST['femail']);
    $memail = mysqli_real_escape_string($conn, $_POST['memail']);
    $feduc_attain = mysqli_real_escape_string($conn, $_POST['feduc_attain']);
    $meduc_attain = mysqli_real_escape_string($conn, $_POST['meduc_attain']);
    $flast_sch_att = mysqli_real_escape_string($conn, $_POST['flast_sch_att']);
    $mlast_sch_att = mysqli_real_escape_string($conn, $_POST['mlast_sch_att']);
    $femployer = mysqli_real_escape_string($conn, $_POST['femployer']);
    $memployer = mysqli_real_escape_string($conn, $_POST['memployer']);
    $fbus_ad = mysqli_real_escape_string($conn, $_POST['fbus_ad']);
    $mbus_ad = mysqli_real_escape_string($conn, $_POST['mbus_ad']);
    $fof_ph_no = mysqli_real_escape_string($conn, $_POST['fof_ph_no']);
    $mof_ph_no = mysqli_real_escape_string($conn, $_POST['mof_ph_no']);
    $mmonth_inc = mysqli_real_escape_string($conn, $_POST['mmonth_inc']);
    $fmonth_inc = mysqli_real_escape_string($conn, $_POST['fmonth_inc']);
    $grelation = mysqli_real_escape_string($conn, $_POST['grelation']);
    $gtel_no = mysqli_real_escape_string($conn, $_POST['gtel_no']);
    $gemail = mysqli_real_escape_string($conn, $_POST['gemail']);
    $honor = mysqli_real_escape_string($conn, $_POST['honor']);
    $other = mysqli_real_escape_string($conn, $_POST['other']);
    $spec = mysqli_real_escape_string($conn, $_POST['spec']);
    $acad_c = mysqli_real_escape_string($conn, $_POST['acad_c']);
    $sport_c = mysqli_real_escape_string($conn, $_POST['sport_c']);
    $sch_m = mysqli_real_escape_string($conn, $_POST['sch_m']);
    $comrel_m = mysqli_real_escape_string($conn, $_POST['comrel_m']);
    $acr = mysqli_real_escape_string($conn, $_POST['acr']);
    $prov = mysqli_real_escape_string($conn, $_POST['prov']);
    $app_grade_level = mysqli_real_escape_string($conn, $_POST['app_grade_level']);
    $get_details = mysqli_query($conn, "SELECT * FROM tbl_students
     WHERE student_id = '$stud_id'");
    while ($row = mysqli_fetch_array($get_details)) {
        $check_date_ap = $row['date_ap'];
        $check_sy = $row['syear'];
    }
    if (empty($check_date_ap)) {
        $syear = mysqli_real_escape_string($conn, $_POST['syear']);
        $date_ap = mysqli_real_escape_string($conn, $_POST['date_ap']);
    } else {
        $syear = $check_sy;
        $date_ap = $check_date_ap;
    }

    $sib1_name = mysqli_real_escape_string($conn, $_POST['sib1_name']);
    $sib2_name = mysqli_real_escape_string($conn, $_POST['sib2_name']);
    $sib3_name = mysqli_real_escape_string($conn, $_POST['sib3_name']);
    $sib4_name = mysqli_real_escape_string($conn, $_POST['sib4_name']);
    $sib5_name = mysqli_real_escape_string($conn, $_POST['sib5_name']);
    $sib6_name = mysqli_real_escape_string($conn, $_POST['sib6_name']);
    $sib7_name = mysqli_real_escape_string($conn, $_POST['sib7_name']);

    $sib1_age = mysqli_real_escape_string($conn, $_POST['sib1_age']);
    $sib2_age = mysqli_real_escape_string($conn, $_POST['sib2_age']);
    $sib3_age = mysqli_real_escape_string($conn, $_POST['sib3_age']);
    $sib4_age = mysqli_real_escape_string($conn, $_POST['sib4_age']);
    $sib5_age = mysqli_real_escape_string($conn, $_POST['sib5_age']);
    $sib6_age = mysqli_real_escape_string($conn, $_POST['sib6_age']);
    $sib7_age = mysqli_real_escape_string($conn, $_POST['sib7_age']);

    $sib1_civ = mysqli_real_escape_string($conn, $_POST['sib1_civ']);
    $sib2_civ = mysqli_real_escape_string($conn, $_POST['sib2_civ']);
    $sib3_civ = mysqli_real_escape_string($conn, $_POST['sib3_civ']);
    $sib4_civ = mysqli_real_escape_string($conn, $_POST['sib4_civ']);
    $sib5_civ = mysqli_real_escape_string($conn, $_POST['sib5_civ']);
    $sib6_civ = mysqli_real_escape_string($conn, $_POST['sib6_civ']);
    $sib7_civ = mysqli_real_escape_string($conn, $_POST['sib7_civ']);

    $sib1_sch = mysqli_real_escape_string($conn, $_POST['sib1_sch']);
    $sib2_sch = mysqli_real_escape_string($conn, $_POST['sib2_sch']);
    $sib3_sch = mysqli_real_escape_string($conn, $_POST['sib3_sch']);
    $sib4_sch = mysqli_real_escape_string($conn, $_POST['sib4_sch']);
    $sib5_sch = mysqli_real_escape_string($conn, $_POST['sib5_sch']);
    $sib6_sch = mysqli_real_escape_string($conn, $_POST['sib6_sch']);
    $sib7_sch = mysqli_real_escape_string($conn, $_POST['sib7_sch']);

    $sib1_educbg = mysqli_real_escape_string($conn, $_POST['sib1_educbg']);
    $sib2_educbg = mysqli_real_escape_string($conn, $_POST['sib2_educbg']);
    $sib3_educbg = mysqli_real_escape_string($conn, $_POST['sib3_educbg']);
    $sib4_educbg = mysqli_real_escape_string($conn, $_POST['sib4_educbg']);
    $sib5_educbg = mysqli_real_escape_string($conn, $_POST['sib5_educbg']);
    $sib6_educbg = mysqli_real_escape_string($conn, $_POST['sib6_educbg']);
    $sib7_educbg = mysqli_real_escape_string($conn, $_POST['sib7_educbg']);

    if (!empty($_POST['talent'])) {
        $talent = $_POST['talent'];
        $imtalent = implode(",", $talent);
    } else {
        $talent = " ";
    }




    // = mysqli_real_escape_string($conn, $_POST['']);

    if ($_SESSION['role'] == "Registrar") {


        $check_studno = mysqli_query($conn, "SELECT * FROM tbl_students WHERE stud_no = '$stud_no'") or die(mysqli_error($conn));
        $check_lrn = mysqli_query($conn, "SELECT * FROM tbl_students WHERE lrn = '$lrn'") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($check_lrn)) {
            $lrn_zero = $row['lrn'];
        }
        if (!empty($lrn_zero)) {
            $result2 = mysqli_num_rows($check_lrn);
        }
        $result = mysqli_num_rows($check_studno);


        if ($result > 0 || $result2 > 0) {

            while ($row = mysqli_fetch_array($check_studno)) {
                $dbl_studID = $row['student_id'];
            }
            while ($row2 = mysqli_fetch_array($check_lrn)) {
                $dbl_studID1 = $row2['student_id'];
            }

            if ($stud_id != $dbl_studID && $stud_id != $dbl_studID1 && ($result == 1 && $result2 == 1)) {
                $_SESSION['lrn-studno'] = true;
                header('location: ../edit.student.php?student_id=' . $stud_id);
            } elseif ($stud_id != $dbl_studID && $result == 1) {
                $_SESSION['double-studno'] = true;
                header('location: ../edit.student.php?student_id=' . $stud_id);
            } elseif ($stud_id != $dbl_studID1 && $result2 == 1) {
                $_SESSION['double-lrn'] = true;
                header('location: ../edit.student.php?student_id=' . $stud_id);
            } else {
                $insertUser = mysqli_query($conn, "UPDATE tbl_students SET stud_no = '$stud_no', lrn = '$lrn', student_fname = '$firstname', student_lname = '$lastname', student_mname = '$midname', address = '$address', date_birth = '$date_birth', place_birth = '$place_birth', age = '$age', gender_id = '$gender', nationality = '$nationality', religion = '$religion', landline = '$landline', cellphone = '$cellphone', email = '$email', fname = '$fname', focc = '$focc', fcontact = '$fcontact',  mname = '$mname', mocc = '$mocc', mcontact = '$mcontact', guardname = '$guardname', gaddress = '$gaddress', gcontact = '$gcontact', last_sch = '$last_attend', prev_grade_level = '$prev_grade_level', sch_year = '$sch_year', sch_address = '$sch_address', fage = '$fage', mage = '$mage', flandline = '$flandline', mlandline = '$mlandline', femail = '$femail', memail = '$memail', feduc_attain = '$feduc_attain', meduc_attain = '$meduc_attain', flast_sch_att = '$flast_sch_att', mlast_sch_att = '$mlast_sch_att', femployer = '$femployer', memployer = '$memployer', fbus_ad = '$fbus_ad', mbus_ad = '$mbus_ad', fof_ph_no = '$fof_ph_no', mof_ph_no = '$mof_ph_no', fmonth_inc = '$fmonth_inc', mmonth_inc = '$mmonth_inc', grelation = '$grelation', gtel_no = '$gtel_no', gemail = '$gemail', sib1_name = '$sib1_name',sib2_name = '$sib2_name',sib3_name = '$sib3_name',sib4_name = '$sib4_name',sib5_name = '$sib5_name',sib6_name = '$sib6_name',sib7_name = '$sib7_name', sib1_age = '$sib1_age',sib2_age = '$sib2_age',sib3_age = '$sib3_age',sib4_age = '$sib4_age',sib5_age = '$sib5_age',sib6_age = '$sib6_age',sib7_age = '$sib7_age', sib1_civ = '$sib1_civ',sib2_civ = '$sib2_civ',sib3_civ = '$sib3_civ',sib4_civ = '$sib4_civ',sib5_civ = '$sib5_civ',sib6_civ = '$sib6_civ',sib7_civ = '$sib7_civ', sib1_sch = '$sib1_sch',sib2_sch = '$sib2_sch',sib3_sch = '$sib3_sch',sib4_sch = '$sib4_sch',sib5_sch = '$sib5_sch',sib6_sch = '$sib6_sch',sib7_sch = '$sib7_sch', sib1_educbg = '$sib1_educbg',sib2_educbg = '$sib2_educbg',sib3_educbg = '$sib3_educbg', sib4_educbg = '$sib4_educbg', sib5_educbg = '$sib5_educbg',sib6_educbg = '$sib6_educbg',sib7_educbg = '$sib7_educbg', talent = '$imtalent', other = '$other', spec = '$spec', honor = '$honor', acad_c = '$acad_c', sport_c = '$sport_c', sch_m = '$sch_m', comrel_m = '$comrel_m', prov = '$prov', acr = '$acr', date_ap = '$date_ap', syear = '$syear', app_grade_level = '$app_grade_level' WHERE student_id = '$stud_id'") or die(mysqli_error($conn));
                $_SESSION['success'] = true;
                header('location: ../edit.student.php?student_id=' . $stud_id);
            }
        } else {
            $insertUser = mysqli_query($conn, "UPDATE tbl_students SET stud_no = '$stud_no', lrn = '$lrn', student_fname = '$firstname', student_lname = '$lastname', student_mname = '$midname', address = '$address', date_birth = '$date_birth', place_birth = '$place_birth', age = '$age', gender_id = '$gender', nationality = '$nationality', religion = '$religion', landline = '$landline', cellphone = '$cellphone', email = '$email', fname = '$fname', focc = '$focc', fcontact = '$fcontact',  mname = '$mname', mocc = '$mocc', mcontact = '$mcontact', guardname = '$guardname', gaddress = '$gaddress', gcontact = '$gcontact', last_sch = '$last_attend', prev_grade_level = '$prev_grade_level', sch_year = '$sch_year', sch_address = '$sch_address', fage = '$fage', mage = '$mage', flandline = '$flandline', mlandline = '$mlandline', femail = '$femail', memail = '$memail', feduc_attain = '$feduc_attain', meduc_attain = '$meduc_attain', flast_sch_att = '$flast_sch_att', mlast_sch_att = '$mlast_sch_att', femployer = '$femployer', memployer = '$memployer', fbus_ad = '$fbus_ad', mbus_ad = '$mbus_ad', fof_ph_no = '$fof_ph_no', mof_ph_no = '$mof_ph_no', fmonth_inc = '$fmonth_inc', mmonth_inc = '$mmonth_inc', grelation = '$grelation', gtel_no = '$gtel_no', gemail = '$gemail', sib1_name = '$sib1_name',sib2_name = '$sib2_name',sib3_name = '$sib3_name',sib4_name = '$sib4_name',sib5_name = '$sib5_name',sib6_name = '$sib6_name',sib7_name = '$sib7_name', sib1_age = '$sib1_age',sib2_age = '$sib2_age',sib3_age = '$sib3_age',sib4_age = '$sib4_age',sib5_age = '$sib5_age',sib6_age = '$sib6_age',sib7_age = '$sib7_age', sib1_civ = '$sib1_civ',sib2_civ = '$sib2_civ',sib3_civ = '$sib3_civ',sib4_civ = '$sib4_civ',sib5_civ = '$sib5_civ',sib6_civ = '$sib6_civ',sib7_civ = '$sib7_civ', sib1_sch = '$sib1_sch',sib2_sch = '$sib2_sch',sib3_sch = '$sib3_sch',sib4_sch = '$sib4_sch',sib5_sch = '$sib5_sch',sib6_sch = '$sib6_sch',sib7_sch = '$sib7_sch', sib1_educbg = '$sib1_educbg',sib2_educbg = '$sib2_educbg',sib3_educbg = '$sib3_educbg',sib4_educbg = '$sib4_educbg',sib5_educbg = '$sib5_educbg',sib6_educbg = '$sib6_educbg',sib7_educbg = '$sib7_educbg', talent = '$imtalent', other = '$other', spec = '$spec', honor = '$honor', acad_c = '$acad_c', sport_c = '$sport_c', sch_m = '$sch_m', comrel_m = '$comrel_m', prov = '$prov', acr = '$acr', date_ap = '$date_ap', syear = '$syear', app_grade_level = '$app_grade_level'  WHERE student_id = '$stud_id'") or die(mysqli_error($conn));
            $_SESSION['success'] = true;
            header('location: ../edit.student.php?student_id=' . $stud_id);
        }
    } elseif ($_SESSION['role'] == "Student") {

        $insertUser = mysqli_query($conn, "UPDATE tbl_students SET stud_no = '$stud_no', lrn = '$lrn', student_fname = '$firstname', student_lname = '$lastname', student_mname = '$midname', address = '$address', date_birth = '$date_birth', place_birth = '$place_birth', age = '$age', gender_id = '$gender', nationality = '$nationality', religion = '$religion', landline = '$landline', cellphone = '$cellphone', email = '$email', fname = '$fname', focc = '$focc', fcontact = '$fcontact',  mname = '$mname', mocc = '$mocc', mcontact = '$mcontact', guardname = '$guardname', gaddress = '$gaddress', gcontact = '$gcontact', last_sch = '$last_attend', prev_grade_level = '$prev_grade_level', sch_year = '$sch_year', sch_address = '$sch_address', fage = '$fage', mage = '$mage', flandline = '$flandline', mlandline = '$mlandline', femail = '$femail', memail = '$memail', feduc_attain = '$feduc_attain', meduc_attain = '$meduc_attain', flast_sch_att = '$flast_sch_att', mlast_sch_att = '$mlast_sch_att', femployer = '$femployer', memployer = '$memployer', fbus_ad = '$fbus_ad', mbus_ad = '$mbus_ad', fof_ph_no = '$fof_ph_no', mof_ph_no = '$mof_ph_no', fmonth_inc = '$fmonth_inc', mmonth_inc = '$mmonth_inc', grelation = '$grelation', gtel_no = '$gtel_no', gemail = '$gemail', sib1_name = '$sib1_name',sib2_name = '$sib2_name',sib3_name = '$sib3_name',sib4_name = '$sib4_name',sib5_name = '$sib5_name',sib6_name = '$sib6_name',sib7_name = '$sib7_name', sib1_age = '$sib1_age',sib2_age = '$sib2_age',sib3_age = '$sib3_age',sib4_age = '$sib4_age',sib5_age = '$sib5_age',sib6_age = '$sib6_age',sib7_age = '$sib7_age', sib1_civ = '$sib1_civ',sib2_civ = '$sib2_civ',sib3_civ = '$sib3_civ',sib4_civ = '$sib4_civ',sib5_civ = '$sib5_civ',sib6_civ = '$sib6_civ',sib7_civ = '$sib7_civ', sib1_sch = '$sib1_sch',sib2_sch = '$sib2_sch',sib3_sch = '$sib3_sch',sib4_sch = '$sib4_sch',sib5_sch = '$sib5_sch',sib6_sch = '$sib6_sch',sib7_sch = '$sib7_sch', sib1_educbg = '$sib1_educbg',sib2_educbg = '$sib2_educbg',sib3_educbg = '$sib3_educbg',sib4_educbg = '$sib4_educbg',sib5_educbg = '$sib5_educbg',sib6_educbg = '$sib6_educbg',sib7_educbg = '$sib7_educbg', talent = '$imtalent', other = '$other', spec = '$spec', honor = '$honor', acad_c = '$acad_c', sport_c = '$sport_c', sch_m = '$sch_m', comrel_m = '$comrel_m', prov = '$prov', acr = '$acr', date_ap = '$date_ap', syear = '$syear', app_grade_level = '$app_grade_level'  WHERE student_id = '$stud_id'") or die(mysqli_error($conn));
        $_SESSION['success'] = true;
        header('location: ../edit.student.php');
    }
}

?>
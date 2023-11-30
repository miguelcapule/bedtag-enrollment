<?php
require('../fpdf/fpdf.php');
require '../../includes/conn.php';

if (!empty($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $get_stud = mysqli_query($conn, "SELECT * FROM tbl_students AS stud
    LEFT JOIN tbl_genders AS gen ON gen.gender_id = stud.gender_id
    WHERE student_id = '$student_id'") or die(mysqli_error($conn));
} else {
    header('location: ../bed-404/page404.php');
}




while ($row = mysqli_fetch_array($get_stud)) {


    class PDF extends FPDF
    {

        // Page header

    }

    $pdf = new PDF('P', 'mm', 'Legal');
    //left top right
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    // Logo(x axis, y axis, height, width)
    $pdf->Image('../../docs/assets/img/logo.png', 50, 5, 15, 15);
    // text color
    $pdf->SetTextColor(255, 0, 0);
    // font(font type,style,font size)
    $pdf->SetFont('Arial', 'B', 18);
    // Dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(110, 5, 'Saint Francis of Assisi College', 0, 1, 'C');

    $pdf->Ln(3);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', '', 10, 'C');
    $pdf->Cell(78, 5, '', 0, 0, 'L');
    $pdf->Cell(17, 3, 'CAMPUS: ', 0, 0, 'C');
    $pdf->Cell(55, 3, '', 'B', 1, 'R');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 14, 'C');
    $pdf->Cell(213, 8, 'APPLICATION FOR ADMISSION', 0, 1, 'C');


    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Rect(10, 30, 75, 8);
    $pdf->Cell(43, 5, 'Level applied for:', 0, 0);
    $pdf->Cell(2, 5, $row['app_grade_level'], 0, 1, 'C');


    $pdf->Ln(2);
    $pdf->Rect(170, 25, 25, 25);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(340, 0, '1 x 1', 0, 1, 'C');
    $pdf->Cell(340, 8, 'Picture', 0, 0, 'C');


    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Rect(10, 40, 75, 8);
    $pdf->Cell(20, 5, 'Date of Application:', 0, 0);
    $pdf->Cell(50, 5, $row['date_ap'], 0, 1, 'C');
    $pdf->Rect(100, 35, 60, 24);
    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(95, 3, '', 0, 0, 'L');
    $pdf->Cell(50, 3, $row['syear'], 'B', 1, 'C');
    $pdf->Cell(240, 5, 'SCHOOL YEAR', 0, 1, 'C');

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'I', '10');
    $pdf->Cell(200, 5, 'Instruction: Fill all information needed and submit this form together with all the other requirements to ', 0, 1);
    $pdf->Cell(200, 5, 'the Admissions and Testing Office. If the information being requested is not applicable to you or your child, write N/A.', 0, 1, 'C');



    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(50, 5, 'PLEASE PRINT OR WRITE LEGIBLY', 0, 1, 'C');


    $pdf->SetLineWidth(.5);
    $pdf->Rect(7, 76, 203, 64);
    //cell(width,height,text,border,end line,[align])

    $pdf->SetLineWidth(.2);
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(195, 6, 'PERSONAL DATA', 1, 1, 'C');

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(13, 4, 'Name:', 0, 0);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(40, 4, utf8_decode($row['student_lname']), 'B', 0, 'C');
    $pdf->Cell(40, 4, utf8_decode($row['student_fname']), 'B', 0, 'C');
    $pdf->Cell(40, 4, utf8_decode($row['student_mname']), 'B', 0, 'C');
    $pdf->Cell(4, 2, '', 0, 0);
    $pdf->Cell(8, 3, 'Sex', 0, 0);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 3, $row['gender_name'], 'B', 1, 'C');



    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(20, 4, '', 0, 0, 'C');
    $pdf->Cell(28, 3, '(Last Name)', 0, 0, 'C');
    $pdf->Cell(45, 3, '(First Name)', 0, 0, 'C');
    $pdf->Cell(45, 3, '(Middle Name)', 0, 0, 'C');


    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(23, 4, 'Home Address: ', 0, 0);
    $pdf->SetFont('Arial', 'B', 9);
    $fontsize = 8;
    $tempFontSize = $fontsize;
    $cellwidth = 150;
    while ($pdf->GetStringWidth($row['address']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(172, 4, $row['address'], 'B', 1, 'L');


    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(28, 4, 'Provincial Address: ', 0, 0);
    $pdf->SetFont('Arial', 'B', 9);
    $fontsize = 8;
    $tempFontSize = $fontsize;
    $cellwidth = 165;
    while ($pdf->GetStringWidth($row['prov']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(167, 4, $row['prov'], 'B', 0, 'L');

    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(18, 4, 'Date of Birth ', 0, 0);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(50, 4, $row['date_birth'], 'B', 0, 'C');
    $pdf->Cell(3, 2, '', 0, 0);
    $pdf->Cell(22, 4, 'Place of Birth ', 0, 0);
    $fontsize = 11;
    $tempFontSize = $fontsize;
    $cellwidth = 48;
    while ($pdf->GetStringWidth($row['place_birth']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(46, 4, $row['place_birth'], 'B', 0, 'C');

    $pdf->Cell(4, 2, '', 0, 0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10, 4, 'Age', 0, 0);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(42, 4, $row['age'], 'B', 0, 'C');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(18, 4, 'Religion ', 0, 0);
    $pdf->Cell(50, 4, $row['religion'], 'B', 0, 'C');
    $pdf->Cell(2, 2, '', 0, 0);
    $pdf->Cell(23, 4, 'Citizenship', 0, 0);
    $pdf->Cell(46, 4, $row['nationality'], 'B', 0, 'C');
    $pdf->Cell(3, 2, '', 0, 0);
    $pdf->Cell(11.5, 4, 'ACR #', 0, 0);
    $pdf->Cell(42, 4, $row['acr'], 'B', 0, 'C');
    $pdf->Cell(10, 5, '', 0, 1);

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(18, 4, 'Landline No.', 0, 0);
    $pdf->Cell(80, 4, $row['landline'], 'B', 0, 'C');
    $pdf->Cell(3, 2, '', 0, 0);
    $pdf->Cell(20, 4, 'Cell Phone No.', 0, 0);
    $pdf->Cell(75, 4, $row['cellphone'], 'B', 0, 'C');
    $pdf->Cell(10, 5, '', 0, 1);

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(22, 4, 'Email Address', 0, 0);
    $fontsize = 11;
    $tempFontSize = $fontsize;
    $cellwidth = 100;
    while ($pdf->GetStringWidth($row['email']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(175, 4, $row['email'], 'B', 1, 'C
    ');





    $pdf->Ln(10);
    $pdf->SetLineWidth(.5);
    $pdf->Rect(7, 143, 203, 126);

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(195, 6, 'FAMILY BACKGROUND', 1, 1, 'C');

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(65, 7, '', 1, 0, 'C');
    $pdf->Cell(65, 7, 'FATHER', 1, 0, 'C');
    $pdf->Cell(65, 7, 'MOTHER', 1, 1, 'C');

    $pdf->Cell(65, 7, 'NAME', 1, 0, 'C');
    $fontsize = 8;
    $tempFontSize = $fontsize;
    $cellwidth = 48;
    while ($pdf->GetStringWidth($row['fname']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(65, 7, utf8_decode($row['fname']), 1, 0, 'C');

    $fontsize = 8;
    $tempFontSize = $fontsize;
    $cellwidth = 48;
    while ($pdf->GetStringWidth($row['mname']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(65, 7, utf8_decode($row['mname']), 1, 1, 'C');

    $pdf->Cell(65, 7, 'AGE', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['fage'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mage'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'E-mail ADDRESS', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['femail'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['memail'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'LANDLINE NO.', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['flandline'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mlandline'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'CELLPHONE NO.', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['fcontact'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mcontact'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'EDUCATIONAL ATTAINMENT', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['feduc_attain'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['meduc_attain'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'LAST SCHOOL ATTENDED', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['flast_sch_att'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mlast_sch_att'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'OCCUPATION', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['focc'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mocc'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'EMPLOYER(Name of Company)', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['femployer'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['memployer'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'BUSINESS ADDRESS', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['fbus_ad'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mbus_ad'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'OFFICE PHONE NUMBER', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['fof_ph_no'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mof_ph_no'], 1, 1, 'C');

    $pdf->Cell(65, 7, 'AVERAGE MONTHLY INCOME', 1, 0, 'C');
    $pdf->Cell(65, 7, $row['fmonth_inc'], 1, 0, 'C');
    $pdf->Cell(65, 7, $row['mmonth_inc'], 1, 1, 'C');

    $pdf->Ln(3);
    $pdf->Cell(70, 4, 'GUARDIANS NAME(if child not living with parents)', 0, 0);
    $pdf->Cell(65, 4, $row['guardname'], 'B', 0, 'C');
    $pdf->Cell(5, 5, '', 0, 0);
    $pdf->Cell(18, 4, 'Relationship', 0, 0);
    $pdf->Cell(37, 4, $row['grelation'], 'B', 1, 'C');
    $pdf->Ln(3);
    $pdf->Cell(33, 4, 'GUARDIANS ADDRESS', 0, 0);
    $fontsize = 8;
    $tempFontSize = $fontsize;
    $cellwidth = 150;
    while ($pdf->GetStringWidth($row['gaddress']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(162, 4, $row['gaddress'], 'B', 1, 'L');
    $pdf->Ln(3);
    $pdf->Cell(30, 4, 'GUARDIANS TEL.NO.', 0, 0);
    $pdf->Cell(33, 4, $row['gtel_no'], 'B', 0, 'C');
    $pdf->Cell(5, 5, '', 0, 0);
    $pdf->Cell(23, 4, 'CELLPHONE NO.', 0, 0);
    $pdf->Cell(33, 4, $row['gcontact'], 'B', 0, 'C');
    $pdf->Cell(2, 5, '', 0, 0);
    $pdf->Cell(26, 4, 'E-mail ADDRESS:', 0, 0);
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 48;
    while ($pdf->GetStringWidth($row['gemail']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 4, $row['gemail'], 'B', 0, 'C');


    $pdf->Ln(10);
    $pdf->SetMargins(7, 10, 10);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Rect(7, 271, 203, 7);
    $pdf->Cell(200, 7, 'SIBLINGS (from eldest to youngest)', 0, 1, 'C');

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(52, 7, 'NAME', 1, 0, 'C');
    $pdf->Cell(18, 7, 'AGE', 1, 0, 'C');
    $pdf->Cell(37, 7, 'CIVIL STATUS', 1, 0, 'C');
    $pdf->Cell(40, 7, 'SCHOOL', 1, 0, 'C');
    $pdf->Cell(56, 7, 'EDUCATIONAL BACKGROUND', 1, 1, 'C');

    // square for the siblings//
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 50;
    while ($pdf->GetStringWidth($row['sib1_name']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(52, 6, utf8_decode($row['sib1_name']), 1, 0, 'C');
    $pdf->Cell(18, 6, $row['sib1_age'], 1, 0, 'C');
    $pdf->Cell(37, 6, $row['sib1_civ'], 1, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 39;
    while ($pdf->GetStringWidth($row['sib1_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 6, $row['sib1_sch'], 1, 0, 'C');
    $pdf->Cell(56, 6, $row['sib1_educbg'], 1, 1, 'C');

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 50;
    while ($pdf->GetStringWidth($row['sib2_name']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(52, 6, utf8_decode($row['sib2_name']), 1, 0, 'C');
    $pdf->Cell(18, 6, $row['sib2_age'], 1, 0, 'C');
    $pdf->Cell(37, 6, $row['sib2_civ'], 1, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 39;
    while ($pdf->GetStringWidth($row['sib2_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 6, $row['sib2_sch'], 1, 0, 'C');
    $pdf->Cell(56, 6, $row['sib2_educbg'], 1, 1, 'C');

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 50;
    while ($pdf->GetStringWidth($row['sib3_name']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(52, 6, utf8_decode($row['sib3_name']), 1, 0, 'C');
    $pdf->Cell(18, 6, $row['sib3_age'], 1, 0, 'C');
    $pdf->Cell(37, 6, $row['sib3_civ'], 1, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 39;
    while ($pdf->GetStringWidth($row['sib3_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 6, $row['sib3_sch'], 1, 0, 'C');
    $pdf->Cell(56, 6, $row['sib3_educbg'], 1, 1, 'C');

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 50;
    while ($pdf->GetStringWidth($row['sib4_name']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(52, 6, utf8_decode($row['sib4_name']), 1, 0, 'C');
    $pdf->Cell(18, 6, $row['sib4_age'], 1, 0, 'C');
    $pdf->Cell(37, 6, $row['sib4_civ'], 1, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 39;
    while ($pdf->GetStringWidth($row['sib4_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 6, $row['sib4_sch'], 1, 0, 'C');
    $pdf->Cell(56, 6, $row['sib4_educbg'], 1, 1, 'C');

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 50;
    while ($pdf->GetStringWidth($row['sib5_name']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(52, 6, utf8_decode($row['sib5_name']), 1, 0, 'C');
    $pdf->Cell(18, 6, $row['sib5_age'], 1, 0, 'C');
    $pdf->Cell(37, 6, $row['sib5_civ'], 1, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 39;
    while ($pdf->GetStringWidth($row['sib5_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 6, $row['sib5_sch'], 1, 0, 'C');
    $pdf->Cell(56, 6, $row['sib5_educbg'], 1, 1, 'C');

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 50;
    while ($pdf->GetStringWidth($row['sib6_name']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(52, 6, utf8_decode($row['sib6_name']), 1, 0, 'C');
    $pdf->Cell(18, 6, $row['sib6_age'], 1, 0, 'C');
    $pdf->Cell(37, 6, $row['sib6_civ'], 1, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 39;
    while ($pdf->GetStringWidth($row['sib6_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 6, $row['sib6_sch'], 1, 0, 'C');
    $pdf->Cell(56, 6, $row['sib6_educbg'], 1, 1, 'C');

    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 50;
    while ($pdf->GetStringWidth($row['sib7_name']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(52, 6, utf8_decode($row['sib7_name']), 1, 0, 'C');
    $pdf->Cell(18, 6, $row['sib7_age'], 1, 0, 'C');
    $pdf->Cell(37, 6, $row['sib7_civ'], 1, 0, 'C');
    $fontsize = 9;
    $tempFontSize = $fontsize;
    $cellwidth = 39;
    while ($pdf->GetStringWidth($row['sib7_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(40, 6, $row['sib7_sch'], 1, 0, 'C');
    $pdf->Cell(56, 6, $row['sib7_educbg'], 1, 1, 'C');



    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->SetLineWidth(.5);
    //cell(width,height,text,border,end line,[align])
    $pdf->Rect(8, 12, 205, 100);

    $pdf->SetLineWidth(.2);
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(200, 7, 'EDUCATIONAL BACKGROUND', 1, 1, 'C');
    //square for checking line dancing//

    if (!empty($row['talent'])) {
        $get_talent = $row['talent'];
        $res_talent = explode(",", $get_talent);

        if (in_array("Dancing", $res_talent)) {
            $pdf->Rect(20, 56, 5, 4, 'F');
        } else {
            $pdf->Rect(20, 56, 5, 4);
        }

        if (in_array("Singing", $res_talent)) {
            $pdf->Rect(43, 56, 5, 4, 'F');
        } else {
            $pdf->Rect(43, 56, 5, 4);
        }

        if (in_array("Basketball", $res_talent)) {
            $pdf->Rect(64, 56, 5, 4, 'F');
        } else {
            $pdf->Rect(64, 56, 5, 4);
        }

        if (in_array("Volleyball", $res_talent)) {
            $pdf->Rect(88, 56, 5, 4, 'F');
        } else {
            $pdf->Rect(88, 56, 5, 4);
        }

        if (in_array("Chess", $res_talent)) {
            $pdf->Rect(114, 56, 5, 4, 'F');
        } else {
            $pdf->Rect(114, 56, 5, 4);
        }

        if (in_array("Tennis", $res_talent)) {
            $pdf->Rect(133, 56, 5, 4, 'F');
        } else {
            $pdf->Rect(133, 56, 5, 4);
        }
        // sqaure line draw//
        if (in_array("Drawing", $res_talent)) {
            $pdf->Rect(20, 62, 5, 4, 'F');
        } else {
            $pdf->Rect(20, 62, 5, 4);
        }

        if (in_array("Painting", $res_talent)) {
            $pdf->Rect(43, 62, 5, 4, 'F');
        } else {
            $pdf->Rect(43, 62, 5, 4);
        }

        if (in_array("Music", $res_talent)) {
            $pdf->Rect(64, 62, 5, 4, 'F');
        } else {
            $pdf->Rect(64, 62, 5, 4);
        }
        //square line other//
        if (in_array("Music", $res_talent)) {
            $pdf->Rect(20, 68, 5, 4, 'F');
        } else {
            $pdf->Rect(20, 68, 5, 4);
        }
    } else {
        $pdf->Rect(20, 56, 5, 4);
        $pdf->Rect(43, 56, 5, 4);
        $pdf->Rect(64, 56, 5, 4);
        $pdf->Rect(88, 56, 5, 4);
        $pdf->Rect(114, 56, 5, 4);
        $pdf->Rect(133, 56, 5, 4);
        // sqaure line draw//
        $pdf->Rect(20, 62, 5, 4);
        $pdf->Rect(43, 62, 5, 4);
        $pdf->Rect(64, 62, 5, 4);
        //square line other//
        $pdf->Rect(20, 68, 5, 4);
    }
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(38, 5, 'LAST SCHOOL ATTENDED', 0, 0);
    $fontsize = 15;
    $tempFontSize = $fontsize;
    $cellwidth = 58;
    while ($pdf->GetStringWidth($row['last_sch']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(63, 5, $row['last_sch'], 'B', 0, 'C');
    $pdf->Cell(2, 5, '', 0, 0);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(18, 5, 'Grade Level', 0, 0);
    $pdf->Cell(29, 5, $row['prev_grade_level'], 'B', 0, 'C');

    $pdf->Cell(2, 5, '', 0, 0);
    $pdf->Cell(18, 5, 'School Year', 0, 0);

    $pdf->Cell(29, 5, $row['sch_year'], 'B', 1, 'C');

    $pdf->Ln(3);
    $pdf->Cell(34, 4, 'ADDRESS OF SCHOOL ', 0, 0);
    $fontsize = 7;
    $tempFontSize = $fontsize;
    $cellwidth = 135;
    while ($pdf->GetStringWidth($row['sch_address']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(137, 4, $row['sch_address'], 'B', 0, 'C');

    $pdf->Cell(10, 5, '', 0, 1);

    $pdf->Ln(2);
    $pdf->Cell(34, 4, 'HONORS and AWARDS', 0, 0);
    $pdf->Cell(137, 4, $row['honor'], 'B', 1, 'C');
    $pdf->Ln(2);
    $pdf->Cell(34, 4, '', 0, 0);
    $pdf->Cell(137, 4, '', 'B', 1, 'C');
    $pdf->Ln(2);
    $pdf->Cell(34, 4, 'SPECIAL TALENTS/SKILLS (please check)', 0, 1);
    $pdf->Cell(18, 4, '', 0, 0);
    $pdf->Cell(20, 4, 'Dancing', 0, 0);
    $pdf->Cell(20, 4, ' Singing', 0, 0);
    $pdf->Cell(25, 4, ' Basketball', 0, 0);
    $pdf->Cell(25, 4, ' Volleyball', 0, 0);
    $pdf->Cell(20, 4, ' Chess', 0, 0);
    $pdf->Cell(20, 4, 'Table Tennis', 0, 1);

    $pdf->Ln(2);
    $pdf->Cell(18, 4, '', 0, 0);
    $pdf->Cell(20, 4, 'Drawing', 0, 0);
    $pdf->Cell(20, 4, ' Painting', 0, 0);
    $pdf->Cell(50, 4, ' Playing musical instrument, Specify', 0, 0);
    $pdf->Cell(72, 5, $row['spec'], 'B', 1, 'C');

    $pdf->Ln(2);
    $pdf->Cell(18, 4, '', 0, 0);
    $pdf->Cell(30, 4, 'Other, Please Specify', 0, 0);
    $fontsize = 8;
    $tempFontSize = $fontsize;
    $cellwidth = 48;
    while ($pdf->GetStringWidth($row['other']) > $cellwidth) {
        $pdf->SetFontSize($tempFontSize -= 0.1);
    }
    $pdf->Cell(50, 5, $row['other'], 'B', 1, 'C');

    $pdf->Ln(2);
    $pdf->Cell(50, 4, 'ACADEMIC COMPETITIONS JOINED', 0, 0);
    $pdf->Cell(130, 4, $row['acad_c'], 'B', 1, 'C');

    $pdf->Ln(2);
    $pdf->Cell(50, 4, 'SPORTS COMPETITIONS JOINED', 0, 0);
    $pdf->Cell(130, 4, $row['sport_c'], 'B', 1, 'C');

    $pdf->Ln(2);
    $pdf->Cell(60, 4, 'MEMBERSHIP in SCHOOL ORGANIZATION', 0, 0);
    $pdf->Cell(134, 4, $row['sch_m'], 'B', 1, 'C');
    $pdf->Ln(2);
    $pdf->Cell(60, 4, '', 0, 0);
    $pdf->Cell(134, 4, '', 'B', 1, 'C');

    $pdf->Ln(2);
    $pdf->Cell(84, 4, 'MEMBERSHIP in COMMUNITY / RELIGIOUS ORGANIZATION', 0, 0);
    $pdf->Cell(110, 4, $row['comrel_m'], 'B', 1, 'C');
    $pdf->Ln(2);
    $pdf->Cell(84, 4, '', 0, 0);
    $pdf->Cell(110, 4, '', 'B', 1, 'C');

    $pdf->Ln(5);
    $pdf->SetLineWidth(.5);
    $pdf->Rect(8, 115, 205, 95);

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(200, 7, 'CERTIFICATION / AUTHORIZATION / PROBATIONARY AGREEMENT', 1, 1, 'C');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'I', '10');
    $pdf->Cell(200, 5, 'This is to certify that the above information and data are true and correct to the best of my knowledges and beliefs. Any false ', 0, 1);
    $pdf->Cell(200, 5, 'information in this application shall be ground for denial of admission or dismissal from the school if already enrolled', 0, 1, 'C');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'I', '10');
    $pdf->Cell(200, 5, 'This is to authorize any school school attended by the applicant to release any information/record requested ', 0, 1);
    $pdf->Cell(200, 5, 'by Saint Francis of Assisi College in relation to his/her application for admission', 0, 1, 'C');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'I', '10');
    $pdf->Cell(200, 5, 'It is likewise agreed that all new pupils / transferee are subject to ACADEMIC and CONDUCT probation they must maintain a ', 0, 1);
    $pdf->Cell(200, 5, 'grade no lower that 80% in any subject and a deportment rating of at least 80% or its equivalent. A serious misconduct ', 0, 1, 'L');
    $pdf->Cell(200, 5, 'or a series of minor ones, within the school year means that my child/ward child shall be dropped from the roll', 0, 1, 'L');
    $pdf->Cell(200, 5, ' and immediately issued transfer credentials. ', 0, 1, 'L');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'I', '10');
    $pdf->Cell(200, 5, 'This is also to acknowledges that I will abide by the provisions of the Students Handbook, together with its future revision', 0, 1, 'L');
    $pdf->Cell(200, 5, 'once my child enrolled in Saint Francis of Assisi College.', 0, 1, 'L');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(110, 5, '', 0, 0, 'L');
    $pdf->Cell(85, 5, '', 'B', 1, 'C');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(110, 5, '', 0, 0, 'L');
    $pdf->Cell(100, 5, 'Signature over Printed Name of Parent / Guardian', 0, 1, 'L');
    $pdf->Cell(110, 5, '', 0, 0, 'L');
    $pdf->Cell(105, 5, 'Relationship to the Applicant: (pls check)', 0, 1, 'L');

    //SQAURE FOR M & F LINE//
    $pdf->Rect(115, 201, 5, 4);
    $pdf->Rect(135, 201, 5, 4);

    $pdf->Cell(110, 5, '', 0, 0, 'L');
    $pdf->Cell(20, 4, 'Mother', 0, 0);
    $pdf->Cell(13, 4, ' Father', 0, 0);
    $pdf->Cell(52, 5, '', 'B', 0, 'C');


    $pdf->Ln(2);
    $pdf->SetLineWidth(.5);
    $pdf->Rect(8, 215, 205, 132);

    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(200, 7, 'FOR OFFICE USE ONLY', 1, 1, 'L');

    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 8);
    //FOR THE BOX//
    $pdf->Rect(10, 227, 137, 8);
    //SQUARE FOR THE CHECKING//
    $pdf->Rect(42, 228, 7, 6);
    $pdf->Rect(67, 228, 7, 6);
    $pdf->Rect(92, 228, 7, 6);
    //END SQUARE//
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(40, 6, 'ACTION TAKEN: ', 0, 0, 'L');
    $pdf->Cell(25, 6, 'PASSED', 0, 0, 'L');
    $pdf->Cell(25, 6, 'FAILED', 0, 0, 'L');
    $pdf->Cell(10, 6, 'WAIT LISTED', 0, 0, 'L');


    $pdf->Rect(15, 238, 60, 80);
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(45, 6, 'ACCEPTED IN: ', 0, 1, 'L');

    $pdf->SetFont('Arial', 'B', '9');
    $pdf->Cell(70, 5, '', 0, 0, 'L');
    $pdf->Cell(40, 5, 'DATE OF RESERVATION: ', 0, 0, 'L');
    $pdf->Cell(85, 5, '', 'B', 1, 'C');
    //SQUARE FOR N LINE//
    $pdf->Rect(25, 255, 5, 4);
    $pdf->Rect(25, 260, 5, 4);
    $pdf->Rect(25, 265, 5, 4);

    //SQUARE FOR 1 LINE//
    $pdf->Rect(50, 255, 5, 4);
    $pdf->Rect(50, 260, 5, 4);
    $pdf->Rect(50, 265, 5, 4);

    //SQUARE FOR 4 LINE//
    $pdf->Rect(20, 278, 5, 4);
    $pdf->Rect(20, 283, 5, 4);
    $pdf->Rect(20, 288, 5, 4);

    //SQUARE FOR 7 LINE//
    $pdf->Rect(38, 278, 5, 4);
    $pdf->Rect(38, 283, 5, 4);
    $pdf->Rect(38, 288, 5, 4);

    //SQUARE FOR 10 LINE//
    $pdf->Rect(55, 278, 5, 4);
    $pdf->Rect(55, 283, 5, 4);
    $pdf->Rect(55, 288, 5, 4);

    //SQUARE FOR LEAFLET LINE//
    $pdf->Rect(97, 288, 5, 4);
    $pdf->Rect(128, 288, 5, 4);

    //SQUARE FOR REG//
    $pdf->Rect(33, 299, 5, 4);
    $pdf->Rect(33, 304, 5, 4);
    $pdf->Rect(33, 310, 5, 4);

    //SQUARE FOR WALK IN LINE//
    $pdf->Rect(82, 310, 5, 4);
    $pdf->Rect(110, 311, 5, 4);

    $pdf->Ln(1);
    $pdf->Cell(45, 6, 'N ', 0, 0, 'C');
    $pdf->Cell(10, 6, '1', 0, 0, 'C');

    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(22, 4, 'Amount paid:', 0, 0);
    $pdf->Cell(40, 5, '', 'B', 0, 'C');
    $pdf->Cell(15, 4, ' O.R. No.', 0, 0);
    $pdf->Cell(43, 5, '', 'B', 1, 'C');

    $pdf->Cell(49, 6, 'Jr.K ', 0, 0, 'C');
    $pdf->Cell(3, 6, '2', 0, 0, 'C');

    $pdf->SetFont('Arial', 'B', '9');
    $pdf->Cell(18, 5, '', 0, 0, 'L');
    $pdf->Cell(40, 5, 'DATE OF INTERVIEW: ', 0, 0, 'L');
    $pdf->Cell(85, 5, '', 'B', 1, 'C');

    $pdf->Cell(49, 6, 'Sr.K ', 0, 0, 'C');
    $pdf->Cell(3, 6, '3', 0, 0, 'C');

    $pdf->SetFont('Arial', 'B', '9');
    $pdf->Cell(22, 5, '', 0, 0, 'L');
    $pdf->Cell(23, 5, 'Interview by: ', 0, 0, 'L');
    $pdf->Cell(98, 5, '', 'B', 1, 'C');

    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', '9');
    $pdf->Cell(70, 5, '', 0, 0, 'L');
    $pdf->Cell(40, 5, 'Recruitment medium: ', 0, 0, 'L');
    $pdf->Cell(85, 5, '', 'B', 1, 'C');

    $pdf->Ln(.5);
    $pdf->Cell(35, 6, '4 ', 0, 0, 'C');
    $pdf->Cell(1, 6, '7 ', 0, 0, 'C');
    $pdf->Cell(35, 6, '10 ', 0, 0, 'C');

    $pdf->Cell(12, 5, '', 0, 0, 'L');
    $pdf->Cell(15, 4, 'BIAF by:', 0, 0);
    $pdf->Cell(40, 5, '', 'B', 0, 'C');
    $pdf->Cell(7, 5, '', 0, 0);
    $pdf->Cell(8, 4, ' rel.', 0, 0);
    $pdf->Cell(42, 5, '', 'B', 1, 'C');

    $pdf->Ln(.5);
    $pdf->Cell(35, 6, '5 ', 0, 0, 'C');
    $pdf->Cell(1, 6, '8 ', 0, 0, 'C');
    $pdf->Cell(35, 6, '11 ', 0, 0, 'C');

    $pdf->SetFont('Arial', 'B', '9');
    $pdf->Cell(1, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Streamer location: ', 0, 0, 'L');
    $pdf->Cell(93, 5, '', 'B', 1, 'C');

    $pdf->Ln(.5);
    $pdf->Cell(35, 6, '6 ', 0, 0, 'C');
    $pdf->Cell(1, 6, '9 ', 0, 0, 'C');
    $pdf->Cell(35, 6, '12 ', 0, 0, 'C');

    $pdf->SetFont('Arial', 'B', '9');
    $pdf->Cell(1, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Leaflet [          house-to-hous            church / market / public place ] ', 0, 1, 'L');

    $pdf->Cell(5, 2, '', 0, 0, 'L');
    $pdf->Cell(60, 2, '', 'B', 0, 'C');

    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', '9');
    $pdf->Cell(75, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Billboard location: ', 0, 0, 'L');
    $pdf->Cell(90, 5, '', 'B', 1, 'C');

    $pdf->Ln(1);
    $pdf->Cell(15, 5, '', 0, 0, 'C');
    $pdf->Cell(45, 5, 'REGULAR ', 0, 0, 'C');
    $pdf->Cell(15, 5, '', 0, 0, 'L');
    $pdf->Cell(20, 4, 'Newspaper', 0, 0);
    $pdf->Cell(20, 5, '', 'B', 0, 'C');
    $pdf->Cell(3, 5, '', 0, 0);
    $pdf->Cell(18, 4, 'Television', 0, 0);
    $pdf->Cell(20, 5, '', 'B', 0, 'C');
    $pdf->Cell(3, 5, '', 0, 0);
    $pdf->Cell(13, 4, 'Internet', 0, 0);
    $pdf->Cell(23, 5, '', 'B', 1, 'C');

    $pdf->Ln(1);
    $pdf->Cell(18, 5, '', 0, 0, 'C');
    $pdf->Cell(45, 5, 'PILOT/CREAM ', 0, 0, 'C');
    $pdf->Cell(12, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 4, 'Info from parent', 0, 0);
    $pdf->Cell(35, 5, '', 'B', 0, 'C');
    $pdf->Cell(27, 4, 'Info from relative', 0, 0);
    $pdf->Cell(33, 5, '', 'B', 1, 'C');

    $pdf->Ln(1);
    $pdf->Cell(14, 5, '', 0, 0, 'C');
    $pdf->Cell(45, 5, 'SCIENCE', 0, 0, 'C');

    $pdf->Cell(18, 5, '', 0, 0, 'L');
    $pdf->Cell(20, 4, 'Walk-in', 0, 0);
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(12, 4, 'Others:', 0, 0);
    $pdf->Cell(76, 5, '', 'B', 1, 'C');

    $pdf->Ln(2);
    //SQAUARE FOR %//
    $pdf->Rect(130, 318, 17, 8);

    //SQAURE FOR DIS//
    $pdf->Rect(80, 317, 125, 10);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(84, 2, '', 0, 0, 'C');
    $pdf->Cell(40, 7, 'DISCOUNT GRANTED:                  %', 0, 0, 'C');

    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(25, 5, '', 0, 0, 'C');
    $pdf->Cell(45, 5, 'Honors/Awards/Privileges', 0, 1, 'C');

    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(88, 5, '', 0, 0, 'C');
    $pdf->Cell(5, 5, '(Tuition fee only)', 0, 0, 'C');
    $pdf->Cell(53, 5, '', 0, 0, 'L');
    $pdf->Cell(45, 3, '', 'B', 1, 'C');

    $pdf->Cell(.1, 3, '', 0, 0, 'L');
    $pdf->Cell(202, 3, '', 'B', 1, 'C');

    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(40, 6, 'FOLLOW-UP DETAILS / REMARKS / CPMMENTS / ARRANGEMENTS ', 0, 1, 'L');
}
$pdf->Output();
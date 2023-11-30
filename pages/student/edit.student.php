<?php
require '../../includes/session.php';

$student_id = $_GET['student_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Student | BED Taguig</title>

    <?php include '../../includes/links.php'; ?>

</head>

<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include '../../includes/navbar.php' ?>

        <?php include '../../includes/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Student</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"></a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <form action="userData/ctrl.edit.student.php?student_id=<?php echo $student_id?>" enctype="multipart/form-data" method="POST">
                                    <div class="card-header">
                                        <h3 class="card-title">Student Info</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <?php
                                    $student_info = mysqli_query($conn, "SELECT * FROM tbl_students
                                    LEFT JOIN tbl_genders ON tbl_students.gender_id = tbl_genders.gender_id
                                     WHERE student_id = '$student_id'");
        
                                    while ($row = mysqli_fetch_array($student_info)) {
                                    ?>
                                    <div class="card-body">
                                    <?php if (empty($row['date_ap'])) {
                                            ?>
                                        <input type="text" name="date_ap" hidden value="<?php echo date('d/M/y'); ?>">
                                        <input type="text" name="syear" hidden
                                            value="<?php echo $_SESSION['active_acadyears']; ?>">
                                        <?php } ?>

                                        <div class="row mb-3 mt-3">

                                            <div class="input-group col-xl-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            Student ID</b>
                                                    </span>
                                                </div>
                                                <?php if ($_SESSION['role'] == 'Registrar' || $_SESSION['role'] == 'Admission') {
                                                        echo ' <input type="text" class="form-control focss"
                                                value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no"
                                           >
                                        </div>

                                        <div class="input-group col-xl-6 mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-sm"><b>
                                                        LRN</b></span>
                                            </div>
                                            <input type="text" class="form-control focss"
                                                placeholder="Learner Reference Number" name="lrn"
                                                value="' . $row['lrn'] . '">
                                        </div>';
                                                    } elseif ($_SESSION['role'] == 'Student') {
                                                        echo '  <input type="text" class="form-control focss"
                                                    value="' . $row['stud_no'] . '" placeholder="Student ID" name="stud_no"
                                                    readonly>
                                            </div>
    
                                            <div class="input-group col-xl-6 mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-sm"><b>
                                                            LRN</b></span>
                                                </div>
                                                <input type="text" class="form-control focss"
                                                    placeholder="Learner Reference Number"
                                                    value="' . $row['lrn'] . '" name="lrn">
                                            </div>';
                                                    } ?>

                                            </div>

                                        <div class="row mb-4 ">
                                                
                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Lastname</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" placeholder="Lastname"
                                                        value="<?php echo $row['student_lname']; ?>" name="lastname">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Firstname</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Firstname"
                                                        value="<?php echo $row['student_fname']; ?>" name="firstname">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Middlename</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Middlename"
                                                        value="<?php echo $row['student_mname']; ?>" name="midname">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Home Address</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" name="address"
                                                        value="<?php echo $row['address']; ?>"
                                                        placeholder="Unit number, house number, street name, barangay, city, province">
                                                </div>
                                        </div>
                                        <div class="row mb-4">

                                            <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Province Address</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" name="prov"
                                                        value="<?php echo $row['prov']; ?>"
                                                        placeholder="Unit number, house number, street name, barangay, city, province">
                                                </div>
                                        </div>


                                        <div class="row mb-4">
                                        <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Date of Birth</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        data-inputmask-alias="datetime"
                                                        data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                        name="date_birth" placeholder="day/month/year"
                                                        value="<?php echo $row['date_birth']; ?>">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Place of Birth</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" name="place_birth"
                                                        value="<?php echo $row['place_birth']; ?>"
                                                        placeholder="city, province">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Age</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" name="age"
                                                        value="<?php echo $row['age']; ?>" placeholder="00 years old">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Gender</b></span>
                                                    </div>
                                                    <select class="form-control custom-select select2 select2-purple"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Gender" name="gender" required>
                                                        <?php if (empty($row['gender_id'])) {
                                                                echo '<option value="" disabled selected>Select Gender</option>';
                                                                $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders");
                                                                while ($row2 = mysqli_fetch_array($get_gender)) {
                                                                    echo '
                                                <option value="' . $row2['gender_id'] .
                                                                        '">' . $row2['gender_name'] . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option disabled>Select Gender</option>
                                                        <option value="' . $row['gender_id'] .
                                                                    '" selected >' . $row['gender_name'] . '</option>';
                                                                $get_gender = mysqli_query($conn, "SELECT * FROM tbl_genders WHERE gender_id NOT IN (" . $row['gender_id'] . ")");
                                                                while ($row3 = mysqli_fetch_array($get_gender)) {
                                                                    echo '<option value="' . $row3['gender_id'] . '">'
                                                                        . $row3['gender_name'] . '</option>';
                                                                }
                                                            } ?>
                                                    </select>

                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Nationality</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Nationality"
                                                        value="<?php echo $row['nationality']; ?>" name="nationality">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Religion</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" placeholder="Religion"
                                                        value="<?php echo $row['religion']; ?>" name="religion">
                                                </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                ACR #</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="ACR Number" value="<?php echo $row['acr']; ?>"
                                                        name="acr">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Landline No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Landline Number"
                                                        value="<?php echo $row['landline']; ?>" name="landline">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Cell Phone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Cellphone Number"
                                                        value="<?php echo $row['cellphone']; ?>" name="cellphone">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                                <div class="input-group col-xl-7 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Address</b></span>
                                                    </div>
                                                    <input type="email" class="form-control focss"
                                                        placeholder="example@gmail.com"
                                                        value="<?php echo $row['email']; ?>" name="email">
                                                </div>


                                                <div class="input-group col-xl-5 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Level applied for</b></span>
                                                    </div>
                                                    <select class="form-control custom-select select2 select2-purple"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Grade Level" name="app_grade_level">
                                                        <?php if (empty($row['app_grade_level'])) {
                                                                echo '<option value="None" disabled selected>Select Grade Level</option>';
                                                                $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                                while ($row2 = mysqli_fetch_array($get_glevel)) {
                                                                    echo '<option value="' . $row2['grade_level'] . '">'
                                                                        . $row2['grade_level'] . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option disabled>Select Grade Level</option>
                                                        <option value="' . $row['app_grade_level'] . '" selected>'
                                                                    . $row['app_grade_level'] . '</option>';
                                                                $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level NOT IN ('" . $row['app_grade_level'] . "') ");
                                                                while ($row3 = mysqli_fetch_array($get_glevel)) {
                                                                    echo '<option value="' . $row3['grade_level'] . '">'
                                                                        . $row3['grade_level'] . '</option>';
                                                                }
                                                            }
                                                            ?>

                                                    </select>
                                                </div>
                                        </div>


                                        <div class="row mb-4">
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Name of Father</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" placeholder="Fullname"
                                                        value="<?php echo $row['fname']; ?>" name="fname">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Name of Mother</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" placeholder="Fullname"
                                                        value="<?php echo $row['mname']; ?>" name="mname">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Age</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Age" value="<?php echo $row['fage']; ?>"
                                                        name="fage">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Age</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Age" value="<?php echo $row['mage']; ?>"
                                                        name="mage">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Add.</b></span>
                                                    </div>
                                                    <input type="email" class="form-control focss"
                                                        placeholder="(Father) Email Address"
                                                        value="<?php echo $row['femail']; ?>" name="femail">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Add.</b></span>
                                                    </div>
                                                    <input type="email" class="form-control focss"
                                                        placeholder="(Mother) Email Address"
                                                        value="<?php echo $row['memail']; ?>" name="memail">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                        <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Landline No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Landline Number"
                                                        value="<?php echo $row['flandline']; ?>" name="flandline">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Landline No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Landline Number"
                                                        value="<?php echo $row['mlandline']; ?>" name="mlandline">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                        <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Contact No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Contact Number"
                                                        value="<?php echo $row['fcontact']; ?>" name="fcontact">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Contact No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Contact Number"
                                                        value="<?php echo $row['mcontact']; ?>" name="mcontact">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                        <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Educational Attain.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Educational Attainment"
                                                        value="<?php echo $row['feduc_attain']; ?>" name="feduc_attain">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Educational Attain.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Educational Attainment"
                                                        value="<?php echo $row['meduc_attain']; ?>" name="meduc_attain">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Last School Attend.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Last School Attended"
                                                        value="<?php echo $row['flast_sch_att']; ?>"
                                                        name="flast_sch_att">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Last School Attend.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Last School Attended"
                                                        value="<?php echo $row['mlast_sch_att']; ?>"
                                                        name="mlast_sch_att">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Occupation</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Father Occupation"
                                                        value="<?php echo $row['focc']; ?>" name="focc">
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Occupation</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Mother Occupation"
                                                        value="<?php echo $row['mocc']; ?>" name="mocc">
                                                </div>
                                        </div>

                                        <div class="row mb-4">
                                        <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Employer</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Employer (Name of the Company)"
                                                        value="<?php echo $row['femployer']; ?>" name="femployer">
                                                </div>
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Employer</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Employer (Name of the Company)"
                                                        value="<?php echo $row['memployer']; ?>" name="memployer">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Business Add.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Business Address"
                                                        value="<?php echo $row['fbus_ad']; ?>" name="fbus_ad">
                                                </div>
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Business Add.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Business Address"
                                                        value="<?php echo $row['mbus_ad']; ?>" name="mbus_ad">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                        <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Office Phone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Father) Office Phone Number"
                                                        value="<?php echo $row['fof_ph_no']; ?>" name="fof_ph_no">
                                                </div>
                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Office Phone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="(Mother) Office Phone Number"
                                                        value="<?php echo $row['mof_ph_no']; ?>" name="mof_ph_no">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                                <div class="input-group col-xl-5 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Monthly Income</b></span>
                                                    </div>
                                                    <input type="number" class="form-control focss"
                                                        placeholder="(Father) Monthly Income"
                                                        value="<?php echo $row['fmonth_inc']; ?>" name="fmonth_inc">
                                                </div>

                                                <div class="input-group col-xl-5 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Monthly Income</b></span>
                                                    </div>
                                                    <input type="number" class="form-control focss"
                                                        placeholder="(Mother) Monthly Income"
                                                        value="<?php echo $row['mmonth_inc']; ?>" name="mmonth_inc">
                                                </div>


                                                <input type="text" class="form-control focss"
                                                    placeholder="Family Income" value="<?php echo $row['month_inc']; ?>"
                                                    name="month_inc" hidden>
                                        </div>

                                        <hr class="mb-4">

                                        <div class="row mb-4">
                                                <div class="input-group col-xl-7 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Guardian N.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Guardian Name"
                                                        value="<?php echo $row['guardname']; ?>" name="guardname">
                                                </div>

                                                <div class="input-group col-xl-5 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Relationship</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Relationship"
                                                        value="<?php echo $row['grelation'] ?>" name="grelation">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Address</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" name="gaddress"
                                                        value="<?php echo $row['gaddress']; ?>"
                                                        placeholder="Unit number, house number, street name, barangay, city, province">
                                                </div>
                                        </div>
                                        <div class="row mb-4">
                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Tel no.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" name="gtel_no"
                                                        value="<?php echo $row['gtel_no']; ?>"
                                                        placeholder="Telephone Number">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Cellphone No.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss" name="gcontact"
                                                        value="<?php echo $row['gcontact']; ?>"
                                                        placeholder="Cellphone Number">
                                                </div>

                                                <div class="input-group col-xl-4 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Email Ad.</b></span>
                                                    </div>
                                                    <input type="email" class="form-control focss" name="gemail"
                                                        value="<?php echo $row['gemail']; ?>"
                                                        placeholder="Email Address">
                                                </div>
                                        </div>

                                        <hr class="mb-4">

                                        <div class="text-center mb-3">
                                                <h3>Siblings (from eldest to youngest)</h3>
                                            </div>




                                            <div class="row mb-3">

                                                <div class=" col-xl-3 mb-2">

                                                    <label for="exampleInputBorder">Name:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Name" value="<?php echo $row['sib1_name']; ?>"
                                                        name="sib1_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Name" value="<?php echo $row['sib2_name']; ?>"
                                                        name="sib2_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Name" value="<?php echo $row['sib3_name']; ?>"
                                                        name="sib3_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Name" value="<?php echo $row['sib4_name']; ?>"
                                                        name="sib4_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Name" value="<?php echo $row['sib5_name']; ?>"
                                                        name="sib5_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Name" value="<?php echo $row['sib6_name']; ?>"
                                                        name="sib6_name">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Name" value="<?php echo $row['sib7_name']; ?>"
                                                        name="sib7_name">
                                                </div>

                                                <div class=" col-xl-1 mb-2">

                                                    <label for="exampleInputBorder">Age:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib1_age']; ?>"
                                                        name="sib1_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib2_age']; ?>"
                                                        name="sib2_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib3_age']; ?>"
                                                        name="sib3_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib4_age']; ?>"
                                                        name="sib4_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib5_age']; ?>"
                                                        name="sib5_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib6_age']; ?>"
                                                        name="sib6_age">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Age" value="<?php echo $row['sib7_age']; ?>"
                                                        name="sib7_age">
                                                </div>
                                                <div class=" col-xl-2 mb-2">

                                                    <label for="exampleInputBorder">Civil Status:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib1_civ']; ?>" name="sib1_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib2_civ']; ?>" name="sib2_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib3_civ']; ?>" name="sib3_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib4_civ']; ?>" name="sib4_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib5_civ']; ?>" name="sib5_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib6_civ']; ?>" name="sib6_civ">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Civil Status"
                                                        value="<?php echo $row['sib7_civ']; ?>" name="sib7_civ">

                                                </div>

                                                <div class=" col-xl-3 mb-2">

                                                    <label for="exampleInputBorder">School:</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib1_sch']; ?>"
                                                        name="sib1_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib2_sch']; ?>"
                                                        name="sib2_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib3_sch']; ?>"
                                                        name="sib3_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib4_sch']; ?>"
                                                        name="sib4_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib5_sch']; ?>"
                                                        name="sib5_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib6_sch']; ?>"
                                                        name="sib6_sch">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="School" value="<?php echo $row['sib7_sch']; ?>"
                                                        name="sib7_sch">
                                                </div>


                                                <div class=" col-xl-3 mb-2">

                                                    <label for="exampleInputBorder">Educ. Background</label>

                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib1_educbg']; ?>" name="sib1_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib2_educbg']; ?>" name="sib2_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib3_educbg']; ?>" name="sib3_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib4_educbg']; ?>" name="sib4_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib5_educbg']; ?>" name="sib5_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib6_educbg']; ?>" name="sib6_educbg">
                                                    <input type="text" id="exampleInputBorder"
                                                        class="form-control focss form-control-border focs"
                                                        placeholder="Educational Background"
                                                        value="<?php echo $row['sib7_educbg']; ?>" name="sib7_educbg">

                                                </div>


                                            </div>

                                            <hr class="mb-4">

                                            <div class=" row mb-3 mt-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                SCH. Last Attended</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="School Last Attended" name="last_attend"
                                                        value="<?php echo $row['last_sch']; ?>">
                                                </div>
                                            </div>

                                            <div class=" row mb-3">

                                                <!-- <div class="input-group col-xl-4 mb-2 ml-auto mr-auto">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                No. of Siblings</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Number of Siblings"
                                                        value="<?php echo $row['no_siblings']; ?>" name="no_sib">
                                                </div> -->

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Previous Grade Level</b></span>
                                                    </div>
                                                    <select class="form-control custom-select select2 select2-purple"
                                                        data-dropdown-css-class="select2-purple"
                                                        data-placeholder="Select Grade Level" name="prev_grade_level">
                                                        <?php if (empty($row['prev_grade_level'])) {
                                                                echo '<option value="None" disabled selected>Select Grade Level</option>
                                                            <option value="None">N/A</option>';
                                                                $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels");
                                                                while ($row2 = mysqli_fetch_array($get_glevel)) {
                                                                    echo '<option value="' . $row2['grade_level'] . '">'
                                                                        . $row2['grade_level'] . '</option>';
                                                                }
                                                            } else {
                                                                echo '<option disabled>Select Grade Level</option>
                                                        <option value="' . $row['prev_grade_level'] . '" selected>'
                                                                    . $row['prev_grade_level'] . '</option>';
                                                                $get_glevel = mysqli_query($conn, "SELECT * FROM tbl_grade_levels WHERE grade_level NOT IN ('" . $row['prev_grade_level'] . "') ");
                                                                while ($row3 = mysqli_fetch_array($get_glevel)) {
                                                                    echo '<option value="' . $row3['grade_level'] . '">'
                                                                        . $row3['grade_level'] . '</option>';
                                                                }
                                                            }
                                                            ?>

                                                    </select>
                                                </div>

                                                <div class="input-group col-xl-6 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                School Year</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        data-inputmask-alias="datetime"
                                                        data-inputmask-inputformat="yyyy-yyyy" data-mask
                                                        placeholder="School Year" name="sch_year"
                                                        value="<?php echo $row['sch_year']; ?>">
                                                </div>

                                            </div>

                                            <div class=" row mb-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                School Address</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="School Address" name="sch_address"
                                                        value="<?php echo $row['sch_address']; ?>">
                                                </div>

                                            </div>

                                            <div class=" row mb-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Honors & Awards</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss focss"
                                                        placeholder="Honors & Awards" name="honor"
                                                        value="<?php echo $row['honor']; ?>">
                                                </div>

                                            </div>

                                            <hr class=" mb-3">

                                            <div class="text-center mb-3">
                                                <h3>Special Talents/Skills <small>(please check)</small> </h3>
                                            </div>


                                            <div class="form-group row mb-1 justify-content-center mr-auto ml-auto">

                                                <?php
                                                    if (!empty($row['talent'])) {
                                                        $get_talent = $row['talent'];
                                                        $res_talent = explode(",", $get_talent);
                                                    }  ?>

                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox1" value="Dancing"
                                                        name="talent[]"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                                                    if (in_array("Dancing", $res_talent)) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    }
                                                                                                                                                                                                } ?>>
                                                    <label for="customCheckbox1"
                                                        class="custom-control-label font-weight-normal">
                                                        Dancing</label>
                                                </div>


                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox2" value="Singing"
                                                        name="talent[]"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                                                    if (in_array("Singing", $res_talent)) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    }
                                                                                                                                                                                                } ?>>
                                                    <label for="customCheckbox2"
                                                        class="custom-control-label font-weight-normal">
                                                        Singing</label>
                                                </div>


                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox3"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Basketball", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>
                                                        name="talent[]" value="Basketball">
                                                    <label for="customCheckbox3"
                                                        class="custom-control-label font-weight-normal">
                                                        Basketball</label>
                                                </div>

                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox4"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Volleyball", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>
                                                        name="talent[]" value="Volleyball">
                                                    <label for="customCheckbox4"
                                                        class="custom-control-label font-weight-normal">
                                                        Volleyball</label>
                                                </div>



                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox5"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Chess", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>
                                                        name="talent[]" value="Chess">
                                                    <label for="customCheckbox5"
                                                        class="custom-control-label font-weight-normal">
                                                        Chess</label>
                                                </div>



                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox6"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Tennis", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>
                                                        name="talent[]" value="Tennis">
                                                    <label for="customCheckbox6"
                                                        class="custom-control-label font-weight-normal">
                                                        Table Tennis</label>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-1 justify-content-center mr-auto ml-auto">

                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox7"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Drawing", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>
                                                        name="talent[]" value="Drawing">
                                                    <label for="customCheckbox7"
                                                        class="custom-control-label font-weight-normal">
                                                        Drawing</label>
                                                </div>



                                                <div class="custom-control col-md-2 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox8"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Painting", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>
                                                        name="talent[]" value="Painting">
                                                    <label for="customCheckbox8"
                                                        class="custom-control-label font-weight-normal">
                                                        Painting</label>
                                                </div>


                                                <div class="custom-control col-md-6 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox9"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                    if (in_array("Music", $res_talent)) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>
                                                        name="talent[]" value="Music">
                                                    <label for="customCheckbox9"
                                                        class="custom-control-label font-weight-normal">
                                                        Playing Musical Instrument</label>
                                                    <label class="mb-0 font-weight-normal">,
                                                        Specify:</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="text" class="form-control form-control-border focs"
                                                            value="<?php echo $row['spec']; ?>" name="spec">
                                                    </div>

                                                </div>
                                                <div class="custom-control col-md-2 custom-checkbox">
                                                </div>
                                            </div>


                                            <div class="form-group justify-content-center row mb-1 mr-auto ml-auto">
                                                <div class="custom-control col-md-5 custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-purple"
                                                        type="checkbox" id="customCheckbox10" value="other"
                                                        name="talent[]"
                                                        <?php if (!empty($res_talent)) {
                                                                                                                                                                                                if (in_array("other", $res_talent)) {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                }
                                                                                                                                                                                            } ?>>
                                                    <label for="customCheckbox10"
                                                        class=" custom-control-label font-weight-normal">
                                                        Other</label>

                                                    <label class="font-weight-normal mb-0">, Please Specify:</label>

                                                    <input type="text" class="form-control form-control-border focs"
                                                        value="<?php echo $row['other']; ?>" name="other">

                                                </div>

                                                <div class="custom-control col-md-7 custom-checkbox">
                                                </div>


                                            </div>

                                            <div class="form-group row mb-3 mt-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Academic</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Academic Competitions Joined" name="acad_c"
                                                        value="<?php echo $row['acad_c']; ?>">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3 mt-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Sports</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Sports Competitions Joined" name="sport_c"
                                                        value="<?php echo $row['sport_c']; ?>">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3 mt-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                School Org.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Memberhip in School Organization" name="sch_m"
                                                        value="<?php echo $row['sch_m']; ?>">
                                                </div>

                                            </div>

                                            <div class="form-group row mb-3 mt-3">

                                                <div class="input-group col-xl-12 mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-sm"><b>
                                                                Community / Religious
                                                                Org.</b></span>
                                                    </div>
                                                    <input type="text" class="form-control focss"
                                                        placeholder="Membership in Community / Religious Organization"
                                                        name="comrel_m" value="<?php echo $row['comrel_m']; ?>">
                                                </div>

                                            </div>




                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm float-right ml-2"
                                            name="submit">Upadate Info
                                            </button>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </form>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include '../../includes/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include '../../includes/script.php'; ?>
</body>

</html>
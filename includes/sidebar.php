  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-danger navbar-dark">
      <img src="../../docs/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-light"><b>BED Taguig</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
                        if (!empty($row['img'])) {
                        ?>
                        <img style="width: 40px; height: 40px;" src="data:image/jpeg;base64,<?php echo base64_encode($row['img']) ?>" class="img-circle elevation-2 mt-2" alt="User Image">
                        <?php
                        } else {
                        ?>
                        <img style="width: 40px; height: 40px;" src="../../docs/assets/img/user.png" class="img-circle elevation-2 mt-2" alt="User Image">
                        <?php
                        }
                        ?>
        </div>
        <div class="info">
          <a class="d-block text-dark"><?php echo $_SESSION['name']; ?></a>
          <p class="mb-0 text-dark"><small><?php echo $_SESSION['role']; ?></small></p>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="../dashboard/index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php
            if ($_SESSION['role'] == "Super Administrator") { /////////////////////// Super Administrator sidebar
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                User Lists
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../super_admin/list.principal.php" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Principals List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/list.registrar.php" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Registrars List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/list.accounting.php" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Accountings List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/list.admission.php" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Admissions List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/list.adviser.php" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Advisers List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/list.teacher.php" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>Teachers List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Add User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="../super_admin/add.principal.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add Principal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/add.registrar.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add Registrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/add.accounting.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add Accounting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/add.admission.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add Admission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/add.adviser.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add Adviser</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../super_admin/add.teacher.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add Teacher</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
            } elseif ($_SESSION['role'] == "Registrar") { /////////////////////// Registrar sidebar
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Enrollment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../student/list.enrolled.students.php" class="nav-link">
                  <i class="fas fa-user-check nav-icon"></i>
                  <p>Confirm Students</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add Users
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../student/add.student.php" class="nav-link">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Student</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../super_admin/add.adviser.php" class="nav-link">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Adviser</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Users List
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../student/list.students.php" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Student</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../super_admin/list.adviser.php" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Adviser</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add Subjects
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../subject/add.subject.senior.php" class="nav-link">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Senior</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../subject/add.subject.php" class="nav-link">
                      <i class="fas fa-plus nav-icon"></i>
                      <p>Primary to Junior</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-folder nav-icon"></i>
                  <p>Subjects List
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../subject/list.subject.senior.php" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Senior</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../subject/list.subject.php" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Primary to Junior</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Forms
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Pre-Enrollment
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Registrar's
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-folder nav-icon"></i>
                  <p>SHS Forms
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../grade/student.record.php" class="nav-link">
                      <i class="fas fa-file nav-icon"></i>
                      <p>Senior</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../grade/student.record.php" class="nav-link">
                      <i class="fas fa-file nav-icon"></i>
                      <p>Primary to Junior</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../academic_year/set.academic.year.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Set Sem and A.Y.
              </p>
            </a>
          </li>
          <?php
            } elseif ($_SESSION['role'] == "Principal") { 
          ?>
          <?php
            } elseif ($_SESSION['role'] == "Accounting") {
          ?>
          <?php
            } elseif ($_SESSION['role'] == "Admission") {
          ?>
          <?php
            } elseif ($_SESSION['role'] == "Teacher") {
          ?>
          <?php
            } elseif ($_SESSION['role'] == "Adviser") {
          ?>
          <?php
            } elseif ($_SESSION['role'] == "Student") {
          ?>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                User Info
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Enroll Now!
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <?php
            }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
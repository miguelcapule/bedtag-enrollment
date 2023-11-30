<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>

<script>
  $(function () {
  bsCustomFileInput.init();
});
      $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
        });
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example4').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  <?php
  if (isset($_SESSION['update_success'])) {
    ?>
    $(function () {
      toastr.success('Update Success.', 'Success')
    });
    <?php
  } elseif (isset($_SESSION['password_unmatch'])) {
    ?>
    $(function () {
      toastr.error('Password did not match.', 'Error')
    });
    <?php
  } elseif (isset($_SESSION['success'])) {
    ?>
    $(function () {
      toastr.success('Success!', 'Success')
    });
    <?php
  } elseif (isset($_SESSION['no_pass'])) {
    ?>
    $(function () {
      toastr.error('No password inputed!', 'Error')
    });
    <?php
  } elseif (isset($_SESSION['no_image'])) {
    ?>
    $(function () {
      toastr.error('No image selected!', 'Error')
    });
    <?php
  } elseif (isset($_SESSION['lrn-studno'])) {
    ?>
    $(function () {
      toastr.error('LRN and student number already exists!', 'Error')
    });
    <?php
  } elseif (isset($_SESSION['double-lrn'])) {
    ?>
    $(function () {
      toastr.error('LRN number already exists!', 'Error')
    });
    <?php
  } elseif (isset($_SESSION['double-studno'])) {
    ?>
    $(function () {
      toastr.error('Student number already exists!', 'Error')
    });
    <?php
  } elseif (isset($_SESSION['subject_exists'])) {
    ?>
    $(function () {
      toastr.error('Subject already exists!', 'Error')
    });
    <?php
  } 
  unset($_SESSION['update_success']);
  unset($_SESSION['password_unmatch']);
  unset($_SESSION['success']);
  unset($_SESSION['no_pass']);
  unset($_SESSION['no_image']);
  unset($_SESSION['double-studno']);
  unset($_SESSION['lrn-studno']);
  unset($_SESSION['double-lrn']);
  unset($_SESSION['subject_exists']);
  ?>
</script>
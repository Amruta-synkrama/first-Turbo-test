</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong>Copyright &copy; 2020 Turbores.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>theme/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>theme/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>theme/plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>theme/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>theme/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>theme/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>theme/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>theme/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>theme/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>theme/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>theme/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>theme/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->

<script src="<?php echo base_url(); ?>theme/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>theme/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>theme/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>theme/dist/js/demo.js"></script>

<script>
  $(function () {
    $('.select2').select2();

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('body').on('click','.delete-something-cust', function(e){
      e.preventDefault();
      var Href = $(this).attr('href');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          window.location.href = Href;
        }
      });
    });
  });
</script>
<?php
if($this->session->flashdata('success_message')) {
  ?>
  <script type="text/javascript">
      $(function() {
      toastr.success('Added successfully.');
    });
  </script>
  <?php
} elseif($this->session->flashdata('delete_message')) {
  ?>
  <script>
    $(function() {
      toastr.success('Deleted successfully.');
    });
  </script>
  <?php
} elseif($this->session->flashdata('update_message')) {
  ?>
  <script>
    $(function() {
      toastr.success('Updated successfully.');
    });
  </script>
  <?php
}
?>
</body>
</html>

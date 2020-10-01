</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong>Copyright &copy; 2020 Turbores.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		
	</div>
</footer>


<div class="modal fade modal_info"  id="modal_<?php echo $this->uri->segment(1); ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Tour Guide Modal</h4>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span></button> -->
      </div>
      <div class="modal-body">
        <?php
          $url = $this->uri->segment(1);
          switch ($url) {
            case "dashboard":
            echo "dashboard";
            break;
            case "admin_profile":
            echo "admin_profile";
            break;
            case "register":
            echo "register";
            break;
            case "hotels":
            echo "hotels";
            break;
            case "company_employees":
            echo "company_employees";
            break;
            case "register_employee":
            echo "register_employee";
            break;
            case "hotel_employees":
            echo "hotel_employees";
            break;
            case "hotel_branches":
            echo "hotel_branches";
            break;
            case "companies":
            echo "companies";
            break;
            case "links":
            echo "links";
            break;
            case "hotel_profile":
            echo "hotel_profile";
            break;
            case "company_profile":
            echo "company_profile";
            break;
          }
        ?>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" id="close_<?php echo $url?>" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

 <div id="popover-content">
  <?php
    $url = $this->uri->segment(1);
    switch ($url) {
      case "dashboard":
      echo "dashboard";
      break;
      case "admin_profile":
      echo "admin_profile";
      break;
      case "register":
      echo "register";
      break;
      case "hotels":
      echo "hotels";
      break;
      case "company_employees":
      echo "company_employees";
      break;
      case "register_employee":
      echo "register_employee";
      break;
      case "admins":
      echo "admins";
      break;
      case "hotel_employees":
      echo "hotel_employees";
      break;
      case "hotel_branches":
      echo "hotel_branches";
      break;
      case "companies":
      echo "companies";
      break;
      case "links":
      echo "links";
      break;
      case "hotel_profile":
      echo "hotel_profile";
      break;
      case "company_profile":
      echo "company_profile";
      break;
    }
  ?>
 </div>   

<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
	<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>theme/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>theme/dist/js/lightbox.js"></script>
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
<!-- jquery-validation -->
<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url(); ?>assets/js/validator.js"></script> 
 <!-- InputMask -->
 <script src="<?php echo base_url(); ?>theme/plugins/moment/moment.min.js"></script>
 <script src="<?php echo base_url(); ?>theme/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>theme/dist/js/demo.js"></script>

<script>
  $(function () {
    $('.select2').select2();

    $('[data-mask]').inputmask();

    // $('form[method="post"]').validate();

    /*$('body').on('click','.nav-link', function(){
      $('.form-horizontal').validate();
    });*/

    /*$("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });*/
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

            
    // Setup - add a text input to each footer cell
    $('.dataFrame').attr('id', 'example1');
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" style="width:150px;" />' );
      $( 'input', this ).on( 'keyup change', function () {
        if ( table.column(i).search() !== this.value ) {
          table
          .column(i)
          .search( this.value )
          .draw();
        }
      } );
    } );

    var table = $('#example1').DataTable( {
      orderCellsTop: true,
      fixedHeader: true,
      responsive: true,
      autoWidth: false
    } );

    var today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1)

    var date = tomorrow.getFullYear()+'-'+(tomorrow.getMonth()+1)+'-'+tomorrow.getDate();

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L',
        minDate: date
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
        confirmButtonText: 'Yes, deactivate it!'
      }).then((result) => {
        if (result.value) {
          window.location.href = Href;
        }
      });
    });

    $('body').on('click','.reject-something-cust', function(e){
      e.preventDefault();
      var Href = $(this).attr('href');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reject it!'
      }).then((result) => {
        if (result.value) {
          window.location.href = Href;
        }
      });
    });

    $('body').on('click','.activate-something-cust', function(e){
      e.preventDefault();
      var Href = $(this).attr('href');
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to activate this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Activate it!'
      }).then((result) => {
        if (result.value) {
          window.location.href = Href;
        }
      });
    });
    
    
    // $("a.fancy-example").fancybox({
    //   'titleShow'     : false
    // });
    

    $("#logoutBtn").click(function(){
      localStorage.clear();
    })
  });

 


</script>
<?php
if($this->session->flashdata('success_message')) {
  ?>
  <script type="text/javascript">
    $(function() {
      toastr.success('<?php echo $this->session->flashdata('success_message') ?>');
    });
  </script>
  <?php
  }


if($_SESSION['user_data']->first_login == 0){ ?>
<script>
  $(document).ready(function() {
    var url      = location.pathname.split('/');
    var secondLastSegment = url[url.length - 1];
    var urls = ["dashboard","admins","admin_profile","register","hotels","company_employees","register_employee","hotel_employees","hotel_branches","companies","links","hotel_profile","company_profile"];
    var modalArray  = JSON.parse(localStorage.getItem("modalName"));
    var hasUrl = false;
    if (modalArray !=null) {
      var hasUrl = modalArray.includes(secondLastSegment); //true
    }
    
    var popOverSettings = {
      placement: 'left',
      container: 'body',
      delay: {show: "500",hide: "00"},
      html: true,
      trigger: 'focus',
      selector: '[rel="popover"]',
      content: function() {
        var popover =  $('#popover-content');
        popover.show();
        popover = popover.append('<a href="#" id="xl" class="btn btn-secondary">Close</a>');
        return popover;   
      }
    }

    if (urls.includes(secondLastSegment) && !hasUrl) {
      $(".modal_info").modal({ show: true,backdrop: 'static', keyboard: false });
      
    }

    $("#close_<?php echo $url?>").click(function(){
      var id = $('a.active').attr('id');
      $('#' + id).popover(popOverSettings).popover('show');
      $(".wrapper").addClass('overlay');
      if (typeof(Storage) !== "undefined") {
        var getModalName = JSON.parse(localStorage.getItem("modalName"));
        if(getModalName){
          let modalName = $(this).parent().parent().parent().parent().attr('id') + "," + getModalName;
          localStorage.setItem("modalName", JSON.stringify(modalName));
        }else{
          localStorage.setItem("modalName", JSON.stringify($(this).parent().parent().parent().parent().attr('id')));
        }
      } else {
        alert("Sorry, your browser does not support Web Storage...");
      }
    });


    $('body').on('click','#xl', function(e){
      $('[rel="popover"]').popover('hide');
      $(".wrapper").removeClass('overlay');
    })

  });
 
</script>
<?php } ?>

</body>
</html>



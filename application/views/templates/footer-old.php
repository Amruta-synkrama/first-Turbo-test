</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong>Copyright &copy; 2020 Turbores.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		
	</div>
</footer>


<div class="modal fade modal_info-cust"  id="modal_<?php echo $this->uri->segment(1); ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Tour Guide Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">
            </div>
            <div class="carousel-item">
              <ol>
                  <li>item 1</li>
                  <li>item 2</li>
                  <li>item 3</li>
                  <li>item 4</li>
              </ol>
              <!-- <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide"> -->
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" id="close_<?php echo $this->uri->segment(1)?>">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
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
        <button type="button" class="btn btn-outline-light btn btn-default" id="close_<?php echo $url?>" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

 <div id="popover-content" style="display: none;">
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
      $(this).html( '<input type="text" title="Search '+title+'" placeholder="Search '+title+'" style="width:100px;" />' );
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

    $('body').on('click','.remove-something-cust', function(e){
      e.preventDefault();
      var Href = $(this).attr('href');
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to remove this from meter?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Remove this!'
      }).then((result) => {
        if (result.value) {
          window.location.href = Href;
        }
      });
    });

    $('body').on('click','.add-something-cust', function(e){
      e.preventDefault();
      var Href = $(this).attr('href');
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to add this to meter?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Add this!'
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

<script>
$(document).ready(function() {
        
        $('#password').keyup(function() {
            var password = $('#password').val();
            if (checkStrength(password) == false) {
                $('#sign-up').attr('disabled', true);
            }
        });
        

        

        function checkStrength(password) {
            var strength = 0;


            //If password contains both lower and uppercase characters, increase strength value.
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                $('.low-upper-case').addClass('text-success');
                $('.low-upper-case i').removeClass('fa-times').addClass('fa-check');
                $('#popover-password-top').addClass('hide');


            } else {
                $('.low-upper-case').removeClass('text-success');
                $('.low-upper-case i').addClass('fa-times').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has numbers and characters, increase strength value.
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                strength += 1;
                $('.one-number').addClass('text-success');
                $('.one-number i').removeClass('fa-times').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-number').removeClass('text-success');
                $('.one-number i').addClass('fa-times').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has one special character, increase strength value.
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                $('.one-special-char').addClass('text-success');
                $('.one-special-char i').removeClass('fa-times').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-special-char').removeClass('text-success');
                $('.one-special-char i').addClass('fa-times').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            if (password.length > 7) {
                strength += 1;
                $('.eight-character').addClass('text-success');
                $('.eight-character i').removeClass('fa-times').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.eight-character').removeClass('text-success');
                $('.eight-character i').addClass('fa-times').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }




            // If value is less than 2

            if (strength < 2) {
                $('#result').removeClass()
                $('#password-strength').addClass('progress-bar-danger');

                $('#result').addClass('text-danger').text('Very Week');
                $('#password-strength').css('width', '10%');
                $('#password-submit').prop('disabled',true);
                $('#password-submit').attr('disabled','disabled');
            } else if (strength == 2) {
                $('#result').addClass('good');
                $('#password-strength').removeClass('progress-bar-danger');
                $('#password-strength').addClass('progress-bar-warning');
                $('#result').addClass('text-warning').text('Week')
                $('#password-strength').css('width', '60%');
                $('#password-submit').prop('disabled',true);
                $('#password-submit').attr('disabled','disabled');
                return 'Week'
            } else if (strength == 4) {
                $('#result').removeClass()
                $('#result').addClass('strong');
                $('#password-strength').removeClass('progress-bar-warning');
                $('#password-strength').addClass('progress-bar-success');
                $('#result').addClass('text-success').text('Strong');
                $('#password-strength').css('width', '100%');
                $('#password-submit').prop('disabled',false);
                $('#password-submit').removeAttr('disabled');

                return 'Strong'
            }

        }

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

/**
 * Session Tour guide JS
 */
/*if($_SESSION['user_data']->first_login == 0){ ?>
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
      $(".modal_info-cust").modal({ show: true,backdrop: 'static', keyboard: false });
      
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
<?php }*/ ?>

</body>
</html>



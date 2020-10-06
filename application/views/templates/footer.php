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
        <h4 class="modal-title text-center">Welcome User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php
          $url = $this->uri->segment(1);
          switch ($url) {
            case "dashboard":
            // echo "dashboard";
            if($session->entity == 'Hotel') :
            ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <p>Dashboard - On your dashboard, you’re able to see at a glance how many companies are working with Turbo Res, active links that you have with organizations, and the most recent companies that have joined the Turbo Res network.</p>
                  <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/profile.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <p>Profile - On your profile, you’re able to update the information that companies see about your property(s) including, but not limited to: pictures, contact information, amenities, and your website.</p>
                  <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/dashboard.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <p>Register Employee - In the register employee page, you’re able to add a user that belongs to your organization so they can have the same access as you. </p>
                  <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/register-emp.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <p>Hotel Employees - In the hotel employees page, you can see all employees that you’ve given access to, edit their information, and remove access if need be. </p>
                  <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/hotel-emp.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <p>Hotel Properties - In the Hotel Properties page you’re able to add locations to your franchise. That way companies can link to specific branches and get their rates rather than your entire franchise.</p>
                  <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/branches.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <p>Companies - In the Companies page, you can see all the companies that are in the Turbo Res network and request a link with them. This will put you in contact with the company representative.</p>
                  <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/companies.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <p>Links - In the links page, you can view all active and expired links that you have with companies in the Turbo Res network. This is where you can edit and/or delete existing links.</p>
                  <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/links.png" alt="Third slide">
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
            elseif($session->entity == 'RFP') :
            ?>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <p>Dashboard - On your dashboard, you’re able to see at a glance how many hotels are working with TurboRes total, active links that you have with hotels, and the most recent hotels that have joined the TurboRes network.</p>
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/RFP/dashboard.png" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <p>Profile - On your profile, you’re able to update the information that hotels see about your business including, but not limited to: pictures, contact information, company description, and your website. </p>
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/RFP/profile.png" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <p>Register Employee - In the register employee page, you’re able to add a user that belongs to your organization so they can have the same access as you.  </p>
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/register-emp.png" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <p>Company Employees - In the company employees page, you can see all employees that you’ve given access to, edit their information, and remove access if need be.  </p>
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/RFP/company-emp.png" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <p>Hotels - In the Hotels page, you can see all the hotels that are in the TurboRes network. If you want to make a link with a hotel, fill out the form on the TurboRes website or contact us directly, and we’ll connect you with the hotel representative. </p>
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/RFP/hotels-list.png" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <p>Links - In the links page, you can view all active and expired links that you have with hotels in the TurboRes network. This is where you can edit and/or delete existing links. </p>
                    <img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/tour/hotels/links.png" alt="Third slide">
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
            endif;
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
      <!-- <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light btn btn-default" id="close_<?php //echo $url?>" data-dismiss="modal">Close</button>
      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php /* if($session->first_login == 0) : 
  if($session->entity == 'Hotel' || $session->entity == 'RFP') : ?>
<?php endif; endif; */ ?>
<!-- /.modal -->
<?php /* ?>
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
 <?php */ ?>

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
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>


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
 if($session->first_login == 0) : 
  if($session->entity == 'Hotel' || $session->entity == 'RFP') : 
  $urls = ["dashboard","admins","admin_profile","register","hotels","company_employees","register_employee","hotel_employees","hotel_branches","companies","links","hotel_profile","company_profile"];
  if(!isset($_COOKIE['modal_cookies']) && empty($_COOKIE['modal_cookies'])) {
    setcookie('modal_cookies', serialize($urls), time() + (86400 * 30), "/");
    ?>
    <script>    
      $(".modal_info-cust").modal({ show: true,backdrop: 'static', keyboard: false });
    </script>
    <?php
  } else {
    /*$urls_data = $_COOKIE['modal_cookies'];
    $urls_data_arr = unserialize($urls_data);
    $url = $this->uri->segment(1);
    if (in_array($url, $urls_data_arr)) {
      ?>
      <script>    
        $(".modal_info-cust").modal({ show: true,backdrop: 'static', keyboard: false });
      </script>
      <?php
      $key = array_search($url, $urls_data_arr);
      unset($urls_data_arr[$key]);
      $urls_data_arr = array_values($urls_data_arr);

      setcookie('modal_cookies', serialize($urls_data_arr), time() + (86400 * 30), "/");*/
    }
endif;
endif;
  /*
if($session->first_login == 0){
 ?>
<script>
  $(document).ready(function() {
    var url      = location.pathname.split('/');
    var secondLastSegment = url[url.length - 1];
    console.log(secondLastSegment);
    console.log(localStorage.getItem("modalName"));
    var urls = ["dashboard","admins","admin_profile","register","hotels","company_employees","register_employee","hotel_employees","hotel_branches","companies","links","hotel_profile","company_profile"];
    if(localStorage.getItem("modalName") != 'undefined' && localStorage.getItem("modalName") != null) {
      var modalArray  = JSON.parse(localStorage.getItem("modalName"));
      var hasUrl = false;
      if (modalArray != null && modalArray != undefined) {
        var hasUrl = modalArray.includes(secondLastSegment); //true
      }
    }

    if (urls.includes(secondLastSegment) && !hasUrl) {
      $(".modal_info-cust").modal({ show: true,backdrop: 'static', keyboard: false });
    }

    $("#close_<?php echo $url?>").click(function(){
      var id = $('a.active').attr('id');
      
      if (localStorage.getItem("modalName") !== "undefined") {
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


    

  });
 
</script>
<?php } */ ?>

</body>
</html>



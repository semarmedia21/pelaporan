<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("admin/_partials/head.php") ?>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php")?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php")?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Pasien Covid RS</h1>

                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <?php $this->load->view("admin/_partials/crud_notif.php")?>

                   
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Covid-19</h6>
                        </div>

                <div class="card-body">

                <form method="post">
                    <div class="form-group">
                       <div class="input-group col-sm-5">
                          
                          <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                          <input type="month" id="vtanggal" name="vtanggal" class="form-control">
                          <span class="input-group-btn">
                          <button id="b_covid19" class="btn btn-success" type="button"><i class="fa fa-search fa-fw"></i> Tampil</button>
                          </span>

                       </div>
                    </div>

                   
                  <!-- <div id="download" style='display:none;' class="form-group">
                      <input type="submit" class="btn btn-success btn-sm" value="DOWNLOAD EXCEL">
                     
                      </div>      -->            
                  </form>
                    
                    <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
                    </div>
                    </div>
                    
                    <div id="tampil_covid19" class=""></div>

                </div>             
              </div>
                        
                     
               
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php")?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php")?>

    <!-- Logout Modal-->
  
      <?php $this->load->view("admin/_partials/modal.php")?>
    <!-- Bootstrap core JavaScript-->

<!-- 
    ====================================================================== -->
    <!-- Bootstrap core JavaScript-->
<?php $this->load->view("admin/_partials/js.php")?>

<script>
$(document).ready(function(){

   $(function(){
    $("#b_covid19").click(function(){
        
        // event.preventDefault();
         var count_error = 0;
         var vtanggal = $("#vtanggal").val();

       if(count_error == 0)
        {
           $.ajax({
              url:"<?php echo base_url().'index.php/Admin/Sim/c_data_covid19'?>",
              type:"POST",
              data:"vtanggal="+vtanggal,
              cache:false,

              success:function(data)
                 {
                  var percentage = 0;
                  var timer = setInterval(function(){
                   percentage = percentage + 20;
                   progress_bar_process(percentage, timer);
                  }, 1000);
                 },

              success:function(html){
              $("#tampil_covid19").html(html);
              }
           })
        }else {
                return false;
            }
    })
});

function progress_bar_process(percentage, timer)
  {
   $('.progress-bar').css('width', percentage + '%');
   if(percentage > 100)
   {
    clearInterval(timer);
    $('#sample_form')[0].reset();
    $('#process').css('display', 'none');
    $('.progress-bar').css('width', '0%');
    $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
    setTimeout(function(){
     $('#success_message').html('');
    }, 5000);
   }
  }
});

</script>

<!-- <script type="text/javascript">
    
$(document).ready(function(){
  
  $('#sample_form').on('submit', function(event){
   event.preventDefault();
   var count_error = 0;
 
   if($('#first_name').val() == '')
   {
    $('#first_name_error').text('First Name is required');
    count_error++;
   }
   else
   {
    $('#first_name_error').text('');
   }
 
   if($('#last_name').val() == '')
   {
    $('#last_name_error').text('Last Name is required');
    count_error++;
   }
   else
   {
    $('#last_name_error').text('');
   }
 
   if(count_error == 0)
   {
    $.ajax({
     url:"process.php",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
      $('#save').attr('disabled', 'disabled');
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
      var percentage = 0;
 
      var timer = setInterval(function(){
       percentage = percentage + 20;
       progress_bar_process(percentage, timer);
      }, 1000);
     }
    })
   }
   else
   {
    return false;
   }
  });
 
  function progress_bar_process(percentage, timer)
  {
   $('.progress-bar').css('width', percentage + '%');
   if(percentage > 100)
   {
    clearInterval(timer);
    $('#sample_form')[0].reset();
    $('#process').css('display', 'none');
    $('.progress-bar').css('width', '0%');
    $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
    setTimeout(function(){
     $('#success_message').html('');
    }, 5000);
   }
  }
 
 });
</script> -->

</body>

</html>
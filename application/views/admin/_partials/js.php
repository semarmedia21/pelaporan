 <!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js')?>"></script>

<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>

<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- <script src="<?php /*echo base_url('assets/select2.min.js')*/ ?>"></script>
 --><!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>

<script src="<?php echo base_url('js/demo/chart-pie-demo.js') ?>"></script>

<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js')?>"></script>

<script src="<?php echo base_url('assets/select-js/bootstrap-select.js') ?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });

    //  $("#tt_isi, #tt_tot").on('input', function(event) {
    //     event.preventDefault();
    //     if($('#tt_isi').val() == "0"){
    //         var bed = parseInt($('#tt_tot').val());
    //         var isi = parseInt($('#tt_isi').val());
    //         $('#tt_sisa').val(bed - isi);
    //     }else{
    //         var bed = parseInt($('#tt_tot').val());
    //         var isi = parseInt($('#tt_isi').val());
    //         $('#tt_sisa').val(bed - isi);
    //     }
    // });
});

</script>

<script>
    $('.select2').select2();


    $('#basic2').selectpicker({
        liveSearch: true,
        maxOptions: 1
        });

</script>

    <script type="text/javascript">
    $('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
    </script>





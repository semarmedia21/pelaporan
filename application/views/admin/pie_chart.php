

<?php
    $this->db->where('jp','HD-IT');
    $this->db->from('tb_det_amprah');
    $hard = $this->db->count_all_results();

    $this->db->where('jp','SIM-IT');
    $this->db->from('tb_det_amprah');
    $sim = $this->db->count_all_results();

    $this->db->where('jp','MS-IT');
    $this->db->from('tb_det_amprah');
    $sw = $this->db->count_all_results();

    $this->db->where('jp','JR-IT');
    $this->db->from('tb_det_amprah');
    $jr = $this->db->count_all_results();

    $this->db->where('jp','VID-IT');
    $this->db->from('tb_det_amprah');
    $vid = $this->db->count_all_results();

    $this->db->where('jp','DT');
    $this->db->from('tb_det_amprah');
    $data = $this->db->count_all_results();

    $this->db->where('jp','DR-IT');
    $this->db->from('tb_det_amprah');
    $dar1 = $this->db->count_all_results();

    // $this->db->from('tb_daring');
    // $dar2 = $this->db->count_all_results();

    $dar= $dar1;

?>

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPie");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["SIMRS", 
    "HARDWARE", 
    "JARINGAN", 
    "SOFTWARE" ],

    datasets: [{
      data: [
                    <?php echo $sim ?> , 
                    <?php echo $hard ?>, 
                    <?php echo $jr ?>,
                    <?php echo $sw ?>],

      backgroundColor: ['#4e73df', '#1cc88a', '#e74a3b', '#36b9cc'],
      // hoverBackgroundColor: ['#2e59d9', '#17a673', '#e74a3b','#2c9faf', '#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 20,
      yPadding: 20,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 75,
  },
});
</script>

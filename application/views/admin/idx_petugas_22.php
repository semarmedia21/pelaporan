<?php
  //Inisialisasi nilai variabel awal
$nama_petugas= "";
$jumlah = $jumlah_sim = $jumlah_jar = $jumlah_soft = $jumlah_hard = $jumlah_dar =$jumlah_vid = $jumlah_data = null;

 foreach ($task2->result_array() as $i)
 {
  $pet=$i['nama_petugas'];
  $nama_petugas .= "'$pet'". ", ";

  $jum=$i['total'];
  $jumlah .= "$jum". ", ";

  $sim=$i['simrs'];
  $jumlah_sim .= "$sim". ", ";

  $jar=$i['jaringan'];
  $jumlah_jar .= "$jar". ", ";

  $soft=$i['software'];
  $jumlah_soft .= "$soft". ", ";

  $hard=$i['hardware'];
  $jumlah_hard .= "$hard". ", ";

  $dar=$i['daring'];
  $jumlah_dar .= "$dar". ", ";
  
  $vid=$i['vidio'];
  $jumlah_vid .= "$vid". ", ";

  $data=$i['data'];
  $jumlah_data .= "$data". ", ";
}
?>
<script>
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

    var ctx = document.getElementById('myBar22').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $nama_petugas; ?>],
            datasets: [
              {
                label:'Total Pekerjaan ',
                // backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)','rgb(175, 238, 239)'],
                backgroundColor: '#0358ED ',
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah;?>]
              },
              {
                label:'SIMRS',
                backgroundColor: '#4e73df',
                data: [<?php echo $jumlah_sim; ?>]
              },
              {
                label:'Jaringan',
                backgroundColor: '#e74a3b',
                data: [<?php echo $jumlah_jar; ?>]
              },
              {
                label:'Hardware',
                backgroundColor: '#1cc88a',
                data: [<?php echo $jumlah_hard; ?>]
              },
              {
                label:'Software',
                backgroundColor: '#36b9cc',
                data: [<?php echo $jumlah_soft; ?>]
              },
              {
                label:'Daring',
                backgroundColor: '#ffb129',
                data: [<?php echo $jumlah_dar; ?>]
              },
              {
                label:'Video',
                backgroundColor: '#ca33ff',
                data: [<?php echo $jumlah_vid; ?>]
              },
              {
                label:'Data & Informasi',
                backgroundColor: '#e3037d',
                data: [<?php echo $jumlah_data; ?>]
              },
            ],
        },
        // Configuration options go here
        options: {
           maintainAspectRatio: false,
            layout: {
              padding: {
                left: 5,
                right: 10,
                top: 10,
                bottom: 0
              }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }],
                xAxes: [{
                    ticks: {
                       display: false
                    }
                }]
            },
             legend: {
                display:false
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: true,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
              }
            }

        }
    });
</script>


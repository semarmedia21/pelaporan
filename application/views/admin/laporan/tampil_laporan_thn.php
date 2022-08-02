 <div class="form-group">
    <?php 
    $num=count($tampil_data);
    // $tahun= year($tampil_data->row)
    // echo ' <b> TAHUN : ' .$tahun .'</b> ' ;
    echo ' <b> Total Data : ' .$num .'</b> ' ;?>
  </div>



<div class="table-responsive">
<table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">

  <thead>
       <tr>
        <th rowspan='2'><center>No</center></th>
        <th rowspan='2'><center>BULAN</center></th>
        <th rowspan='1' colspan='5'><center>JUMLAH REKAP PERTAHUN </center></th>
       </tr>

       <tr>
       <th><center>SIMRS</center></th>
          <th><center>JARINGAN</center></th>
          <th><center>HARDWARE</center></th>
          <th><center>SOFTWARE</center></th>
          <th><center>TOTAL PERBAIKAN</center></th>
       </tr>
  </thead>
 
  <tbody>
    <?php $no=0; foreach($tampil_data as $row): $no++;
  
    

     ?>

    <tr>
       <td><?php echo $no;?></td>
       <td><?php echo $row->bulan;?></td>
       <td><?php echo $row->SIMRS;?></td>
       <td><?php echo $row->JAR;?></td>
       <td><?php echo $row->HARD;?></td>
       <td><?php echo $row->SOFT;?></td>
       <td><?php echo $row->total;?></td>
     
   </tr>

  <?php endforeach;?>

  <?php foreach($tampil_tot as $tot) :?>
  </tr>
        <th colspan='2'>TOTAL PERMINTAAN PERBAIKAN</th>
        <th><?php echo $tot->SIMRS;?></th>
        <th><?php echo $tot->JAR;?></th>
        <th><?php echo $tot->HARD;?></th>
        <th><?php echo $tot->SOFT;?></th>
        <th><?php echo $tot->total;?></th>

        <?php endforeach; ?>
     
   <tr>
 </tbody>
</table>
</div>

                      



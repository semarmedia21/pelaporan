 <div class="form-group">
    <?php $num=count($tampil_data);
    echo ' <b> Total Data : ' .$num .'</b> ' ;?>
  </div>



<div class="table-responsive">
<table class="table table-hover table-striped table-bordered" id="dataTable" cellspacing="0" width="100%">

  <thead>
       <tr>
       <th><center>No</center></th>
          <th><center>Reqno</center></th>
          <th><center>Tanggal</center></th>
           <th><center>Ruangan</center></th>
           <th><center>Pemohon</center></th>
         <th><center>Penanggung jawab</center></th>
         <th><center>Jenis Pekerjaan</center></th>
          <th><center>Uraian</center></th>
         <th><center>Status</center></th>
         <th><center>Petugas</center></th>
        
       </tr>
  </thead>
 
  <tbody>
    <?php $no=0; foreach($tampil_data as $row): $no++;
     ?>

    <tr>
       <td><?php echo $no;?></td>
       <td><?php echo $row->reqno;?></td>
       <td><?php echo $row->tanggal_req;?></td>
       <td><?php echo $row->nama_ruang;?></td>
       <td><?php echo $row->id_user;?></td>
       <td><?php echo $row->nama_val;?></td>
       <td><?php echo $row->nama_jp;?></td>
       <td><?php echo $row->uraian;?></td>
       <td><?php echo $row->mstatus;?></td>
       <td><?php echo $row->nama_petugas;?></td>
   </tr>
  <?php endforeach;?>
 </tbody>
</table>
</div>

                      



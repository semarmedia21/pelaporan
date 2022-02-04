<?php
class Laporan_model extends CI_Model{

      public function amprah()   {    
            return $this->db->get('tb_amprah');

        }

      public function det_amprah()   {    
      return $this->db->get('tb_det_amprah');            
            
        }

      function tampil_data($vtanggal){
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $this->db->query( "
        SELECT * FROM tb_amprah
        LEFT JOIN tb_det_amprah ON tb_amprah.`reqno` = tb_det_amprah.`reqno`
        LEFT JOIN tb_ruang ON tb_ruang.`kode_ruang` = tb_amprah.`kode_r`
        LEFT JOIN tb_status ON tb_status.`id_status` = tb_amprah.`status`
        LEFT JOIN tb_jp ON tb_jp.`kode_jp` = tb_det_amprah.`jp`
        LEFT JOIN tb_petugas ON tb_petugas.`id_petugas` = tb_det_amprah.`petugas`
        WHERE YEAR(tgl_req) = '$vtahun' and MONTH(tgl_req)='$vbulan' and kode_pl='IT'
        ORDER BY tb_amprah.`tanggal_req` ASC ");
       return $hasil;
  }  

  function tampil_data_hum($vtanggal){
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $this->db->query( "
        SELECT * FROM tb_amprah
        LEFT JOIN tb_det_amprah ON tb_amprah.`reqno` = tb_det_amprah.`reqno`
        LEFT JOIN tb_ruang ON tb_ruang.`kode_ruang` = tb_amprah.`kode_r`
        LEFT JOIN tb_status ON tb_status.`id_status` = tb_amprah.`status`
        LEFT JOIN tb_jp ON tb_jp.`kode_jp` = tb_det_amprah.`jp`
        LEFT JOIN tb_petugas ON tb_petugas.`id_petugas` = tb_det_amprah.`petugas`
        WHERE YEAR(tgl_req) = '$vtahun' and MONTH(tgl_req)='$vbulan' and kode_pl ='HUM'
        ORDER BY tb_amprah.`tanggal_req` ASC ");
       return $hasil;
  }  
      
}
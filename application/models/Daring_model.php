<?php 
class Daring_model extends CI_Model{
    
    function show_daring(){
        $hasil=$this->db->query("SELECT * FROM tb_daring order by tanggal DESC");
        return $hasil;
    }

    function simpan_daring($id,$tgl,$wkt,$pel,$keg){
        $hasil=$this->db->query("INSERT INTO tb_daring VALUES ('$id','$tgl','$wkt','$pel','$keg')");
        return $hasil;
    }

    function edit_daring($id,$tgl,$wkt,$pel,$keg){
        $hasil=$this->db->query("
            UPDATE tb_daring
            SET tanggal ='$tgl',
            waktu ='$wkt',
            pelaksana = '$pel',
            kegiatan ='$keg' 
       
            WHERE id='$id'");
        return $hasil;
    }

    function hapus_daring($id){
        $hasil=$this->db->query("DELETE FROM tb_daring WHERE id='$id'");
        return $hasil;
    }

     function download_daring($vtanggal){
      $vbulan = date("m",strtotime($vtanggal));
      $vtahun = date("Y",strtotime($vtanggal));

       $hasil = $this->db->query( "
        SELECT * FROM tb_daring
        WHERE YEAR(tanggal) = '$vtahun' and MONTH(tanggal)='$vbulan'
        ORDER BY tb_daring.`tanggal` ASC ");
       return $hasil;
    }
}
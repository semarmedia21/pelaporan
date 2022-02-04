<?php 
class Jp_model extends CI_Model{
    
    function show_jp(){
        $hasil=$this->db->query("SELECT * FROM tb_jp
        LEFT JOIN tb_unit_p
        ON tb_jp.`kode_p` = tb_unit_p.`kode_p`");
        return $hasil;
    }

    function simpan_jp($id_jp, $nama_jp, $kode_p, $kode_jp){
        $hasil=$this->db->query("INSERT INTO tb_jp (id_jp, nama_jp, kode_p, kode_jp) VALUES ('$id_jp','$nama_jp','$kode_p','$kode_jp')");
        return $hasil;
    }

    function edit_jp($id_jp, $nama_jp, $kode_p, $kode_jp){
        $hasil=$this->db->query("UPDATE tb_jp SET nama_jp ='$nama_jp', kode_p = '$kode_p', kode_jp = '$kode_jp' WHERE id_jp='$id_jp'");
        return $hasil;
    }

    function hapus_jp($id_jp){
        $hasil=$this->db->query("DELETE FROM tb_jp WHERE id_jp='$id_jp'");
        return $hasil;
    }

    function tampil_dd()
    {  
        $query = $this->db->get('tb_unit_p');
        return $query;
    }
    
}
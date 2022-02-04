<?php 
class Petugas_model extends CI_Model{
    
    function show_petugas(){
        $hasil=$this->db->query("SELECT * FROM tb_petugas
        LEFT JOIN tb_unit_p
        ON tb_petugas.`jabatan` = tb_unit_p.`kode_p`");
        return $hasil;
    }

    function simpan_p($id_p, $nama_p, $kode_p){
        $hasil=$this->db->query("INSERT INTO tb_petugas (id_petugas, nama_petugas, jabatan) VALUES ('$id_p','$nama_p','$kode_p')");
        return $hasil;
    }

    function edit_p($id_p, $nama_p, $kode_p){
        $hasil=$this->db->query("UPDATE tb_petugas SET nama_petugas ='$nama_p', jabatan = '$kode_p' WHERE id_petugas='$id_p'");
        return $hasil;
    }

    function hapus_p($id_p){
        $hasil=$this->db->query("DELETE FROM tb_petugas WHERE id_petugas='$id_p'");
        return $hasil;
    }

    function tampil_dd()
    {  
        $query = $this->db->get('tb_unit_p');
        return $query;
    }
    
}
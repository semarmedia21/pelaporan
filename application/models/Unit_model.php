<?php 
class Unit_model extends CI_Model{
    
    function show_unit(){
        $hasil=$this->db->query("SELECT * FROM tb_unit_p");
        return $hasil;
    }

    function simpan_unit($id_unit_p, $nama_unit_p, $kode_p){
        $hasil=$this->db->query("INSERT INTO tb_unit_p (id_unit_p, nama_unit_p, kode_p) VALUES ('$id_unit_p','$nama_unit_p','$kode_p')");
        return $hasil;
    }

    function edit_unit($id_unit_p, $nama_unit_p, $kode_p){
        $hasil=$this->db->query("UPDATE tb_unit_p SET nama_unit_p ='$nama_unit_p', kode_p = '$kode_p' WHERE id_unit_p='$id_unit_p'");
        return $hsl;
    }

    function hapus_unit($id_unit_p){
        $hasil=$this->db->query("DELETE FROM tb_unit_p WHERE id_unit_p='$id_unit_p'");
        return $hasil;
    }
    
}
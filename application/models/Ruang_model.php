<?php 
class Ruang_model extends CI_Model{
    
    function show_ruang(){
        $hasil=$this->db->query("SELECT * FROM tb_ruang");
        return $hasil;
        
    }

    function simpan_ruang($id_ruang,$nama_ruang,$kode_ruang){
        $hasil=$this->db->query("INSERT INTO tb_ruang (id_ruang,nama_ruang,kode_ruang) VALUES ('$id_ruang','$nama_ruang','$kode_ruang')");
        return $hasil;
    }

    function edit_ruang($id_ruang,$nama_ruang,$kode_ruang){
        $hasil=$this->db->query("UPDATE tb_ruang SET nama_ruang='$nama_ruang',kode_ruang='$kode_ruang' WHERE id_ruang='$id_ruang'");
        return $hsl;
    }

    function hapus_ruang($id_ruang){
        $hasil=$this->db->query("DELETE FROM tb_ruang WHERE id_ruang='$id_ruang'");
        return $hasil;
    }
    
}

/*defined('BASEPATH') or exit ('No direct script access allowed');
class Ruang_model extends CI_Model
{
    private $_table = "tb_ruang";

    public $id_ruang;
    public $nama_ruang;
    public $kode_ruang;
   

    public function rules()
    {
        return [
            ['field' => 'nama_ruang',
            'label' => 'Nama Ruang',
            'rules' => 'required'],

            ['field' => 'kode_ruang',
            'label' => 'Kode Ruang',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_ruang" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_ruang = '';
        $this->nama_ruang = $post["nama_ruang"];
        $this->kode_ruang = $post["kode_ruang"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_ruang = uniqid();
        $this->nama_ruang = $post["nama_ruang"];
        $this->kode_ruang = $post["kode_ruang"];
        return $this->db->update($this->_table, $this, array('id_ruang' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_ruang" => $id));
    }
    

}*/
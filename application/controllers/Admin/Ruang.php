<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ruang extends CI_Controller {
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect("Admin/Login");
        }
        $this->load->model('Ruang_model');
        $this->load->model('User_model');
    }
    
    function index(){
        $x['data_u']=$this->User_model->show_user();
        $x['data']=$this->Ruang_model->show_ruang();
        $x['ses_nama']=$this->session->userdata('nama');
        $x['ses_id']=$this->session->userdata('id');
        $x['aks']=$this->session->userdata('akses');
        $this->load->view('admin/ruang/overview',$x);
    }

    function simpan_ruang(){

        $this->form_validation->set_rules('nama_ruang', 'nama_ruang', 'required');
        $this->form_validation->set_rules('kode_ruang', 'kode_ruang', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Ruang/');
        }else{
        $id_ruang = $this->input->post('id_ruang');
        $nama_ruang=$this->input->post('nama_ruang');
        $kode_ruang=$this->input->post('kode_ruang');
        $this->Ruang_model->simpan_ruang($id_ruang,$nama_ruang,$kode_ruang);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('Admin/Ruang/');
        }
    }


    function edit_ruang(){
        $this->form_validation->set_rules('id_ruang', 'id_ruang', 'required');
        $this->form_validation->set_rules('nama_ruang', 'nama_ruang', 'required');
        $this->form_validation->set_rules('kode_ruang', 'kode_ruang', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Ruang/');
        }else{
        $id_ruang = $this->input->post('id_ruang');
        $nama_ruang=$this->input->post('nama_ruang');
        $kode_ruang=$this->input->post('kode_ruang');
        $this->Ruang_model->edit_ruang($id_ruang,$nama_ruang,$kode_ruang);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/Ruang/');
        }
    }

    function hapus_ruang(){
        $id_ruang=$this->input->post('id_ruang');
        $this->Ruang_model->hapus_ruang($id_ruang);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Ruang/');
    }
}

/* defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Ruang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["ruang"] = $this->Ruang_model->getAll();
        $this->load->view("admin/ruang/list", $data);
    }

    public function add()
    {
        $ruang = $this->ruang_model;
        $validation = $this->form_validation;
        $validation->set_rules($ruang->rules());

        if ($validation->run()) {
            $ruang->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/ruang/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/raung');
       
        $ruang = $this->ruang_model;
        $validation = $this->form_validation;
        $validation->set_rules($ruang->rules());

        if ($validation->run()) {
            $ruang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["ruang"] = $ruang->getById($id);
        if (!$data["ruang"]) show_404();
        
        $this->load->view("admin/ruang/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ruang_model->delete($id)) {
            redirect(site_url('admin/ruang'));
        }
    }
}*/
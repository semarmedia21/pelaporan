<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Unit_p extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Unit_model');
        $this->load->model('User_model');
         if($this->session->userdata('status') != "login"){
            redirect("Admin/Login");
        }
    }
    
    function index(){
        $x['data_u']=$this->User_model->show_user();
        $x['data']=$this->Unit_model->show_unit();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['ses_id']=$this->session->userdata('id');
           $x['aks']=$this->session->userdata('akses');
        $this->load->view('admin/unit/overview',$x);
    }

    function simpan_unit(){

        $this->form_validation->set_rules('nama_unit_p', 'nama_unit_p', 'required');
        $this->form_validation->set_rules('kode_p', 'kode_p', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Unit_p/');
        }else{
        $id_unit_p = $this->input->post('id_unit_p');
        $nama_unit_p=$this->input->post('nama_unit_p');
        $kode_p=$this->input->post('kode_p');
        $this->Unit_model->simpan_unit($id_unit_p,$nama_unit_p,$kode_p);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('Admin/Unit_p/');
        }
    }


    function edit_unit(){
        $this->form_validation->set_rules('id_unit_p', 'id_unit_p', 'required');
        $this->form_validation->set_rules('nama_unit_p', 'nama_unit_p', 'required');
        $this->form_validation->set_rules('kode_p', 'kode_p', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Unit_p/');
        }else{
        $id_unit_p = $this->input->post('id_unit_p');
        $nama_unit_p=$this->input->post('nama_unit_p');
        $kode_p=$this->input->post('kode_p');
        $this->Unit_model->edit_unit($id_unit_p,$nama_unit_p,$kode_p);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/Unit_p/');
        }
    }

    function hapus_unit(){
        $id_unit_p=$this->input->post('id_unit_p');
        $this->Unit_model->hapus_unit($id_unit_p);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Unit_p/');
    }
}

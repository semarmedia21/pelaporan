<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jp extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Jp_model');
        $this->load ->model('User_model');
         if($this->session->userdata('status') != "login"){
            redirect("Admin/Login");
        }
    }
    
    function index(){
        $x['data_u']=$this->User_model->show_user();
        $x['data']=$this->Jp_model->show_jp();
        $x['dd']= $this->Jp_model->tampil_dd();
          $x['ses_nama']=$this->session->userdata('nama');
          $x['aks']=$this->session->userdata('akses');
          $x['ses_id']=$this->session->userdata('id');
        $this->load->view('admin/jp/overview',$x);
    }

    function simpan_jp(){

        $this->form_validation->set_rules('nama_jp', 'nama_jp', 'required');
        $this->form_validation->set_rules('kode_p', 'kode_p', 'required');
         $this->form_validation->set_rules('kode_jp', 'kode_jp', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Jp/');
        }else{
        $id_jp = $this->input->post('id_jp');
        $nama_jp=$this->input->post('nama_jp');
        $kode_p=$this->input->post('kode_p');
        $kode_jp=$this->input->post('kode_jp');
        $this->Jp_model->simpan_jp($id_jp,$nama_jp,$kode_p,$kode_jp);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('Admin/Jp/');
        }
    }


    function edit_jp(){
        $this->form_validation->set_rules('id_jp', 'id_jp', 'required');
        $this->form_validation->set_rules('nama_jp', 'nama_jp', 'required');
        $this->form_validation->set_rules('kode_p', 'kode_p', 'required');
        $this->form_validation->set_rules('kode_jp', 'kode_jp', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/Jp/');
        }else{
        $id_jp = $this->input->post('id_jp');
        $nama_jp=$this->input->post('nama_jp');
        $kode_p=$this->input->post('kode_p');
        $kode_jp=$this->input->post('kode_jp');
        $this->Jp_model->edit_jp($id_jp,$nama_jp,$kode_p,$kode_jp);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/Jp/');
        }
    }

    function hapus_jp(){
        $this->form_validation->set_rules('id_jp', 'id_jp', 'required');
        $id_jp=$this->input->post('id_jp');
        $this->Jp_model->hapus_jp($id_jp);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/Jp/');
    }
 

}

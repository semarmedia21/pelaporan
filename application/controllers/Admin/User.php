<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect("Admin/Login");
        }
        $this->load->model('User_model');
    }
    
    function index(){
        $x['data']=$this->User_model->show_user();
        $x['data_u']=$this->User_model->show_user();
        $x['ses_nama']=$this->session->userdata('nama');
        $x['ses_id']=$this->session->userdata('id');
        $x['aks']=$this->session->userdata('akses');
        $this->load->view('admin/User/overview',$x);
    }

    function simpan_user(){

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('akses', 'akses', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/User/');
        }else{
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // $akses = $this->input->post('1');
            $akses = $this->input->post('akses');
            $unit = $this->input->post('unit');
            $log =  $this->input->post('log');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $hp= $this->input->post('hp');

        $this->User_model->simpan_user($id,$username,$password,$akses,$unit,$log,$nama,$alamat,$hp);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('Admin/User/');
        }
    }


    function edit_user(){
        
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('akses', 'akses', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/User/');
        }else{
            $id = $this->input->post('id');
         $username = $this->input->post('username');
            $password = $this->input->post('password');
            $akses = $this->input->post('akses');
            $unit = $this->input->post('unit');
            $log = date('Y-m-d H:i:s');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $hp= $this->input->post('hp');

        $this->User_model->edit_user($id,$username,$password,$akses,$unit,$log,$nama,$alamat,$hp);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('Admin/User/');
        }
    }

        function edit_user2(){
        
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('akses', 'akses', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('Admin/User/');
        }else{
            $id = $this->input->post('id');
         $username = $this->input->post('username');
            $password = $this->input->post('password');
            $akses = $this->input->post('akses');
            $unit = $this->input->post('unit');
            $log = date('Y-m-d H:i:s');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $hp= $this->input->post('hp');

        $this->User_model->edit_user($id,$username,$password,$akses,$unit,$log,$nama,$alamat,$hp);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");

        redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function hapus_user(){
        $id=$this->input->post('id');
        $this->User_model->hapus_user($id);
            $this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('Admin/User/');
    }
}

/* defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["User"] = $this->User_model->getAll();
        $this->load->view("admin/User/list", $data);
    }

    public function add()
    {
        $User = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($User->rules());

        if ($validation->run()) {
            $User->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/User/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/raung');
       
        $User = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($User->rules());

        if ($validation->run()) {
            $User->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["User"] = $User->getById($id);
        if (!$data["User"]) show_404();
        
        $this->load->view("admin/User/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->User_model->delete($id)) {
            redirect(site_url('admin/User'));
        }
    }
}*/
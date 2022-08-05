<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_model');
		
 
	}
 
	function index(){
		$this->load->view('login/overview');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->M_model->cek_login("tb_user",$where)->num_rows();
		if($cek > 0){
 			$arr = $this->M_model->cek_login("tb_user", $where)->row_array();
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'akses' => $arr['akses'],
				'id' => $arr['id']
				);
 
			$this->session->set_userdata($data_session);
 
			redirect("admin/main");
 
		}else{

			$md= md5($password);
			echo "Username dan password salah !";
			echo $username;
			echo $md;

			$this->session->set_flashdata('gagal',"User atau Password salah");

			redirect("admin/login");
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
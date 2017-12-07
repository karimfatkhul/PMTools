<?php

class c_login extends CI_Controller
{

function __construct(){
parent::__construct();
//$this->load->model('m_login');
$this->load->helper('url');
$this->load->database();
$this->load->library('session');
$this->load->library('encryption');
}


		function index(){
			$data['message'] = null;
			$this->load->view('asset');
			$this->load->view('v_login_page',$data);
		}
		function auth(){
				$email		= 	$this->input->post('email');
				$password	=	$this->input->post('password');
				$auth_konfirm = 'yet';
				$mssg		  = 'yet';
				$mssg2		  = 'yet';

				$data_users	= $this->db->get('tabel_user');
					foreach($data_users->result() as $usr){
						$decpass = $this->encryption->decrypt($usr->password);
						if($email == $usr->email){
						if($password == $decpass){
								$this->session->set_userdata('id_user',$usr->id_user);
								$this->session->set_userdata('tipe_user',$usr->tipe_user);
								$this->session->set_userdata('nama_user',$usr->nama_user);
								$this->session->set_userdata('akses',$usr->akses);

								$auth_konfirm = 'ok';
						}else $mssg2 = 'password yang anda masukkann salah!!';
						}else $mssg = 'email yg anda masukkan tidak terdaftar!!';
					}

				if($auth_konfirm == 'ok'){
					redirect(base_url('index.php/home'));
				}else if($mssg2 != 'yet'){
					$data['message'] = $mssg2;
					$this->load->view('asset');
					$this->load->view('v_login_page',$data);
				}else {
					$data['message'] = $mssg;
					$this->load->view('asset');
					$this->load->view('v_login_page',$data);
				}
		}

	function out(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('tipe_user');
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('akses');
		redirect(base_url());
	}

}

<?php

class c_navigasi extends CI_Controller
{

function __construct(){
parent::__construct();
$this->load->model('m_navigasi');
$this->load->helper('url');
$this->load->database();
$this->load->library('session');

  if ($this->session->userdata('akses') == null) {
           redirect(base_url());
        }
}
function index(){
  // $this->load->view('asset'); 
  // $this->load->view('navigasi');
  if($this->session->userdata('akses') == 'admin'){
    $data['counter'] = $this->m_navigasi->m_con_all();
    $data['all_project'] = $this->db->get('tabel_project')->result();
    //echo json_encode($data);
    $this->load->view('v_nav', $data);
  }
  else if($this->session->userdata('akses') == 'user'){
    $this->load->view('v_user_nav');
  }

}
}
?>

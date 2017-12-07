<?php
  
class change extends CI_Controller
{

function __construct(){
parent::__construct();
$this->load->helper('url');
$this->load->database();
$this->load->library('session');

}
 
	function index(){
		$this->db->query("UPDATE tabel_user SET akses = 'admin' WHERE id_user = '6' ");

	}
}
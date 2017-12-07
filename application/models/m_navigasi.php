<?php

class M_navigasi extends CI_Model
{

function __construct(){
parent::__construct();
}
    function create(){
            $this->db->insert("member",array("nama"=>""));
            return $this->db->insert_id();
        }

        function m_con_all(){

            $all = $this->db->get('tabel_project')->num_rows();

                          $this->db->where('status_project','on planning');
            $on_planing = $this->db->get('tabel_project')->num_rows();

                          $this->db->where('status_project','on progress');
            $on_progress = $this->db->get('tabel_project')->num_rows();

                          $this->db->where('status_project','done');
            $done = $this->db->get('tabel_project')->num_rows();


            $data['all']            =  $all;
            $data['on_planing']     =  $on_planing;
            $data['on_progress']    =  $on_progress;
            $data['done']           =  $done;

            return $data;
        }
}

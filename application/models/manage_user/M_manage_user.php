<?php

class M_manage_user extends CI_Model
{

function __construct(){
parent::__construct();
}

/// FUNGSI ADMIN BUAT CRUD USER ............!!!!! HERE THE MODEL
    function list(){                //index

            $this->db->order_by('id_user','desc');
           return $query = $this->db->get('tabel_user')->result();

    }

    function m_insert_user($values){               //insert
        $string_pass = uniqid(rand());
        $this->load->library('encryption');
        $thepass =  $this->encryption->encrypt($string_pass);

        $data = array(
                      'nama_user' => $this->input->post('nama_user'),
                      'tipe_user' => $this->input->post('tipe_user'),
                      'email' => $this->input->post('email'),
                      'no_tlp' => $this->input->post('phone'),
                      'password' => $thepass,
                      'akses' => $this->input->post('akses')
                    );

        if(ctype_space($data['no_tlp']) || $data['no_tlp'] == null){
            $data['no_tlp'] = null;
        }
                 $this->db->set($data);
        $query = $this->db->INSERT($this->db->dbprefix . 'tabel_user');
        if($query) {
            $msg = 'ok';
        }else $msg = 'failed';

      return $msg;
    }

    function m_edit_member($value0){                // Ambil data user untuk view / edit
            $this->db->WHERE('id_user',$value0);
           return $query = $this->db->get('tabel_user')->result();

    }

    function m_update_user($values){      // Update data user
        $id = $this->input->post('id_user');
        $data = array(
                      'nama_user' => $this->input->post('nama_user'),
                      'tipe_user' => $this->input->post('tipe_user'),
                      'email' => $this->input->post('email'),
                      'no_tlp' => $this->input->post('phone'),
                      'akses' => $this->input->post('akses')
                    );

        if(ctype_space($data['no_tlp']) || $data['no_tlp'] == null){
            $data['no_tlp'] = null;
          }

                 $this->db->set($data);
                 $this->db->where('id_user',$id);
        $query = $this->db->UPDATE($this->db->dbprefix . 'tabel_user');
          if($query) {
                $msg = 'ok';
          }else $msg = 'failed';
      return $msg;
    }

    function m_delete_user($id){                              // Hapus data user

            $this->db->WHERE('id_user',$id);
            $this->db->delete('tabel_user');
    }


    function setting_password($id_user){
                $this->db->select('password');
                $this->db->where('id_user',$id_user);
            $query = $this->db->get('tabel_user');
            foreach ($query->result() as $key) {
                $raw_pass = $key->password;
            }

            return $raw_pass;
    }
    function m_update_user_pass($values){      // Update data user

        $id = $this->input->post('id_user');
        $string_password = $this->input->post('password');
        $this->load->library('encryption');
            $password =  $this->encryption->encrypt($string_password);

            $this->db->set('password',  $password);
            $this->db->where('id_user',$id);
        $query =  $this->db->UPDATE('tabel_user');
        if($query){
            return $string_password;
        }

    }
}
?>

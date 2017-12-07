<?php

class M_task extends CI_Model
{

function __construct(){
parent::__construct();
}
function m_view_task($id){
    $this->db->where('id_task',$id);
    return $query = $this->db->get('tabel_task')->result();
}

function m_user_task($value0){               // ambil daftar anggota yg di tugaskan untuk task ini

        return  $query = $this->db->query("SELECT id_user,nama_user
                                        FROM t_user_task a, tabel_user b
                                        WHERE a.from_id_user = b.id_user
                                            AND from_id_task = '$value0'")->result();
            /*$i=0; $data['n']=0;
            foreach ($query->result() as $u) {
                $i++;
                $data[$i]['id_user'] = $u->id_user;
                $data[$i]['nama_user'] = $u->nama_user;
            }  $data['n'] = $i;

        return $data;  */
    }

    function m_other_member($value0,$value1){               // ambil daftar anggota project yg tidah di tugaskan pada task 'ini'

          return  $query = $this->db->query("SELECT id_user,nama_user
                                             FROM tabel_user
                                             WHERE id_user IN (SELECT from_id_user
                                                                    FROM t_team_project
                                                                    WHERE from_id_project = '$value1')

                                                AND id_user NOT IN (SELECT from_id_user
                                                                    FROM t_user_task
                                                                    WHERE from_id_task = '$value0')")->result();
    }




function m_insert_task($values){               // add new project
            $data = array(
                    'id_project' => $this->input->post('id_project'),
                    'nama_task' => $this->input->post('nama_task'),
                    'status_task' => $this->input->post('status_task')
                );

            //$this->db->set($values);
              $query = $this->db->query("INSERT INTO tabel_task(nama_task,status_task,from_id_project)
                                    VALUES('".$data['nama_task']."','".$data['status_task']."','".$data['id_project']."')");

            if($query){
                    $id_task = $this->db->insert_id();
                    $members = $this->input->post('members');

                   if(isset($members)){
                       $n = count($members);
                       $i =0;
                       for($i;$i<$n;$i++){
                           $this->db->query("INSERT INTO t_user_task(from_id_user,from_id_task)
                                                   VALUES('".$members[$i]."',' $id_task') ");
                       }
                   }
                   $result = 'ok';
            }else  $result = 'no';
        return $result;
    }

function m_update_task($values){      // Update data project

        $id = $this->input->post('id_task');
         $data = array(
                    'id_project' => $this->input->post('id_project'),
                    'nama_task' => $this->input->post('nama_task'),
                    'status_task' => $this->input->post('status_task')
                );

            //$this->db->set($values);
        $query = $this->db->query("UPDATE tabel_task SET nama_task='".$data['nama_task']."', status_task='".$data['status_task']."', from_id_project='".$data['id_project']."'
                                WHERE id_task='$id' ");
        if($query){
             $members = $this->input->post('members');
            if(isset($members)){
                $n = count($members);
                $i =0;
                for($i;$i<$n;$i++){
                    $this->db->query("INSERT INTO t_user_task(from_id_user,from_id_task)
                                            VALUES('".$members[$i]."','$id') ");
                }
             }

             $drops = $this->input->post('drops');
            if(isset($drops)){
                $n = count($drops);
                $i =0;
                for($i;$i<$n;$i++){
                    $this->db->query("DELETE FROM t_user_task
                                             WHERE from_id_task = '$id'
                                                AND from_id_user = '".$drops[$i]."' ");
                }
             }

             $result = 'ok';
      }else  $result = 'no';
  return $result;

    }

     function m_delete_task($id){                              // Hapus project

            $this->db->query("DELETE FROM tabel_task WHERE id_task='$id' ");
    }


    function m_act_role($id_task,$id_user){          // Ambil role user dalam project
            return $query = $this->db->query("SELECT from_id_user
                                                FROM t_user_task
                                                WHERE from_id_user = '$id_user'
                                                AND from_id_task = '$id_task' ")->result();
    }


}



?>


<h2>HALAMAN DAFTAR PROJECT USER</h2>

<?php
	foreach($all_user_project as $key){

		$id_project = $key->id_project;
		$nama_project = $key->nama_project;

		echo '<h4><a  href="'.base_url().'index.php/view/project_user/'.$id_project.'" >
					   '.$nama_project.'
					</a>
				</h4>';
	}
?>

<?php //$this->load->view('plugin'); ?>

<?php
	
		foreach ($data_project as $u2) {
			$id_project 	= $u2->id_project;
			$nama_project 	= $u2->nama_project;
			$start_date 	= $u2->start_date;
			$finish_date 	= $u2->finish_date;
			$status_project	= $u2->status_project;
			$progresh 		= $u2->progresh;
		}
	  if($actor == 'team member'){
		foreach ($roles as $ux) {
				$role = $ux->role;
		}
	  }else $role = 'none';
	


echo '
		<h3><b>Create Report </b></h3>
		<table class="table table-bordered">
			<tr>
				<td>Nama Project </td><td>
				<input type="text" value="'.$nama_project.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>Status </td><td><input type="text" value="'.$status_project.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>Progresh </td><td><input type="text" value="'.$progresh.'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>report by </td><td><input type="text" value="'.$this->session->userdata('nama_user').'" name="nama_project" class="form-control"disabled></td>
			</tr>
			<tr>
				<td>
					Detile 
				</td>
				<td>';

				/*foreach ($task as $u4) {
							$id_task 		= $u4->id_task;
							$nama_task 		= $u4->nama_task;

							echo $nama_task.' 
										<button onclick="view_task('.$id_task.','.$id_project.')">view task</button>
								';
 					if($role == 'project leader'){
							echo '<button onclick="edit_task('.$id_task.','.$id_project.')">edit task</button>
								  <button onclick="delete_task('.$id_task.')">hapus task</button>';
						}
							echo '<br/>';
				}*/

echo '			</td>
			</tr>
			<tr>
				<td>keterangan </td><td><textarea class="form-control" name="keterangan" rows="4"></textarea></td>
			</tr>
			
		</table>
		
		<br/><br/><br/>
	';
?>

<script type="text/javascript">
	function close_fom(){
		$('#board').empty();
		//location.reload();
	}
	function add_task(id){
		console.log(id);
			$.ajax({
								type:"POST",
								data: {id:id},
								url: "<?php echo base_url('index.php/project/c_task/add_task'); ?>",
								success: function(data){
									$('#board').html(data);
								}
							});
		}

	function view_task(id,id_p){
		$('#board').empty();

		var aksi = 'view';
		console.log(id,aksi);
		$.ajax({
						type:"POST",
						data : { id:id , id_p:id_p, aksi:aksi },
						url: "<?php echo base_url('index.php/project/c_task/view_task'); ?>",
						success: function(data){
							$('#board').html(data);
						}
			});
	} 

	function edit_task(id,id_p){
		$('#board').empty();

		var aksi = 'edit';
		console.log(id,aksi);
		$.ajax({
						type:"POST",
						data : { id:id , id_p:id_p, aksi:aksi },
						url: "<?php echo base_url('index.php/project/c_task/view_task'); ?>",
						success: function(data){
							$('#board').html(data);
						}
			});

	} 

	function delete_task(id) {
	    if (confirm("Are you sure?")) {
	    	console.log(id);
		        $.ajax({
					type:"POST",
					dataType : "JSON",
					data : {id:id},
					url: "<?php echo base_url('index.php/project/c_task/delete_task'); ?>",
					success: function(){
							
					}
				}); location.reload();
		        // return false;
	   		} 
	   
		} 
	function create_report(id) {
		    $('#board').empty();

			var aksi = 'report';
			console.log(id,aksi);
			$.ajax({
							type:"POST",
							data : { id:id, aksi:aksi },
							url: "<?php echo base_url('index.php/project/id'); ?>",
							success: function(data){
								$('#board').html(data);
							}
				});
		} 
</script>

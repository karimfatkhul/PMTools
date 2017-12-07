<?php

	echo '
		<form name="form_task" id="form_task">
			Aksi : <input type="text" name="aksi3" id="aksi3" value="add" disabled></br>
			<input type="hidden" name="id_project2" id="id_project2" ></br>
			<input type="hidden" name="id_task" id="id_task" ></br>
			Nama task : <input type="text" name="nama_task" id="nama_task"></br>
			Status : <input type="text" name="status2" id="status2"></br>
			<br/>
       	   	<h5 id="list_add"></h5>
			<br/>
			<input type="submit" value="kirim">
			
		</form>
		<br/><hr/>
	';
	echo '



			  <hr/>
				<div id="board">
					<h2 id="judul"></h2>
					<div id="adder"></div>
					<h5 id="date"></h5>
					<h5 id="statpro"></h5>
					Team :
					<h5 id="list"></h5>
					Task :
					<h5 id="listtsk"></h5>
				</div>
			  <hr/>';

	echo 'Admin --+--> Project here<hr/>';
///CRUD PROJECT ---------------------------------------!!!!!!!!!------------HERE
	foreach ($all_project as $u2) {
		echo '<h4> '.$u2->nama_project.' ==> 
			<button onclick="edit_project('.$u2->id_project.')">Edit</button>
			<button onclick="delete_project('.$u2->id_project.')">Hapus</button>
			<button onclick="view_project('.$u2->id_project.')">View</button></h2>';
	}

		echo '<hr/>';


	echo '
		<form name="form_project" id="form_project">
			Aksi : <input type="text" name="aksi2" id="aksi2" value="add" disabled></br>
			<input type="hidden" name="id_project" id="id_project" ></br>
			Nama project : <input type="text" name="nama_project" id="nama_project"></br>
			Start date : <input type="text" name="start_date" id="start_date" ></br>
			Finish date : <input type="text" name="finish_date" id="finish_date"></br>
			Status : <input type="text" name="status1" id="status1"></br>
			<br/>
			<input type="checkbox" name="members[]" value="6" class="member"> Player 1 Galang </input>
       	    <input type="checkbox" name="members[]" value="10" class="member"> Player 2 Damt</input>
       	   	<h5 id="list2"></h5>
			<br/>
			<input type="submit" value="kirim">
			
		</form>
		<button onclick="add_new_project()">+ Tambah project</button>
		<br/><br/>
	';


	echo '<br/><br/>Admin --+--> User here<hr/>';
///CRUD USER ---------------------------------------!!!!!!!!!------------HERE
	foreach ($all_user as $u) {
		echo '<h4> Nama :'.$u->nama_user.' Tipe :'.$u->tipe_user.' --> email : '.$u->email.'--> no telp : '.$u->no_tlp.'--> pass : '.$u->password.'--> akses : '.$u->akses.' 
			<button onclick="edit_user('.$u->id_user.')">Edit</button>
			<button onclick="delete_user('.$u->id_user.')">Hapus</button>
			<button onclick="view_user('.$u->id_user.')">View</button></h2>';
	}
	echo '<hr/><h2 id="put"></h4><hr/>';

	echo '
		<form name="form_user" id="form_user">
			Aksi : <input type="text" name="aksi" id="aksi" value="add" disabled></br>
			<input type="hidden" name="id_user" id="id_user" ></br>
			Nama user : <input type="text" name="nama_user" id="nama_user"></br>
			Tipe user : <input type="text" name="tipe_user" id="tipe_user" ></br>
			email : <input type="text" name="email" id="email"></br>
			no telp : <input type="text" name="tlp" id="tlp"></br>
			password : <input type="text" name="pass" id="pass"></br>
			akses : <input type="text" name="akses" id="akses"></br>
			<br/>
			<input type="submit" value="kirim">
			
		</form>
		<button onclick="add_new()">+ Tambah user</button>
		</br></br>
	';
?>

<script src="<?php echo base_url('assets/jquery.js');?>"></script>
<script>
$(document).ready(function(){

///SCRIPT admin -> USER ---------------------------------------!!!!!!!!!------------HERE
	
	    $("#form_user").submit(function(e){
	    	e.preventDefault();

	    	aksi = $('input[name=aksi]').val();
	    	//id = $('input[name=id_user]').val();

	    	if(aksi == 'add'){
	    		url = "<?php echo base_url('index.php/c_dashboard/test_insrt'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/c_dashboard/test_update'); ?>"
	    	}

	    	//console.log(id);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_user').serialize(),
						url: url,
						success: function(data){
							
							$('#put').text(data);
							$('#form_user')[0].reset();
						}
			});
	    });


///SCRIPT admin -> PROJECT ---------------------------------------!!!!!!!!!------------HERE

	    $("#form_project").submit(function(e){
	    	e.preventDefault();

	    	aksi = $('input[name=aksi2]').val();

	    	if(aksi == 'add'){
	    		url = "<?php echo base_url('index.php/c_dashboard/test_insrt_p'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/c_dashboard/test_update_p'); ?>"
	    	}

	    	//console.log(start,end);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_project').serialize(),
						url: url,
						success: function(data){
							
							//$('#put2').text(data);
							$('#form_project')[0].reset();
						}
			});
	    });
///SCRIPT -> TASK ---------------------------------------!!!!!!!!!------------HERE

	    $("#form_task").submit(function(e){
	    	e.preventDefault();

	    	aksi = $('input[name=aksi3]').val();

	    	if(aksi == 'add'){
	    		url = "<?php echo base_url('index.php/c_dashboard/test_insrt_tsk'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/c_dashboard/test_update_tsk'); ?>"
	    	}

	    	//console.log(start,end);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_task').serialize(),
						url: url,
						success: function(data){
							
							//$('#put2').text(data);
							$('#form_task')[0].reset();
						}
			});
	    });

});
</script>
<script>

///SCRIPT admin -> USER ---------------------------------------!!!!!!!!!------------HERE
	// event.preventDefault();
	// data: $("#myForm1").serialize(),
	function add_new(){
		$('#form_user')[0].reset();
		$('#aksi').val('add');
	} 
	function view_user(id){
		$.ajax({
						type:"POST",
						dataType : "JSON",
						data : {id:id},
						url: "<?php echo base_url('index.php/c_dashboard/edit'); ?>",
						success: function(data){
							$('#put').html(data['nama_user']);
						}
			});

	} 

	function edit_user(id){
		$('#form_user')[0].reset();
		$.ajax({
						type:"POST",
						dataType : "JSON",
						data : {id:id},
						url: "<?php echo base_url('index.php/c_dashboard/edit'); ?>",
						success: function(data){
							$('#id_user').val(data['id_user']);
							$('#nama_user').val(data['nama_user']);
							$('#tipe_user').val(data['tipe_user']);
							$('#email').val(data['email']);
							$('#tlp').val(data['no_tlp']);
							$('#password').val(data['password']);
							$('#akses').val(data['akses']);
							$('#aksi').val('edit');
						}
			});

	} 
	function delete_user(id) {
	    if (confirm("Are you sure?")) {
	    	console.log(id);
		        $.ajax({
					type:"POST",
					dataType : "JSON",
					data : {id:id},
					url: "<?php echo base_url('index.php/c_dashboard/test_delete'); ?>",
					success: function(data){
							location.reload();
					}
				});
	    return false;
		}
	}

///SCRIPT admin -> PROJECT ---------------------------------------!!!!!!!!!------------HERE
		function add_new_project(){
				$('#form_project')[0].reset();
				$('#list2').empty();
				$('#aksi2').val('add');
			} 
		function view_project(id){

			//console.log(id);
			$.ajax({
							type:"POST",
							dataType : "JSON",
							data : {id:id},
							url: "<?php echo base_url('index.php/c_dashboard/view_p'); ?>",
							success: function(data){
								$('#list').empty();
								$('#listtsk').empty();
								$('#judul').html(data['project']['nama_project']);
								$('#date').html(data['project']['start_date']+" ----> "+data['project']['finish_date']);
								$('#statpro').html(data['project']['status_project'] +" = "+data['project']['progresh']);
								if(data['members']['n'] != 0){
									for(i=1;i<=data['members']['n'];i++){
										$('#list').append(data['members'][i]['nama_user'] +" / "+data['members'][i]['role'] +"<br/>");
									}
								}

								if(data['task']['n'] != 0){
									for(j=1;j<=data['task']['n'];j++){
										$('#listtsk').append(data['task'][j]['nama_task'] +"<br/>");
									}
								}
								$('#adder').html('<button onclick="add_task('+id+')"> + Buat task</button>');
							}
				});

		} 
		function edit_project(id){
				$('#form_user')[0].reset();
				$.ajax({
								type:"POST",
								dataType : "JSON",
								data : {id:id},
								url: "<?php echo base_url('index.php/c_dashboard/view_p'); ?>",
								success: function(data){
									$('#list2').empty();
									$('#id_project').val(data['project']['id_project']);
									$('#nama_project').val(data['project']['nama_project']);
									$('#start_date').val(data['project']['start_date']);
									$('#finish_date').val(data['project']['finish_date']);
									$('#status1').val(data['project']['status_project']);
									if(data['members']['n'] != 0){
										for(i=1;i<=data['members']['n'];i++){
											value_drop = data['members'][i]['id_user']
											$('#list2').append(data['members'][i]['nama_user'] +' / '+data['members'][i]['role'] +' / <input type="checkbox" name="drops[]" value="'+value_drop+'" class="member"> Hapus</input><br/>');
										}
									}
									$('#aksi2').val('edit');
								}
					});

		} 
		function delete_project(id) {
		    if (confirm("Are you sure?")) {
		    	console.log(id);
			        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : {id:id},
						url: "<?php echo base_url('index.php/c_dashboard/test_delete_p'); ?>",
						success: function(){
								//location.reload();
						}
					});
		    return false;
			}
		}



///SCRIPT -> TASK ---------------------------------------!!!!!!!!!------------HERE
		function add_task(id){
			$.ajax({
								type:"POST",
								dataType : "JSON",
								data : {id:id},
								url: "<?php echo base_url('index.php/c_dashboard/add_new_task'); ?>",
								success: function(data){
										$('#form_task')[0].reset();
										$('#aksi3').val('add');
										$('#id_project2').val(id);
										if(data['n'] != 0){
											for(i=1;i<=data['n'];i++){
												value_drop = data[i]['id_user']
												$('#list_add').append(data[i]['nama_user'] +' / '+data[i]['role'] +' / <input type="checkbox" name="memberfor_tsk[]" value="'+value_drop+'" class="member"> Add</input><br/>');
											}
										}
								}
			});
		}
		

</script>
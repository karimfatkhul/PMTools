<?php $this->load->view('asset'); ?>
<?php $this->load->view('navigasi'); ?>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<!-- Latest Report -->
						<div class="box" >
						  	<div class="box-header">
									<?php
									foreach ($user as $u) {
										$id_user	 	= $u->id_user;
										$nama_user 		= $u->nama_user;
									}
									 ?>
						    	<h3 class="box-title"><?php echo $nama_user ?> Report</h3>
						  	</div>
						  	<div class="box-body" style="min-height:450px">
						  		<table class="table table-condensed table-hover">
                    <?php
                    		foreach ($list_report as $u1) {
                    			$id_report	 	= $u1->id_report;
                    			$date_report 	= $u1->date_report;
                    			$nama_project 	= $u1->nama_project;
                    			echo'
                    				<tr>
                    					<td>
                    					  <a  href="'.base_url().'index.php/view/report/'.$id_report.'" >
                    						'.$nama_project.'
                    					  </a>
                    					</td>
                    					<td>'.$nama_user.'</td>
                    					<td>'.$date_report.'</td>
                    					<td>
                    				';
                    			if($this->session->userdata('id_user') == $id_user){

                    				echo'
                    							<a href="'.base_url().'index.php/edit/report/'.$id_report.'">Edit</a>
                    							<a href="#" onclick="delete_report('.$id_report.')">Hapus</a>
                    					';
                    				}
                    			echo'
                    					</td>
                    				</tr>
                    			';
                    		}
                    		if(isset($id_report) == null){
                    			echo'<h2>Tidak ada report dari user ini !!</h2>';
                    		}
                    ?>
						  		</table>
						  	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<div id="board">
</div>
<?php $this->load->view('function'); ?>
<script type="text/javascript">
	function close_fom(){
		$('#board').empty();
		//location.reload();
	}
	function add_project(){
			$.ajax({
								type:"POST",
								url: "<?php echo base_url('index.php/project/c_project/add_project'); ?>",
								success: function(data){
									$('#board').html(data);
								}
							});
		}
	function delete_report(id) {
	    if (confirm("Are you sure?")) {
	    	console.log(id);
		        $.ajax({
					type:"POST",
					dataType : "JSON",
					data : {id:id},
					url: "<?php echo base_url('index.php/report/c_report/delete_report'); ?>",
					success: function(){

					}
				}); location.reload();

	    // return false;

		}
	}

	function edit_report(id) {
		    $('#board').empty();

			var aksi = 'edit';
			console.log(id,aksi);
			$.ajax({
							type:"POST",
							data : { id:id, aksi:aksi },
							url: "<?php echo base_url('index.php/report/c_report/view_report'); ?>",
							success: function(data){
								$('#board').html(data);
							}
				});
		}
	function view_report(id) {
		    $('#board').empty();

			var aksi = 'view';
			console.log(id,aksi);
			$.ajax({
							type:"POST",
							data : { id:id, aksi:aksi },
							url: "<?php echo base_url('index.php/report/c_report/view_report'); ?>",
							success: function(data){
								$('#board').html(data);
							}
				});
		}
</script>

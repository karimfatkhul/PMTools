<?php $this->load->view('asset'); ?>
<?php $this->load->view('navigasi'); ?>
<?php
	//$aksi = 'add new';
	if($aksi == 'edit'){
		foreach ($data_project as $u2) {
			$id_project 	= $u2->id_project;
			$nama_project 	= $u2->nama_project;
			$start_date 	= $u2->start_date;
			$finish_date 	= $u2->finish_date;
			$status_project	= $u2->status_project;
			$progress 		= $u2->progress;
			$title 		= 'Edit Project | Solusi247';
			$box_title  = 'Edit Project';

			$new_member = $candidat;
		}
	}

	else if($aksi == 'add new'){
			$id_project 	= null;
			$nama_project 	= null;
			$start_date 	= null;
			$finish_date 	= null;
			$status_project = null;
			$progress 		= null;
			$title 		= 'Add Project | Solusi247';
			$box_title  = 'Add Project';

			$new_member = $all_candidat;
	}
?>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo $box_title ?></h3>
						</div>
						<div class="box-body">
							<form  name="form_project" id="form_project">
							  <div class="row">
							  	<div class="col-md-6 ml-3">
							  		<h3 class="form-title mb-3" style="font-size:1rem">Project Information</h3>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Project Name</label>
							  		  <div class="col-sm-12">
							  		    	<input type="hidden" class="form-control" id="aksi" name="aksi" value="<?php echo $aksi?>" >
							  		    	<input type="hidden" class="form-control" id="id_project" name="id_project" value="<?php echo $id_project?>" >
							  		    	<input type="text" class="form-control" id="nama_project" name="nama_project" value="<?php echo $nama_project ?>">
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Start Date</label>
							  		  <div class="col-sm-12">
							  		    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date ?>" >
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >End Date</label>
							  		  <div class="col-sm-12">
							  		    <input type="date" class="form-control" id="finish_date" name="finish_date" value="<?php echo $finish_date ?>"  >
							  		  </div>
							  		</div>
							  		<div class="form-group">
							  		  <label class="control-label col-sm-6" >Project Status</label>
							  		  <div class="col-sm-12">
							  		    <input type="text" class="form-control" id="status_project" name="status_project" value="<?php echo $status_project ?>"  >
							  		  </div>
							  		</div>
							  	</div>
							  	<div class="col-md-5 ml-3">
							  		<div class="col-md-12">
							  			<h3 class="form-title" style="font-size:1rem;display: inline-block;">Add Project Member</h3>
							  			  	<div class="col-sm-6 float-right pr-0" style="margin-bottom:  2rem!important;">
							  			    	<div class="input-group input-group-sm">
							  			        	<input type="text" class="form-control" placeholder="Search for..." id="myInput" aria-label="Search for..." onkeyup="myFunction()">
							  			        	<span class="input-group-btn">
							  			          		<button class="btn btn-primary" type="button">Go!</button>
							  			        	</span>
							  			    	</div>
							  			  	</div>
							  		</div>

							  		<div class="col-sm-12">
							  			<h4 id="msg"></h4>
							  			<table class="table table-condensed" id="myTable">
							  				<?php
                            foreach ($new_member as $u3) {

                              echo '  <tr>
                                    <td>
                                      '. $u3->nama_user.'
                                    </td><td>
                                ';

                               if($aksi == 'add new'){
                              echo '

                                <input type="checkbox" name="members[]" value="'.$u3->id_user.'" class="member" id="'.$u3->id_user.'"  ></input>
                                <input type="checkbox" name="role[]" value="project leader" id="role1'.$u3->id_user.'" onchange="selct(2,'.$u3->id_user.')" class="rl'.$u3->id_user.'"  style="display:none;"><span class="rl'.$u3->id_user.'" style="display:none;">Project leader</span></input>
								<input type="checkbox" name="role[]" value="project developer" id="role2'.$u3->id_user.'" onchange="selct(1,'.$u3->id_user.')" class="rl'.$u3->id_user.'" style="display:none;"><span class="rl'.$u3->id_user.'" style="display:none;">Project developer</span></input>

                                ';
                            } else if($aksi == 'edit'){

                              $input = null;




                              foreach ($member as $ui3) {
                              	$role = 'none';
                                if($u3->id_user == $ui3->id_user){
                                	$role = $ui3->role;
                                  $input = '<input type="checkbox" name="members[]" value="'.$u3->id_user.'" class="member"  id="'.$u3->id_user.'"  checked></input>';
                                  if($role == 'project leader'){
                                  			$set = '
		                                <input type="checkbox" name="role[]" value="project leader" id="role1'.$u3->id_user.'" onchange="selct(2,'.$u3->id_user.')" class="rl'.$u3->id_user.'"  checked><span class="rl'.$u3->id_user.'">Project leader</span></input>
										<input type="checkbox" name="role[]" value="project developer" id="role2'.$u3->id_user.'" onchange="selct(1,'.$u3->id_user.')"  class="rl'.$u3->id_user.'"  ><span class="rl'.$u3->id_user.'" >Project developer</span></input>';
                                  }else if($role == 'project developer'){
                                  	 		$set = '
		                                <input type="checkbox" name="role[]" value="project leader" id="role1'.$u3->id_user.'" onchange="selct(2,'.$u3->id_user.')"  class="rl'.$u3->id_user.'"  ><span class="rl'.$u3->id_user.'" >Project leader</span></input>
										<input type="checkbox" name="role[]" value="project developer" id="role2'.$u3->id_user.'" onchange="selct(1,'.$u3->id_user.')" class="rl'.$u3->id_user.'" checked><span class="rl'.$u3->id_user.'">Project developer</span></input>';
                                  }



                                }

                              }
                                if($input == null){
                                  $input = '<input type="checkbox" name="members[]" value="'.$u3->id_user.'" class="member" id="'.$u3->id_user.'"  ></input>';
																	$set = '
				                                <input type="checkbox" name="role[]" value="project leader" id="role1'.$u3->id_user.'" onchange="selct(2,'.$u3->id_user.')" class="rl'.$u3->id_user.'"  style="display:none;"><span class="rl'.$u3->id_user.'" style="display:none;">Project leader</span></input>
												<input type="checkbox" name="role[]" value="project developer" id="role2'.$u3->id_user.'" onchange="selct(1,'.$u3->id_user.')" class="rl'.$u3->id_user.'"  style="display:none;"><span class="rl'.$u3->id_user.'" style="display:none;">Project developer</span></input>';


                                }


                              echo $input;
                              echo $set;

                            }

                            echo '
                                    </td>
                                  </tr>
                                ';
                          } ?>
							  			</table>
							  		</div>
							  	</div>
							  </div>


							  <div class="form-group mt-3">
							    <div class="col-sm-offset-2 col-sm-10">
												<h4 id="message"></h4>
										<a type="submit" class="button btn btn-default mr-3 text-dark" href="<?php echo base_url('index.php/project')?>">Cancel</a>
							      <button type="submit" class="btn btn-primary">Save</button>
							    </div>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('function'); ?>
<script>
$(document).ready(function(){
	$("#form_project").submit(function(e){
		e.preventDefault();

		aksi = $('input[name=aksi]').val();
		id_project = $('input[name=id_project]').val();
		start = $('input[name=start_date]').val();

	//	if(aksi == 'add new'){
			url = "<?php echo base_url('index.php/project/c_project/save_project'); ?>"
		//}else if(aksi == 'edit'){
		//	url = "<?php// echo base_url('index.php/project/c_project/update_project'); ?>"
		//}

		console.log(start);

			$.ajax({
				type:"POST",
				dataType : "JSON",
				data : $('#form_project').serialize(),
				url: url,
				success: function(data){

					$("#message").html("<b>"+data['mssg']+"</b>");
					if(data['result'] == 'ok'){
						if(aksi == 'add new'){
							window.setTimeout(function(){location.reload()},2000)
						}else if(aksi == 'edit'){
							window.setTimeout(function(){window.location.replace("<?php echo base_url('index.php/project');?>");},2000)
						}
					}
				}
	});

	});
	$(".member").change(function() {
		var id = $(this).attr('id');
		if(this.checked) {
				$(".rl"+String(id)).css('display','');
			}else {
				$(".rl"+String(id)).prop('checked',false);
				$(".rl"+String(id)).css('display','none');
			}
	});
})

function selct(no,id){

	console.log(no,id);
	 $("#role"+String(no)+String(id)).prop('checked',false);
}
</script>
</html>

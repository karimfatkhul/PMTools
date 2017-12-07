
<?php

		foreach ($data_task as $u2) {
			$id_task 		= $u2->id_task;
			$nama_task 		= $u2->nama_task;
			$status_task 	= $u2->status_task;
			$id_project 	= $u2->from_id_project;
		}
echo '
		<table class="table table-responsive table-condensed table-md" id="boards">
			<tr>
				<td>';
				foreach ($member_on as $u3) {
							$id_user 		= $u3->id_user;
							$nama_user 		= $u3->nama_user;
							echo $nama_user.'<br/>';
						}
echo '	</td>
			</tr>
			<tr>
				<td>Status task</td><td>'.$status_task.' </td>
			</tr>
			<tr>
				<td>
					Activity List
				</td>
				<td>
	  ';

echo'			</td>
				</tr>
				</table>
        <div id="accordion" role="tablist">';
				foreach ($activityes as $u4) {
							$id_activity 		= $u4->id_activity;
							$nama_activity 		= $u4->nama_activity;
							$nama_user 			= $u4->nama_user;
							$id_user 			= $u4->id_user ;
							echo'
							<div class="card" style="border: 0.5px solid #e7e4e4ba !important">
						    <div class="card-header" role="tab" id="heading'.$id_activity.'" style="border-bottom:0.5px solid #e7e4e4ba !important;">
						      <p class="mb-0" style="font-size:0.88rem">
						        <a data-toggle="collapse" href="#collapse'.$id_activity.'" aria-expanded="true" aria-controls="collapseOne" style="text-decoration:none;color:#4e4f50 !important">
						          '.$nama_activity.'
						        </a>
						      </p>
						    </div>' ;
								echo'<div id="collapse'.$id_activity.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$id_activity.'" data-parent="#accordion">
								<div class="card-body">';
							foreach ($list as $u5) {
								if($u5->from_id_activity == $id_activity){
									if($u5->status_list == 'done'){
										echo '<li style="font-size:0.88rem">'.$u5->list_activity;

	  										if($actor == 'on task' || $role == "project leader"){
												echo'<span class="ml-3"><input type="checkbox" name="status[]" value="'.$u5->id_list.'" class="list" checked></input></span>
													<span class="ml-3"><button onclick="delete_list('.$u5->id_list.')">X</button></li></span>
													<br/>
													';
											}
									}
									else {
										echo '<li style="font-size:0.88rem">'.$u5->list_activity;
	  										if($actor == 'on task' || $role == "project leader"){
												echo'<span class="ml-3"><input type="checkbox" name="status[]" value="'.$u5->id_list.'" class="list" ></input></span>
												<span class="ml-3"><button onclick="delete_list('.$u5->id_list.')">X</button></li></span>
												<br/>
												';
											}
									}
								}
							}
							//if($id_user  == $this->session->datauser('id_user'); || $role == "project leader"){
							echo
							 '
							 				<div class="input-group input-group-sm">
												<input type="hidden" class="form-control" id="id_list" name="id_list" value="" placeholder="id activity">
							 					<input type="text" id="nama_list'.$id_activity.'" name="nama_list'.$id_activity.'" class="form-control" placeholder="Add new list">
							 					<button class="input-group-addon" id="basic-addon2" onclick="save_list('.$id_activity.')">Add  List</button>
							 				</div>
									';
								//}
								echo'
									</div>
							 </div>
						</div>
				</div>';
				};
				if($actor == 'on task' || $role == "project leader"){
				echo '
				<div class="form-group mt-3" id="form_activity_board">

				</div>
				<br/>
				<div class="col-md-12">
				</div>';
								}
?>
<script>
// Call fromt add task when document load
$(document).ready(function(){

	var role = "<?php echo $role?>";
	var actor = "<?php echo $actor?>";
	if(actor == 'on task' || role == "project leader"){
			var aksi = 'add new';
			var id = "<?php echo $id_task?>";
			$.ajax({
							type:"POST",
							data: {id:id, role:role, aksi:aksi},
							url: "<?php echo base_url('index.php/project/c_activity/add_activity'); ?>",
							success: function(data){
								$('#form_activity_board').html(data);
							}
						});
	}
});
</script>
<script>
  $(document).ready(function(){
    $(".list").change(function() {
        if(this.checked) {
          var id = $(this).val();
          var status = 'done';
            $.ajax({
            type:"POST",
            dataType : "JSON",
            data : {id:id,status:status},
            url: "<?php echo base_url('index.php/project/c_activity/list_status'); ?>",
            success: function(data){

            }
      });
        }
    });
  });
</script>
<script type="text/javascript">
  function add_activity(id){
    console.log(id);
      $.ajax({
                type:"POST",
                data: {id:id},
                url: "<?php echo base_url('index.php/project/c_activity/add_activity'); ?>",
                success: function(data){
                  $('.board2'+String(id)).html(data);
                }
              });
    }

  function edit_activity(id,id_t){

    var aksi = 'edit';
    console.log(id,id_t,aksi);
    $.ajax({
            type:"POST",
            data : { id:id , id_t:id_t, aksi:aksi },
            url: "<?php echo base_url('index.php/project/c_activity/view_activity'); ?>",
            success: function(data){
              $('#board_form_activity').html(data);
            }
      });

  }
  function delete_activity(id) {
      if (confirm("Are you sure?")) {
        console.log(id);
            $.ajax({
          type:"POST",
          dataType : "JSON",
          data : {id:id},
          url: "<?php echo base_url('index.php/project/c_activity/delete_activity'); ?>",
          success: function(){
          }
        }); location.reload();
         }
    }
  function delete_list(id) {
      if (confirm("Are you sure?")) {
        console.log(id);
            $.ajax({
          type:"POST",
          dataType : "JSON",
          data : {id:id},
          url: "<?php echo base_url('index.php/project/c_activity/delete_list'); ?>",
          success: function(){
					          }
        }); location.reload();
       }
    }
</script>
<script type="text/javascript">
	function save_list(id_activity){
			nama_list = $('#nama_list'+String(id_activity)).val();
			console.log(nama_list,nama_list);
			$.ajax({
								type:"POST",
								dataType : "JSON",
								data: {id_activity:id_activity, nama_list:nama_list},
								url: "<?php echo base_url('index.php/project/c_activity/insert_list'); ?>",
								success: function(){

								}
							});
	}
  function add_list(id){
    console.log(id);
      $.ajax({
                type:"POST",
                data: {id:id},
                url: "<?php echo base_url('index.php/project/c_activity/add_list'); ?>",
                success: function(data){
                  $('#board_form_activity').html(data);
                }
              });
    }
  function edit_list(id){

    //var aksi = 'edit';
    console.log(id);
    $.ajax({
            type:"POST",
            data : { id:id },
            url: "<?php echo base_url('index.php/project/c_activity/view_list'); ?>",
            success: function(data){
              $('#board_form_activity').html(data);
            }
      });

  }
</script>

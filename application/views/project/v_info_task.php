
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
        <div id="accordion" role="tablist" id="">
							<div class="form-group mt-3" id="list_activity_board">

							</div>
				</div>';

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

	var role 	= "<?php echo $role?>";
	var actor = "<?php echo $actor?>";
	var id 		= "<?php echo $id_task?>";
	if(actor == 'on task' || role == "project leader"){
			var aksi = 'add new';

			$.ajax({
							type:"POST",
							data: {id:id, role:role, aksi:aksi,  actor:actor},
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

	var role 	= "<?php echo $role?>";
	var actor = "<?php echo $actor?>";
	var id 		= "<?php echo $id_task?>";
$.ajax({
				type:"POST",
				data: {id:id, role:role, actor:actor},
				url: "<?php echo base_url('index.php/project/c_activity/activity_list'); ?>",
				success: function(data){
					$('#list_activity_board').html(data);
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

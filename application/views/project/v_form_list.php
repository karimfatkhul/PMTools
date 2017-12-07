<?php
//$aksi = 'add new';
//$aksi = 'add new';
if($aksi == 'edit'){
		foreach ($data_list as $v1) {
			$id_list			= $v1->id_list;
			$nama_list	 		= $v1->list_activity;
			$status_list		= $v1->status_list;
			$id_activity		= $v1->from_id_activity;

			//$member = $member;
		}
	}


	else if($aksi == 'add new'){
			$id_activity = $id_activity;
			$id_list 	= null;
			$nama_list	= null;

			//$member = $member;
	}

echo '
	<form class="form-horizontal" name="form_list" id="form_list" >
	  <input type="text" class="form-control" id="aksi" name="aksi" value="'.$aksi.'" disabled>
	  <input type="hidden" class="form-control" id="id_activity" name="id_activity" value="'.$id_activity.'" placeholder="id task">
	  <input type="hidden" class="form-control" id="id_list" name="id_list" value="'.$id_list.'" placeholder="id activity">
	  <div class="form-group">
	    <div class="col-sm-12">
	      <textarea class="form-control" id="nama_list" name="nama_list" rows="3" >
	      '.$nama_list.'</textarea>
	    </div>
	 ';

if($aksi == 'add new'){
	echo '
		<div class="col-sm-12">
	     <input type="checkbox" name="status_list" value="done" id="status_list" > Done</input>
	    </div>
	';

}else {
	if($status_list == 'done'){
		echo '
			<div class="col-sm-12">
		     <input type="checkbox" name="status_list" value="done" id="status_list" checked> Done</input>
		    </div>
		';
	}else {
		echo '
			<div class="col-sm-12">
		     <input type="checkbox" name="status_list" value="done" id="status_list" > Done</input>
		    </div>
		';
	}
}


echo'  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Submit</button>
	    </div>
	  </div>
	</form>
	  ';
?>

<script>
	$(document).ready(function(){
	    $("#form_list").submit(function(e){
	    	e.preventDefault();

	    	aksi = $('input[name=aksi]').val();
	    	id = $('input[name=id_task0]').val();
	    	id_p = $('input[name=id_project]').val();
	    	//member = $('input[name=member]').val();

	    	if(aksi == 'add new'){
	    		url = "<?php echo base_url('index.php/project/c_activity/insert_list'); ?>"
	    	}else if(aksi == 'edit'){
	    		url = "<?php echo base_url('index.php/project/c_activity/update_list'); ?>"
	    	}

	    	//console.log(id_task,member);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_list').serialize(),
						url: url,
						success: function(){

							//$('#put2').text(data);
							//$('#form_activity')[0].reset();
						}
			}); view_task(id,id_p);
	    });
});
</script>

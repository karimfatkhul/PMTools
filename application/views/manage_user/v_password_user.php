<?php $this->load->view('asset'); ?>



<table class="table table-bordered">
<?php
	echo '
		
	 <form class="form-horizontal" name="form_password" id="form_password">
		<div class="form-group">
		    <label class="control-label col-sm-2" for="email">Password :</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="old_pass" name="old_pass" value="'.$password.'"  placeholder="Enter user type" disabled>
		    </div>
	  	</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="email">New password :</label>
		    <div class="col-sm-10">
		      <input type="hidden" class="form-control" id="id_user" name="id_user" value="'.$id_user.'" >
		      <input type="text" class="form-control" id="password" name="password" placeholder="Enter new password" >
		    </div>
	  	</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="email"></label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="Confirm your new password" >
		    </div>
	  	</div>
	  	<div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Submit</button>
	    </div>
	  </div>
	</form>
	<h2 id="mssg"></h2>

	';
?>
<script>
	$(document).ready(function(){	    $("#form_password").submit(function(e){
	    	e.preventDefault();

	    	pass1 = $('input[name=password]').val();
	    	pass2 = $('input[name=confirm_pass]').val();

	    	if(pass1 == pass2){
				$('#mssg').html('your password success for update!!');
	    		url = "<?php echo base_url('index.php/manage_user/c_manage_user/update_password'); ?>"
	    	}else{
	    		$('#mssg').text('your password not match!!');
	    	}

	    	//console.log(id);

	        $.ajax({
						type:"POST",
						dataType : "JSON",
						data : $('#form_password').serialize(),
						url: url,
						success: function(data){
							
							$('#form_password')[0].reset();
							$('#old_pass').val(data);
						}
			}); location.reload();
	    });


	})
</script>
<?php $this->load->view('asset'); ?>
<?php $this->load->view('navigasi'); ?>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-12">
					//User Details
					<div class="box">
					  	<div class="box-header">
					    	<h3 class="box-title">User Details</h3>
					  	</div>
					  	<div class="box-body">
									//Load user data
					  			<?php
					  					foreach ($data_member as $u2) {
					  						$id_user 	= $u2->id_user;
					  						$nama_user 	= $u2->nama_user;
					  						$tipe_user 	= $u2->tipe_user;
					  						$email 		= $u2->email;
					  						$no_tlp 	= $u2->no_tlp;
					  						$akses 		= $u2->akses;
					  					}
					  			echo '
					  			<dl class="dl-horizontal">
					  					<dt>
					  					    User Name
					  					</dt>

					  					<dd>
					  					     '.$nama_user.'
					  					</dd>

					  					<dt>
					  					    User Type
					  					</dt>

					  					<dd>
					  					    '. $tipe_user .'
					  					</dd>
					  					<dt>
					  					    Email
					  					</dt>

					  					<dd>
					  					    '. $email .'
					  					</dd>

					  					<dt>
					  					    Phone
					  					</dt>

					  					<dd>
					  					    '. $no_tlp .'
					  					</dd>
					  					<dt>
					  					    Acess Type
					  					</dt>

					  					<dd>
					  					    '. $akses .'
					  					</dd>
					  				</dl>
					  				';
					  			?>
									 <div class="form-group mt-3">
							    		<div class="col-sm-offset-2 col-sm-10">
							      	<a type="submit" class="button btn btn-default mr-3 text-dark" href="<?php echo base_url('index.php/manage_user/')?>">Back</a>
							    </div>
							  </div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('function');?>
</script>
</html>

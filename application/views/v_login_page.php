<!DOCTYPE html>
<html>
<head>
	<title>Login | Solusi247</title>
</head>
<body>
	<?php
	$url = base_url('index.php/c_login/auth');
	?>
	<div class="container-fluid p-0">
		<div class="solusi-login">
			<div class="solusi-login-box">
				<div class="row">
					<div class="col-md-12">
						<div class="solusi-logo mb-5">
							<img src="<?php echo base_url('assets/img/solusi-logo.png'); ?>">
						</div>
						<form name="form_login" id="form_login" method="POST" action="<?php echo $url; ?>">

							<p class="lead text-center text-danger bg-white" style="font-size:0.88rem" id="message"><?php echo $message;?></p>
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" value="" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
							</div>
							<p class="solusi-forgot-pass">Forgot Password?</p>
							<button type="submit" class="btn btn-warning btn-md btn-block text-white" >Log In</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
	

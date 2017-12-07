<?php $this->load->view('asset'); ?>
<body>
	<div id="main">
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="container-fluid">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active cl-effect-1 ">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item cl-effect-1">
						<a class="nav-link" href="<?php echo base_url('index.php/project');?>">Project</a>
						<li class="nav-item cl-effect-1">
							<a class="nav-link" href="<?php echo base_url('index.php/list/user/report/');?><?php echo $this->session->userdata('id_user');?>">Report</a>
						</li>
					</ul>
					<span class="navbar-text">
						<a class="nav-link text-dark" href="<?php echo base_url('index.php/logout');?>">log out</a>
					</span>
				</div>
		</nav>
		<div class="container" style="margin-top:100px; min-height:500px;">
			<div class="row">
				<div class="col-md-12">
					<p class="lead py-3">Hello <?php echo $this->session->userdata('nama_user'); ?> / <?php echo $this->session->userdata('tipe_user'); ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="box">
						<div class="box-body">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link active" href="#">Active</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Link</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Link</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Disabled</a>
								</li>
							</ul>
						</div>
					</div>

				</div>
				<div class="col-md-8">
					<div class="box">
						<div class="box-header">
							<p class="box-title">
							</p>
						</div>
						<div class="box-body">
						</div>
					</div>
				</div>
			</div>
		</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("nav").style.marginLeft = "200px";
    document.getElementById("burger").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("nav").style.marginLeft = "auto";
    document.getElementById("burger").style.display = "block";
}
</script>
<?php $this->load->view('foot'); ?>

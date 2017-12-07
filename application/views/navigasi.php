<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="cl-effect-1">
        <a href="<?php echo base_url('index.php/manage_user');?>">Manage User</a>
    </div>
    <div class="cl-effect-1">
        <a href="<?php echo base_url('index.php/project');?>"><span data-hover="Manage Project">Manage Project</span></a>
    </div>
    <div class="cl-effect-1">
        <a href="<?php echo base_url('index.php/report');?>">Reports</a>
    </div>
    <div class="cl-effect-1">
        <a href="<?php echo base_url('index.php/logout');?>">Sign Out</a>
    </div>
  </div>
  <div id="main">
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
          <div class="container-fluid" id="nav">
                <span id="burger" style="font-size:30px;cursor:pointer;margin-right:20px" onclick="openNav()">&#9776;</span>
                <!-- <a class="navbar-brand" href="#">Solusi247</a> -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/c_navigasi');?>" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="material-icons">dashboard</i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/manage_user/add/user');?>" data-toggle="tooltip" data-placement="top" title="Create User"><i class="material-icons">person_add</i></a>
                    </li>
                    <li class="nav-item cl-effect-12">
                        <a class="nav-link" href="<?php echo base_url('index.php/add/project');?> " data-toggle="tooltip" data-placement="top" title="Create Project"><i class="material-icons">create_new_folder</i></a>
                    </li>
                </ul>
            </div>
    </nav>

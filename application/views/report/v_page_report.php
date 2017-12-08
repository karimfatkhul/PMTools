<?php $this->load->view('asset'); ?>
<title>Report | Solusi 247 </title>
<?php $this->load->view('navigasi'); ?>
		<div class="container-fluid dashboard px-4">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<!-- Latest Report -->
						<div class="box" >
						  	<div class="box-header">
						    	<h3 class="box-title">Lates Report</h3>
						  	</div>
						  	<div class="box-body" style="min-height:450px">
						  		<table class="table table-condensed table-hover">
										<?php
										$nama_2 = null ;$date_2 = null ;
										if(count($list_report) > 0){
											foreach ($list_user as $u) {
												$id_user	 	= $u->id_user;
												$nama_user 		= $u->nama_user;

														foreach ($list_report as $u2) {
																	//$id_report	 		= $u2->id_report;
																	$date_report			= $u2->date_report;
																	$from_id_user 		= $u2->from_id_user;
																	//$nama_project 		= $u2->nama_project;

																	if($from_id_user == $id_user){
																		if($date_report >= $date_2){
																			$date_2 = $date_report;
																		}
																		if($nama_user != $nama_2){
																			echo'
																				<tr>
																					<td>
																						<a href="'.base_url().'index.php/list/last/report/'.$id_user.'" class="btn btn-link" >
																						'.$nama_user.'
																						</a>
																					</td>
																					<td>
																						'.$date_2.'
																					</td>
																				';
																				$nama_2 = $nama_user;
																		}
																	}
														}
														$date_2 = null;
													}
										}else {
													echo '<tr><td colspan="2">Belum ada report untuk hari ini.</td></tr>';
										}
										?>
						  		</table>
						  	</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<!-- Today Report -->
					<div class="box" >
					  <div class="box-header">
					    <h3 class="box-title">Today Report</h3>
					  </div>
					  <div class="box-body" style="min-height:450px">
					    <table id="examples" class="table table-condensed  table-hover" cellspacing="0" width="100%">
					      <tbody>
									<?php
										if(count($today_report) > 0){
											$nama_2 = null ;
											foreach ($list_user as $u) {
												$id_user	 	= $u->id_user;
												$nama_user 		= $u->nama_user;

														foreach ($today_report as $u2) {
																	$id_report	 		= $u2->id_report;
																	//$date_report 			= $u2->date_report;
																	$from_id_user 		= $u2->from_id_user;
																	//$nama_project 		= $u2->nama_project;

																	if($from_id_user == $id_user){
																		if($nama_user != $nama_2){
																			echo'
																				<tr>
																					<td>
																						<a href="'.base_url().'index.php/list/today/report/'.$id_user.'" class="btn btn-link" >
																						'.$nama_user.'
																						</a>
																					</td>
																					<td>
																				';
																				$nama_2 = $nama_user;
																		}
																	}

														}
													}
										}else {
													echo '<tr><td colspan="2">Belum ada report untuk hari ini.</td></tr>';
										}
									?>
					      </tbody>
					    </table>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<!-- Today Report -->
					<div class="box">
					  <div class="box-header">
					    <h3 class="box-title">Doesn't Input Report</h3>
					  </div>
					  <div class="box-body"  style="min-height:450px">
					    <table id="example" class="table table-condensed table-hover" cellspacing="0" width="100%">
					      <tbody>
									<?php
										foreach ($list_user as $u) {
											$id_user	 	= $u->id_user;
											$nama_user 		= $u->nama_user;

											if(count($today_report) > 0){
												foreach ($today_report as $u3) {
															$id_report	 		= $u3->id_report;
															$date_report 		= $u3->date_report;
															$from_id_user 		= $u3->from_id_user;

														}
														if($from_id_user != $id_user){
															echo'
																<tr>
																	<td>
																		'.$nama_user.'
																	</td>

																	<td>

																	</td>
																</tr>
															';
														}
													}
													else{
                            echo'
                              <tr>
                                <td>
                                  '.$nama_user.'
                                </td>

                                <td>

                                </td>
                              </tr>
                            ';
                          }
											}

									?>
					      </tbody>
					    </table>
					  </div>
					</div>
				</div>
				<div class="col-md-2">
					<!-- Today Report -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">List User</h3>
						</div>
						<div class="box-body"  style="min-height:450px">
							<table id="example" class="table table-condensed table-hover" cellspacing="0" width="100%">
								<tbody>
									<?php
										foreach ($list_user as $u) {
											$id_user	 	= $u->id_user;
											$nama_user 		= $u->nama_user;
														echo'
															<tr>
																<td>
																	<a href="'.base_url().'index.php/list/user/report/'.$id_user.'" class="btn btn-link" >
																	'.$nama_user.'
																	</a>
																</td>

																<td>

																</td>
															</tr>
														';
											}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('function'); ?>

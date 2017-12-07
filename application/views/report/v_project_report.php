<?php $this->load->view('plugin'); ?>
 
 

<table class="table table-bordered">
<?php
		
		foreach ($data_report as $u1) {
			$id_report	 	= $u1->id_report;
			$date_report 	= $u1->date_report;
			$id_user	 	= $u1->id_user;
			$nama_user 		= $u1->nama_user;


		
			echo'
				<tr>
					<td>
					  <a class="btn btn-link"  href="'.base_url().'index.php/view/report/'.$id_report.'" >
						'.$nama_user.'
					  </a>
					</td>
					<td>'.$date_report.'</td>
					<td>
				';	

			if($this->session->userdata('id_user') == $id_user){

				echo'
							<a href="'.base_url().'index.php/edit/report/'.$id_report.'">Edit</a>
							<a href="#" onclick="delete_report('.$id_report.')">Hapus</a>
					';

				}
			echo'		
					</td>
				</tr>
			';
		}	
		if(isset($id_report) == null){
			echo'<h2>Tidak ada report untuk project ini!!</h2>';
		}
	
	

?>

</table>
<br/>
<?php
//if($this->session->userdata('akses') == 'admin'){

		echo'	<button onclick="close_fom()">X Close</button>';

	//}
?>

<a href="<?php echo base_url('index.php/home');?> ">Home </a>
<a href="<?php echo base_url('index.php/manage_user');?> ">manage user</a>
<hr/>
<div id="board">
	
</div>
<script type="text/javascript">
	function delete_report(id) {
	    if (confirm("Are you sure?")) {
	    	console.log(id);
		        $.ajax({
					type:"POST",
					dataType : "JSON",
					data : {id:id},
					url: "<?php echo base_url('index.php/report/c_report/delete_report'); ?>",
					success: function(){
							
					}
				}); location.reload();

	    // return false;
	   
		} 
	}
</script>
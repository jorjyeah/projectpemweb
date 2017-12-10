<!DOCTYPE html>
<html>
<head>
	<?php 
		echo $js;
		echo $css;
	?>
	<title>Computer Simulation</title>
</head>
<body>
	<?php
		echo $header;
		echo $footer;
	?>
	<?php echo form_open(base_url()."deletecom"); ?>
	<div class="container">
	<table id="cart" class="table table-striped">
		<thead>
			<tr>
				<th> Component </th>
				<th> Quantity </th>
				<th> Price </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
			
				<?php for($i=0;$i<7;$i++){
					if($this->session->userdata('qty'.$i) != 0){
						$data = array(
							'name'          => 'deletecom',
							'value'         => $i,
							'type'          => 'submit',
							'class'			=> 'btn btn-warning',
							'content'       => '<i class="fa fa-times"></i> Remove');
						echo "<tr>";
							echo "<td>".$this->session->userdata('name'.$i)." - ".$name[$i]."</td>";
							echo "<td>".$this->session->userdata('qty'.$i)."</td>";
							echo "<td>".$prc[$i]*$this->session->userdata('qty'.$i)."</td>";
							echo "<td>".
							form_button($data)
							//form_submit("deletecom", "$i", 'class="btn btn-warning"')
							."</td>";					
						echo "</tr>";
					}
				}?>
			
		</tbody>
		<tfoot>
			<tr>
				<th> Component </th>
				<th> Quantity </th>
				<th> Price </th>
				<th> Action </th>
			</tr>
		</tfoot>
	</table>
	</div>
	<?php echo form_close(); ?>	
	<script>
		$(document).ready(function(){
		    $('#cart').DataTable();
		});

		$(document).ready(function() {
		    var table = $('#example').DataTable();
		} );

		function deletecom(){
			location.reload()
		}
	</script>
</body>
</html>
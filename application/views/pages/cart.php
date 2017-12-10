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
				
				<?php echo $this->session->userdata('name0'); for($i=0;$i<7;$i++){
					if($this->session->userdata('qty'.$i) != 0){
						echo "<tr>";
							echo "<td>".$this->session->userdata('name'.$i)." - ".$name[$i]."</td>";
							echo "<td>".$this->session->userdata('qty'.$i)."</td>";
							echo "<td>".$prc[$i]*$this->session->userdata('qty'.$i)."</td>";
							echo "<td>
							<button type='submit' name='deletecart' value=".$i." class='btn btn-warning'>
								<i class='fa fa-times'></i> Remove
							</button>
							</td>"; // button remove untuk menghapus barang yang dipesan, dengan cara membuka routes deletecart, dan mengirimkan value(index) dari komponen yang akan dihapus
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
			location.reload();
		}
	</script>
</body>
</html>
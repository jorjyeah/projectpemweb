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
					if($qty[$i] != 0){
						echo "<tr>";
							echo "<td>".$id[$i]." - ".$name[$i]."</td>";
							echo "<td>".$qty[$i]."</td>";
							echo "<td>".$prc[$i]*$qty[$i]."</td>";
							echo "<td>
							<button type='submit' name='deletecart' value=".$i." class='btn btn-warning'>
								<i class='fa fa-times'></i> Remove
							</button>
							</td>"; // button remove untuk menghapus barang yang dipesan, dengan cara membuka routes deletecart, dan mengirimkan value(index) dari komponen yang akan dihapus
							var_dump($i);
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
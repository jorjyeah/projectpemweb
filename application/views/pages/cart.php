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
		$com = array (
			'pc' => $pc,
			'mb' => $mb,
			'rm' => $rm,
			'gc' => $gc,
			'ps' => $ps,
			'ssd' => $ssd,
			'hdd' => $hdd
		);
	?>

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
			<?php $i=0; foreach($com as $type => $details){
				if($qty[$i] != 0){
					echo "<tr>";
						echo "<td>".$details[0]['component_id']." - ".$details[0]['c_name']."</td>";
						echo "<td>".$qty[$i]."</td>";
						echo "<td>".$qty[$i]*$details[0]['c_price']."</td>";
						echo "<td>
						<button class='btn btn-warning'>
							<i class='fa fa-trash' aria-hidden='true'></i> Remove
						</button> </td>";
					echo "</tr>";
				}
			$i++;
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
	<script>
		$(document).ready(function(){
		    $('#cart').DataTable();
		});

		$(document).ready(function() {
		    var table = $('#example').DataTable();
		} );
	</script>
</body>
</html>
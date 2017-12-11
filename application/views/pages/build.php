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
				<th> Score </th>
			</tr>
		</thead>
		<tbody>
            <?php for($i=0;$i<7;$i++){
                echo "<tr>";
                    echo "<td>".$id[$i]." - ".$name[$i]."</td>";
                    echo "<td>".$scr[$i]."</td>";					
                echo "</tr>";
            }?>
		</tbody>
		<tfoot>
			<tr>
                <th> Component </th>
                <th> Score </th>
			</tr>
		</tfoot>
	</table></br>
    <?php $totalscore = 0;
          for($i=0;$i<7;$i++){
              $totalscore = $totalscore + $scr[$i];
          }
          $program = array(
              'p_name' => array('Adobe Photoshop', 'Dota 2', 'Adobe Premiere', 'Adobe After Effect'),
              'l_score' => array('400', '575', '400', '690'),
              'm_score' => array('1200', '2000', '1300', '1950'),
              'h_score' => array('6900', '5500', '6950', '7500'),
              'vh_score' => array('9000', '8500', '10000', '11500')
          );
          echo $program['p_name'][0]." : ";
          if($totalscore < $program['m_score'][0]){
              if($totalscore < $program['l_score'][0]){
                  echo "this setup is not compatible"."</br>";
              }
              else{
                  echo "low setting"."</br>";
              }
          }
          if($totalscore >= $program['m_score'][0]){
              if($totalscore < $program['h_score'][0]){
                  echo "medium setting"."</br>";
              }
              if($totalscore >= $program['h_score'][0] && $totalscore < $program['vh_score'][0]){
                echo "high setting"."</br>";
              }
             else{
                echo "very high setting"."</br>";
              }
          }

     ?>
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
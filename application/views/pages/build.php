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

        foreach($program as $row => $detail){
            echo "Program : ".$detail['p_name']."<br>";
            echo "low : ".$detail['l_score']."<br>";
            echo "medium : ".$detail['m_score']."<br>";
            echo "high : ".$detail['h_score']."<br>";
            echo "very high : ".$detail['vh_score']."<br><br>";
                
            if($totalscore < $detail['m_score']){
                if($totalscore < $detail['l_score']){
                    echo "this setup is not compatible"."</br>";
                }
                else{
                    echo "low setting"."</br>";
                }
            }
            if($totalscore >= $detail['m_score']){
                if($totalscore < $detail['h_score']){
                    echo "medium setting"."</br>";
                }
                if($totalscore >= $detail['h_score'] && $totalscore < $detail['vh_score']){
                    echo "high setting"."</br>";
                }
                if($totalscore >= $detail['vh_score']){
                    echo "very high setting"."</br>";
                }
            }
            echo "<hr>";
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
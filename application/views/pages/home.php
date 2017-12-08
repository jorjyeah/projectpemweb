<!--<?php
	session_start();
?>-->

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

	<a href="<?php echo site_url().'simulation' ?>" class="btn btn-primary">
    	Start Simulation
    </a>

</body>
</html>
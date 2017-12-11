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
<body style="background-image: url('http://projectpemweb.dev/assets/image/background-home.jpeg')" align="center" width="20%" heigth="20%">
	<?php
		echo $header;
		echo $footer;
	?>
	<div class="container" align="center">
	
		<a href="<?php echo site_url().'simulation' ?>" class="btn btn-warning">
			Start Simulation
		</a>
	</div>
<style>
</style>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>crud</title>
	<?php 
		echo $js;
		echo $css;
	?>
</head>
<body>
	<?php echo $header;?>
	<div class="row">
		<div class="col-md-12">
			<?php echo $crud['output']; ?>
		</div>
	</div>
	<?php echo $footer;?>
</body>
</html>
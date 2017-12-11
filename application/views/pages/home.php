<!DOCTYPE html>
<html>
<head>
	<?php 
		echo $js;
		echo $css;
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Computer Simulation</title>
</head>
<body style="background-color: #313233" align="center">
	<?php echo $header;?>
		<div class="container">
			<a href="<?php echo site_url().'simulation' ?>" class="btn btn-warning" align="center">
				Build My PC!
			</a>
		</div>
		<div class="col-md-12">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="http://projectpemweb.dev/assets/image/1.jpeg" alt="all" style="width:100%;">
					</div>

					<div class="item">
						<img src="http://projectpemweb.dev/assets/image/2.jpg" alt="ps" style="width:100%;">
					</div>
					
					<div class="item">
						<img src="http://projectpemweb.dev/assets/image/3.jpg" alt="ssd" style="width:100%;">
					</div>

					<div class="item">
						<img src="http://projectpemweb.dev/assets/image/4.jpg" alt="gc" style="width:100%;">
					</div>

					<div class="item">
						<img src="http://projectpemweb.dev/assets/image/5.jpg" alt="pc" style="width:100%;">
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>	
	<?php echo $footer;?>
</body>
</html>
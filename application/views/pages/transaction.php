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
    <div class="container">
        Selamat, pesanan <?php echo $username; ?> berhasil! <br>
        <?php echo $email; ?>
        <?php echo $orderid; ?>
        <?php echo $this->session->userdata('shipname'); ?>
    </div>


</body>
</html>
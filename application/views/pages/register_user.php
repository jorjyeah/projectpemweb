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
	<?php echo $header;?>

	 <?php echo form_open(base_url()."home/register1"); ?>
          Email : <?php echo form_input("email",""); ?> <br />
          Username : <?php echo form_input("username",""); ?> <br />
          First Name : <?php echo form_input("first_name",""); ?> <br />
          Last Name : <?php echo form_input("last_name",""); ?> <br />
          Password : <?php echo form_input("password",""); ?> <br />
          Salt : <?php echo form_input("salt",""); ?> <br />
          Address : <?php echo form_input("address",""); ?> <br />
          Phone : <?php echo form_input("phone",""); ?> <br />
     <?php echo form_submit("register","register"); ?>
     <?php echo form_close(); ?>

	<?php echo $footer;?>
</body>
</html>
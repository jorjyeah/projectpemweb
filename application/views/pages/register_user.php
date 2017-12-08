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
    <?php echo validation_errors(); ?>
	 <?php echo form_open('home/register'); ?>
          Email : <input type="text" name="email" value="" size="50" /> <br />
          <?php var_dump(form_error('email', '<p class="bg-danger">', '</p>')); ?>
          Username : <input type="text" name="username" value="" size="50" /> <br />
          First Name : <input type="text" name="first_name" value="" size="50" /> <br />
          Last Name : <input type="text" name="last_name" value="" size="50" /> <br />
          Password : <input type="text" name="password" value="" size="50" /> <br />
          Salt : <input type="text" name="salt" value="" size="50" /> <br />
          Address : <input type="text" name="address" value="" size="50" /> <br />
          Phone : <input type="text" name="phone" value="" size="50" /> <br />
     <?php echo form_submit("register","register"); ?>
     <?php echo form_close(); ?>

	<?php echo $footer;?>
</body>
</html>
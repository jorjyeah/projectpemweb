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
	 <?php echo form_open('home/register'); ?>
          Email : <input type="text" name="email" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
          Username : <input type="text" name="username" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('username', '<p class="bg-danger">', '</p>'); ?>
          First Name : <input type="text" name="first_name" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('first_name', '<p class="bg-danger">', '</p>'); ?>
          Last Name : <input type="text" name="last_name" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('last_name', '<p class="bg-danger">', '</p>'); ?>
          Password : <input type="text" name="password" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('password', '<p class="bg-danger">', '</p>'); ?>
          Salt : <input type="text" name="salt" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('salt', '<p class="bg-danger">', '</p>'); ?>
          Address : <input type="text" name="address" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('address', '<p class="bg-danger">', '</p>'); ?>
          Phone : <input type="text" name="phone" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('phone', '<p class="bg-danger">', '</p>'); ?>
     <?php echo form_submit("register","register"); ?>
     <?php echo form_close(); ?>

	<?php echo $footer;?>
</body>
</html>
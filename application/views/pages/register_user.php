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
	 <?php echo form_open(base_url().'register'); ?>
        <div class="col-sm-6">
          Email : <input type="text" name="email" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('email', '<p class="bg-danger">', '</p>'); ?>
          Username : Must be at least 4 characters <input type="text" name="username" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('username', '<p class="bg-danger">', '</p>'); ?>
          First Name : Must be at least 2 characters <input type="text" name="first_name" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('first_name', '<p class="bg-danger">', '</p>'); ?>
          Last Name : Must be at least 2 characters<input type="text" name="last_name" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('last_name', '<p class="bg-danger">', '</p>'); ?>
          Password : Must be at least 6 characters<input type="password" name="password" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('password', '<p class="bg-danger">', '</p>'); ?>
          Address : Must be at least 4 characters<input type="text" name="address" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('address', '<p class="bg-danger">', '</p>'); ?>
          Phone : Must be at least 10 characters<input type="text" name="phone" value="" size="50" class="form-control"/> <br />
          <?php echo form_error('phone', '<p class="bg-danger">', '</p>'); ?>
     <?php echo form_submit("register","register", 'class="btn btn-primary"'); ?>
        </div>
     <?php echo form_close(); ?>

	<?php echo $footer;?>
</body>
</html>
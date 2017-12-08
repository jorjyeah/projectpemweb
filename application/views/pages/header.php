<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="<?php echo site_url().'awal' ?>">Pc Architect</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="<?php echo site_url().'awal' ?>"><i class="fa fa-home"></i> Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
        if($this->session->userdata('username') != NULL){ ?>
          
          <?php if($this->session->userdata('username') == '1050ti' or $this->session->userdata('username') == 'admin_m'){ ?>
            <li><a href="#"><i class="fa fa-user-circle"></i> Welcome, <?php echo $this->session->userdata('username'); ?></a></li>
            <li><a href="<?php echo site_url().'user' ?>"><i class="fa fa-database"></i> User Crud</a></li>
            <li><a href="<?php echo site_url().'program' ?>"><i class="fa fa-database"></i> Program Crud</a></li>
            <li><a href="<?php echo site_url().'componenttype' ?>"><i class="fa fa-database"></i> Component Type Crud</a></li>
            <li><a href="<?php echo site_url().'component' ?>"><i class="fa fa-database"></i> Component Crud</a></li>
            <li><a href="<?php echo site_url().'cart' ?>"><i class="fa fa-database"></i> Cart Crud</a></li>
            <li><a href="<?php echo site_url().'shipment' ?>"><i class="fa fa-database"></i> Shipment Crud</a></li>
            <li><a href="<?php echo site_url().'logout' ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
          <?php } ?>
          <?php if($this->session->userdata('username') != 'admin_m'){ ?>
            <li><a href="<?php echo site_url().'simulation' ?>"><i class="fa fa-play"></i> Simulation</a></li>
            <li><a href="<?php echo site_url().'logout' ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
          <?php } ?>
        <?php } ?>
        <?php if($this->session->userdata('username') == NULL){ ?>
            <li><a href="#" data-toggle='modal' data-target='#myModal'><i class="fa fa-power-off"></i> Log in</a></li>
        <?php } ?>

    </ul>
  </div>
</nav>

<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">
          		<div class="text-center">
          			Login
         		</div>
         	</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url()."awal1"); ?>
          Email : <?php echo form_input("email",""); ?> <br />
          Password : <?php echo form_input("password",""); ?> <br />
        </div>
        <div class="modal-footer">
        <?php echo form_submit("awal", "Login", 'class="btn btn-primary"','class="fa fa-user-plus"'); ?>
          <?php echo form_close(); ?>
        	<a href="<?php echo site_url().'register' ?>" class="btn btn-primary">
          <i class="fa fa-user-plus"></i> Register
        </a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">
        <i class="fa fa-times"></i> Close
      </button>
        </div>
      </div>
   </div>
</div>
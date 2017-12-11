
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="<?php echo site_url().'awal' ?>"><font color="black">Pc Architect</font></a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="<?php echo site_url().'awal' ?>"><font color="black"><i class="fa fa-home"></i> Home</font></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
        if($this->session->userdata('username') != NULL){ ?>
          
          <?php if($this->session->userdata('username') == '1050ti' or $this->session->userdata('username') == 'admin_m'){ ?>
            <li><a href="#"><font color="black"><i class="fa fa-user-circle"></i> Welcome, <?php echo $this->session->userdata('username'); ?></font></a></li>
            <li><a href="<?php echo site_url().'user' ?>"><font color="black"><i class="fa fa-database"></i> User Crud</font></a></li>
            <li><a href="<?php echo site_url().'program' ?>"><font color="black"><i class="fa fa-database"></i> Program Crud</font></a></li>
            <li><a href="<?php echo site_url().'componenttype' ?>"><font color="black"><i class="fa fa-database"></i> Component Type Crud</font></a></li>
            <li><a href="<?php echo site_url().'component' ?>"><font color="black"><i class="fa fa-database"></i> Component Crud</font></a></li>
            <li><a href="<?php echo site_url().'cartcrud' ?>"><font color="black"><i class="fa fa-database"></i> Cart Crud</font></a></li>
            <li><a href="<?php echo site_url().'shipment' ?>"><font color="black"><i class="fa fa-database"></i> Shipment Crud</font></a></li>
            <li><a href="<?php echo site_url().'logout' ?>"><font color="black"><i class="fa fa-power-off"></i> Log Out</font></a></li>
          <?php } ?>
          <?php if($this->session->userdata('username') != 'admin_m'){ ?>
            <li><a href="<?php echo site_url().'simulation' ?>"><font color="black"><i class="fa fa-play"></i> Simulation</font></a></li>
            <li><a href="<?php echo site_url().'logout' ?>"><font color="black"><i class="fa fa-power-off"></i> Log Out</font></a></li>
          <?php } ?>
        <?php } ?>
        <?php if($this->session->userdata('username') == NULL){ ?>
            <li><a href="#" data-toggle='modal' data-target='#myModal'><font color="black"><i class="fa fa-power-off"></i> Log in</font></a></li>
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
          Email : <?php echo form_input("email","", "class='form-control'"); ?> <br />
          Password : <?php echo form_password("password","", "class='form-control'"); ?> <br />
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

<style>

.navbar-inverse {
    background-color: #f9c945;
    border: #f9c945;
}

</style>
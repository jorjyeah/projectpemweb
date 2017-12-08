<style>
body {margin:0;}

.button {
	background-color: #000;
	border: none;
	color: white;
	padding: 14px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	cursor: pointer; 
}

.active {
	background-color: #45CAFE !important;
	border: none;
	color: white;
	padding: 14px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	cursor: pointer; 
}
</style>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="margin: 0; padding: 0;">
        <img alt="Brand" src="assets/image/ci.png" height="100%">
      </a>
    </div>
    <ul class="nav navbar-nav">
    	<a href="<?php echo site_url().'awal' ?>" class="active"><i class="fa fa-home"></i>Home</a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
        if($this->session->userdata('username') != NULL){
          echo "Welcome ".$this->session->userdata('username');
          echo "<form action='home/logout'>";
          echo "<button class='button' input type='submit' name='logout' value='Logout'><i class='fa fa-power-off'></i>Log Out</button>";
          echo "</form>";
        }
        else{
          echo "<button class='button' data-toggle='modal'   data-target='#myModal'><i class='fa fa-power-off'></i>Log In</button>";
        }
      ?>

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
          <?php echo form_submit("awal","Login"); ?>
          <?php echo form_close(); ?>
        	<a href="<?php echo site_url().'register' ?>" class="btn btn-primary">
        		Register
        	</a>
        	<button type="button" class="btn btn-primary" data-dismiss="modal">
        		Close
        	</button>
        </div>
      </div>
   </div>
</div>
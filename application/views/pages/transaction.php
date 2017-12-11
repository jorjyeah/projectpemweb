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
        <h2 style="text-align:center;font-family:Verdana;" >
            Selamat, pesanan <?php echo $username; ?> berhasil! <br>
        </h2>
        <h4 style="text-align:center;font-family:Verdana;" >
            <?php echo $email." | ";?>
            <?php echo "your order id : ".$orderid." | "; ?>
            <?php echo "courier : ".$this->session->userdata('shipname')."<br><hr>"; ?>
        </h4>
        <div class="container">
            <div class="col-sm-6">
                Component
            </div>
            <div class="col-sm-2">
                Quantity
            </div>
            <div class="col-sm-2">
                Price
            </div>
            <div class="col-sm-2">
                Subtotal
            </div>
            <br><hr>
        </div>
        <?php for($i=0;$i<7;$i++){
            if($this->session->userdata('qty'.$i) != 0 ){ ?>
                <div class="container">
                    <div class="col-sm-6">
                        <?php echo $this->session->userdata('name'.$i)." - ";?>
                        <?php echo $compname[$i]; ?>
                    </div>
                    <div class="col-sm-2">
                        <?php echo $this->session->userdata('qty'.$i); ?>
                    </div>
                    <div class="col-sm-2">
                        <?php echo $price[$i]; ?>
                    </div>
                    <div class="col-sm-2">
                        <?php echo $price[$i]*$this->session->userdata('qty'.$i); ?>
                    </div>
                </div>
                <?php echo "<br>";?>
        <?php    }
        }
        ?>
        <h4 style="text-align:right;font-family:Verdana;" >
            <?php 
            $totaltotal = $total-$priceship;
            echo "IDR ".$totaltotal.".00<br>";
            echo "Shipment : IDR ".$priceship.".00<br>";
            echo "Total : IDR ".$total.".00<br>";
            ?>
        <br>
        </h4>
        <hr>
    </div>
    <h4 style="text-align:center;font-family:Verdana;" >
        <?php echo "Tekan tombol ini untuk kembali ke halaman utama"; ?>
        <br>
        <br>
        <br>
        <?php echo form_open(base_url()."awal"); ?>
            <button type="submit" name="home" class="btn btn-warning">
                <i class='fa fa-home'></i> Home
            </button>
        <?php echo form_close(); ?>
    </h4>


</body>
</html>
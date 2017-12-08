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
	<?php echo $header; ?>
	<?php echo form_open(base_url()."home/build"); ?>
	<?php 
		$com = array (
			'pc' => $pc,
			'mb' => $mb,
			'rm' => $rm,
			'gc' => $gc,
			'ps' => $ps,
			'ssd' => $ssd,
			'hdd' => $hdd
		);

	?>

	<div class="container">
		<div>
			<div class="col-sm-8"> <h4> COMPONENT </h4> </div> 
			<div class="col-sm-2"> <h4> QUANTITY </h4> </div>
			<div class="col-sm-2"> <h4> PRICE </h4> </div>
		</div>
		<br>

		<?php $do = 0; foreach ($com as $type => $c_detail) {  ?>
		<div class="container">
		<!-- selection panel -->
			<div class="form-row">
			<!-- component type -->
				<label class="float:left"> <?php echo $c_detail[0]['c_type_name'] ?> </label></br>
				<!-- dropdown menu for choosing the component-->
				<div class="form-group col-sm-8">
					<select id="<?php echo "component_sel".$do ?>" name="<?php echo $type; ?>" class="form-control" onchange="price_select('<?php echo 'component_sel'.$do ?>', '<?php echo 'qty'.$do; ?>', 'viewprice<?php echo $do; ?>' )">
						<?php foreach($c_detail as $row){ ?>
							<?php
							$c_price = $row['c_price'];
							$component_id = $row['component_id'];
							?>
							<option value="<?php echo $component_id; echo ' '.$c_price; ?>"
							<?php set_select('component_sel','<?php echo $component_id ?>', TRUE); ?> >
							<?php 
								$price = ($row['c_price']);
								echo "IDR ".$price.".00 - ";
								echo $row['c_name'];
								echo " - ".$component_id;
							?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-sm-2">
					<div class="input-group">
					  <!--minus-->
					  <span class="input-group-btn">
					      <button type="button" class="btn btn-warning btn-number" disabled="disabled" data-type="minus" data-field="<?php echo $do; ?>" >
					          <span class="glyphicon glyphicon-minus"></span>
					      </button>
					  </span>
					  <!--value quantitynya-->
					  <input type="text" id="<?php echo "qty".$do; ?>" name="<?php echo $do; ?>" class="form-control input-number" value="0" min="0" max="10" onchange="price_select('<?php echo 'component_sel'.$do ?>', '<?php echo 'qty'.$do; ?>', 'viewprice<?php echo $do; ?>' )">
					  <!--plus-->
					  <span class="input-group-btn">
					      <button type="button" class="btn btn-warning btn-number" data-type="plus" data-field="<?php echo $do; ?>">
					          <span class="glyphicon glyphicon-plus"></span>
					      </button>
					  </span>
					
					</div>
				</div>
				<div class="form-group col-sm-2">
					<div class="form-control">
						<p id="viewprice<?php echo $do; ?>"> </p>
					</div>
				</div>
			</div>
		</div>
		<?php $do++; } ?>
		<div align='right'>
			<?php echo form_submit('build','BUILD', 'class="btn btn-warning"'); ?>
	    	<input type="submit" name="cart" value="Add to cart"  class="btn btn-warning" class="fa fa-shopping-cart" />
	    </div>
	    <?php echo form_close(); ?>
    </div>
		<?php echo $footer; ?>
</body>
</html>



<script>//untuk button quantity
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});


$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});


$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }  
});


$(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

function price_select(komponen, qty, res){ //function untuk nampilin price
		var x = document.getElementById(komponen).value.split(" ");
		var mul = parseInt(document.getElementById(qty).value);
		x = parseInt(x[1]);
		var tmp = x*mul;
		document.getElementById(res).innerHTML = "IDR "+tmp;
}
</script>
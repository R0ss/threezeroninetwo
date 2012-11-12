<?php echo anchor('index','Back') . "<br />";?>

<h3>Purchase Info</h3>
	<?php echo $this->table->generate($flightData); ?> <br>
	Seat Number: <?php echo $seatID ?> <br>
	Cost: $20 CDN (tax included)<br>

<?php echo validation_errors(); ?>

<?php echo form_open("index/getCustomerInfo/$seatID"); ?>
	<h3>First Name</h3>
		<input type="text" name="fname" maxlength="15" value="<?php echo set_value('fname'); ?>" size="15" />
		
	<h3>Last Name</h3>
		<input type="text" name="lname" maxlength="20" value="<?php echo set_value('lname'); ?>" size="20" />
		
	<h3>Credit card number</h3>
		<img src= <?php echo site_url('images')."/card_pics.jpg"?>>
		<input type="text" name="cardNumber" maxlength="16" value="<?php echo set_value('cardNumber'); ?>" size="16" />
	
	<h3>Expiration date (MM/YY)</h3>
		<input class="form" type="text" maxlength="2" name="expirationM" value="<?php echo set_value('expirationM'); ?>" size="2" />
		<div class="form">/</div>
		<input class="form" type="text" maxlength="2" name="expirationY" value="<?php echo set_value('expirationY'); ?>" size="2" />
	<br/><hr>
		<input type="submit" value="Submit" />
</form>
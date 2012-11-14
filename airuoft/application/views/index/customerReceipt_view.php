<h3>The transaction was sucessful!</h3>

<?php //Go back to previous page
echo anchor('index','Back') . "<br />";

//Create table with flight data
echo $this->table->generate($flightData); ?> 

<br>
	Seat Number: <?php echo $this->session->userdata('seat') ?> <br>
	Cost: $20 CDN (tax included) <br>
<hr>

<h3>Full name</h3>
	<div><?php echo "First name: ". $this->session->userdata('fname'); ?></div>
	<div><?php echo "Last name: ". $this->session->userdata('lname'); ?></div>

<h3>Credit Card Information</h3>
	<div><?php echo "Credit card #: ". $this->session->userdata('cardNumber'); ?></div>
	<div><?php echo "Expiry: ". $this->session->userdata('expirationM'). "/" .$this->session->userdata('expirationY'); ?></div>
	<hr>

<h3>Prepare to fly! <em>(Click the image to print a summary page)</em> </h3>
	<img id="summary" src=<?php echo site_url('images')."/airuoft_smaller.png"?>>
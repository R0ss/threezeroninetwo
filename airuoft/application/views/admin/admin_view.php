<?php
//Go back to index page
echo anchor('index','Main Page') . "<br />";
?>

<h3>Admin controls</h3>
<?php
	echo anchor('admin/showFlights','Show Flights') . "<br />";
	echo anchor('admin/showTickets','Show Tickets') . "<br /><br />";
	echo anchor('admin/populate','Populate Flight Table') . "<br />";
	echo anchor('admin/delete','Delete Flight & Ticket Data') . "<br />";  
?>
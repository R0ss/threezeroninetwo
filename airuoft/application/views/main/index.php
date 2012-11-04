<?php echo anchor('main/populate','Populate Flight Table') . "<br />"; 
	echo anchor('main/showFlights','Show Flights') . "<br />";
	?>
<h1>Departure date & campus form</h1> 
 <form id="departureForm" method="post" action='<?php echo base_url();?>index.php/main/departureData'> 
	
	<label for="campus">Select a campus</label>
	<select name="campus">
		<option value="2">UofT: Mississauga campus</option>
		<option value="1">UofT: St. George campus</option>
	</select>
	<label for="departureDate">Select departure date</label>
	<input type="text" id="departureDate" name="departureDate" readonly="readonly" />
	<input type="submit" value="search available flights"/>
	
</form> 
		<?php
		//And if the $site variable is not empty we echo it's content by using the generate method of the table class / library
			if(!empty($flights)) echo $this->table->generate($flights);
		?>



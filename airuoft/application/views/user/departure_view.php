<?php
	//Go back to previous page
	echo anchor('user','Back') . "<br />";
	
	//And if the $departures variable is not empty we echo its content 
	//by using the generate method of the table class / library
	
	if(!empty($departures)){
		echo $this->table->generate($departures); 
	} else {
		print_r($departures);
		echo "Sorry, it appears there are no available flights on $date. Please select a different date.";
	}

?>
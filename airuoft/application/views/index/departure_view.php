<?php
	//Go back to previous page
	echo anchor('index','Back') . "<br />";
	
	//And if the $departures variable is not empty we echo its content 
	//by using the generate method of the table class / library
	//Otherwise, we provide a notification to the user.
	if(!empty($departures)){
		echo $this->table->generate($departures); 
	} else {
			$leaving_from = ($campus == 1 ? "UofT St. George" : "UofT Mississauga");
			echo "Sorry, it appears there are no available flights on $date ".
				 "from $leaving_from campus. Please select a different date.";
	}
?>
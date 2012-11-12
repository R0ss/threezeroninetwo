<?php //Go to admin page
echo anchor('admin','Admin controls') . "<br />"
?>

<h3>Select a campus and date to depart from.</h3>
<form id="departureForm" method="post" action="index/getDepartures">
	<!-- Campus values match SQL IDs -->
	<label for="departureCampus">Select a campus</label>
	<select name="departureCampus">
		<option value="1">UofT: St. George</option>
		<option value="2">UofT: Mississauga</option>
	</select>
	
	<!-- Loads JQuery calender -->
	<label for="departureDate">Select departure date</label>
		<input type="text" id="departureDate" name="departureDate" readonly="readonly" />
		<input type="submit" value="search available flights"/>
</form>
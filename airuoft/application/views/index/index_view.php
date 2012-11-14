<div id="admin_page"><?php echo anchor('admin','Admin controls') ?></div><br />

<img src= <?php echo site_url('images')."/airuoft2.png"?>>

<h3>Click on the boxes (below) to get a drop down menu.</h3>
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
		<input type="submit" value="search flights"/>
</form>
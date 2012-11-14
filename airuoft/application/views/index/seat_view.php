<h3>Your current seat is flashing (green)</h3>
<h4>Any other available seats will be white</h4>
<?php
//Go back to previous page
echo anchor('index','Back') . "<br />";
?>
<?php
//Set occupied seats to yellow
if(!empty($seat)){
	foreach($seat as $taken_seat){	
?>	
	<style type="text/css">
		#seat_<?php echo $taken_seat?>{
			background:yellow;
			}
	</style>
<?php 
	}
}
?>

<div id="seats">
	<img src= <?php echo site_url('images')."/seats.jpg"?>>
	<div id="seat_selection"></div>
	<div id="seat_0" class="seat"></div>
	<div id="seat_1" class="seat"></div>
	<div id="seat_2" class="seat"></div>
</div>
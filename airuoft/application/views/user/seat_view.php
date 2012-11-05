<h3>Please select an available seat (white square):</h3>

<?php

	//Go back to previous page
	echo anchor('user','Back') . "<br />";
	//print_r($seat);
?>
<img src= <?php echo site_url('images')."/seats.jpg"?>>	
<?php 
	
	if(!empty($seat)){
		//Set seat restrictions
		foreach($seat as $some_seat){
		
		//Set the colour for each seat	?>	
		<style type="text/css">
		
			#seat_<?php echo $some_seat?>{background:yellow}
			div.seat{background:white}
		
		</style>		
<?php 
		}
	}

	
?>
 

<div id="seat_0" class="seat" style="position:absolute;left:550px;top:445px;width:35px;height:35px;">
0
</div>

<div id="seat_1" class="seat">
1
</div>

<div id="seat_2" class="seat">
2
</div>
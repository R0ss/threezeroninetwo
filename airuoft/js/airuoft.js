
//Open calander for user to select day
$(function() {
		$("#departureDate").datepicker({
		maxDate: "+14D",
		minDate: "+1D",
		dateFormat:"yy-mm-dd",
	});
	//Set default date
	 $('#departureDate').datepicker("setDate", "+1D" );
});

//Change colour of available seat to green when clicked
$(function() {
	var base_url = "http://localhost/airuoft/index/";
	$('#seat_0').click(function(e){
		if($(this).css('background-color') != 'rgb(255, 255, 0)'){
			reset_selection();
			$(this).css("background-color",'green');
			$('#seat_selection').html("<a href='" + base_url + "getCustomerInfo/0'>Select seat</a>");
		}
    });
	
	$('#seat_1').click(function(e){
		if($(this).css('background-color') != 'rgb(255, 255, 0)'){
			reset_selection();
			$(this).css("background-color",'green');
			$('#seat_selection').html("<a href='" + base_url + "getCustomerInfo/1'>Select seat</a>");
		}
    });
	
	$('#seat_2').click(function(e){
		if($(this).css('background-color') != 'rgb(255, 255, 0)'){
			reset_selection();
			$(this).css("background-color",'green');
			$('#seat_selection').html("<a href='" + base_url + "getCustomerInfo/2'>Select seat</a>");
		}
    });
});

// Reset previously selected seat to white
function reset_selection(){
	if($('#seat_0').css('background-color') != 'rgb(255, 255, 0)'){
		$('#seat_0').css('background-color','white');
	}
	if($('#seat_1').css('background-color') != 'rgb(255, 255, 0)'){
		$('#seat_1').css('background-color','white');
	}
	if($('#seat_2').css('background-color') != 'rgb(255, 255, 0)'){
		$('#seat_2').css('background-color','white');
	}
}

//Print summary page on click
$(function() {
	$('#summary').click(function(e){ 
		window.print();
	});
});
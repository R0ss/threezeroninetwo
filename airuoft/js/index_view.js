
//Open calendar for user to select day
$(function() {
		$("#departureDate")
			.datepicker({
				maxDate: "+14D",
				minDate: "+1D",
				dateFormat:"yy-mm-dd",
	});
	//Set default date
	 $('#departureDate').datepicker("setDate", "+1D" );
});

//Provide clearance before giving user access to admin controls
$(function(){
	$('#admin_page')
	.click(function(e){
		alert("Access granted");
	});
});

//Change colour of available seats on the helicopter
$(function() {
	var base_url = "http://localhost:31035/airuoft/index/";
		
	$('#seat_0')
		.effect("pulsate", { times:5 }, 3000)
		.click(function(e){
			if($(this).css('background-color') != 'rgb(255, 255, 0)'){
				reset_selection();
				$(this).css("background-color",'green');
				$('#seat_selection')
					.html("<a href='" + base_url + "getCustomerInfo/0'>Select seat</a>");
			}
    })	.trigger('click');
	
	$('#seat_1')
		.effect("pulsate", { times:5 }, 3000)
		.click(function(e){
			if($(this).css('background-color') != 'rgb(255, 255, 0)'){
				reset_selection();
				$(this).css("background-color",'green');
				$('#seat_selection')
					.html("<a href='" + base_url + "getCustomerInfo/1'>Select seat</a>");
			}
    })	.trigger('click');
	
	$('#seat_2')
		.effect("pulsate", { times:5 }, 3000)
		.click(function(e){
			if($(this).css('background-color') != 'rgb(255, 255, 0)'){
				reset_selection();
				$(this).css("background-color",'green');
				$('#seat_selection')
					.html("<a href='" + base_url + "getCustomerInfo/2'>Select seat</a>");
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

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
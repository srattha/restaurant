function digitalClock(){
	var currentTime = new Date ();
	var currentHours = currentTime.getHours ();
	var currentMinutes = currentTime.getMinutes ();
	var monthNames = [ "January", "February", "March", "April", "May", "June",
	"July", "August", "September", "October", "November", "December" ];
	currentTime.setDate(currentTime.getDate());    
	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours; 
	currentHours = ( currentHours == 0 ) ? 12 : currentHours;
	var currentTimeString = currentHours + ":" + currentMinutes;
	$(".time-cont").html(currentTimeString); 
	$('.date').html(currentTime.getDate() + ' ' + monthNames[currentTime.getMonth()]);
}
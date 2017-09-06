$(document).ready(function() {	
setInterval( function() {
	var minutes = new Date().getMinutes();
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	var hours = new Date().getHours();
	if(hours > 12){
		hours = hours -12;
		type="PM";
	}else {
		type="AM";
	}
	if(hours==12) {
		type="PM";
	}else if (hours==24){
		type="AM";
	}
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	$("#type").html(type);
    }, 1000);	
});
$(document).ready(function()
{
	$('#btn-dang-nhap').click(function () {
		$('.modal-login').addClass('show');
	});

	$('#btn-thong-tin-ca-nhan').click(function () {
		$('.modal-login').addClass('show');
	});
 	
 	// BEGIN DATETIME PICKER
 	$.datetimepicker.setLocale('vi');
 	$('#datetimepicker1').datetimepicker({
	 i18n:{
	  de:{
	   months:[
	    'Januar','Februar','März','April',
	    'Mai','Juni','Juli','August',
	    'September','Oktober','November','Dezember',
	   ],
	   dayOfWeek:[
	    "So.", "Mo", "Di", "Mi", 
	    "Do", "Fr", "Sa.",
	   ]
	  }
	 },
	 timepicker:false,
	 format:'d.m.Y'
	});
	$('#datetimepicker2').datetimepicker({
	 i18n:{
	  de:{
	   months:[
	    'Januar','Februar','März','April',
	    'Mai','Juni','Juli','August',
	    'September','Oktober','November','Dezember',
	   ],
	   dayOfWeek:[
	    "So.", "Mo", "Di", "Mi", 
	    "Do", "Fr", "Sa.",
	   ]
	  }
	 },
	 timepicker:false,
	 format:'d.m.Y'
	});
 	// WND DATETIME PICKER
});
$("document").ready(function() {
	
	mydialog = $( "#dialog-1form" ).dialog({
		autoOpen: false,
		height: 355,
		width: 270,
		modal: true,
	});
	
	mydialog1 = $( "#dialog-1formPW" ).dialog({
		autoOpen: false,
		height: 350,
		width: 270,
		modal: true,
	});
	
	mydialog2 = $( "#dialog-1formLI" ).dialog({
		autoOpen: false,
		height: 270,
		width: 270,
		modal: true,
	});
	
    $( "#showModelForm" ).on( "click", function() {
      mydialog.dialog( "open");
    });
	
	$( "#showModelFormChagePW" ).on( "click", function() {
      mydialog1.dialog( "open");
    });
	
	$( "#showModelFormLI" ).on( "click", function() {
      mydialog2.dialog( "open");
    });
	
  });
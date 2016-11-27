( function( $ ) {
$( document ).ready(function() {
$('#cssmenu').prepend('<div id="menu-button">Menu</div>');
	$('#cssmenu #menu-button').on('click', function(){
		var menu = $(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});
});
} )( jQuery );

/*-------------------------For Tabs */
$("document").ready(function() {
				$( "#All-tabs" ).tabs();
});
/*-------------------------For Date Picker */

$("document").ready(function() {
			$( "#datepicker" ).datepicker({
				minDate: 1
			});
});
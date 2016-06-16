j = jQuery.noConflict();

j(document).ready(function($){
	$("input[default], textarea[default]").each( function() {

		var defaultValue = $(this).attr("default");
		var currentValue = $(this).val();

		// This will make sure not to replace exisitng values
		if( !currentValue ) {
			$(this).val( defaultValue ).addClass('input-before-focus');
		}

		$(this).focus( function() {
			if( $(this).val() == defaultValue ) {
				$(this).val('').removeClass('input-before-focus');
			}
		});

		$(this).blur( function() {
			var currentVal = $(this).val();

			if( currentVal == '' ) {
				$(this).val(defaultValue).addClass('input-before-focus');
			}
		});
	}); // end function
});
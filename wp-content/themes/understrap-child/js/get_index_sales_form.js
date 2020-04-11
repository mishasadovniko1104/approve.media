jQuery(document).ready(function(){
	jQuery('#button_form_submit').on("click", function(e) {
        e.preventDefault();
        var f = jQuery(this).parents("form");
        jQuery('.ierror', f).removeClass('ierror');
		var formData = f.serialize();

		console.log(formData);
		if(typeof(formData.square) == "number") {
			jQuery('input[name="square"]', f).addClass("ierror");
		}else if(typeof(formData.living_space) == "number") {
			jQuery('input[name="living_space"]', f).addClass("ierror");
		}else if(typeof(formData.floor) == "number") {
			jQuery('input[name="floor"]', f).addClass("ierror");
		}else{

			jQuery.ajax({
				url: '/wp-admin/admin-ajax.php',
				data: formData,
				type: 'POST',
				success: function(data) {
					jQuery('#button_form_submit').text('Выставить на продажу');	
					alert( data );
				}
			});
		}
	});
});
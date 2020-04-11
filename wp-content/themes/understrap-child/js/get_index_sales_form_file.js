function ajaxAddPost(formData){
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

jQuery(document).ready(function(){
	jQuery('#button_form_submit').on("click", function(e) {
        e.preventDefault();
        var f = jQuery(this).parents("form");
        jQuery('.ierror', f).removeClass('ierror');
		var file = jQuery('#sales_ajax_file_id');
		
		if (file.prop('files').length) {
			jQuery('#new_project_file_result_id').text("");
			f.fileN = file.prop('files')[0];
			console.log(file.prop('files'));
		}
		
		console.log(file);
		console.log(file.prop('files'));
		console.log(f.find('input[type="file"]'));
		console.log(f.find('input[type="file"]').val());

		var formData = f.serialize();

		console.log(formData);
		if(typeof(formData.square) == "number") {
			jQuery('input[name="square"]', f).addClass("ierror");
		}else if(typeof(formData.living_space) == "number") {
			jQuery('input[name="living_space"]', f).addClass("ierror");
		}else if(typeof(formData.floor) == "number") {
			jQuery('input[name="floor"]', f).addClass("ierror");
		}else{
			console.log(file.prop('files')[0]);
			if(typeof file.prop('files')[0] == "undefined")
				ajaxAddPost(formData);
			else{
				var formDataFile = 'action=sales_file_ajax_form';
					formDataFile += '&filename=' + file.prop('files')[0].name;
					formDataFile += '&size=' + file.prop('files')[0].size;
					formDataFile += '&type=' + file.prop('files')[0].type;
					formDataFile += '&filedata=' + file.prop('files')[0].arrayBuffer();
				jQuery.ajax({
					url: '/wp-admin/admin-ajax.php',
					data: formDataFile,
					type: 'POST',
					success: function(data) {
						Filename = data;
						console.log(Filename);
					}
				});
				}
		}
	});
});
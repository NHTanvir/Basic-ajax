jQuery(function($){
	$('#my-super-form').submit(function(e){
		e.preventDefault();

		var formData = $(this).serialize();

		// alert(formData)
		$.ajax({
			data: formData,
			url: myaction,
			type: 'POST',
			success: function(resp) {
				// do something
				alert(resp)
			},
			error: function(err) {
				// do something
			}
		});
	});
})
function token()  {
	$.ajaxSetup({
  		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		}
	});
}

function sendCarBrand() {
	token();
	$('select[name="brand"]').on('change', function(){
		var brand = $('select[name="brand"]').val();
		$.get('/search', {brand: brand}, function(){
			success: console.log(brand);
		});
	});
}

$(document).ready(function(){
	sendCarBrand();
});
function token()  {
	$.ajaxSetup({
  		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		}
	});
}

function displayModels(models) {
	var select = '<option id="allModelsOption">Alle modellen</option>';
	for(let nr in models) {
		select += '<option id="'+models[nr].id+'">'+models[nr].model+'</option>'
	}

	$('#modelSelect').html(select);
}

function getModels(brandID) {
	brandID = brandID.split("_").pop();
	$.ajax({
		url: '/search/getmodels',
		type: 'GET',
		data: {brandID: brandID},
		success: function(models) {
			displayModels(models);
		}
	});
}

function checkBrand() {
	$('#brandSelect').on('change', function(){
		var currentBrand = $('#brandSelect').val();
		var brandID = $(this).children(":selected").attr("id");

		if(currentBrand === "Alle merken") {
			var select = '<option id="allModelsOption">Alle modellen</option>';
			$('#modelSelect').html(select);
		} else {
			getModels(brandID);
		}
	});
}

$(document).ready(function(){
	checkBrand();
});
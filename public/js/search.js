function token()  {
	$.ajaxSetup({
  		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		}
	});
}

function yearSelect() {
	var currentTime = new Date()
	var year = currentTime.getFullYear()
	
	var select = '<option value="---">---</option>';
	for (var i = year; i >= 1975; i--) {
		select += '<option value="'+i+'">'+i+'</option>'
	};

	$('select.year-select').html(select);
}

function displayModels(models) {
	var select = '<option value="---" id="allModelsOption">Alle modellen</option>';
	for(let nr in models) {
		select += '<option value="'+models[nr].model+'" id="'+models[nr].id+'">'+models[nr].model+'</option>'
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

		if(currentBrand === "---") {
			var select = '<option value="---" id="allModelsOption">Alle modellen</option>';
			$('#modelSelect').html(select);
		} else {
			getModels(brandID);
		}
	});
}

function displayCount(count) {
	var button = '';
	button += '<strong>Zoeken </strong>'+count[0].car_count+'';

	$('#filter-button').html(button);
}

function countPossibleResults() {
	$('.filter-select').on('change', function(){
		$.ajax({
			url: '/search/count-results',
			type: 'GET',
			data: $('#filter-form').serialize(),
			succes: function(count) {
				displayCount(count);
			}
		});
	});
}

$(document).ready(function(){
	yearSelect();
	checkBrand();
	countPossibleResults();
});
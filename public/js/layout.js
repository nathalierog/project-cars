function togglemobilemenu() {
	if ($(window).width() >= 750){
		$('#app-sticky-navbar').removeClass('navbar-fixed-top');
		$('#app-sticky-navbar').affix({
		  	offset: {
		    	top: $('#app-default-navbar').height()
		  	}
		});
	}
	else{
		$('#app-sticky-navbar').addClass('navbar-fixed-top').removeClass('affix-top');
	}
}

function filterSearchInput() {
	var specialChar = ['é', 'ë', 'è', 'ê', 'ö', 'ó', 'ò', 'ô', 'õ', 'à', 'á', 'ä', 'ã', 'å', 'ì', 'í', 'î', 'ï', 'ñ', 'ð', 'ù', 'ú', 'û', 'ü'];

	$('input[name="term"]').bind('keypress', function (event) {
	    var regex = new RegExp("^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$");
	    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	    console.log(event);
	    for(let c in specialChar) {
	    	if(event.key === specialChar[c]) {
	    		return true
	    	}
	    }
	    if(event.key === "Enter" || event.key === " " || event.key === "Backspace") {
	    	return true;
	    }
	    if (!regex.test(key)) {
	       event.preventDefault();
	       return false;
	    }
	});
}


$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    togglemobilemenu();
    filterSearchInput();
});

window.onresize = function(event) {
	togglemobilemenu();
}
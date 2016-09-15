$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    $('#app-sticky-navbar').affix({
	  	offset: {
	    	top: $('#app-default-navbar').height()
	  	}
	});
});
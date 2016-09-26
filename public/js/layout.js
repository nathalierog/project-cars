function togglemobilemenu(){
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

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    togglemobilemenu();
});

window.onresize = function(event){
	togglemobilemenu();
}
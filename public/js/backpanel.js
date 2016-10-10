function tablesorter(){
	$("table").tablesorter();
	$("table").trigger("update");  
}

$(document).ready(function(){ 
    tablesorter();
}); 
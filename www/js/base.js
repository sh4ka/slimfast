$(document).ready(function(){
	window.Slimfast = {};
	// vars
	current_location = document.location.pathname;
	// events

	// functions

	window.Slimfast.navBarHandler = function(){
		section = current_location.split('/')[1];
		if(section == ''){section = 'home'}
		$('li.section').removeClass('active');
		$('li#'+section).addClass('active');
	}

	Slimfast.navBarHandler();
})



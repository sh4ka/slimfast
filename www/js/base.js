$(document).ready(function(){
	window.Rport = {};
	// vars
	current_location = document.location.pathname;
	// events

	// functions

	window.Rport.navBarHandler = function(){
		section = current_location.split('/')[1];
		if(section == ''){section = 'home'}
		$('li.section').removeClass('active');
		$('li#'+section).addClass('active');
	}

	window.Rport.showAlert = function(htmlText, type){
		if(type == null){
			type = ''
		}
		clone = $('#alertBox').clone();
		clone.addClass(type);
		$('#alertContainer').children().remove();
		$('#alertContainer').append(clone);
		$(clone).removeClass('hidden');
		$('#alertText').html(htmlText)
	}

	Rport.navBarHandler();
})



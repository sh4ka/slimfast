$(document).ready(function(){
	// vars
	var usedTypes = [];
	// events
	$('button.btnDay').on('click', function(){
		selectDayClickHandler(this);
	})

	// functions
	var selectDayClickHandler = function(button){
		removeButtonsActiveState();
		$(button).addClass('active');
		loadHours();
	}

	var removeButtonsActiveState = function(){
		$('button.btnDay').removeClass('active');
	}

	var loadHours = function(){
		console.log('load hours');
	}
})



$(document).ready(function(){
	// vars
	// events
	$('button#btnSearchUser').on('click', function(){
		assertUserExists();
	})

	$('form#frmCreateUser').on('submit', function(event){
		event.preventDefault();
		if(validForm() == true){
			writeUser();
		}
		else{

		}
	})

	// functions

	var assertUserExists = function(){
		var jqxhr = $.ajax({
			url:"/user/assertUserExists",
			dataType: 'json'
		})
		.done(function(response) {
			if(response.userExists == true){
				Rport.showAlert('User exists', 'alert-error');
			}
		})
		.fail(function(response) {
			console.log(response);
		})
		.always(function() {

		});
	}

	var writeUser = function(){
		var jqxhr = $.ajax({
			url:"/user/writeUser",
			dataType: 'json',
			data: $('form#frmCreateUser').serialize()
		})
		.done(function(response) {
			console.log(response)
		})
		.fail(function(response) {
			console.log(response);
		})
		.always(function() {

		});
	}

	var validForm = function(){
		result = true;
		return result;
	}
})



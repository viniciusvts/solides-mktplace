function themeplace_open_login_dialog(href){

	jQuery('#themeplace-user-modal .modal-dialog').removeClass('registration-complete');

	var modal_dialog = jQuery('#themeplace-user-modal .modal-dialog');
	modal_dialog.attr('data-active-tab', '');

	switch(href){

		case '#themeplace-register':
			modal_dialog.attr('data-active-tab', '#themeplace-register');
			break;

		case '#themeplace-login':
		default:
			modal_dialog.attr('data-active-tab', '#themeplace-login');
			break;
	}

	jQuery('#themeplace-user-modal').modal('show');
}	

function themeplace_close_login_dialog(){

	jQuery('#themeplace-user-modal').modal('hide');
}	

jQuery(function($){

	"use strict";
	/***************************
	**  LOGIN / REGISTER DIALOG
	***************************/

	// Open login/register modal
	$('[href="#themeplace-login"], [href="#themeplace-register"]').click(function(e){

		e.preventDefault();

		themeplace_open_login_dialog( $(this).attr('href') );

	});

	// Switch forms login/register
	$('.modal-footer a, a[href="#themeplace-reset-password"]').click(function(e){
		e.preventDefault();
		$('#themeplace-user-modal .modal-dialog').attr('data-active-tab', $(this).attr('href'));
	});


	// Post login form
	$('#themeplace_login_form').on('submit', function(e){

		e.preventDefault();

		var button = $(this).find('button');
			button.button('loading');

		$.post(themeplaceajax.ajaxurl, $('#themeplace_login_form').serialize(), function(data){

			var obj = $.parseJSON(data);

			var redirect = $('.themeplace-login').attr('data-redirect');

			$('.themeplace-login .themeplace-errors').html(obj.message);
			
			if(obj.error == false){
				$('#themeplace-user-modal .modal-dialog').addClass('loading');
				window.location.href = redirect;
				button.hide();
			}

			button.button('reset');
		});

	});


	// Post register form
	$('#themeplace_registration_form').on('submit', function(e){

		e.preventDefault();

		var button = $(this).find('button');
			button.button('loading');

		$.post(themeplaceajax.ajaxurl, $('#themeplace_registration_form').serialize(), function(data){
			
			var obj = $.parseJSON(data);

			$('.themeplace-register .themeplace-errors').html(obj.message);
			
			if(obj.error == false){
				$('#themeplace-user-modal .modal-dialog').addClass('registration-complete');
				// window.location.reload(true);
				button.hide();
			}

			button.button('reset');
			
		});

	});

	if(window.location.hash == '#login'){
		themeplace_open_login_dialog('#themeplace-login');
	}		

});
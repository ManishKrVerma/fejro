$('document').ready(function(){
	
	/*Click event for hide social event */
	if ($(window).width() < 400) {
		$('.social_area').addClass('display_none');
	}
	$('body').on('click', '.social_close',function(){
		$('.social_area').addClass('display_none');
	});
	

	//---------------------------------------------------------------------
    /*
     * This script is used for logout user
     */
	$('body').on('click','.logout',function() {
		$.get(APP_URL+'configure/logout',{},function(response) {
			window.location.href = APP_URL+'login';
		});			
	});
	
	/* set active menu */
	
	var current_url=$(location).attr('href').split("configure/")[1];
	console.log('current_url ='+current_url);
		if(current_url==undefined){
			$('.li_configure').addClass('active');
		} else if(current_url == "my_rack"){
			$('.li_new_add_beats').addClass('active');
		} else if(current_url == "view_user"){
			$('.li_view_user').addClass('active');
		} else if(current_url == "add_beat"){
			$('.li_add_beat').addClass('active');
		} else if(current_url == "edit_beat"){
			$('.li_edit_beat').addClass('active');
		} else if(current_url == "buyer_activity"){
			$('.li_buyer_activity').addClass('active');
		} else if(current_url == "seller_activity"){
			$('.li_seller_activity').addClass('active');
		} else if(current_url == "profile"){
			$('.dropdown').addClass('active');
		} else if(current_url == "change_password"){
			$('.dropdown').addClass('active');
		} else if(current_url == "my_ads"){
			$('.li_my_ads').addClass('active');
		} 
	
});
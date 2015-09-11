$(document).ready(function(){
	$('.reply-model').on('click',function(e){
		var form_target = $(e.target).parent('form');
		formtarget = '#'+$(form_target).attr('id');
		$(formtarget).validate({
			rules: {
				comment: {
					required: true
				}
			},
			messages: {
				comment: {
					required: "Please enter something to reply"
				},
			},
			submitHandler: function (form) {
				var comment = $(formtarget+' textarea[name=comment]').val();
				var item = $(formtarget+' input[name=item]').val();
				return true;
			}
		});
	});
})
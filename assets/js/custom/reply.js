$(document).ready(function(){
	$('.reply-model').on('click',function(e){
		var form_target = $(e.target).parents('form');
		formtarget = '#'+$(form_target).attr('id');
		var comment = $(formtarget+' textarea[name=comment]').val();
		var item = $(formtarget+' input[name=item]').val();
		$(formtarget+' #comment-error').remove();
		if(comment == ''){
			$(formtarget+' textarea').parent('div').append('<label id="comment-error" class="error" for="comment">Please enter something to reply</label>');
			return false;
		}
	});
})
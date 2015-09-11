$('document').ready(function () {

	//-------------------------------------------------------------------------
    /* 
     *  Only char validation      
     */
    $.validator.addMethod("charOnly", function (value, element) {
        return this.optional(element) || /^[A-Za-z\s]*$/.test(value)
    });

    //-----------------------------------------------------------------------
    /* 
     * add_user_form validation
     */
    $('.scomment').validate({
        rules: {
            email: {
                required: true,
				email: true,
				remote:{
					url: APP_URL + "login/check_availability",
					type: "post",
					data: {
						param: 'registration'
					}
				}
            },
            phone: {
                required: true,
				minlength:10
            },
            comment: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Email is required",
				email : 'Email Not Valid',
				remote: "Email already exists.Please login to comment with this email."
            },
			phone: {
                required: "Phone is required",
				minlength: "At least 10 characters are requried "
            },
			comment: {
                required: "Comment is required"
            },
        },
        submitHandler: function (form) {
            var email = $('.scomment input[name=email]').val();
            var phone = $('.scomment input[name=phone]').val();
            var comment = $('.scomment textarea[name=comment]').val();
            var item = $('.scomment input[name=item]').val();

            $.post(APP_URL + 'beat/save_message', {
                email: email,
                phone: phone,
                comment: comment,
                item: item,
				param: 'registration'
            },
            function (response) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('.comment-error').empty();
                if (response.status == 'success') {
                    $('.comment-error').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong> <a id='signinlink' href='"+APP_URL+'login'+"'>Sign In</a></div>");
                }
                else {
                    $('.comment-error').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
				console.log(response);
				$('.scomment input[name=email]').val('');
                $('.scomment input[name=phone]').val('');
				$('.scomment textarea[name=comment]').val('');
            }, 'json');
            return false;
        }
    });
	
	$('.lcomment').validate({
        rules: {
            comment: {
                required: true
            }
        },
        messages: {
			comment: {
                required: "Comment is required"
            },
        },
        submitHandler: function (form) {
            var comment = $('.lcomment textarea[name=comment]').val();
			var item = $('.lcomment input[name=item]').val();

			$.post(APP_URL + 'beat/save_message', {
                comment: comment,
                item: item,
				param: 'registration'
            },
            function (response) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('.comment-error').empty();
                if (response.status == 'success') {
                    $('.comment-error').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
                else {
                    $('.comment-error').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
				console.log(response);
				$('.lcomment textarea[name=comment]').val('');
            }, 'json');
            return false;
        }
    });

})
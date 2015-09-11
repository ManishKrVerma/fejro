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
    $('#signupform').validate({
        rules: {
            email: {
                required: true,
				remote:{
					url: APP_URL + "login/check_availability",
					type: "post",
					data: {
						param: 'registration'
					}
				}
            },
            firstname: {
                required: true,
				minlength:3
            },
            lastname: {
                required: true
            },
            passwd: {
                required: true,
				minlength:6
            },
			cfm_passwd:{
                required: true,
				equalTo : "#passwd"
            }
        },
        messages: {
            email: {
                required: "Email is required",
				remote: "Email already exists"
            },
			firstname: {
                required: "First Name is required",
				minlength: "At least 3 characters are requried "
            },
			lastname: {
                required: "Last Name is required",
            },
			passwd: {
                required: "Password is required",
				minlength: "At least 6 characters are requried "
				
            },
			cfm_passwd:{
                required: "Confirm Password is required",
				equalTo: " passwords don't match."
            }
        },
        submitHandler: function (form) {
            var email = $('#email').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var passwd = $('#passwd').val();

            $.post(APP_URL + 'login/add_new_user', {
                email: email,
                firstname: firstname,
                lastname: lastname,
                passwd: passwd,
            },
            function (response) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#err_signup_form').empty();
                if (response.status == 200) {
                    $('#err_signup_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong> <a id='signinlink' href='"+APP_URL+'login'+"'>Sign In</a></div>");
                }
                else if (response.status == 201) {
                    $('#err_signup_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
                $('#email').val('');
                $('#firstname').val('');
                $('#lastname').val('');
                $('#passwd').val('');
				$('#cfm_passwd').val('');
            }, 'json');
            return false;
        }
    });
	
	
    //-----------------------------------------------------------------------
    /* 
     * user_login_form validation
     */
	 $('#userLoginForm').validate({
                rules: {
                    loginUserEmail: {
                        required: true
                    },
                    loginPassword: {
                        required: true
                    }
                },
                onkeyup: false,
                messages: {
                    loginUserEmail: {
                        required: 'User Email is required.'
                    },
                    loginPassword: {
                        required: 'Password is required.'
                    }
                },
                submitHandler: function (form) {
                    var username = $("#loginUserEmail").val();
                    var password = $("#loginPassword").val();
                    /*Validating user supplied credentials*/
                    $.post(APP_URL + 'login/check_login_credentials', {
                        loginUserEmail: username,
                        loginPassword: password
                    },
                    function (response) {
                        $("#headMsg").empty();
                        if (response.status == 200) {
                            window.location.replace(response.redirect);
                        }
                        else {
                            $('#headMsg').empty();
                            $('#headMsg').html("<div class='alert alert-danger fade in'>\n\
                                                            <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                                                            <strong>Invalid Username or Password!</strong></div>");
                        }
                    }, 'json');
                    return false;
                }
            });
	//---------------------------------------------------------------------
    /*
     * This script is used to remove user from the list
     */

    $('body').on('click', '.remove_user', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
        var edit_user_id = $(this).attr('name');
        $.post(APP_URL + 'configure_access/remove_user_information', {edit_user_id: edit_user_id}, function (response) {
            $('#err_admin_edit_user').empty();
            if (response.status == 200) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#my_user_edit').modal('hide');
                $('#edit_user_table').show();
                $('#err_admin_edit_user').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                $('.edit_user[name=' + edit_user_id + ']').closest("tr").remove();
            }
            else {
                $('#err_admin_edit_user').empty();
                $('#err_admin_edit_user').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
            }
        }, 'json');
        return false;
    });

	//---------------------------------------------------------------------
    /*
     * This script is used to deactivate  user from the list
     */

    $('body').on('click', '.remove_beat', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
        var edit_user_id = $(this).attr('name');
        $.post(APP_URL + 'configure/deactivate_user', {edit_user_id: edit_user_id}, function (response) {
            $('#err_admin_edit_user').empty();
            if (response.status == 200) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#my_user_edit').modal('hide');
                $('#edit_user_table').show();
                $('#err_admin_edit_user').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                $('.remove_beat[name=' + edit_user_id + ']').closest("tr").remove();
            }
            else {
                $('#err_admin_edit_user').empty();
                $('#err_admin_edit_user').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
            }
        }, 'json');
        return false;
    });

})
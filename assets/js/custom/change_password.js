/* 
 *  Created For: Admin Pages
 *  Created on : 27 July, 2015
 *  Author     : Chaturbhuj    
 */
$(document).ready(function () {
    //-----------------------------------------------------------------------
    /* 
     * check for password  contain char num etc
     */
    $.validator.addMethod("pwcheck", function (value, element) {
        return this.optional(element) || /^[A-Z0-9a-z!\-@._*]*$/.test(value) // consists of only these
                && /[a-z]/.test(value) // has a lowercase letter
                && /[A-Z]/.test(value) // has a uppercase 
                && /[0-9]/.test(value) // has a digit 
    });

    //-----------------------------------------------------------------------
    /* 
     * admin_add_new_user_form validation
     */
    $('#change_password_form').validate({
        rules: {
            old_password: {
                required: true
            },
            new_password: {
                required: true,
                minlength: 6,
                pwcheck: true
            },
            confirm_password: {
                required: true,
                equalTo: "#new_password"
            }

        },
        messages: {
            old_password: {
                required: "Old Password is required"
            },
            new_password: {
                required: "New Password is required",
                minlength: "Atleast 6 character Required",
                pwcheck: "Atleast One lower case Character." + '<br/>' + "Atleast One Upper case Character." + '<br/>' + "Atleast One Digit" + '<br/>' + "Contain any one of thses !\-@._*"
            },
            confirm_password: {
                required: "Confirm Password is required",
                equalTo: "Confirm Password should be same as New Password"
            }
        },
        submitHandler: function (form) {
            var old_password = $('#old_password').val();
            var new_password = $('#new_password').val();

            $.post(APP_URL + 'configure/update_password', {
                old_password: old_password,
                new_password: new_password
            },
            function (response) {
                $('#err_change_password_form').empty();
                if (response.status == 200) {
                    $('#err_change_password_form').empty();
                    $('#err_change_password_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
                else {
                    $('#err_change_password_form').empty();
                    $('#err_change_password_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
				
				$('#old_password').val('');
                $('#new_password').val('');
				$('#confirm_password').val('');
            }, 'json');
            return false;
        }
    });
});
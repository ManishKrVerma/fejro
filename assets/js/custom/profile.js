$('document').ready(function(){
	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for add section.
     */
    $('#upload_image').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 200) {
                $(".img-preview").attr('src', APP_URL + 'uploads/' + response.filename);
                $('#browseImage').modal('hide');
                $('#profile_image').val(response.filename);
                $('#profile_image-error').css({"display": "none"});
            } else {
                $('#browseImage').modal('hide');
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });
   //------------------------------------------------------
	/* 
     * show edit form of profile details
     */
	$("body").on("click",".edit-profile",function(){
	  $(this).removeClass("deactive-profile").addClass("active-profile");
	  $(".profile-info").addClass("display_none");
	  $(".edit-profile-info").removeClass("display_none");
	
	});
 //---------------------------------------------------------------------
    /*
     * This script is used to remove user from the list
     */
$('body').on('click', '.deactive_profile', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
        var user_id = parseInt($(this).attr('name'));
        $.post(APP_URL + 'configure/deactivate_profile', {edit_user_id: user_id}, function (response) {
            $('#err_edit_profile_form').empty();
            if (response.status == 200) {
				window.location.href=APP_URL;
				
                $("html, body").animate({scrollTop: 0}, "slow");
               
                $('#err_edit_profile_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                $('.remove_services[name=' + user_id + ']').closest("tr").remove();
            }
            else {
                $('#err_edit_profile_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
            }
        }, 'json');
        return false;
    });

	
	//-----------------------------------------------------------------------
    /* 
     * edit_user_profile_detail_form validation
     */
    $('#edit-profile-form').validate({
        rules: {
            profile_name: {
                required: true,
				minlength:3
            },
            profile_age: {
                required: true,
            },
            gender: {
                required: true,
            },
			profile_pnumber:{
                required: true,
				number: true,
				minlength:10,
				maxlength:12				
            },
			profile_nation: {
                required: true,
            },
			profile_raddress: {
                required: true,
            },
			profile_caddress: {
                required: true,
            }
        },
        messages: {
			profile_name: {
                required: "Name is required",
				minlength: "At least 3 characters are requried "
            },
			profile_age: {
                required: "Date of Birth is required",
            },
			gender: {
                required: "Select gender",
            },
			profile_pnumber:{
                required: "Phone Number is required",
				number: "only Numbers are allowed",
				minlength:"Min. 10 digits are required",
				maxlength:"Max. 12 digits are required"
				
            },
			profile_nation: {
                required: "Nation is required",
            },
			profile_raddress: {
                required: "Residential Address is required",
            },
			profile_caddress: {
                required: "Correspondence Address is required",
            }
        },
        submitHandler: function (form) {
            var profile_name = $('#profile_name').val();
            var profile_age = $('#profile_age').val();
            var gender = $("input[type='radio'].profile-sex:checked").val();
            var profile_pnumber = $('#profile_pnumber').val();
			var profile_nation = $('#profile_nation').val();
            var profile_raddress = $('#profile_raddress').val();
            var profile_caddress = $('#profile_caddress').val();
			
            var producer_name = $('#producer_name').val();
            var producer_description = $('#producer_description').val();
            var correspondence_caddress = $('#correspondence_caddress').val();

            $.post(APP_URL + 'configure/edit_profile_details_user', {
                profile_name: profile_name,
                profile_age: profile_age,
                profile_sex: gender,
                profile_pnumber: profile_pnumber,
				profile_nation: profile_nation,
                profile_raddress: profile_raddress,
                profile_caddress: profile_caddress,
				producer_name: producer_name,
				producer_description:producer_description,
				correspondence_caddress: correspondence_caddress,
            },
            function (response) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#err_edit_profile_form').empty();
                if (response.status == 200) {
                    $('#err_edit_profile_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
                else if (response.status == 201) {
                    $('#err_edit_profile_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
				
			$(".span-profile-name").text($('#profile_name').val());
			$(".span-profile-age").text($('#profile_age').val());
			$(".span-profile-sex").text($("input[type='radio'].profile-sex:checked").val());
			$(".span-profile-pnumber").text($('#profile_pnumber').val());
			$(".span-profile-nation").text($('#profile_nation').val());
			$(".span-profile-raddress").text($('#profile_raddress').val());
			$(".span-profile-caddress").text($('#profile_caddress').val());
			
			$(".span-producer-name").text($('#producer_name').val());
			$(".span-producer-description").text($('#producer_description').val());
			$(".span-correspondence-caddress").text($('#correspondence_caddress').val());
				
            $(this).removeClass("active-profile").addClass("deactive-profile");
			$(".edit-profile-info").addClass("display_none");
			$(".profile-info").removeClass("display_none");
            }, 'json');
            return false;
        }
    });
	
});
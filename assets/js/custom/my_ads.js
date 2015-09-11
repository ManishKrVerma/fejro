$('document').ready(function(){

	/** This part of script is used to show btn on click of add ads btn.  */
	
	$('body').on('click','.addAds',function(){
		$('#ads_image_btn').css({'display':'block'});
		$("#ads_id").val(0);
		$("#ads_name").val('');
		$("#ads_image").val('');
		$("#navigation").val('');
		$(".img-preview").attr('scr','');
		$(".img-preview").removeClass('display_block').addClass('display_none');
	});
	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for add section.
     */
    $('#upload_image').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 200) {
                $(".img-preview").attr('src', APP_URL + 'uploads/' + response.filename);
                $('.img-preview').removeClass('display_none').addClass('display_block');
                $('#browseImage').modal('hide');
                $('#ads_image').val(response.filename);
                $('#ads_image-error').css({"display": "none"});
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
    $('#ads_form').validate({
		ignore: [],
        rules: {
            ads_name: {
                required: true,
            },
            ads_image: {
                required: true,
            },
            navigation: {
                required: true,
            }
        },
        messages: {
			ads_name: {
                required: "Ads Name is required.",
            },
			ads_image: {
                required: "Ads Image is required.",
            },
			navigation: {
                required: "Navigation URL is required.",
            }
        },
        submitHandler: function (form) {
            var ads_id = $('#ads_id').val();
            var ads_name = $('#ads_name').val();
            var ads_image = $('#ads_image').val();
            var navigation = $('#navigation').val();

            $.post(APP_URL + 'configure/update_ads', {
                ads_id: ads_id,
                ads_name: ads_name,
                ads_image: ads_image,
				navigation: navigation,
            },
            function (response) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#err_ads_form').empty();
                if (response.status == 200) {
                    $('#err_ads_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
                else if (response.status == 201) {
                    $('#err_ads_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
				
				$("#ads_id").val(0);
				$("#ads_name").val('');
				$("#ads_image").val('');
				$("#navigation").val('');
				$(".img-preview").attr('scr','');
				$(".img-preview").removeClass('display_block').addClass('display_none');
				$('#browseNewAds').modal('hide');
				
				
				$('.edit_ads[name=' + ads_id + ']').closest("tr").find("td:eq(1)").text(ads_name);
				$('.edit_ads[name=' + ads_id + ']').closest("tr").find("td:eq(3)").text(navigation);
            }, 'json');
            return false;
        }
    });
	
	
	//------------------------------------------------------------------------
    /**
     * This script is used to fill modal for edit ads image
     */
    var edit_ads_id_for_image = 0;
    $('body').on('click', '.editBrowseImageBtn', function () {
        $('#image_ads_id').val($(this).attr('name'));
        edit_ads_id_for_image = $(this).attr('name');
    });
	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for edit section.
     */
    $('#edit_upload_image').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 200) {
                $('.editBrowseImageBtn[name=' + edit_ads_id_for_image + ']').closest("tr").find(".ads_image_pre").attr('src', APP_URL + 'uploads/' + response.filename);
                $('#editBrowseImage').modal('hide');
            } else {
                $('#editBrowseImage').modal('hide');
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });
	
	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit ads
     */
    $('body').on('click', '.edit_ads', function () {		
        $('#err_ads_form').empty();

        var ads_id = $(this).attr('name');
        var ads_name = $(this).closest('tr').find('td:eq(1)').text();		
        var ads_image = $(this).closest('tr').find('td:eq(2) .ads_image_pre').attr('src');
		var navigation = $(this).closest('tr').find('td:eq(3)').text();

        $('#ads_id').val(ads_id);
        $('#ads_name').val(ads_name);
        $('#ads_image').val(ads_image.split("uploads/")[1]);
		$('.img-preview').attr('src',ads_image);
		$('#ads_image_btn').css({'display':'none'});
		$('.img-preview').removeClass('display_none').addClass('display_block');
        $('#navigation').val(navigation);
    });
	
	 //---------------------------------------------------------------------
    /**
     * This script is used to remove ads from the list
     */
	$('body').on('click', '.remove_ads', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
        var ads_id = parseInt($(this).attr('name'));
        $.post(APP_URL + 'configure/remove_ads', {ads_id: ads_id}, function (response) {
            $('#err_ads_form').empty();
            if (response.status == 200) {
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#err_ads_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                $('.remove_ads[name=' + ads_id + ']').closest("tr").remove();
            }
            else {
                $('#err_ads_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
            }
        }, 'json');
        return false;
    });

	
});
$('document').ready(function(){
	

    //------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit beat feature modal
     */

    $('body').on('click', '.edit_beat', function () {
        $('#err_feature_place_form').empty();
        $('#feature_place_form label.error').empty();
        $('#feature_place_form input.error').removeClass('error');
        $('#feature_place_form select.error').removeClass('error');

        var item_id = $(this).attr('name');

        $('#item_id').val(item_id);

    });

    //------------------------------------------------------------------------
    /* 
     * This function is used to update the beat featured 
     */
    $('#feature_place_form').validate({
        submitHandler: function (form) {
            var item_id = $('#item_id').val();
            var feature_type = $('#feature_type').val();


            $.post(APP_URL + 'configure/update_feature_place_of_beat', {
                item_id:item_id,
                feature_type: feature_type,
                
            },
		
            function (response) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#my_beat_edit').modal('hide');
                $('#err_new_edit_beat').empty();
                if (response.status == 200) {
                    $('#err_new_edit_beat').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                   // $('.edit_services[name=' + edit_services_id + ']').closest("tr").find("td:eq(1)").text(edit_services_name);
                    
                } else if (response.status == 201) {
                    $('#err_new_edit_beat').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
            }, 'json');
            return false;
        }
    });

    //------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit user
     */
    var edit_service_id_for_image = 0;
    $('body').on('click', '.editBrowseImageBtn', function () {
        $('#image_service_id').val($(this).attr('name'));
        edit_service_id_for_image = $(this).attr('name');
    });
    //------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for edit section
     */
    $('#edit_upload_image').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 200) {
                $('.editBrowseImageBtn[name=' + edit_service_id_for_image + ']').closest("tr").find(".service_photo").attr('src', APP_URL + 'uploads/' + response.filename);
                $('#editBrowseImage').modal('hide');
            } else {
                $('#editBrowseImage').modal('hide');
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });

    //---------------------------------------------------------------------
    /*
     * This script is used to remove user from the list
     */

    $('body').on('click', '.remove_beat', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
        var item_id= $(this).attr('name');
        $.post(APP_URL + 'configure/remove_beat', {item_id:item_id}, function (response) {
            $('#err_edit_services').empty();
            if (response.status == 200) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#edit_user_table').show();
                $('#err_edit_services').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                $('.remove_beat[name=' + item_id + ']').closest("tr").remove();
            }
            else {
                $('#err_edit_services').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
            }
        }, 'json');
        return false;
    });


	    //------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit beat feature modal
     */

    $('body').on('click', '.update_beat_info', function () {
        $('#err_feature_place_form').empty();
        $('#feature_place_form label.error').empty();
        $('#feature_place_form input.error').removeClass('error');
        $('#feature_place_form select.error').removeClass('error');

        var item_id = $(this).attr('name');

        $('#item_id').val(item_id);

    });

    //------------------------------------------------------------------------
    /* 
     * This function is used to update the beat featured 
     */
    $('#update_beat_info_form').validate({
        submitHandler: function (form) {
            var item_id = $('#item_id').val();
            var beat_status = $('#beat_status').val();


            $.post(APP_URL + 'configure/update_beat_status', {
                item_id:item_id,
                beat_status: beat_status,
            },
		
            function (response) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#update_beat_info').modal('hide');
                $('#err_new_edit_beat').empty();
                if (response.status == 200) {
                    $('#err_new_edit_beat').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                    $('.update_beat_info[name=' + item_id + ']').closest("tr").find("td:eq(9)").text(beat_status);
                    
                } else if (response.status == 201) {
                    $('#err_new_edit_beat').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
            }, 'json');
            return false;
        }
    });

   
   
})
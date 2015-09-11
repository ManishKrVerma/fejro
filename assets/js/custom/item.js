$('document').ready(function(){

	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for add section.
     */
    $('#upload_image').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 200) {
				$(".img-preview").addClass('display_inline');
                $(".img-preview").attr('src', APP_URL + 'uploads/' + response.filename);
                $('#browseImage').modal('hide');
                $('#item_image').val(response.filename);
                $('#item_image-error').css({"display": "none"});
				$("#myFile").val('')
            } else {
                $('#browseImage').modal('hide');
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });
	
	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload audio for add section.
     */
    $('#upload_audio').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
			console.log(response);
            if (response.status == 200) {
                $('#browsesample').modal('hide');
				if($(".check_sample_status").val()== 'item_sample1_btn'){
						$('#item_sample1').val(response.filename);
						$('#item_sample1_name').val(response.originalName);
						$('#beat1_duration').val($('#duration').text()).removeClass('display_none').addClass('display_inline');
						$('#item_sample1').removeClass('error');
						$('#item_sample1-error').remove();
						
				}else if($(".check_sample_status").val()== 'item_sample2_btn'){
						$('#item_sample2').val(response.filename);
						$('#item_sample2_name').val(response.originalName);
						$('#beat2_duration').val($('#duration').text()).removeClass('display_none').addClass('display_inline');
				}else if($(".check_sample_status").val()== 'item_music_btn'){
						$('#item_music').val(response.filename);
						$('#item_music_name').val(response.originalName);
						$('#beat0_duration').val($('#duration').text()).removeClass('display_none').addClass('display_inline');
						$('#item_music').removeClass('error');
						$('#item_music-error').remove();
				}
				
				$("#audio").attr('src','')
				$("#file").val('')
				
                $('#item_image-error').css({"display": "none"});
            } else {
                $('#browsesample').modal('hide');
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });

	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for add section.
     */
    $('#upload_project_file').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
            $('#browseProjecctFile').modal('hide');
            if (response.status == 200) {
                $('#project_file_name').val(response.original_filename);
                $('#project_file_new_name').val(response.filename);
				$("#myFile").val('');
				
				$('#project_file_new_name').removeClass('error');
				$('#project_file_new_name-error').remove();
				
            } else {
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });

    //-----------------------------------------------------------------------
    /* 
     * add_item_form validation
     */
    $('#add_item_form').validate({
		ignore: [],
        rules: {
            item_name: {
                required: true
            },
			genres: {
                required: true
            },
			item_description:{
				required: true
			},
			 item_image: {
                required: true
            },
			 item_sample1: {
                required: true
            },
			 item_price: {
                required: true
            },
			item_music: {
                required: true
            },
			item_acknowlegment:{
                required: true			
			},
			project_file_new_name:{
				required: true
			}

        },
        messages: {
            item_name: {
                required: "Beat Name is required."
            },
			genres: {
                required: "Please choose at-least one genres type."
            },
			item_description:{
				required: "Beat description is required."
			},
			item_image: {
                required: "Beat poster is required."
            },
			item_sample1: {
                required: "Beat Sample1 is required"
            },
			item_price: {
                required: "Beat Price is required"
            },
			item_music: {
                required: "Full Beat is required"
            },
			item_acknowlegment:{
                required: "please check acknowledgement."
			},
			project_file_new_name:{
				required: "Project File is required."
			}
        },		
		errorPlacement: function(error, element) {
            if (element.hasClass('genres')) {
                error.insertAfter(element.closest('div.form-group').find('.genres-error div'));
            } else if (element.hasClass('item_acknowlegment')) {
                error.insertAfter(element.closest('label'));
            } else  {
                error.insertAfter(element);
            }
		},
        submitHandler: function (form) {
			var item_name = $('#item_name').val();
			var item_genre = [];
			$('.genres:checked').each(function(i){
				item_genre[i] = $(this).val();
			});
			var item_description = $('#item_description').val();
			var item_image = $('#item_image').val();

			var item_sample1_name = $('#item_sample1_name').val();
			var item_sample1_new_name = $('#item_sample1').val();
			var beat1_duration = $('#beat1_duration').val();
			
			var item_sample2_name = $('#item_sample2_name').val();
			var item_sample2_new_name = $('#item_sample2').val();
			var beat2_duration = $('#beat2_duration').val();
			
			var item_music_name = $('#item_music_name').val();
			var item_music_new_name = $('#item_music').val();
			var beat0_duration = $('#beat0_duration').val();
			
			var project_file_name = $('#project_file_name').val();
			var project_file_new_name = $('#project_file_new_name').val();
			
			var item_price = $('#item_price').val();
			
			
            $.post(APP_URL + 'configure/add_new_item', {
                item_name: item_name,
				item_genre: item_genre,
				item_description: item_description,
				item_image:item_image,
				item_sample1_name:item_sample1_name,
				item_sample1_new_name:item_sample1_new_name,
				beat1_duration:beat1_duration,
				item_sample2_name:item_sample2_name,
				item_sample2_new_name:item_sample2_new_name,
				beat2_duration:beat2_duration,
				item_music_name:item_music_name,
				item_music_new_name:item_music_new_name,
				beat0_duration:beat0_duration,	
				project_file_name:project_file_name,	
				project_file_new_name:project_file_new_name,				
				item_price:item_price
            },
                    function (response) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#err_item_form').empty();
                        if (response.status == 200) {
                            $('#err_item_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                        }
                        else if (response.status == 201) {
                            $('#err_item_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                        }
                        $('#item_name').val('');
                        $('.genres').prop('checked', false);
                        $('#item_description').val('');
						$('#item_image').val('');
						$('.img-preview').attr('src','');
						$('#item_sample1_name').val('');
						$('#item_sample1').val('');
                        $('#beat1_duration').val('');
						$('#item_sample2_name').val('');
						$('#item_sample2').val('');
						$('#beat2_duration').val('');
						$('#item_music_name').val('');
                        $('#item_music').val('');
						$('#beat0_duration').val('');
						$('#item_price').val('');
						$('#beat1_duration').removeClass('display_inline').addClass('display_none');
						$('#beat2_duration').removeClass('display_inline').addClass('display_none');
						$('#beat3_duration').removeClass('display_inline').addClass('display_none');
						$('#beat0_duration').removeClass('display_inline').addClass('display_none');
						$('.img-preview').removeClass('display_inline').addClass('display_none');
						$('#project_file_name').val('');
						$('#project_file_new_name').val('');
			
						$('.item_acknowlegment').prop('checked', false);
                    }, 'json');
            return false;
        }
    });
	
	//------------------------------------------------------
	/* 
     * Read Name, type, size, duration of audio file
     */
	var objectUrl;
	$("#audio").on("canplaythrough", function(e){
		var seconds = e.currentTarget.duration;
		console.log('seconds'+ seconds);
		
		var duration = moment.duration(seconds, "seconds");
		console.log('duration'+ duration);
		if($(".check_sample_status").val()== 'item_sample1_btn' || $(".check_sample_status").val()== 'item_sample2_btn'){
			if(seconds < 18 || seconds > 22){
				$('#err_item').html("<div class='alert alert-danger fade in'>\n\
					<button class='close' type='button' data-dismiss='alert'>x</button>\n\
					<strong>" + 'Audio file should between 18 to 21 seconds' + "</strong></div>");
				$('.button-status').prop("disabled",true);
			}else{
				$('.button-status').prop("disabled",false);
			}
		}else{
			$('.button-status').prop("disabled",false);
		}
		
		var time = "";
		var hours = duration.hours();
		if (hours > 0) { time = hours + ":" ; }
		
		time = time + duration.minutes() + ":" + duration.seconds();
		$("#duration").text(time);
		
		URL.revokeObjectURL(objectUrl);
	});
	$("#file").change(function(e){
		$( '#err_item' ).empty();
		var file = e.currentTarget.files[0];
		$("#filename").text(file.name);
		$("#filetype").text(file.type);
		$("#filesize").text(file.size);
		console.log('size'+ file.size);
		objectUrl = URL.createObjectURL(file);
		$("#audio").prop("src", objectUrl);
	});

	//------------------------------------------------------
	/* 
     * check sample and music for error 20 sec message show or not
     */
	$("body").on("click",".check_sample",function(){
	$( '#err_item' ).empty();
		var name = $(this).attr("name");
		$(".check_sample_status").val(name);
	});

	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit beat image
     */
    var edit_item_id_for_image = 0;
    $('body').on('click', '.editBrowseImageBtn', function () {
        $('#image_item_id').val($(this).attr('name'));
        edit_item_id_for_image = $(this).attr('name');
    });
	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for edit section.
     */
    $('#edit_upload_image').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
            if (response.status == 200) {
                $('.editBrowseImageBtn[name=' + edit_item_id_for_image + ']').closest("tr").find(".beat_image").attr('src', APP_URL + 'uploads/' + response.filename);
                $('#editBrowseImage').modal('hide');
                $('#item-image-error').css({"display": "none"});
            } else {
                $('#editBrowseImage').modal('hide');
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });
	
	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload audio for edit section.
     */
    $('#edit_upload_audio').ajaxForm({
        dataType: 'JSON',
        success: function (response) {
			console.log(response);
            if (response.status == 200) {
                $('#editbrowsesample').modal('hide');
				if($(".check_sample_status").val()== 'edit_item_sample1_btn'){
						$('#edit_item_sample1').val(response.filename);
						$('#edit_item_sample1_name').val(response.originalName);
						$('#edit_beat1_duration').val($('#duration').text()).removeClass('display_none').addClass('display_inline');
				}else if($(".check_sample_status").val()== 'edit_item_sample2_btn'){
						$('#edit_item_sample2').val(response.filename);
						$('#edit_item_sample2_name').val(response.originalName);
						$('#edit_beat2_duration').val($('#duration').text()).removeClass('display_none').addClass('display_inline');
				}else if($(".check_sample_status").val()== 'edit_item_music_btn'){
						$('#edit_item_music').val(response.filename);
						$('#edit_item_music_name').val(response.originalName);
						$('#edit_beat0_duration').val($('#duration').text()).removeClass('display_none').addClass('display_inline');
				}
                $('#item_image-error').css({"display": "none"});
            } else {
                $('#editbrowsesample').modal('hide');
                alert(response.message);
            }
            $.unblockUI();
            return false;
        }
    });
	
	//------------------------------------------------------------------------
    /*
     * Thedit_item_descriptionis script is used to fill modal for edit beat
     */

    $('body').on('click', '.edit_beat', function () {
		$('#edit_beat1_duration').removeClass('display_inline').addClass('display_none');
		$('#edit_beat2_duration').removeClass('display_inline').addClass('display_none');
		$('#edit_beat0_duration').removeClass('display_inline').addClass('display_none');
		
        $('#err_edit_beat').empty();
        $('#edit_item_form label.error').empty();
        $('#edit_item_form input.error').removeClass('error');
        $('#edit_item_form select.error').removeClass('error');

        var edit_item_id = $(this).attr('name');
        var edit_item_name = $(this).closest('tr').find('td:eq(1)').text();
		var edit_item_genre = $(this).closest('tr').find('td:eq(3)').text();
        var edit_item_description= $(this).closest('tr').find('td:eq(4)').text();
		var edit_item_price = $(this).closest('tr').find('td:eq(5)').text();
		
		var edit_item_sample1_name = $(this).closest('tr').find('td:eq(6)').find('.edit_item_sample1_name').text();
		var edit_item_sample1_new_name = $(this).closest('tr').find('td:eq(6)').find('.edit_item_sample1_new_name').text();
		var edit_beat1_duration = $(this).closest('tr').find('td:eq(6)').find('.edit_beat1_duration').text();
		
		var edit_item_sample2_name = $(this).closest('tr').find('td:eq(7)').find('.edit_item_sample2_name').text();
		var edit_item_sample2_new_name = $(this).closest('tr').find('td:eq(7)').find('.edit_item_sample2_new_name').text();
		var edit_beat2_duration = ($(this).closest('tr').find('td:eq(7)').find('.edit_beat2_duration').text());
		
		var edit_item_music_name = $(this).closest('tr').find('td:eq(8)').find('.edit_item_music_name').text();
		var edit_item_music_new_name = $(this).closest('tr').find('td:eq(8)').find('.edit_item_music_new_name').text();
		var edit_beat0_duration = ($(this).closest('tr').find('td:eq(8)').find('.edit_beat0_duration').text());

        $('#edit_item_id').val(edit_item_id);
        $('#edit_item_name').val(edit_item_name);
		var temp = new Array();
        temp = edit_item_genre.split(",");
        for (i=0; i!=temp.length;i++) {
			var checkbox = $("input[type='checkbox'][value='"+temp[i]+"']");
				checkbox.attr("checked","checked");
        }
        $('#edit_item_description').val(edit_item_description);
		$('#edit_item_price').val(edit_item_price);
		
		$('#edit_item_sample1_name').val(edit_item_sample1_name);
		$('#edit_item_sample1_new_name').val(edit_item_sample1_new_name);
		$('#edit_beat1_duration').val(edit_beat1_duration);		
		if(edit_beat1_duration.length > 0){
			$('#edit_beat1_duration').removeClass('display_none').addClass('display_inline');
		}
		
		$('#edit_item_sample2_name').val(edit_item_sample2_name);
		$('#edit_item_sample2_new_name').val(edit_item_sample2_new_name);
		$('#edit_beat2_duration').val(edit_beat2_duration);
		if(edit_beat2_duration.length > 0){
			$('#edit_beat2_duration').removeClass('display_none').addClass('display_inline');
		}		
		
		$('#edit_item_music_name').val(edit_item_music_name);
		$('#edit_item_music_new_name').val(edit_item_music_new_name);
		$('#edit_beat0_duration').val(edit_beat0_duration);
		if(edit_beat0_duration.length > 0){
			$('#edit_beat0_duration').removeClass('display_none').addClass('display_inline');
		}
		
    });
	
	//------------------------------------------------------------------------
    /* 
     * edit_beat form validation
     */
    $('#edit_item_form').validate({
        rules:{
            edit_item_name: {
                required: true
            },
			genres: {
                required: true
            },
			edit_item_description:{
				required: true
			},
			edit_item_music_new_name: {
                required: true
            },
			edit_item_music_new_name: {
                required: true
            },
			edit_item_price: {
                required: true
            }
        },
        messages: {
            edit_item_name: {
                required: "Beat Name is required."
            },
			genres: {
                required: "Please choose at-least one genres type."
            },
			edit_item_description:{
				required: "Beat description is required."
			},
			edit_item_music_new_name: {
                required: "Beat Sample1 is required"
            },
			edit_item_music_new_name: {
                required: "Full Beat is required"
            },
			edit_item_price: {
                required: "Beat Price is required"
            },
        },
		errorPlacement: function(error, element) {
            if (element.hasClass('genres')) {
                error.insertAfter(element.closest('div.form-group').find('.genres-error div'));
            } else  {
                error.insertAfter(element);
            }
		},
	   submitHandler: function (form) {
            var edit_item_id = $('#edit_item_id').val();
            var edit_item_name = $('#edit_item_name').val();
			var edit_item_genre = [];
			$('.genres:checked').each(function(i){
				edit_item_genre[i] = $(this).val();
			});
            var edit_item_description = $('#edit_item_description').val();
			
			var edit_item_sample1_name = $('#edit_item_sample1_name').val();
			var edit_item_sample1_new_name = $('#edit_item_sample1_new_name').val();
			var edit_beat1_duration = $('#edit_beat1_duration').val();
			
			var edit_item_sample2_name = $('#edit_item_sample2_name').val();
			var edit_item_sample2_new_name = $('#edit_item_sample2_new_name').val();
			var edit_beat2_duration = $('#edit_beat2_duration').val();
			
			var edit_item_music_name = $('#edit_item_music_name').val();
			var edit_item_music_new_name = $('#edit_item_music_new_name').val();
			var edit_beat0_duration = $('#edit_beat0_duration').val();
			
			var edit_item_price = $('#edit_item_price').val();

            $.post(APP_URL + 'configure/edit_beat_information', {
                edit_item_id: edit_item_id,
                edit_item_name: edit_item_name,
				edit_item_genre: edit_item_genre,
                edit_item_description: edit_item_description,
				edit_item_sample1_name:edit_item_sample1_name,
				edit_item_sample1_new_name:edit_item_sample1_new_name,
				edit_beat1_duration:edit_beat1_duration,
				edit_item_sample2_name:edit_item_sample2_name,
				edit_item_sample2_new_name:edit_item_sample2_new_name,
				edit_beat2_duration:edit_beat2_duration,
				edit_item_music_name:edit_item_music_name,
				edit_item_music_new_name:edit_item_music_new_name,
				edit_beat0_duration:edit_beat0_duration,			
				edit_item_price: edit_item_price,
            },
                    function (response) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#err_edit_beat').empty();
                        $('#err_edit_item_form').modal('hide');
                        if (response.status == 200) {
                            $('#err_edit_item_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                           $('.edit_beat[name=' + edit_item_id + ']').closest("tr").find("td:eq(1)").text(edit_item_name);
                           $('.edit_beat[name=' + edit_item_id + ']').closest("tr").find("td:eq(3)").text(edit_item_genre);
						   $('.edit_beat[name=' + edit_item_id + ']').closest("tr").find("td:eq(4)").text(edit_item_description);
						   $('.edit_beat[name=' + edit_item_id + ']').closest("tr").find("td:eq(5)").text(edit_item_price);

                        } else if (response.status == 201) {
                            $('#err_edit_item_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                        }
                    }, 'json');
            return false;
        }
    });

	
		
	 //---------------------------------------------------------------------
    /**
     * This script is used to remove ads from the list
     */
	$('body').on('click', '.remove_beat', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
        var item_id = parseInt($(this).attr('name'));
        $.post(APP_URL + 'configure/remove_beat', {item_id: item_id}, function (response) {
            $('#err_edit_item_form').empty();
            if (response.status == 200) {
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#err_edit_item_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                $('.remove_beat[name=' + item_id + ']').closest("tr").remove();
            }
            else {
                $('#err_edit_item_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
            }
        }, 'json');
        return false;
    });
	
})
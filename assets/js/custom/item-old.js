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
                $('#item_image').val(response.filename);
                $('#item_image-error').css({"display": "none"});
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
            if (response.status == 200) {
                $('#browsesample').modal('hide');
				if($(".check_sample_status").val()== 'item_sample1_btn'){
						$('#item_sample1').val(response.filename);
				}else if($(".check_sample_status").val()== 'item_sample2_btn'){
						$('#item_sample2').val(response.filename);
				}else if($(".check_sample_status").val()== 'item_music_btn'){
						$('#item_music').val(response.filename);
				}
                $('#item_image-error').css({"display": "none"});
            } else {
                $('#browsesample').modal('hide');
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
        /*rules: {
            item_name: {
                required: true
            },
			 item_image: {
                required: true
            },
			 item_sample1: {
                required: true
            },
			 item_sample2: {
                required: true
            },
			item_music: {
                required: true
            }

        },
        messages: {
            item_name: {
                required: "Item Name is required"
            },
			item_image: {
                required: "Item Image is required"
            },
			item_sample1: {
                required: "Item Sample1 is required"
            },
			item_sample2: {
                required: "Item Sample2 is required"
            },
			item_music: {
                required: "Item Music is required"
            }
        },
        */submitHandler: function (form) {
			var item_name = $('#item_name').val();
			var val = [];
			$('.genres:checked').each(function(i){
				val[i] = $(this).val();
			});
			var item_genre = val;
			var item_description = $('#item_description').val();
			var item_image = $('#item_image').val();
			var item_sample1 = $('#item_sample1').val();
			var item_sample2 = $('#item_sample2').val();
			var item_music = $('#item_music').val();
			var item_price = $('#item_price').val();
			
			
            $.post(APP_URL + 'configure/add_new_item', {
                item_name: item_name,
				item_genre: item_genre,
				item_description: item_description,
				item_image:item_image,
				item_sample1:item_sample1,
				item_sample2:item_sample2,
				item_music:item_music,
				item_price:item_price
            },
                    function (response) {
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#err_product_form').empty();
                        if (response.status == 200) {
                            $('#err_product_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                        }
                        else if (response.status == 201) {
                            $('#err_product_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                        }
                        $('#item_name').val('');
                        $('#item_image').val('');
                        $('#item_sample1').val('');
						$('#item_sample2').val('');
						$('#item_music').val('');
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
												<strong>" + 'Audio file should be 20 seconds' + "</strong></div>");
					}
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
		console.log(name);
		$(".check_sample_status").val(name);
	});

})
<script src="<?php echo base_url(); ?>assets/js/custom/item.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/moment.min.js"></script> 
<style>.product_images{  width: 100px;} 
		audio {display: none;}
		.add_beat_box input{  width: 15px;    height: 15px;    cursor: pointer;}
		#item_image_btn, .check_sample{background-image: none;}
		.img-preview{margin-left: 20px;    width: 150px;border: 1px solid;}
		.beat-box label{ display: inline-block;    float: left;}
		.beat-box .beat_sample, .beat-box .project_file_name{display: inline-block;    width: 50%;}
		.beat_duration, .project_file_size{width: 19%;}
		.display_none{display:none !important;}
		.display_inline{display:inline-block !important;}
		
</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1>Add New Banner</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>
                <div class="col-lg-7 col-md-7" id="err_item_form"></div>
                <div class="clearfix"></div>
                <div class="widget-content padded">
                    <form id="add_banner" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="item_image">Banner Image<span class="required">*</span></label>
                            <div class="col-md-5">      
                                <a id="item_image_btn" name="item_image_btn" class="btn btn-success item_image_btn" data-toggle="modal" data-target="#browseImage" style="width: 131px;">+ Banner.. </a>
                                <!--<a href="#" id="item_image_btn" name="item_image_btn" class="item_image_btn" data-toggle="modal" data-target="#browseImage">Upload Beat Poster</a>-->
                                <input class="form-control" id="item_image" name="banner_image" class="item_image" type="hidden">
                                <img class="img-preview display_none" src="" alt="">     
                            </div>
                        </div>  
						<div class="form-group">
                            <div class="col-md-2 col-md-offset-2">
                                <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Submit">  
                            </div>                            
                        </div>                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!---------------------------- Modal for Browse Image-------------------------->
<div class="modal fade" id="browseImage" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Browse Image</h3>
            </div> 
            <form class="well form-inline" id="upload_image" action="<?php echo base_url(); ?>configure/upload_image" method="post" enctype="multipart/form-data">
                <div class="modal-body">
					<p>Image should be less then the 2MB</p>
                    <div id="head1_msg"></div>
                    <input type="hidden" value="item" name="image_cat" class="image_cat">
                    <input type="file" id="myFile" name="myFile" size="20" multiple> 

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save-img-loading">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!---------------------------- Modal for Browse Audio-------------------------->
<div class="modal fade" id="browsesample" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Browse Audio</h3>
            </div> 
            <form class="well form-inline" id="upload_audio" action="<?php echo base_url(); ?>configure/upload_audio" method="post" enctype="multipart/form-data">
                <div class="modal-body">
			<div id="err_item" class="col-sm-8 col-sm-offset-2"> </div>
					<input type="hidden" value="" name="check_sample_status" class="check_sample_status">
                    <input type="hidden" value="item" name="audio_cat" class="audio_cat">
							<input type="file" id="file"  name="file"  size="20" />
					<audio id="audio"></audio>
							<p></p>
							<p style="display:none;">
							  <label>File Size:</label>
							  <span id="filesize"></span>
							</p>

							<p style="display:none;">
							  <label>Song Duration:</label>
							  <span id="duration"></span>
							</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save-img-loading button-status"disabled>Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!---------------------------- Modal for Browse Project file -------------------------->
<div class="modal fade" id="browseProjecctFile" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Browse Project File</h3>
            </div> 
            <form class="well form-inline" id="upload_project_file" action="<?php echo base_url(); ?>configure/upload_project_file" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="head1_msg"></div>
                    <input type="hidden" value="project" name="image_cat" class="image_cat">
                    <input type="file" id="myFile" name="myFile" size="20" multiple> 

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save-img-loading">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
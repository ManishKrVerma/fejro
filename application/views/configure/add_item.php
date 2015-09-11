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
        <h1>Add New Beat</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>
                <div class="col-lg-7 col-md-7" id="err_item_form"></div>
                <div class="clearfix"></div>
                <div class="widget-content padded">
                    <form id="add_item_form" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="item_name">Beat Title  <span class="required">*</span></label>
                            <div class="col-md-5">
                                <input class="form-control" id="item_name" name="item_name" placeholder="Beat Title" type="text">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2" for="item_genre">Genre <span class="required">*</span></label>
                            <div class="col-md-5 add_beat_box">  
								 <label style="margin-left: 10px;" class="checkbox-inline"><input id="blues" name="genres" value="blues" type="checkbox" class="genres">Blues</label>
								 <label class="checkbox-inline"><input id="country" name="genres" value="country" type="checkbox" class="genres">Country</label>
								 <label class="checkbox-inline"><input id="electronic" name="genres" value="electronic" type="checkbox" class="genres">Electronic</label> 
								 <label class="checkbox-inline"><input id="dance" name="genres" value="dance" type="checkbox" class="genres">Dance</label>
								 <label class="checkbox-inline"><input id="music" name="genres" value="music" type="checkbox" class="genres">Music</label>
								 <label class="checkbox-inline"><input id="rap" name="genres" value="rap" type="checkbox" class="genres">Hip Hop/Rap</label>
								 <label class="checkbox-inline"><input id="jazz" name="genres" value="jazz" type="checkbox" class="genres">Jazz</label>
								 <label class="checkbox-inline"><input id="pop" name="genres" value="pop" type="checkbox" class="genres">Pop</label>
								 <label class="checkbox-inline"><input id="soul" name="genres" value="soul" type="checkbox" class="genres">R n B/Soul</label>
								 <label class="checkbox-inline"><input id="reggae" name="genres" value="reggae" type="checkbox" class="genres">Reggae</label>
								 <label class="checkbox-inline"><input id="rock" name="genres" value="rock" type="checkbox" class="genres">Rock</label>
								 <label class="checkbox-inline"><input id="vocal" name="genres" value="vocal" type="checkbox" class="genres">Vocal</label>
								 <label class="checkbox-inline"><input id="world" name="genres" value="world" type="checkbox" class="genres">World</label>
                            </div>
							<div class="genres-error col-md-5 col-md-offset-2 clearfix">
								<div></div>
							</div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2" for="item_description">Beat Description <span class="required">*</span></label>
                            <div class="col-md-5">
								<textarea class="form-control" rows="4" col="50" id="item_description" name="item_description" placeholder="Beat Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2" for="item_image">Beat Poster<span class="required">*</span></label>
                            <div class="col-md-5">      
                                <a id="item_image_btn" name="item_image_btn" class="btn btn-success item_image_btn" data-toggle="modal" data-target="#browseImage" style="width: 131px;">+ Beat Poster.. </a>
                                <!--<a href="#" id="item_image_btn" name="item_image_btn" class="item_image_btn" data-toggle="modal" data-target="#browseImage">Upload Beat Poster</a>-->
                                <input class="form-control" id="item_image" name="item_image" class="item_image" type="hidden">
                                <img class="img-preview display_none" src="" alt="">     
                            </div>
                        </div>  
						 <div class="form-group beat-box">
                            <label class="control-label col-md-2" for="item_sample1">Beat Sample 1 <span class="required">*</span> </label>
                            <div class="col-md-5">  
                                <a id="item_sample1_btn" name="item_sample1_btn" class="btn btn-success item_sample1_btn check_sample" data-toggle="modal" data-target="#browsesample">+ Beat Sample 1</a>
								<input class="form-control beat_sample" placeholder="Beat should be between 18 to 21 seconds" id="item_sample1_name" name="item_sample1_name" type="text" disabled>
								<input class="form-control item_sample1" placeholder="Beat should be between 18 to 21 seconds" id="item_sample1" name="item_sample1" type="hidden">
                            	<input class="beat_duration form-control display_none" placeholder="" id="beat1_duration" name="beat1_duration" type="text" disabled>
                            </div>
                        </div>
						 <div class="form-group beat-box">
                            <label class="control-label col-md-2" for="item_sample2">Beat Sample 2</label>
                            <div class="col-md-5">  
                                <a id="item_sample2_btn" name="item_sample2_btn" class="btn btn-success item_sample2_btn check_sample" data-toggle="modal" data-target="#browsesample">+ Beat Sample 2</a>
								<input class="form-control beat_sample" placeholder="Beat should be between 18 to 21 seconds" id="item_sample2_name" name="item_sample2_name" type="text" disabled>
								<input class="form-control item_sample2" placeholder="Beat should be between 18 to 21 seconds" id="item_sample2" name="item_sample2" type="hidden">
                            	<input class="beat_duration form-control display_none" placeholder="" id="beat2_duration" name="beat2_duration" type="text" disabled>
                            </div>
                        </div>
						<div class="form-group beat-box">
                            <label class="control-label col-md-2" for="item_music">Original Beat<span class="required">*</span></label>
                            <div class="col-md-5">  
							    <a id="item_music_btn" name="item_music_btn" class="btn btn-success item_music_btn check_sample" data-toggle="modal" data-target="#browsesample" style="width: 131px;"> + Original Beat</a>
								<input class="form-control beat_sample" placeholder="Please upload Original Beat here" id="item_music_name" name="item_music_name" type="text" disabled>
								<input class="form-control item_music" placeholder="Please upload Original Beat here" id="item_music" name="item_music" type="hidden">
                            	<input class="beat_duration form-control display_none" placeholder="" id="beat0_duration" name="beat0_duration" type="text" disabled>
                            </div>
                        </div>
						<div class="form-group beat-box">
                            <label class="control-label col-md-2" for="project_file">Project File(zip)<span class="required">*</span></label>
                            <div class="col-md-5">  
							    <a id="project_file_btn" name="project_file_btn" class="btn btn-success project_file_btn check_sample" data-toggle="modal" data-target="#browseProjecctFile" style="width: 131px;">+ Project File</a>
								<input class="form-control project_file_name" placeholder="Project File (Should be in zip)" id="project_file_name" name="project_file_name" type="text" disabled>
								<input class="form-control project_file_new_name" id="project_file_new_name" name="project_file_new_name" type="hidden">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2" for="item_price">Beat Price<span class="required">*</span></label>
                            <div class="col-md-5">  
                                <input class="form-control" id="item_price" name="item_price" placeholder="Beat Price in pound only" type="number" >
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-5 col-md-offset-2">  
                                <label class="checkbox-inline">
									<input id="item_acknowlegment" class="item_acknowlegment" name="item_acknowlegment" value="true" type="checkbox" > I hereby state that this music price is my work and I accept any liabilities to that may arise should from selling it.
								</label>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-2 col-md-offset-2">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">  
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
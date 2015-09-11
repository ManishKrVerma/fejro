<script src="<?php echo base_url(); ?>assets/js/custom/item.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/moment.min.js"></script> 
<style>.product_images{  width: 100px;} 
		audio {display: none;}
</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1>Add New Item</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>
                <div class="col-lg-7 col-md-7" id="err_item_form"></div>
                <div class="clearfix"></div>
                <div class="widget-content padded">
                    <form id="add_item_form" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="item_name">Music Title  <span class="required">*</span></label>
                            <div class="col-md-5">
                                <input class="form-control" id="item_name" name="item_name" placeholder="Music Title" type="text">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2" for="item_genre">Genre <span class="required">*</span></label>
                            <div class="col-md-5">  
								 <label class="checkbox-inline"><input id="blues" name="blues" value="blues" type="checkbox" class="genres">Blues</label>
								 <label class="checkbox-inline"><input id="country" name="country" value="country" type="checkbox" class="genres">Country</label>
								 <label class="checkbox-inline"><input id="electronic" name="electronic" value="electronic" type="checkbox" class="genres">Electronic</label> 
								 <label class="checkbox-inline"><input id="dance" name="dance" value="dance" type="checkbox" class="genres">Dance</label>
								 <label class="checkbox-inline"><input id="music" name="music" value="music" type="checkbox" class="genres">Music</label>
								 <label class="checkbox-inline"><input id="rap" name="rap" value="rap" type="checkbox" class="genres">Hip Hop/Rap</label>
								 <label class="checkbox-inline"><input id="jazz" name="jazz" value="jazz" type="checkbox" class="genres">Jazz</label>
								 <label class="checkbox-inline"><input id="pop" name="pop" value="pop" type="checkbox" class="genres">Pop</label>
								 <label class="checkbox-inline"><input id="soul" name="soul" value="soul" type="checkbox" class="genres">R n B/Soul</label>
								 <label class="checkbox-inline"><input id="reggae" name="reggae" value="reggae" type="checkbox" class="genres">Reggae</label>
								 <label class="checkbox-inline"><input id="rock" name="rock" value="rock" type="checkbox" class="genres">Rock</label>
								 <label class="checkbox-inline"><input id="vocal" name="vocal" value="vocal" type="checkbox" class="genres">Vocal</label>
								 <label class="checkbox-inline"><input id="world" name="world" value="world" type="checkbox" class="genres">World</label>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2" for="item_description">Music Description <span class="required">*</span></label>
                            <div class="col-md-5">
                                <input class="form-control" id="item_description" name="item_description" placeholder="Music Description" type="textarea">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2" for="item_image">Music Poster<span class="required">*</span></label>
                            <div class="col-md-5">      
                                <a href="#" id="item_image_btn" name="item_image_btn" class="item_image_btn" data-toggle="modal" data-target="#browseImage">Upload Music Poster</a>
                                <input class="form-control" id="item_image" name="item_image" type="hidden">
                                <img class="img-preview" src="" alt="" style="width: 150px;">     
                            </div>
                        </div>  
						 <div class="form-group">
                            <label class="control-label col-md-2" for="item_sample1">Music Sample 1 <span class="required">*</span> </label>
                            <div class="col-md-5">  
                                 <a href="#" id="item_sample1_btn" name="item_sample1_btn" class="item_sample1_btn check_sample" data-toggle="modal" data-target="#browsesample">Upload Music Sample1</a>
								 <span>(20 secsonds)</span>
                                <input class="form-control" id="item_sample1" name="item_sample1" type="text" disabled>
								<!--<video id="myVideo" width="320" height="176" controls>
								  <source src="http://onlinemoviehub.com/public/ab.mp3" type="audio/mp3">
								</video>-->
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-2" for="item_sample2">Music Sample 2<span class="required">*</span></label>
                            <div class="col-md-5">  
                                <a href="#" id="item_sample2_btn" name="item_sample2_btn" class="item_sample2_btn check_sample" data-toggle="modal" data-target="#browsesample">Upload Music Sample2</a>
                                <span>(20 secsonds)</span>
								<input class="form-control" id="item_sample2" name="item_sample2" type="text" disabled>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-2" for="item_music">Music<span class="required">*</span></label>
                            <div class="col-md-5">  
							<a href="#" id="item_music_btn" name="item_music_btn" class="item_music_btn check_sample" data-toggle="modal" data-target="#browsesample">Upload Music</a>
                                <input class="form-control" id="item_music" name="item_music" type="text" disabled>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2" for="item_price">Music Price<span class="required">*</span></label>
                            <div class="col-md-5">  
                                <input class="form-control" id="item_price" name="item_price" placeholder="Music Price" type="text" >
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-2" for="item_acknowlegment">Acknowlegment<span class="required">*</span></label>
                            <div class="col-md-5">  
                                 <label class="checkbox-inline"><input id="item_acknowlegment" name="item_acknowlegment" value="true" type="checkbox" > I hereby state that this music price is my work and I accept any liabilities to that may arise should from selling it.</label>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-5 col-md-offset-2">
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
                    <button type="submit" class="btn btn-primary save-img-loading">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

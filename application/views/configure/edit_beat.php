<script src="<?php echo base_url(); ?>assets/js/custom/item.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/moment.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.js"></script> 
<link href="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.css" rel="stylesheet">
<script>
    $(function () {
        var oTable = $('#edit_beat_table').dataTable();
    });
</script>
<style>.beat_image{width:50px;}
    audio {width: 200px !important;}
    .check_sample{background-image: none;}
    .beat-box label{ display: inline-block;    float: left;}
    .beat-box .beat_sample, .beat-box .project_file_name{display: inline-block;    width: 48%;}
    .beat_duration, .project_file_size{width: 16%;}
    .display_none{display:none !important;}
    .display_inline{display:inline-block !important;}

</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1>View Beat</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>   
                <div class="col-lg-12 col-md-12" id="err_edit_item_form"></div>             
                <div class="widget-content padded">
                    <div id="edit_beat1_table">
                        <div id="table_view" >  

                            <table id="edit_beat_table">
                                <thead><tr><th>S.No.</th><th>Beat Name</th><th>Beat Image</th><th> Genre</th><th>Description</th><th>Price</th><th>Sample1</th><th>Sample2</th><th>Music</th><th>Beat Status</th><th>Action</th></tr></thead><tbody>

                                    <?php
                                    if ($beat == 0) {
                                        echo 'No record found into database';
                                    } else {
                                        $i = 1;
                                        $content = '';
                                        foreach ($beat as $value) {
                                            $content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
                                            $content .= '<td class="text-center">' . $value['item_name'] . '</td>';
                                            $content .= '<td class="text-center"><a href="#" id="editBrowseImageBtn" name=' . $value['item_id'] . ' class="item_image_btn editBrowseImageBtn" data-toggle="modal" data-target="#editBrowseImage"><img class="beat_image" src="' . base_url() . 'uploads/' . $value['item_image'] . '"></a></td>';
                                            $content .= '<td class="text-center">' . $value['item_genre'] . '</td>';
                                            $content .= '<td class="text-center">' . $value['item_description'] . '</td>';
                                            $content .= '<td class="text-center">' . $value['item_price'] . '</td>';
											
                                            $content .= '<td class="text-center"><span class="edit_item_sample1_name display_none">' . $value['item_sample1_name'] . '</span>';
												$content .= '<span class="edit_item_sample1_new_name display_none">' . $value['item_sample1_new_name'] . '</span>';
												$content .= '<span class="edit_beat1_duration display_none">' . $value['beat1_duration'] . '</span>';
												$content .= '<audio controls><source src="' . base_url() . 'uploads/' . $value['item_sample1_new_name'] . '"type="audio/mpeg"></audio></td>';
												
                                            $content .= '<td class="text-center"><span class="edit_item_sample2_name display_none">' . $value['item_sample2_name'] . '</span>';
												$content .= '<span class="edit_item_sample2_new_name display_none">' . $value['item_sample2_new_name'] . '</span>';
												$content .= '<span class="edit_beat2_duration display_none">' . $value['beat2_duration'] . '</span>';
												$content .= '<audio controls><source src="' . base_url() . 'uploads/' . $value['item_sample2_new_name'] . '"type="audio/mpeg"></audio></td>';
												
                                            $content .= '<td class="text-center"><span class="edit_item_music_name display_none">' . $value['item_music_name'] . '</span>';
												$content .= '<span class="edit_item_music_new_name display_none">' . $value['item_music_new_name'] . '</span>';
												$content .= '<span class="edit_beat0_duration display_none">' . $value['beat0_duration'] . '</span>';
												$content .= '<audio controls><source src="' . base_url() . 'uploads/' . $value['item_music_new_name'] . '"type="audio/mpeg"></audio></td>';
											
											$content .= '<td class="text-center">' . $value['beat_status'] . '</td>';
                                            $content .= '<td class="text-center"><a href="#" class="edit_beat" data-toggle="modal" data-target="#my_beat_edit" name=' . $value['item_id'] . ' value=""><span class="label label-success">Edit</span></a>';
                                            $content .= '&nbsp;&nbsp;<a href="#" class="remove_beat"  name=' . $value['item_id'] . ' value=""><span class="label label-danger">Remove beat</span></a></td></tr>';
                                            $i++;
                                        }
                                        echo $content;
                                    }
                                    ?>
                                </tbody>
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model -->
<div class="modal fade" id="my_beat_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit_item_form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Edit Beat</h4>
                    <input type="hidden" name="edit_item_id" id="edit_item_id" value=""/>     
                </div>
                <div class="modal-body">
                    <div class="form-group" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="edit_item_name">Beat Name<span class="required">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="edit_item_name" name="edit_item_name" placeholder="Beat Name" type="text">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="genres">Genre<span class="required">*</span></label>
                        <div class="col-md-9">
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
						<div class="genres-error col-md-9 col-md-offset-3 clearfix">
							<div></div>
						</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="edit_item_description">Beat Description<span class="required">*</span></label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="4" col="50" id="edit_item_description" name="edit_item_description" placeholder="Beat Description"></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group beat-box" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="edit_item_sample1_new_name">Sample1<span class="required">*</span></label>
                        <div class="col-md-9">			
                            <a id="edit_item_sample1_btn" name="edit_item_sample1_btn" class="btn btn-success item_sample1_btn check_sample" data-toggle="modal" data-target="#editbrowsesample">+ Beat Sample 1</a>
                            <input class="form-control beat_sample" placeholder="Beat should be between 18 to 21 seconds" id="edit_item_sample1_name" name="edit_item_sample1_name" type="text" disabled>
                            <input class="form-control item_sample1" placeholder="Beat should be between 18 to 21 seconds" id="edit_item_sample1_new_name" name="edit_item_sample1_new_name" type="hidden">
                            <input class="beat_duration form-control display_none" placeholder="" id="edit_beat1_duration" name="edit_beat1_duration" type="text" disabled>
                        </div>
                    </div>	
                    <div class="clearfix"></div>
                    <div class="form-group beat-box" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="edit_item_sample2_new_name">Sample2</label>
                        <div class="col-md-9">			
                            <a id="edit_item_sample2_btn" name="edit_item_sample2_btn" class="btn btn-success item_sample2_btn check_sample" data-toggle="modal" data-target="#editbrowsesample">+ Beat Sample 2</a>
                            <input class="form-control beat_sample" placeholder="Beat should be between 18 to 21 seconds" id="edit_item_sample2_name" name="edit_item_sample2_name" type="text" disabled>
                            <input class="form-control item_sample2" placeholder="Beat should be between 18 to 21 seconds" id="edit_item_sample2_new_name" name="edit_item_sample2_new_name" type="hidden">
                            <input class="beat_duration form-control display_none" placeholder="" id="edit_beat2_duration" name="edit_beat2_duration" type="text" disabled>
                        </div>
                    </div>	
                    <div class="clearfix"></div>
                    <div class="form-group beat-box" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="edit_item_music_new_name">Original Beat<span class="required">*</span></label>
                        <div class="col-md-9">			
                            <a id="edit_item_music_btn" name="edit_item_music_btn" class="btn btn-success item_music_btn check_sample" data-toggle="modal" data-target="#editbrowsesample" style="width: 131px;"> + Original Beat</a>
                            <input class="form-control beat_sample" placeholder="Please upload Original Beat here" id="edit_item_music_name" name="edit_item_music_name" type="text" disabled>
                            <input class="form-control item_music" placeholder="Please upload Original Beat here" id="edit_item_music_new_name" name="edit_item_music_new_name" type="hidden">
                            <input class="beat_duration form-control display_none" placeholder="" id="edit_beat0_duration" name="edit_beat0_duration" type="text" disabled>
                        </div>
                    </div>	
                    <div class="clearfix"></div>
                    <div class="form-group beat-box display_none" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="project_file">Project File(zip)<span class="required">*</span></label>
                        <div class="col-md-9">  
                            <a id="edit_project_file_btn" name="edit_project_file_btn" class="btn btn-success project_file_btn check_sample" data-toggle="modal" data-target="#browseProjecctFile" style="width: 131px;">+ Project File</a>
                            <input class="form-control project_file_name" placeholder="Project File(Should be zip)" id="project_file_name" name="project_file_name" type="text" disabled>
                            <input class="form-control project_file_new_name" id="project_file_new_name" name="project_file_new_name" type="hidden">
                        </div>
                    </div>
                    <div class="form-group" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="edit_item_price">Beat Price<span class="required">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="edit_item_price" name="edit_item_price" placeholder="Beat Price" type="text">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------------------- Modal for Browse Image-------------------------->
<div class="modal fade" id="editBrowseImage" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Browse Image</h3>
            </div> 
            <form class="well form-inline" id="edit_upload_image" action="<?php echo base_url(); ?>configure/edit_upload_image" method="post" enctype="multipart/form-data">
                <div class="modal-body">
					<p>Image should be less then the 2MB</p>
                    <div id="head1_msg"></div>
                    <input type="hidden" name="image_item_id" id="image_item_id" value=""/> 
                    <input type="hidden" value="beat" name="image_profile" class="image_profile">
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
<div class="modal fade" id="editbrowsesample" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Browse Audio</h3>
            </div> 
            <form class="well form-inline" id="edit_upload_audio" action="<?php echo base_url(); ?>configure/edit_upload_audio" method="post" enctype="multipart/form-data">
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
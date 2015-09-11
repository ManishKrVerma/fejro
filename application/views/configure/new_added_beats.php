<script src="<?php echo base_url(); ?>assets/plugins/moment.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.js"></script> 
<link href="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/custom/feature_place.js"></script> 
<style>
audio{
	width:200px !important;	
}
</style>
<script>
    $(function() {
        var oTable = $('#edit_beat_table').dataTable();
    });
</script>
<style>.beat_image{width:50px;}</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1>View Beat</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>                
                <div class="widget-content padded">
				<div id="err_new_edit_beat">				</div>
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
												$content .= '<tr class="darker-on-hover"><td class="text-center">'. $i . '</td>';
												$content .= '<td class="text-center">' . $value['item_name'] .'</td>';
												$content .= '<td class="text-center"><img class="beat_image" src="'.base_url().'uploads/'. $value['item_image'] .'"</td>';
												$content .= '<td class="text-center">' . $value['item_genre'] .'</td>';
												$content .= '<td class="text-center">' . $value['item_description'] .'</td>';
												$content .= '<td class="text-center">' . $value['item_price'] .'</td>';
												$content .= '<td class="text-center"><audio controls><source src="'.base_url().'uploads/'.$value[ 'item_sample1_new_name'] .'"type="audio/mpeg"></audio></td>';
												$content .= '<td class="text-center"><audio controls><source src="'.base_url().'uploads/'.$value['item_sample2_new_name'] .'"type="audio/mpeg"></audio></td>';
												$content .= '<td class="text-center"><audio controls><source src="'.base_url().'uploads/'.$value['item_music_new_name'] .'"type="audio/mpeg"></audio></td>';
												$content .= '<td class="text-center">' . $value['beat_status'] .'</td>';
												$content .= '<td class="text-center"><a href="#" class="edit_beat" data-toggle="modal" data-target="#my_beat_edit" name=' . $value['item_id'] . ' value=""><span class="label label-success">Features</span></a>';
												$content .= '&nbsp;&nbsp;<a href="#" class="update_beat_info"  name=' . $value['item_id'] . ' data-toggle="modal" data-target="#update_beat_info" value=""><span class="label label-info">Approve beat</span></a>';
												if($value['project_file_new_name']){
													$content .= '&nbsp;&nbsp;<a href="'.base_url().'uploads/'. $value['project_file_new_name'].'" class="update_beat_info"  name=' . $value['item_id'] . ' value=""><span class="label label-info">Project File</span></a>';
												}
												$content .= '&nbsp;&nbsp;<a href="#" class="remove_beat"  name=' . $value['item_id'] . ' value=""><span class="label label-danger">Remove beat</span></a></td></tr>';
												 $i++;
											}
											$content .= '</tbody></table>';
											echo $content;
										}
									?>
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
            <form id="feature_place_form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Add Features Beat</h4>
                    <input type="hidden" name="item_id" id="item_id" value=""/>     
                </div>
                <div class="modal-body">
                    <div id="err_feature_place_form"></div>
					<div class="form-group" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="feature_type">Feature</label>
                        <div class="col-md-9">
                            <select class="form-control"  id="feature_type" name="feature_type" >
								<option value="0">Select Feature Place</option>
								<option value="1">1 slider</option>									
								<option value="2">2 next to slider</option>
								<option value="3">3 next down to slider</option>									
							</select>
                        </div>
                    </div>
					<div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary " value="Save" />
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Model -->
<div class="modal fade" id="update_beat_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update_beat_info_form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Update Beat Status</h4>
                    <input type="hidden" name="item_id" id="item_id" value=""/>     
                </div>
                <div class="modal-body">
                    <div id="err_feature_place_form"></div>
					<div class="form-group" style="padding: 15px 0px 15px 0px">
                        <label class="control-label col-md-3" for="beat_status">Beat Status</label>
                        <div class="col-md-9">
                            <select class="form-control"  id="beat_status" name="beat_status" >
								<option value="0">Update Beat Status</option>
								<option value="Approved">Approved</option>									
								<option value="Pending">Pending</option>
								<option value="Rejected">Rejected</option>	
								<option value="Sold beats">Sold beats</option>									
							</select>
                        </div>
                    </div>
					<div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary " value="Update" />
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script src="<?php echo base_url(); ?>assets/js/custom/my_ads.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.js"></script> 
<link href="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.css" rel="stylesheet">
<script>
    $(function () {
        var oTable = $('#ads_table').dataTable();
    });
</script>
<style>
.page-title h1 {
	display: inline-block;
    float: left;
}
.page-title button{
	margin-top: 11px;
    background: none;
    margin-right: 10px;
}
.ads_image_btn{
	background-image: none;
}
#ads_form input{
	width: 100% !important;
}
.img-preview{
	width: 200px;
}
.ads_image_pre{
	width: 60px;
}
th{    text-align: center;}
</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1>Advertisement Section</h1>
		<button class="btn btn-default pull-right addAds" data-toggle="modal" data-target="#browseNewAds">Add New Ads</button>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>
                <div class="col-lg-7 col-md-7" id="err_ads_form"></div>
                <div class="clearfix"></div>
                <div class="widget-content padded">
					 <div id="table_view" >
						<table id="ads_table">
							<thead><tr><th>S.No.</th><th>Ads Name</th><th>Ads Image</th><th> Navigation </th><th>Action</th></tr></thead><tbody>

								<?php
								if ($ads == 0) {
									echo 'No record found into database';
								} else {
									$i = 1;
									$content = '';
									foreach ($ads as $value) {
										$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
										$content .= '<td class="text-center">' . $value['ads_name'] . '</td>';
										$content .= '<td class="text-center"><a href="#" id="editBrowseImageBtn" name=' . $value['ads_id'] . ' class="ads_image_btn editBrowseImageBtn" data-toggle="modal" data-target="#editBrowseImage"><img class="ads_image_pre" src="' . base_url() . 'uploads/' . $value['ads_image'] . '"></a></td>';
										$content .= '<td class="text-center">' . $value['navigation'] . '</td>';
										$content .= '<td class="text-center"><a href="#" class="edit_ads" data-toggle="modal" data-target="#browseNewAds" name=' . $value['ads_id'] . ' value=""><span class="label label-success">Edit</span></a>';
										$content .= '&nbsp;&nbsp;<a href="#" class="remove_ads"  name=' . $value['ads_id'] . ' value=""><span class="label label-danger">Remove Ads</span></a></td></tr>';
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

<!---------------------------- Modal for Browse ads-------------------------->
<div class="modal fade" id="browseNewAds" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Add New Ads</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<form class="well form-inline" id="ads_form" method="post" enctype="multipart/form-data">
						<input class="form-control" id="ads_id" name="ads_id" value=0 type="hidden">
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="ads_name">Ads Name <span class="required">*</span></label>
							<div class="col-md-9">
								<input class="form-control" id="ads_name" name="ads_name" placeholder="Ads Name" type="text">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="ads_image">Ads Image <span class="required">*</span></label>
							<div class="col-md-9">
								<a id="ads_image_btn" name="ads_image_btn" class="btn btn-success ads_image_btn" data-toggle="modal" data-target="#browseImage">Add Image </a>
								<input class="form-control" id="ads_image" name="ads_image" class="ads_image" type="hidden">
                                <img class="img-preview display_none" src="" alt="">     
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="navigation">Add Navigation URL <span class="required">*</span></label>
							<div class="col-md-9">
								<input class="form-control" id="navigation" name="navigation" placeholder="Ads navigation" type="text">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
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
                    <input type="hidden" name="image_ads_id" id="image_ads_id" value=""/> 
                    <input type="hidden" value="ads" name="image_profile" class="image_profile">
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
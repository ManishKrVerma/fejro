<script src="<?php echo base_url(); ?>assets/js/custom/profile.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-ui.min.js"></script>
<link href="<?php echo base_url(); ?>assets/plugins/jquery-ui.min.css" rel="stylesheet">
<script>		
    $(function () {
        $(".date").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
<style>	
		.profile-lable {font-weight: 100 !important;
		}
		.form-group {line-height: 1.7; 
					color: #656565;
		}
		.profile-sub-heading h5 {color: #5D5D5D; font-weight: bolder;
		}
		.img-preview {border: 1px solid #D8D6D6; 
					  margin-bottom: 30px;
		}
		
		.control-label{padding-top: 0px !important;
		}
		.edit-btn { display: block;
					background-image: none;
					border: none;
					background-color: #C5DADD;
					width: 78%;
					text-align: center;
					margin-top: 20px;
		}
		.edit-btn:hover { 
			outline: 1px solid #EEE;
			background-color: #FFF;
			border-radius: 4px;
		}
							
</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1><?php echo $profile_detail[0]['name'];?>: Profile</h1>
    </div>	
				<div class="row profile-container">
					<div id="err_edit_profile_form"> </div>
						<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
							<a href="#" id="item_image_btn" name="item_image_btn" class="item_image_btn" data-toggle="modal" data-target="#browseImage">
								<?php if($profile_detail[0]['profile_image'] == ""){ 
								echo '<img class="img-preview" id="profile_image" name="profile_image" 
										src="'.base_url().'assets/images/default_profile.jpg" alt="" style="width: 200px;">'; 
								}else{
									echo '<img class="img-preview" id="profile_image" name="profile_image" 
										src="'.base_url() . 'uploads/' . $profile_detail[0]["profile_image"].'" alt="" style="width: 200px;">';
								}
								?>
							</a>
							
							
							<div class="form-group">
								<button class="btn btn-default edit-btn edit-profile" type="submit">Edit Profile</button>
								<button class="btn btn-default edit-btn deactive_profile" name=<?php echo $profile_detail[0]['user_id'];?>>Deactivate Profile</button>
							</div>
						</div>
						<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12"> 
						
                      <?php if ($profile_detail) { ?>
							<div class="profile-sub-heading"> <h5>Contact Information</h5> </div>
								<form id="edit-profile-form" method="post" class="form-horizontal">	
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="name">Email  <span>:</span></label>
										<div class="col-md-6">
														<span><?php echo $profile_detail[0]['email'];?></span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="profile-sub-heading"> <h5>General Information</h5> </div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="profile_name">Name <span >:</span></label>
										<div class="col-md-6">
													<span class="profile-info span-profile-name" ><?php echo $profile_detail[0]['name'];?></span>
													<input value="<?php echo $profile_detail[0]['name'];?>" placeholder="User Name" class="edit-profile-info form-control display_none" id="profile_name" name="profile_name" type="text" >
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="profile_age">Date of Birth  <span >:</span></label>
										<div class="col-md-6">
											<span class="profile-info span-profile-age "><?php echo $profile_detail[0]['profile_age'];?></span>
											<input value="<?php echo $profile_detail[0]['profile_age'];?>" placeholder="Age" class="edit-profile-info form-control display_none date" id="profile_age" name="profile_age" type="text" >
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="profile_sex">Sex  <span >:</span></label>
										<div class="col-md-6">
													<span class="profile-info span-profile-sex"><?php echo $profile_detail[0]['profile_sex'];?></span>
												<div class="edit-profile-info display_none">
													<label class="radio-inline">
													
													  <input type="radio" id="male" name="gender" class="profile-sex" value="male"  <?php echo ($profile_detail[0]['profile_sex']=='male')?'checked':''; ?>> male
													</label>
													<label class="radio-inline">
													  <input type="radio" id="female" name="gender" class="profile-sex" value="female" <?php echo ($profile_detail[0]['profile_sex']=='female')?'checked':''; ?>> female
													</label>
												</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="profile_pnumber">Phone Number  <span >:</span></label>
										<div class="col-md-6">
											<span class="profile-info span-profile-pnumber"><?php echo $profile_detail[0]['profile_pnumber'];?></span>
											<input value="<?php echo $profile_detail[0]['profile_pnumber'];?>" placeholder="Phone Number" class="edit-profile-info form-control display_none" id="profile_pnumber" name="profile_pnumber" type="text" >
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="profile_nation">Nationality  <span >:</span></label>
										<div class="col-md-6">
											<span class="profile-info span-profile-nation"><?php echo $profile_detail[0]['profile_nation'];?></span>
											<input value="<?php echo $profile_detail[0]['profile_nation'];?>" placeholder="Nationality" class="edit-profile-info form-control display_none" id="profile_nation" name="profile_nation" type="text" >
										</div>
									</div>		
									<div class="clearfix"></div>
									<div class="form-group display_none">
										<label class="control-label col-md-3 profile-lable" for="profile_country">Counrty of residence  <span >:</span></label>
										<div class="col-md-6">
											<span class="profile-info"></span>
											<input class="edit-profile-info form-control display_none" placeholder="Counrty of residence" id="profile_country" name="profile_country" type="text" >
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="profile_raddress">Residential address  <span >:</span></label>
										<div class="col-md-6">
												<span class="profile-info span-profile-raddres"><?php echo $profile_detail[0]['profile_raddress'];?></span>
												<textarea class="edit-profile-info form-control display_none" placeholder="Residential address" id="profile_raddress" name="profile_raddress"><?php echo $profile_detail[0]['profile_raddress'];?></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="profile-sub-heading"> <h5>Producer Information</h5> </div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="producer_name">Producer Name <span >:</span></label>
										<div class="col-md-6">
											<span class="profile-info span-producer-name"><?php echo $profile_detail[0]['producer_name'];?></span>
											<input value="<?php echo $profile_detail[0]['producer_name'];?>" class="edit-profile-info form-control display_none" id="producer_name" name="producer_name" placeholder="Producer Name (person, company)" type="text" >
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="producer_description">Producer Description  <span >:</span></label>
										<div class="col-md-6">
											<span class="profile-info span-producer-description"><?php echo $profile_detail[0]['producer_description'];?></span>
											<textarea class="edit-profile-info form-control display_none" id="producer_description" placeholder="Producer Description" name="profile_raddress"><?php echo $profile_detail[0]['producer_description'];?></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="control-label col-md-3 profile-lable" for="correspondence_caddress">Correspondence address   <span >:</span></label>
										<div class="col-md-6">
											<span class="profile-info span-correspondence-caddress"><?php echo $profile_detail[0]['correspondence_caddress'];?></span>
											<textarea class="edit-profile-info form-control display_none" id="correspondence_caddress" placeholder="Producer Correspondence Address" name="correspondence_caddress"><?php echo $profile_detail[0]['correspondence_caddress'];?></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6">
											<input class="btn btn-primary edit-profile-info display_none" type="submit" value="Submit" style="margin-top: 20px;">  
										</div>                            
									</div>
									<div class="clearfix"></div>
								</form>
					  <?php } ?>
                            
							
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
            <form class="well form-inline" id="upload_image" action="<?php echo base_url(); ?>configure/edit_upload_image" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="head1_msg"></div>
                    <input type="hidden" value="profile" name="image_profile" class="image_profile">
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
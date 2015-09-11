<div id="site-main">				
	<div class="page-section v1-one">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="row producer_profile">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<?php if($details[0]['profile_image']){?>
							<img style="width: 200px;" src="<?php echo base_url().'uploads/'.$details[0]['profile_image'];?>">
							<?php }else{
							echo '<img style="width: 200px;" src="'.base_url().'assets/images/default_profile.jpg">';
							}?>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<h3><strong>User Name: </strong><?php echo $details[0]['user_name'];?></h3>
							<h3><strong>Producer Name: </strong><?php echo $details[0]['producer_name'];?></h3>
							<h3><strong>Producer Description: </strong><?php echo $details[0]['producer_description'];?></h3>
							<?php if($beats_add_by_producer){?>
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
									  <h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										  Beats added by the Producer
										</a>
									  </h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body beats_added_by_producer row">
											
										<?php if($beats_add_by_producer){
											foreach ($beats_add_by_producer as $value) {
												echo '<div><div><a href="'.base_url().'beat/details/'.$value["item_id"].'"><img src="'.base_url().'uploads/'.$value["item_image"].'"> '.$value["item_name"].'</a></div>
													<div class="col-md-3 col-sm-3 col-sx-6">'.$value["added_date"].'</div>
													<div class="col-md-3 col-sm-3 col-sx-6">'.$value["item_genre"].'</div>
													<div class="col-md-3 col-sm-3 col-sx-6">'.$value["item_price"].'</div>
													<div class="col-md-3 col-sm-3 col-sx-6">'.$value["beat_status"].'</div></div>';
											}
										}?>									
									  </div>
									</div>
								  </div>
								</div>
							<?php } ?>	
						</div>						
					</div>							
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .page-section -->				
</div>

<style>
.producer_profile{margin-top:20px;}
.producer_profile h3{font-weight: 100;}
.producer_profile .panel-body img{width: 60px;margin-top: 5px;}
.page-section{min-height: 575px;}
</style>		
			
			
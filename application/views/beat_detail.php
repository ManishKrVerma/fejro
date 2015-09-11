<div class="container ">
	<div class="row margin_beatdetail" >
		<div class="col-md-3 col-lg-3"></div>
		<div class="container_inner_product col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
			<div class="product_item">
				<div class="p-image">
					<img src="<?php echo base_url() .'uploads/'. $details[0]['item_image']; ?>	" width="278" height="278" alt="" />
					
				</div>
			</div>
			<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Comment</button>
		</div>
		<div class="container_inner_product col-xs-12 col-sm-12 col-md-5 col-lg-5">
			<div class="product_item_desc">
				<span class="cat "><h2 style="display:inline;"><?php print_r($details[0]['item_name'] ); ?> <?php print_r($details[0]['beat0_duration'] ); ?> </h2>m</span>
				
				<h4> Beat Gener Type : <?php print_r($details[0]['item_genre'] ); ?></h4>
				<h3 class="price">
					Price: 	<span class="amount"><img src="<?php echo base_url().'assets/images/euro.png'?>"/>.<?php print_r($details[0]['item_price'] ); ?></span>
				</h3>
				<?php if($details[0]['item_sample1_new_name']){?>
				<div class="p-info beat1">
					<div class="p-action ">
						<div>Sample 1: 
							<a href="#" class="add-to-wishlist first-beat">						
								<span>Play </span>
								<i class="fa fa-play "></i>
							</a>
						</div>
					</div>
					<audio class="display_none" controls><source src="<?php echo base_url().'uploads/'.$details[0]['item_sample1_new_name'] ?> " type="audio/mpeg"> </audio>
				</div>
				<?php } ?>
				<?php if($details[0]['item_sample2_new_name']){?>
				<div class="p-info beat2">
					<div class="p-action">
						<div>Sample 2: 
							<a href="#" class="add-to-wishlist second-beat" name="<?php echo $session_id ?>">
								<span>Play</span>
								<i class="fa fa-play "></i>
							</a>
						</div>
					</div>
					<audio class="display_none" controls><source src="<?php echo base_url().'uploads/'.$details[0]['item_sample2_new_name'] ?> " type="audio/mpeg"> </audio>
				</div>	
				<?php } ?>
				<br/>
				<br/>
				<div class="description_width"><p> Description : <?php print_r($details[0]['item_description'] ); ?></p> </div>	

				<div class="p-action ">
					<a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>
				</div>
				
				<div class="p-action ">
					<a href="#" class="buy_now"> Buy now </a>
				</div>
				<div class="clearfix"></div>
				<div class="producer_details">
					<?php 
						if($details[0]['producer_name']){
							echo '<a href="'.base_url().'profile/producer/'.$details[0]["user_id"].'"><p><strong>Producer Name: </strong>'.$details[0]["producer_name"].'</p></a>';
						}else if($details[0]['user_name']){
							echo '<p><strong>Producer/User Name: </strong>'.$details[0]["user_name"].'</p>';
						}
						if($details[0]['producer_description']){
							echo '<p><strong>Producer Description: </strong>'.$details[0]["producer_description"].'</p>';
						}
						if($details[0]['user_id']){?>
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
								  <h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									  Beats added by the same Producer
									</a>
								  </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								  <div class="panel-body">
									<?php if($producer_beat_details){
										foreach ($producer_beat_details as $value) {
											echo '<div><a href="'.base_url().'beat/details/'.$value["item_id"].'"><img src="'.base_url().'uploads/'.$value["item_image"].'"> '.$value["item_name"].' {'.$value["item_genre"].'}</a></div>';
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
	</div>
</div>

<?php
$this->load->view('modal/comments');
?>
<style>
.producer_details{margin-top: 20px;}
.producer_details p{font-size: 16px;color: #000;}
.panel-body img{width: 60px;margin: 5px;}
</style>
	
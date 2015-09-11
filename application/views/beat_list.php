			<div id="site-main">				
				<div class="page-section v1-one">
					<div class="container">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="row">
									<?php 
										if($details){
											foreach($details as $value){												
											echo '<div class="product col-md-4 col-sm-4 style-2">
													<div class="p-image">
														<img src="'.base_url().'uploads/'.$value['item_image'].'" width="170" height="139" alt="'.$value['item_name'].'" />
														<div class="p-action">
															<a href="#" class="add-to-wishlist">
																<i class="fa fa-play"></i>
																<span>Play</span>
															</a>
															<a href="'.base_url().'beat/details/'.$value['item_id']. '" class="quickview">
																<i class="fa fa-eye"></i>
																<span>View</span>
															</a>
														</div>
													</div>
													<div class="p-info">
														<h4><a href="'.base_url().'beat/details/'.$value['item_id']. '">'.$value['item_name'].'</a></h4>
														<span class="price">
															<span class="amount"><img src="'.base_url().'assets/images/euro.png"> '. $value['item_price'].'</span>
														</span>
														<div class="p-action" name="'.$value['item_name'].'" id="'. $value['item_price'].'">
															<a href="#" name="'.$session_id.'" id="'.$value['item_id'].'" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>
														</div>
													</div>
													<audio class="display_none" controls><source src="'.base_url().'uploads/'.$value['item_sample1_new_name'].'" type="audio/mpeg"> </audio>
												</div>';
											}
										} else{
											echo "No beats found in this Category";
										}
									?>
								</div>
							
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .page-section -->
				
			</div>
			
			
			
			<div id="site-main">
				<div class="page-section">
					<div class="container">
						<div class="row" style="margin-top: 30px;">
							<div class="col-md-3"></div>
							<div class="col-md-6 col-sm-8 rev_slider_wrapper_outer">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		
								  <!-- Wrapper for slides -->
								  <div class="carousel-inner" role="listbox">
									<?php
										if($feature1){
											$i =0;
											foreach($feature1 as $value){
											if($i==0){
												echo '<div class="item active">';
											}else{
												echo '<div class="item">';
											}
											$i++;
												echo '
													  <img src="'.base_url().'uploads/'.$value['item_image'].'" alt="">
													  <div class="carousel-caption">
														<p class="carousel1">'.$value['item_name'].' : <img src="'.base_url().'assets/images/euro.png">'.$value['item_price'].'</p><br/>
														<a href="'.base_url().'beat/details/'.$value['item_id']. '" class="quickview_header">
															<i class="fa fa-eye"></i>
															<span>Know More</span>
														</a>
													  </div>
													</div>';												
											}
										}
									?>
								  </div>

								  <!-- Controls -->
								  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
								
								<div class="rev_slider_wrapper fullwidthbanner-container custom-arrow" style="display:none;">
									<div class="tp-banner">
										<ul><!-- SLIDE  -->										
											<?php
												if($feature1 == 10){
													foreach($feature1 as $value){
														echo '<li class="style-2" data-transition="fade" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
																<!-- MAIN IMAGE -->
																<img src="'. base_url().'uploads/'.$value['item_image'].'"  alt=""  data-bgposition="right bottom" data-bgfit="normal" data-bgrepeat="no-repeat">
																<!-- LAYERS -->

																<!-- LAYER NR. 1 -->
																<div class="tp-caption text-title tp-fade tp-resizeme" 
																	 data-x="30"  data-y="45" data-speed="600" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" 
																	style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">'.$value['item_name'].' : <img src="'.base_url().'assets/images/euro.png" style="background-color: transparent;">'.$value['item_price'].'
																</div>

																<!-- LAYER NR. 2 -->
																<div class="tp-caption text-decoration tp-fade tp-resizeme" 
																	 data-x="30" data-y="80" data-speed="600" data-start="1300" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" 
																	style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">'.$value['item_description'].' 
																</div>

																<!-- LAYER NR. 3 -->
																<div class="p-image tp-caption text-btn tp-fade tp-resizeme" 
																	 data-x="30" data-y="108" data-speed="600" data-start="1800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" 
																	style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
																		<div class="p-action">
																			<a href="'.base_url().'beat/details/'.$value['item_id']. '" class="quickview">
																				<i class="fa fa-eye"></i>
																				<span>View</span>
																			</a>
																		</div>
																</div>
																<audio class="display_none" controls><source src="'.base_url().'uploads/'.$value['item_sample1_new_name'].'" type="audio/mpeg"> </audio>
															</li>';
													}
												}											
											?>
										</ul>
									</div><!-- tp-banner -->
								</div><!-- .rev_slider_wrapper -->
							</div><!-- col-md-6 -->
							<div class="col-md-3 col-sm-4 xs-text-center">
								
								<?php 
									if(count($feature2ads) > 0){
										echo '<a href="'.base_url().'uploads/'.$feature2ads[0]["navigation"].'"><img class="mgb10 xs-mgt10" src="'.base_url().'uploads/'.$feature2ads[0]["ads_image"].'" width="270" height="270" alt=" /></a>';
									}else{
										echo '<a href="'.base_url().'"><img class="mgb10 xs-mgt10" src="'.base_url().'assets/images/logo.jpg" width="270" height="270" alt="" /></a>';
									}
									
									if(count($feature2ads) > 1){
										echo '<a href="'.base_url().'uploads/'.$feature2ads[1]["navigation"].'"><img class="mgb10 xs-mgt10" src="'.base_url().'uploads/'.$feature2ads[1]["ads_image"].'" width="270" height="270" alt="Beatsrack" /></a>';
									}else{
										echo '<a href="'.base_url().'"><img class="mgb10 xs-mgt10" src="'.base_url().'assets/images/logo.jpg" width="270" height="270" alt="Beatsrack" /></a>';
									}
								?>
							</div><!-- col-md-3 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .page-section -->
							

				<div class="page-section v1-two pdt80">
					<div class="container">
						<div class="row">
							<div class="col-md-6">				
													
								<div class="wr-element">
								 	<div class="product style-1">
										<div class="p-image">
											<span class="p-badge">Latest Deals</span>
											<img src="<?php echo base_url() .'uploads/'. $feature3[0]['item_image']; ?>	" width="278" height="278" alt="" />
										</div>
										<div class="p-info">
											<span class="cat "><?php print_r($feature3[0]['item_genre'] ); ?></span>
											<h4><a href="<?php echo base_url();?>beat/details/<?php print_r($feature3[0]['item_id'] ); ?>"><?php print_r($feature3[0]['item_name'] ); ?></a></h4>
											
											<span class="price">
												<span class="amount"><img src="<?php echo base_url().'assets/images/euro.png'?>"/>.<?php print_r($feature3[0]['item_price'] ); ?></span>
											</span>
											<div class="star-rating display_none ">
												<span style="width:60%"></span>
											</div>
											<div class="p-action" name="<?php print_r($feature3[0]['item_name'] ); ?>" id="<?php print_r($feature3[0]['item_price'] ); ?>">
												<a href="#" name="<?php echo $session_id ?>" id="<?php print_r($feature3[0]['item_id'] ); ?>"  class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>
												<a href="#" class="add-to-wishlist">
													<i class="fa fa-play "></i>
													<span>Play</span>
												</a>
												<a href="<?php echo base_url();?>beat/details/<?php print_r($feature3[0]['item_id'] ); ?>" class="quickview">
													<i class="fa fa-eye "></i>
													<span>View</span>
												</a>
											</div>
											<audio class="display_none" controls><source src="<?php echo base_url().'uploads/'.$feature3[0]['item_sample1_new_name'] ?> " type="audio/mpeg"> </audio>
											<div class="p-countdown display_none"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<h5 class="title-1 textup">featuring</h5>
									<div class="product-slider navtop">
										<?php if($feature3[1]){
										$feature3_i = 0;
											foreach($feature3 as $value){
												if($feature3_i != 0){
													echo '<div class="wr-element">
														<div class="product style-2">
															<div class="p-image">
																<img src="'.base_url().'uploads/'. $value["item_image"].'" width="170" height="139" alt="" />
																<div class="p-action">
																	<a href="#" class="add-to-wishlist">																
																		<i class="fa fa-play"></i>
																		<span>Play</span>
																		<audio class="display_none" controls> <source src="'.base_url().'uploads/'.$value['item_sample1_new_name'] .'"type="audio/mpeg"></audio> 
																	</a>
																	<a data-lightbox="roadtrip" href="'.base_url().'beat/details/'.$value['item_id'].'" class="quickview">
																		<i class="fa fa-eye"></i>
																		<span>View</span>
																	</a>
																</div>
																<audio class="display_none" controls><source src="'.base_url().'uploads/'.$value['item_sample1_new_name'] .'" type="audio/mpeg"> </audio>
															</div>
															<div class="p-info">
																<h4><a href="'.base_url().'beat/details/'.$value['item_id'].'">'.$value['item_name'].'</a></h4>
																<span class="price">
																	<span class="amount">'.$value['item_price'].'</span>
																</span>
																<div class="p-action">
																	<a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>
																</div>
															</div>
														</div>
													</div>';
												}
												$feature3_i++;
											}
										}?>
									</div><!-- .product-slider -->
								</div>
							</div><!-- .col-md-6 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .page-section -->

				<div class="page-section pdt50">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="product-tabs has-border right">
									<ul class="nav nav-tabs" role="tablist">
										<li><h5 class="title-1 textup">New Arrivals</h5></li>
										<li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All products</a></li>
										<li role="presentation"><a href="#dance" aria-controls="dance" role="tab" data-toggle="tab">Dance</a></li>
										<li role="presentation"><a href="#hiphop" aria-controls="hiphop" role="tab" data-toggle="tab">Hip Hop</a></li>
										<li role="presentation"><a href="#rnb" aria-controls="rnb" role="tab" data-toggle="tab">R n B</a></li>
                                        <li role="presentation"><a href="#raggae" aria-controls="raggae" role="tab" data-toggle="tab">Reggae</a></li>
										<li role="presentation"><a href="#rock" aria-controls="rock" role="tab" data-toggle="tab">Rock</a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active fade in" id="all">
											<div class="products columns-6">
											<?php 
												if($all_beat){
													foreach($all_beat as $value){														
														
													echo '<div class="product style-2">
															<div class="p-image new-image">
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
											</div><!-- .products.columns-6 -->
										</div><!-- #all.tab-pane -->
										<div role="tabpanel" class="tab-pane fade" id="dance">
											<div class="products columns-6">
												<?php 
												if($dance){
													foreach($dance as $value){														
														
													echo '<div class="product style-2">
															<div class="p-image new-image">
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
											</div><!-- .products.columns-6 -->
										</div><!-- #dresses.tab-pane -->
										<div role="tabpanel" class="tab-pane fade" id="hiphop">
											<div class="products columns-6">
												<?php 
												if($Rap){
													foreach($Rap as $value){														
														
													echo '<div class="product style-2">
															<div class="p-image new-image">
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
											</div><!-- .products.columns-6 -->
										</div><!-- #cameras.tab-pane -->
										<div role="tabpanel" class="tab-pane fade" id="rnb">
											<div class="products columns-6">
												<?php 
												if($Soul){
													foreach($Soul as $value){														
														
													echo '<div class="product style-2">
															<div class="p-image new-image">
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
											</div><!-- .products.columns-6 -->
										</div><!-- #watches.tab-pane -->
										<div role="tabpanel" class="tab-pane fade" id="raggae">
											<div class="products columns-6">
												<?php 
												if($reggae){
													foreach($reggae as $value){														
														
													echo '<div class="product style-2">
															<div class="p-image new-image">
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
											</div><!-- .products.columns-6 -->
										</div><!-- #accessories.tab-pane -->
										<div role="tabpanel" class="tab-pane fade" id="rock">
											<div class="products columns-6">
												<?php 
												if($Rock){
													foreach($Rock as $value){														
														
													echo '<div class="product style-2">
															<div class="p-image new-image">
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
											</div><!-- .products.columns-6 -->
										</div><!-- #accessories.tab-pane -->
									</div><!-- .tab-content -->
								</div><!-- .product-tabs -->
							</div><!-- .col-md-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .page-section -->
			</div><!-- #site-main -->
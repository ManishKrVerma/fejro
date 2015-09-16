<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Beatsrack</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg" type="image/jpeg" />
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
		<!-- Place favicon.ico in the root directory -->
		
		<!-- Fontello -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontello.css">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

		<!-- Owl Carousel -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.transitions.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.css">

		<!-- Revolution slider style -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/rev-settings.css">

		<!-- Responsive Menu -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dl-menu.css">
	
		<!-- WooPlus Elements -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/lightbox.css">

		<!-- WooPlus Elements -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/elements.css">

		<!-- Theme Options -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-options.css">

		<!-- Main Style -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

		<!-- Right to left style -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/rtl.css">

		<!-- Color schemes -->
		<link id="wooplus-colors" rel="stylesheet" href="<?php echo base_url();?>assets/css/colors/brown.css">

		<!-- Responsive Style -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">
		
		
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	</head>
	<body>
		<div class="wrapper">
			<header id="site-header" class="v1">

				<div class="top">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<nav id="top-menu">
									<ul class="menu">
										<?php if ( $session_id != null){?>
											<li class="menu-item"><a href="<?php echo base_url();?>configure/profile"><i class="fa fa-cog"></i> My Account</a></li>
											
										<?php } else{ ?>
											<li class="menu-item"><a href="<?php echo base_url();?>login"><i class="fa fa-smile-o"></i> Login / Register</a></li>
										<?php } ?>
											<li class="menu-item" style="display:none;"><a href="#"><i class="fa fa-heart-o"></i> Wishlist</a></li>
											<li class="menu-item"><a href="shop_checkout.html"><i class="fa fa-credit-card"></i> Checkout</a></li>
									</ul><!-- .menu -->
								</nav><!-- #top-menu -->
								<div class="dl-menuwrapper mobile-menu">
									<button class="dl-trigger"><i class="fa fa-bars"></i></button>
									<ul class="dl-menu">
										<?php if( $session_id !=null){?>
											<li class="menu-item"><a href="#"><i class="fa fa-cog"></i> My Account</a></li>
										<?php } else{ ?>
											<li class="menu-item"><a href="#"><i class="fa fa-smile-o"></i> Login / Register</a></li>
										<?php } ?>
											<li class="menu-item" style="display:none;"><a href="#"><i class="fa fa-heart-o"></i> Wishlist</a></li>
											<li class="menu-item" style="display:none;"><a href="#"><i class="fa fa-heart-o"></i> Produer</a></li>
											<li class="menu-item"><a href="shop_checkout.html"><i class="fa fa-credit-card"></i> Checkout</a></li>
									</ul><!-- .menu -->
								</div><!-- /dl-menuwrapper -->
							</div><!-- .col-md-8 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .top -->

				<div class="mid">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-xs-12 col-sm-2">
								<div class="logo">
									<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.jpg" alt="Beatsrack" width="100" height="35" /></a>
								</div><!-- .logo -->
							</div><!-- .col-md-4 -->
							<div class="col-md-6 col-sm-7 col-xs-12">
								<nav class="navbar navbar-default search-cat">
									<div class="collapse navbar-collapse">
									<!--
										<ul class="nav navbar-nav">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle0" data-toggle="dropdown0" role="button" aria-expanded="false">Search Category</a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="#">Hip Hip/Rap</a></li>
													<li><a href="#">EDM</a></li>
													<li><a href="#">Raggae</a></li>
													<li class="divider"></li>
													<li><a href="#">Rock</a></li>
													<li class="divider"></li>
													<li><a href="#">Pop</a></li>
													<li><a href="#">World</a></li>
												</ul>
											</li>
										</ul>
										<form class="navbar-form navbar-left" role="search">
											<div class="input-group">
											<input type="text" class="form-control" placeholder="Search Keyword...">
											<a href="#" class="input-group-addon"><i class="fa fa-search"></i></a>
											</div>
										</form>
										-->
<form action="<?php echo base_url('search/beat');?>">
	<select name="category">
	<?php echo $getCategory = trim($this->input->get('category')); ?>
	<option value="">Select Category</option>
	<option value="country"  <?php echo ($getCategory == 'country' ? 'selected':'')?> >country</option>
	<option value="Opera" <?php echo ($getCategory == 'Opera' ? 'selected':'')?> >Opera</option>
	<option value="pop" <?php echo ($getCategory == 'pop' ? 'selected':'')?> >pop</option>
	</select>
	<input type="text"  name="beat" value="<?php echo $this->input->get('beat'); ?>" >
	<button type="submit">Search </button>
</form>
										
									</div><!-- .navbar-collapse -->
								</nav><!-- .navbar-default -->
							</div><!-- .col-md-6 -->
							<div class="col-md-2 col-sm-3 col-xs-12">
								<div class="shop-cart">
									<a href="#" class="cart-control">
										<?php if($cart_info){
											$total_item = 0;
											$total_pri = 0.00;
											foreach($cart_info as $value){
												$total_pri += $value['beat_price'];
												$total_item++;
											}
											echo '<span class="cart-item">
												<img src="'.base_url().'assets/images/icons/cart.png" alt="Cart" width="22" height="20" />
												<span class="cart-number">'.$total_item.'</span>
											</span><!-- .cart-item -->
											<span class="cart-price">Cart: <img src="'.base_url().'assets/images/euro.png"><span>'.$total_pri.'</span></span>';
											
										}else{?>												
											<span class="cart-item">
												<img src="<?php echo base_url();?>assets/images/icons/cart.png" alt="Cart" width="22" height="20" />
												<span class="cart-number">0</span>
											</span><!-- .cart-item -->
											<span class="cart-price">Cart: <img src="<?php echo base_url();?>assets/images/euro.png"><span>0.00</span></span>
										<?php }?>
									</a><!-- .cart-control -->
									<div class="shop-item">
										<div class="shop-item-title">Your shoping cart <a class="x-cart" href="#"><i>X</i></a></div>
										<div class="widget_shopping_cart_content">
											<ul class="cart_list" name="0.00">
												<?php if($cart_info){
													$total_price = (float)(0.00);
													foreach($cart_info as $value){
														$total_price += $value['beat_price'];
														echo'<li id='.$value['cart_id'].'>
																<a title="Remove this item" class="remove_item" href="#">X</a>
																<a href="#">'.$value['beat_name'].'</a>
																<span class="quantity">1 x <span class="amount"><span>'.$value['beat_price'].'</span></span></span>
															</li>';
													}
													echo '</ul>';
													echo '<p class="total"><strong>Subtotal:</strong> <span class="amount"><img src="'.base_url().'assets/images/euro.png"/><span>'.$total_price.'</span></span></p>';
												}else{?>
													</ul>
													<p class="total"><strong>Subtotal:</strong> <span class="amount"><img src="<?php echo base_url().'assets/images/euro.png'?>"/><span>00.00</span></span></p>
											
												<?php }?>
												<!--<li>
													<a title="Remove this item" class="remove_item" href="#">x</a>
													<a href="id">Printed Hooded Sweatshirt</a>
													<span class="quantity">1 x <span class="amount"><span>9.00</span></span></span>
												</li>
											</ul>--><!-- end cart_list -->
											<!-- <p class="total"><strong>Subtotal:</strong> <span class="amount"><img src="<?php echo base_url().'assets/images/euro.png'?>"/><span>00.00</span></span></p>-->
											<p class="buttons">
												<a class="button wc-forward display_none" href="shop_cart.html">View Cart</a>
												<a class="button checkout wc-forward" href="shop_checkout.html">Checkout</a>
											</p>
										</div>
									</div><!-- .shop-item -->
								</div><!-- .shop-cart -->
							</div><!-- .col-md-2 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .mid -->

				<div class="bot">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-xs-4">
								<nav id="left-menu" class="expand">
									<button class="menu-trigger"><i class="fa fa-bars"></i> Shop by category</button>
									<ul class="menu">
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/blues"><i class="fa fa-cog"></i> Blues</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/country"><i class="fa fa-heart-o"></i> Country</a></li>
										<li class="menu-item" style="display:none;"><a href="shop.html"><i class="fa fa-credit-card"></i> Electronic Dance Music</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/electronic"><i class="fa fa-ge"></i> Electronic</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/rap"><i class="fa fa-connectdevelop"></i> Hip Hop/Rap</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/jazz"><i class="fa fa-diamond"></i> Jazz</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/opera"><i class="fa fa-shirtsinbulk"></i> Opera</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/pop"><i class="fa fa-street-view"></i> Pop</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/soul"><i class="fa fa-anchor"></i> R n B/Soul</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/reggae"><i class="fa fa-archive"></i> Reggae</a></li>
										<li class="menu-item menu_item_992"><a href="<?php echo base_url();?>category/beat/rock"><i class="fa fa-bell"></i> Rock</a></li>
										<li class="menu-item menu_item_992"><a href="<?php echo base_url();?>category/beat/vocal"><i class="fa fa-futbol-o"></i> Vocal</a></li>
										<li class="menu-item menu_item_992"><a href="<?php echo base_url();?>category/beat/world"><i class="fa fa-smile-o"></i> World</a></li>

									</ul><!-- .menu -->
								</nav><!-- #left-menu -->
								<div class="dl-menuwrapper mobile-menu">
									<button class="dl-trigger"><i class="fa fa-bars"></i></button>
									<ul class="dl-menu">
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/blues"><i class="fa fa-cog"></i> Blues</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/country"><i class="fa fa-heart-o"></i> Country</a></li>
										<li class="menu-item" style="display:none;"><a href="shop.html"><i class="fa fa-credit-card"></i> Electronic Dance Music</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/electronic"><i class="fa fa-ge"></i> Electronic</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/rap"><i class="fa fa-connectdevelop"></i> Hip Hop/Rap</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/jazz"><i class="fa fa-diamond"></i> Jazz</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/opera"><i class="fa fa-shirtsinbulk"></i> Opera</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/pop"><i class="fa fa-street-view"></i> Pop</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/soul"><i class="fa fa-anchor"></i> R n B/Soul</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/reggae"><i class="fa fa-archive"></i> Reggae</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/rock"><i class="fa fa-bell"></i> Rock</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/vocal"><i class="fa fa-futbol-o"></i> Vocal</a></li>
										<li class="menu-item"><a href="<?php echo base_url();?>category/beat/world"><i class="fa fa-smile-o"></i> World</a></li>
									</ul>
								</div><!-- /dl-menuwrapper -->
							</div><!-- .col-md-4 -->
							<div class="col-md-8 col-xs-8">
								<nav id="main-menu">
									<ul class="menu">
										<li class="menu-item active">
											<a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a>
										</li>
										<li class=""><a href="<?php echo base_url();?>category/new_arrivals">New Arrivals</a></li>
										<li class=""><a href="<?php echo base_url();?>category/beat/rap">Hip Hop</a></li>
										<li class=""><a href="<?php echo base_url();?>contact">Contact</a></li>
									</ul><!-- .menu -->
								</nav><!-- #main-menu -->
							</div><!-- .col-md-8 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .bot -->
			
			</header><!-- #site-header -->

$('document').ready(function(){
	var APP_URL = 'http://localhost/fejro/'
	/* 
     * this script is use to play and pause music on click
     */
	 
	$("body").on("click",".add-to-wishlist",function(){
		$("audio").trigger("pause");
		/*Need to login before 2nd song*/
		var beat_position = $(this).attr('class').split("add-to-wishlist ")[1];
		if(beat_position == 'second-beat'){
			if(!$(this).attr('name')){
				if (!confirm("You Need to login to listen second beat")) {
					return false;
				}else{
					window.location.href = APP_URL+'login';
				}				
			}
		}
	
	
		$(this).parent().parent().parent().find("audio").trigger("play");
		
		$(this).find("span").text("pause");
		$(this).find("i").removeClass('fa-play').addClass('fa-pause');
		$(this).removeClass("add-to-wishlist").addClass("stop_music");
		var myThis = $(this);
	
		setTimeout(function(){
			console.log(myThis);
			myThis.find("span").text("play");
			myThis.removeClass("stop_music");
			myThis.addClass("add-to-wishlist");
		}, 20000);

	});

	$("body").on("click",".stop_music",function(){
		$(this).parent().parent().parent().find("audio").trigger("pause");
		$(this).find("span").text("play");
		$(this).find("i").removeClass('fa-pause').addClass('fa-play');
		$(this).removeClass("stop_music");
		$(this).addClass("add-to-wishlist");
		
	});
	
	/**
	 * This script is used to manage add to cart.
	 */
	$('body').on('click','.add-to-cart',function(){
		var beat_id = $(this).attr('id');
		var user_id = $(this).attr('name');
		var beat_name = $(this).parent().attr('name');
		var beat_price = $(this).parent().attr('id');
		var flag = 'add';
		/*if(!user_id){
			if (!confirm("You need to login first")) {
				return false;
			}
			window.location.href = APP_URL+'login';
			return false;
		}*/
		$('.shop-cart').find('.cart-number').text(parseInt($('.shop-cart').find('.cart-number').text()) + 1);
		$('.shop-cart').find('.cart-price span').text(((parseFloat($('.shop-cart').find('.cart-price span').text())) + parseFloat(beat_price)).toFixed(2));
		$('.total').find('.amount span').text(parseFloat($('.total').find('.amount span').text()) + parseFloat(beat_price));
		$.post(APP_URL + 'beat/update_cart_by_id', {
                beat_id: beat_id,
                user_id: user_id,
                beat_name: beat_name,
                beat_price: beat_price,
				flag:flag,				
            },
            function (response) {
				if(response.status != 200){
					alert('Some thing went worng, Please refresh the page and try again.');
				}else{
					var li_cart = '<li id='+ response.cart_id +'><a title="Remove this item" class="remove_item" href="#">x</a><a href="'+APP_URL+ 'beat/details/'+ beat_id+'">'+beat_name+'</a><span class="quantity">1 x <span class="amount"><span>'+beat_price+'</span></span></span></li>';
					$('.cart_list').append(li_cart);
					alert('Added to cart successfully!');
				}
			
			},'json');
		
		
	});
	
	/**
	 * This script is used to manage add to cart.
	 */
	$('body').on('click','.remove_item',function(){
		$(this).closest('li').remove();			
		
		$('.shop-cart').find('.cart-number').text(parseInt($('.shop-cart').find('.cart-number').text()) - 1);
		$('.shop-cart').find('.cart-price span').text(((parseFloat($('.shop-cart').find('.cart-price span').text())) - parseFloat($(this).closest('li').find('.amount span').text())).toFixed(2));
		$('.total').find('.amount span').text((parseFloat($('.total').find('.amount span').text()) - parseFloat($(this).closest('li').find('.amount span').text())).toFixed(2));
		/*keep cart box open*/
		$('.shop-item').addClass('active');
		$('body').addClass('shop-cart-open');
		
		var flag = 'remove';
		console.log($(this).closest('li').attr('id'));
		var cart_id = parseInt($(this).closest('li').attr('id'));
		$.post(APP_URL + 'beat/update_cart_by_id', {
                cart_id: cart_id,
				flag:flag,				
            },
            function (response) {
				if(response.status != 200){
					alert('Some thing went worng, Please refresh the page and try again.');
				}else{
					
				}
			
			},'json');
	});
	
	
	
})
<?php
if($this->session->userdata('userID') != ''){ ?>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">
				<div class="comment-error"></div>
			<form class='lcomment' id="comment_form" action="" method="post" novalidate="novalidate"><br/>
				comment : <textarea placeholder="Enter Your comment" name="comment"></textarea><br/>
				<input type="hidden" name="item" value="<?php echo $this->uri->segment('3');?>">
				<button type="submit" >Comment</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
<?php }else{ ?>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">
				<div class="comment-error"></div>
			<form class='scomment' id="comment_form" action="" method="post" novalidate="novalidate"><br/>
				Email :<input type="text" name="email" id="email" placeholder="Enter your email"  autocomplete="off"/><br/>
				Phone :<input type="number" name="phone" id="phone" placeholder="Enter your Phone number"/><br/>
				comment : <textarea placeholder="Enter Your comment" name="comment"></textarea><br/>
				<input type="hidden" name="item" value="<?php echo $this->uri->segment('3');?>">
				<button type="submit" >Comment</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
<?php } ?> 

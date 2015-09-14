<style>
.error{
	color: rgba(239, 8, 8, 0.79);
}
</style>
<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
<div class="modal-content">
	 <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h2 class="modal-title" id="myModalLabel">Type Your Comment</h2>
	 </div>
	 <div class="modal-body">
		<br>
		<div class="clearfix"></div>
		<div class="col-md-12">
		<div class="comment-error"></div>
			  <form  class='form <?php echo ($this->session->userdata('userID') != '')?'lcomment':'scomment';?>' id="comment_form" method="POST"  novalidate="novalidate" >
				<input type="hidden" name="item" value="<?php echo $this->uri->segment('3');?>">
					<?php if($this->session->userdata('userID') == ''){ ?>
				  <div class="form-group">
					<label for="email">Email address:</label>
					<input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email">
				  </div>

				  <div class="form-group">
					<label for="phone">Phone:</label>
					<input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Your Phone Number">
				  </div>
					<?php } ?>
				  <div class="form-group">
					<label for="comment">Comment:</label>
					<textarea class="form-control" placeholder="Enter Your Comment" name="comment"></textarea>
				  </div>
				 
				 <div class="row form-group">
					
					<div class="col-md-12">
					   <button type="submit" class="btn btn-success pull-right">Comment</button>
					</div>
				 </div>
				 
			  </form>
		   </div>
		
	 </div>
	 <div class="clearfix"></div>
  </div>
  </div>
  </div>

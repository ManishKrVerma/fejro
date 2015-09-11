<div class="row">
	<div class="col-md-3">
		<ul>
			<?php
			$myBeats = 0;		
			$myapproved = 0;
			$mypending = 0;
			$myrejected = 0;
			$mysold = 0;
			if($allBeats){
				foreach($allBeats as $beat){
					if($beat['added_by'] == $this->session->userdata('userID')){
						if($beat['beat_status'] == 'Approved')
							$myapproved++;
						else if($beat['beat_status'] == 'Pending')
							$mypending++;
						else if($beat['beat_status'] == 'Rejected')
							$myrejected++;
						else if($beat['beat_status'] == 'Sold beat')
							$mysold++;
						
						$myBeats++;
					}
				}
			};
			?>
			<li>My Beats This months:<?php echo $myBeats; ?></li>
			<li>My Approved Beats This months: <?php echo $myapproved; ?></li>
			<li>My Pending Beats This months: <?php echo $mypending; ?></li>
			<li>My Rejected Beats This months: <?php echo $myrejected; ?></li>
			<li>My Sold Beats This months: <?php echo $mysold; ?></li>
		</ul>
		<a href="<?php echo base_url('configure/edit_beat');?>">View All Beats</a>
	</div>

</div>

<div class="row">
	<div class="col-md-6">
	
		Inbox 
		<ul>
		<?php 
		if(!empty($allInbox)){
			foreach($allInbox as $inbox){ ?>
				<li class="<?php echo $inbox['status'] == 0?'unread':'';?>">
					<div>
						<span><?php echo substr($inbox['message'],0,50); ?>
							<ul>
								<li>
									From: <?php echo ($inbox['firstname'] =='' && $inbox['lastname'] =='' ? 'Unknown' : $inbox['firstname'].' '.$inbox['lastname'] )?>
								</li>
								<li>
									Message: <?php echo $inbox['message'];?>
								</li>
								<li>
									Date: <?php echo date('F d, Y',strtotime($inbox['date_time']));?>
								</li>
								<li>
									<a data-toggle="modal" data-target="#<?php echo $inbox['message_id'];?>">Reply</a>
								</li>
							</ul>
						</span>
					</div>
				</li>
				<div id="<?php echo $inbox['message_id'];?>" class="modal fade" role="dialog">
				  <div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>
					  <div class="modal-body">
							<div class="comment-error"></div>
						<form id="form<?php echo $inbox['message_id'];?>" action="<?php echo base_url();?>configure/save_reply" method="post" novalidate="novalidate"><br/>
							comment : <textarea placeholder="Enter Your comment" name="comment"></textarea><br/>
							<input type="hidden" name="item" value="<?php echo $inbox['message_id'];?>">
							<button type="submit" class="reply-model" >Comment</button>
						</form>
					  </div>
					</div>
				  </div>
				</div>
			<?php } 
		}else{
			echo 'No inbox Message.';
		}?>
		</ul>
	</div>
	<div class="col-md-6">
		Outbox
		<ul>
		<?php 
		if(!empty($alloutbox)){
			foreach($alloutbox as $outbox){ ?>
				<li class="<?php echo $outbox['status'] == 0?'unread':'';?>">
					<div>
						<span><?php echo substr($outbox['message'],0,50); ?>
							<ul>
								<li>
									To: <?php echo ($outbox['firstname'] =='' && $outbox['lastname'] =='' ? 'Unknown' : $outbox['firstname'].' '.$outbox['lastname'] )?>
								</li>
								<li>
									Message: <?php echo $outbox['message'];?>
								</li>
								<li>
									Date: <?php echo date('F d, Y',strtotime($outbox['date_time']));?>
								</li>
							</ul>
						</span>
					</div>
				</li>
			<?php } 
		}else{
			echo 'No sent message.';
		}?>
		</ul>
	</div>
</div>

<script src="<?php echo base_url().'assets/plugins/jquery.validate.min.js';?>"></script>	
<script src="<?php echo base_url();?>/assets/js/custom/reply.js"></script>

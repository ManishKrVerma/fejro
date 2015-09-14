<div class="container-fluid">
	<div class="col-md-4">
		<?php 
		$Beats = 0;
		$approved = 0;
		$pending = 0;
		$rejected = 0;
		$sold = 0;
		if($allBeats){
			foreach($allBeats as $beat){
				if($beat['beat_status'] == 'Approved')
					$approved++;
				else if($beat['beat_status'] == 'Pending')
					$pending++;
				else if($beat['beat_status'] == 'Rejected')
					$rejected++;
				else if($beat['beat_status'] == 'Sold beat')
					$sold++;
				
				$Beats++;
			}
		};
		?>
	   <div class="panel panel-primary custom-panel">
		  <div class="panel-heading text-center">
			 <h3 class="panel-title">My Racks ( <?php echo $Beats; ?> )</h3>
		  </div>
		  <div class="panel-body">
			 <div class="progress-group">
				<span class="progress-text">Approved</span>
				<span class="progress-number"><b><?php echo $approved; ?></b>/<?php echo $Beats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
				</div>
			  </div><div class="progress-group">
				<span class="progress-text">Pending</span>
				<span class="progress-number"><b><?php echo $pending; ?></b>/<?php echo $Beats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
				</div>
			  </div><div class="progress-group">
				<span class="progress-text">Rejected</span>
				<span class="progress-number"><b><?php echo $rejected; ?></b>/<?php echo $Beats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
				</div>
			  </div><div class="progress-group">
				<span class="progress-text">Sold</span>
				<span class="progress-number"><b><?php echo $sold; ?></b>/<?php echo $Beats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
				</div>
			  </div>
		  </div>
	   </div>
	</div>
	<div class="col-md-4">
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
		<div class="panel panel-primary custom-panel">
		  <div class="panel-heading text-center">
			 <h3 class="panel-title">My Beats ( <?php echo $myBeats; ?> )</h3>
		  </div>
		  <div class="panel-body">
			 <div class="progress-group">
				<span class="progress-text">Approved</span>
				<span class="progress-number"><b><?php echo $myapproved; ?></b>/<?php echo $myBeats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
				</div>
			  </div><div class="progress-group">
				<span class="progress-text">Pending</span>
				<span class="progress-number"><b><?php echo $mypending; ?></b>/<?php echo $myBeats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
				</div>
			  </div><div class="progress-group">
				<span class="progress-text">Rejected</span>
				<span class="progress-number"><b><?php echo $myrejected; ?></b>/<?php echo $myBeats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
				</div>
			  </div><div class="progress-group">
				<span class="progress-text">Sold</span>
				<span class="progress-number"><b><?php echo $mysold; ?></b>/<?php echo $myBeats; ?></span>
				<div class="progress sm">
				  <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
				</div>
			  </div>
		  </div>
	   </div>
	</div>
	<div class="col-md-4">
               <div class="panel panel-primary custom-panel">
                  <div class="panel-heading text-center">
                     <h3 class="panel-title">Users</h3>
                  </div>
                  <div class="panel-body">
                     <div class="progress-group">
                        <span class="progress-text">Users</span>
                        <span class="progress-number"><b><?php echo count($allusers); ?></b></span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                      </div>
                  </div>
               </div>
               
               
               
            </div>
</div>

<div class="container-fluid">
	<div class="col-md-12">
		<h3>Message</h3>
		<hr>
	</div>
	<div class="col-xs-3"> <!-- required for floating -->
		<!-- Nav tabs -->
		<ul class="nav nav-tabs tabs-left">
		<li class="active"><a href="#inbox" data-toggle="tab" aria-expanded="true">Inbox</a></li>
		<li class=""><a href="#outbox" data-toggle="tab" aria-expanded="false">Outbox</a></li>
		</ul>
	</div>
	<div class="col-xs-9">
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="inbox">
				<div class="panel panel-default">
				<?php 
				if(!empty($allInbox)){
					foreach($allInbox as $inbox){ ?>
					<div class="panel panel-default <?php echo $inbox['status'] == 0?'unread':'';?>">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#inbox<?php echo $inbox['message_id'];?>" class="collapsed" aria-expanded="false">Subject : <?php echo substr($inbox['message'],0,100); ?></a>
							</h4>
						</div>
						<div id="inbox<?php echo $inbox['message_id'];?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-9">
										<strong>From:</strong> <?php echo ($inbox['firstname'] =='' && $inbox['lastname'] =='' ? 'Unknown' : $inbox['firstname'].' '.$inbox['lastname'] )?>
									</div>
									
									<div class="col-md-3 text-right">
										<em><?php echo date('F d, Y',strtotime($inbox['date_time']));?><em>
										</em></em>
									</div>
									<div class="col-md-12">
										<hr>
									</div>
									<div class="col-md-12">
										<p><?php echo $inbox['message'];?></p>
										<hr>
									</div>
									<div class="col-md-12">
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo $inbox['message_id'];?>">Reply</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="<?php echo $inbox['message_id'];?>" class="modal fade" role="dialog">
					  <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						 <div class="modal-body">
							<div class="col-md-12">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<div class="comment-error"></div>
								  <form id="form<?php echo $inbox['message_id'];?>" action="<?php echo base_url();?>configure/save_reply" method="post" novalidate="novalidate">
									<input type="hidden" name="item" value="<?php echo $inbox['message_id'];?>">
									  <div class="form-group">
										<label for="comment">Comment:</label>
										<textarea type="email" class="form-control" placeholder="Enter Your Comment" name="comment"></textarea>
									  </div>
									 
									 <div class="row form-group">
										<div class="col-md-12">
										   <button type="submit" class="btn btn-success pull-right reply-model" >Comment</button>
										</div>
									 </div>
									 
								  </form>
							   </div>
						 </div>
						 <div class="clearfix"></div>
					  </div>
					  </div>
					</div>
				<?php } 
				}else{
					echo 'No inbox Message.';
				}?>
			</div>
		</div>
			<div class="tab-pane" id="outbox">
				<div class="panel panel-default ">
				<?php
					if(!empty($alloutbox)){
						foreach($alloutbox as $outbox){ ?>
						<div class="panel panel-default ">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#outbox<?php echo $outbox['message_id'];?>" class="collapsed" aria-expanded="false">Subject : <?php echo substr($outbox['message'],0,100); ?></a>
								</h4>
							</div>
							<div id="outbox<?php echo $outbox['message_id'];?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-9">
											<strong>To:</strong> <?php echo ($outbox['firstname'] =='' && $outbox['lastname'] =='' ? 'Unknown' : $outbox['firstname'].' '.$outbox['lastname'] )?>
										</div>
										
										<div class="col-md-3 text-right">
											<em><?php echo date('F d, Y',strtotime($inbox['date_time']));?><em>
											</em></em>
										</div>
										<div class="col-md-12">
											<hr>
										</div>
										<div class="col-md-12">
											<p><?php echo $inbox['message'];?></p>
											<hr>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } 
					}else{
						echo 'No Outbox Message.';
					}?>
			</div>
		</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<script src="<?php echo base_url().'assets/plugins/jquery.validate.min.js';?>"></script>	
<script src="<?php echo base_url();?>/assets/js/custom/reply.js"></script>

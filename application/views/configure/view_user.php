<script src="<?php echo base_url(); ?>assets/js/custom/login.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/moment.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.js"></script> 
<link href="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.css" rel="stylesheet">
<script>
    $(function() {
        var oTable = $('#edit_user_table').dataTable();
    });
</script>
<style>.user_image{width:50px;}</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1>View User</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>                
                <div class="widget-content padded">
                    <div id="edit_usesar_table">
                        <div id="table_view" >  
								<div id="err_admin_edit_user"> </div>
								<table id="edit_user_table">
								<thead><tr><th>S.No.</th><th>E-mail</th><th>Name</th><th>Age</th><th>Gender</th><th>Mobile No.</th><th>Nation</th><th>Residential Address</th><th>Correspondence Address</th><th>Image</th><th>Action</th></tr></thead><tbody>
								
									<?php
										if ($user == 0) {
										echo 'No record found into database';
										} else {
											$i = 1;
											$content = '';
											foreach ($user as $value) {
												$content .= '<tr class="darker-on-hover"><td class="text-center">'. $i . '</td>';
												$content .= '<td class="text-center">' . $value['email'] .'</td>';
												$content .= '<td class="text-center">' . $value['name'] .'</td>';
												$content .= '<td class="text-center">' . $value['profile_age'] .'</td>';
												$content .= '<td class="text-center">' . $value['profile_sex'] .'</td>';
												$content .= '<td class="text-center">' . $value['profile_pnumber'] .'</td>';
												$content .= '<td class="text-center">' . $value['profile_nation'] .'</td>';
												$content .= '<td class="text-center">' . $value['profile_raddress'] .'</td>';
												$content .= '<td class="text-center">' . $value['profile_caddress'] .'</td>';
												$content .= '<td class="text-center"><img class="user_image" src="'.base_url().'uploads/'. $value['profile_image'] .'"</td> ';
												$content .= '<td class="text-center"><a href="#" class="remove_beat"  name=' . $value['FK_userid_id'] . ' value=""><span class="label label-danger">Deactivate</span></a></td></tr>';
												 $i++;
											}
                                $content .= '</tbody></table>';
                                echo $content;
                            }
                            ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




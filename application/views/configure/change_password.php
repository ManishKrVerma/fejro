<script src="<?php echo base_url(); ?>assets/js/custom/change_password.js"></script> 
<style>
    .form-group {
        margin-bottom: 5px;
        margin-top: 10px;
    }
</style>
<div class="container-fluid main-content">
    <div class="page-title">
        <h1>Change Password</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget-container fluid-height clearfix"><br/>
                <div id="err_change_password_form"></div>
                <div class="widget-content padded outer_wrapper">
                    <form id="change_password_form" method="post" class="form-horizontal">

                        <input type="hidden" value="" id="current_user_id" name="current_user_id"/>

                        <div class="form-group">
                            <label class="control-label col-md-2" for="old_password">Old Password</label>
                            <div class="col-md-5">
                                <input class="form-control" id="old_password" name="old_password" placeholder="Old Password" type="password">
                            </div>
                        </div>
                        <label for="old_password" class="error col-md-offset-2" generated="true"></label>
                        <div id="err_old_password" class="col-md-offset-2"></div>

                        <div class="form-group">
                            <label class="control-label col-md-2" for="new_password">New Password</label>
                            <div class="col-md-5">
                                <input class="form-control" id="new_password" name="new_password" placeholder="New Password" type="password">
                            </div>
                        </div>
                        <label for="new_password" class="error col-md-offset-2" generated="true"></label>
                        <div id="err_new_password" class="col-md-offset-2"></div>

                        <div class="form-group">
                            <label class="control-label col-md-2" for="confirm_password">Confirm Password</label>
                            <div class="col-md-5">
                                <input class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" type="password">
                            </div>
                        </div>
                        <label for="confirm_password" class="error col-md-offset-2" generated="true"></label>
                        <div id="err_confirm_password" class="col-md-offset-2"></div>

                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-2">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">  
                            </div>                            
                        </div>                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

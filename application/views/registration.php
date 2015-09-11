 
<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Beatsrack | Registration</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg" type="image/jpeg" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap3/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/constant.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.validate.min.js"></script>
        <!-- Custom css --> 
        <link href="<?php echo base_url(); ?>assets/css/custom/login.css" rel='stylesheet' type='text/css' />
		<script src="<?php echo base_url(); ?>assets/js/custom/login.js"></script>
		
    <div class="container">    
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div class="forgot_pass"><a href="<?php echo base_url(); ?>forgot_password">Forgot password?</a></div>
                </div>     

                <div class="panel-body">
                    <div id="headMsg" class="col-sm-12"></div>
                    <div class="clearfix"></div>                          
                    <form id="userLoginForm" class="form-horizontal" role="form">                                    
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="loginUserEmail" type="text" class="form-control" name="loginUserEmail" id="loginUserEmail" value="" placeholder="username or email">                                        
                        </div>
                        <div class="input-group marTop30">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="loginPassword" type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="password">
                        </div>
                        <div class="input-group display_none">
                            <div class="checkbox">
                                <label><input id="login-remember" type="checkbox" name="remember" id="remember" value="1"> Remember me</label>
                            </div>
                        </div>
                        <div class="form-group marTop30">
                            <div class="col-sm-12 controls">
                                <input id="btn-login" type="submit" class="btn btn-success" value="Login">
                                <a style="display:none;" id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control signUpBtn">
                                <div>Don't have an account! 
                                    <a href="#" onClick="$('#loginbox').hide();
                                            $('#signupbox').show()">
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>    
                    </form>  
                </div>                     
            </div>  
        </div>
        <div id="signupbox" class="marTop50 display_none mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div class="signUpTitle">
                        <a id="signinlink" href="#" onclick="$('#signupbox').hide();
                                $('#loginbox').show()">Sign In</a></div>
                </div>  
                <div class="panel-body" >
					<div id="err_signup_form"> </div>
                    <form id="signupform" class="form-horizontal" role="form">
                        <div id="signupalert" class="display_none alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">First Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="password" class="col-md-3 control-label">Confirm Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="cfm_passwd" name="cfm_passwd" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Button -->                                        
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                <span style="margin-left:8px;"></span>  
                            </div>
                        </div>

                        <div class="SignUpFacebook form-group display_none">
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>


</body>
</html>
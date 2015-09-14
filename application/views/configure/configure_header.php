<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

		<title>Beatsrack</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg" type="image/jpeg" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery2/jquery-2.0.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-ui.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.form.min.js"></script>

        <!--        <link rel="stylesheet" href="/resources/demos/style.css">-->
        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap3/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap3/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/jquery.dataTables.min.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap3/css/simple-sidebar.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap3/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.blockUI.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/custom/configure_main.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/custom/configure_main.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/constant.js"></script> 
		<link href="<?php echo base_url(); ?>assets/css/custom/dashboard.css" rel="stylesheet">

    </head>
    <body>
		<nav class="navbar navbar-default" style="background-image: none;border-radius: 0;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Beatsract</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<li class="li_configure" ><a href="<?php echo base_url(); ?>configure">Dashboard</a></li>
		<?php if($this->session->userdata('role') == 'admin'){?>
		<li class="li_new_add_beats"><a href="<?php echo base_url(); ?>configure/my_rack">My Rack</a></li>
		<li class="li_my_ads"><a href="<?php echo base_url(); ?>configure/my_ads">My Ads</a></li>
		<li class="li_view_user"><a href="<?php echo base_url(); ?>configure/view_user">Users List</a></li>
		<?php } ?>
		<li class="li_add_beat"><a href="<?php echo base_url(); ?>configure/add_beat">Add New Beat</a></li>
		<li class="li_edit_beat"><a href="<?php echo base_url(); ?>configure/edit_beat">Edit Beat Info</a></li>
		<li class="li_buyer_activity"style="display:none;"><a href="<?php echo base_url(); ?>configure/buyer_activity">Buyer Activity</a></li>
		<li class="li_seller_activity"style="display:none;"><a href="<?php echo base_url(); ?>configure/seller_activity">Seller Activity</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('userName'); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="li_profile"><a href="<?php echo base_url(); ?>configure/profile">Profile</a></li>
            <li class="li_change_password"><a href="<?php echo base_url(); ?>configure/change_password">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a class="logout" href="Javascript:Void(0);">LOG OUT</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <div id="wrapper">  <!-- Sidebar -->
           
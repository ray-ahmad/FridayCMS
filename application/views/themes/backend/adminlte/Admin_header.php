<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<style>
		.paginate_button {
			border-radius: 0 !important;
		}
	</style>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/ionicons/css/ionicons.min.css">
<?php if (isset($datatables_id)) : ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/datatables/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
<?php elseif (isset($codemirror_id)) : ?>
    <!-- Codemirror -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/codemirror/theme/monokai.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/codemirror/addon/hint/show-hint.css">
<?php endif; ?>	
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/select2/css/select2.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/iCheck/all.css">
<?php
	// Supaya yang di hp gak berat...
	if (!$this->agent->is_mobile()) : 
?>
    <!-- animate.css -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>plugins/animate.css/animate.min.css">
<?php endif; ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>AdminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>AdminLTE/dist/css/skins/skin-green.css">
    <!-- Custom PlayCMS Stylesheet -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>AdminLTE/dist/css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="fixed skin-green sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo FRI_WEBSITE ?>" target="_blank" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Fri</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Fri</b> FridayCMS</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="http://localhost/playcms_ci/play-assets/image/Hydrangeas1.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $user->username ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $user->full_name ?>
                      <small>@<?php echo $user->username ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Front End</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo admin_url("user/profile/") ?>" class="btn btn-default btn-flat">My Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo admin_url("logout/") ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
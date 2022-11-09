<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  Halaman Login
 *  --------------------------------------------------------------------------------
 *
 *  Menampilkan form login sesuai yang diminta controller Admin dan user.
 */
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FridayCMS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo assets_plug_url("bootstrap/css/bootstrap.min.css") ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo assets_plug_url("font-awesome/css/font-awesome.min.css") ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo assets_plug_url("ionicons/css/ionicons.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo assets_url("AdminLTE/dist/css/AdminLTE.min.css") ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo assets_plug_url("iCheck/all.css") ?>">
    <!-- animate.css -->
    <link rel="stylesheet" href="<?php echo assets_plug_url("animate.css/animate.min.css") ?>">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo animated tada infinite">
        <a href="<?php echo FRI_WEBSITE ?>" target="_blank"><b>Friday</b>CMS</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body animated zoomIn">
		<?php 
			if(validation_errors() != NULL) :
		?>
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!</h4>
		<?php echo validation_errors() ?>
		</div>
		<?php
			elseif ($this->session->has_userdata("per") and $this->session->userdata("per") == "slh_user") : 
		?>

		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!</h4>
			Username yang Kamu Masukkan Tidak Terdaftar/Salah! Pastikan Kamu Sudah Mengisi Semua Form dengan Benar!
		</div>	
		<?php
			elseif ($this->session->has_userdata("per") and $this->session->userdata("per") == "slh_pass") : 
		?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!</h4>
			Password yang Kamu Masukkan Tidak Sesuai/Salah dengan Usename-mu! Pastikan Kamu Sudah Mengisi Semua Form dengan Benar!
		</div>	
		<?php
			endif;
		?>
	  <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value("username") ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!--<div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div> /.col -->
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        <a href="#">I forgot my password</a><br>
        <a href="<?php echo admin_url("register/") ?>" class="text-center">Register a new membership</a><br><br>
		<a class="pull-right" href="<?php echo BASE_URL;?>">Or Back to Front End &nbsp; <i class="fa fa-arrow-right"></i></a><br>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo assets_plug_url("jQuery/jQuery-2.1.4.min.js") ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo assets_plug_url("bootstrap/js/bootstrap.min.js") ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo assets_plug_url("iCheck/icheck.min.js") ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

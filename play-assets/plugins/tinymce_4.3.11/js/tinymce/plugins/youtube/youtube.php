<?php

$system_path = "../../../../../../../system";
	define('BASEPATH', $system_path);
	require "../../../../../../../play-config/config.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YouTube</title>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>plugins/tinymce_4.3.11/js/tinymce/plugins/youtube/css/style.css">	
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>AdminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>AdminLTE/dist/css/skins/_all-skins.min.css">
	<!--[if lt IE 9]>
	    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
  <body style="background-color: #ffffff !important;">
        <div id="page-content" style="min-height:auto !important; padding:0px !important;">
			<div class="block full" id="template-container" style="border:none !important;"></div>
        </div>
  </body>
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo ASSETS_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo ASSETS_URL; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo ASSETS_URL; ?>plugins/tinymce_4.3.11/js/tinymce/plugins/youtube/js/main.js"></script>
 
</html>

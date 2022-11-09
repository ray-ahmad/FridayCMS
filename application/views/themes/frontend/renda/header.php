<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="<?php echo $description ?>">
		<meta name="author" content="">
		<link rel="shortcut icon" href="<?php echo $favicon ?>">
		<title><?php echo $title ?></title>
		<!-- Bootstrap core CSS -->
		<link href="<?php echo assets_plug_url("bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
		<link href="<?php echo assets_plug_url("font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="<?php echo assets_url("renda/css/jquery.bxslider.css") ?>" rel="stylesheet">
		<link href="<?php echo assets_url("renda/css/style.css") ?>" rel="stylesheet">
		<style>

		</style>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo BASE_URL ?>"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="<?php echo cat_url("sukses") ?>">Sukses</a></li>
						<li><a href="#contact">Travel</a></li>
						<li><a href="#contact">Fashion</a></li>
						<li><a href="about.html">Tentang Saya</a></li>
						<li><a href="about.html">Contact</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-reddit"></i></a></li>
					</ul>

				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container">
			<header>
				<a href="<?php echo BASE_URL ?>"><img src="<?php echo $logo ?>"></a>
			</header>
			<?php if ($page != "page") : ?>
			<section>
				<a href="https://iklan.ngiklaninadservices.com/diklik/<?php echo base64_encode(787877877) ?>/<?php echo base64_encode(789045732) ?>/" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" class="img-responsive" src="http://localhost:8080/playcms_ci/play-assets/image/ad-long.jpg"></a>
			</section>
			<?php endif ?>
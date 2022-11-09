<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$this->load->view("themes/frontend/{$this->frontend_theme}/header");
?>
		<section>
			<div class="row">
				<div class="col-md-8">
					<article class="blog-post">
						<div class="blog-post-image">
							<?php
								$no_img = assets_url("{$this->frontend_theme}/images/750x500-1.jpg");
								$img = ($post->image !== NULL) ? get_image($post->image, $no_img) : $no_img;
							?>
							<img src="<?php echo $img ?>" alt="">
						</div>
						<div class="blog-post-body">
							<h2><?php echo $post->title ?></h2>
							<div class="post-meta"><span>by <?php echo $post->pub_name ?></span>/<span><i class="fa fa-clock-o"></i><?php echo $post->date_posted ?></span>/<span><i class="fa fa-line-chart"></i> <?php echo $post->hits ?></span></div>
							<div class="blog-post-text">
								<a href="https://iklan.ngiklaninadservices.com/diklik/<?php echo base64_encode(787877877) ?>/<?php echo base64_encode(789675792) ?>/" target="_blank"><img style="float: left;" class="img-responsive" src="http://localhost:8080/playcms_ci/play-assets/image/ad-square.png"></a>
								<?php echo $post->content ?>
							</div>
						</div>
					</article>
					<section class="blog-post">
						<!--<div class="blog-post-body">-->
							<h1>Berikan Komentar</h1>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Nama*</label>
										<input type="text" class="form-control" placeholder="Nama Lengkap">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Email*</label>
										<input type="email" class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Website</label>
										<input type="text" class="form-control" placeholder="Website">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label>Komentar*</label>
										<textarea class="form-control" placeholder="Komentar mu disini" style="height: 200px;"></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-black pull-right">Submit!</button>
									</div>
								</div>
							</div>
						<!--</div>-->
					</section>
					<section class="blog-post" id="comment">
						<h1><?php echo $this->com->count_comments($post->id) ?></h1>
						<!-- Comment -->
						<div class="media" id="comment-5">
							<a class="pull-left" href="#">
								<img class="media-object img-circle" src="http://localhost:8080/playcms_ci/play-assets/renda/images/avatar.png" style="width: 64px; height: 64px;">
							</a>
							<div class="media-body">
								<h4 class="media-heading">Start Bootstrap
									<small>August 25, 2014 at 9:30 PM</small>
								</h4>
								<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
							</div>
						</div>
					</section>
				</div>
<?php
	$this->load->view("themes/frontend/{$this->frontend_theme}/sidebar");
	$this->load->view("themes/frontend/{$this->frontend_theme}/footer");
?>

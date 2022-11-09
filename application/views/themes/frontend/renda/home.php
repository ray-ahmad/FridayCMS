<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$this->load->theme("header");
	$hot_posts = $this->post->get_all_hot_posts(7);
	if ($hot_posts->num_rows() > 0) :
?>
			<section class="main-slider">
				<ul class="bxslider">
<?php
		foreach ($hot_posts->result() as $hot_post) :
			$no_img = assets_url("renda/images/1140x500-1.jpg");
			if ($hot_post->image !== NULL)
				$img = get_image($hot_post->image, $no_img);
			else
				$img = $no_img;
			$title = cut_text($hot_post->title, 50);
?>
					<li>
						<div class="slider-item">
							<img src="<?php echo $img ?>" title="<?php echo $title ?>" class="img-responsive">
							<h2>
								<a href="<?php echo post_url($hot_post->sef_url) ?>" title="<?php echo $title ?>"><?php echo $title ?></a>
							</h2>
						</div>
					</li>
<?php
		endforeach;
?>
				</ul>
			</section>
<?php
	endif;
?>
			<section>
				<div class="row">
					<div class="col-md-8">
					<!--<ul class="pagination pagination-flat">
						<li><a href="">!SS</a></li>
						<li><a href="">!SS</a></li>
						<li><a href="">!SS</a></li>
						<li class="active"><a href="">!SS</a></li>
					</ul>-->
						<?php
							$new_posts = $this->post->get_all_posts("DESC", "Y", NULL, 5);
							if ($new_posts->num_rows() > 0) :
								foreach ($new_posts->result() as $new_post) :
									$no_img = assets_url("renda/images/750x500-1.jpg");
									if ($new_post->image !== NULL)
										$img = get_image($new_post->image, $no_img);
									else
										$img = $no_img;
						?>
						<article class="blog-post">
							<div class="blog-post-image">
								<a href="<?php echo post_url($new_post->sef_url) ?>"><img src="<?php echo $img ?>"></a>
							</div>
							<div class="blog-post-body">
								<h2><a href="<?php echo post_url($new_post->sef_url) ?>"><?php echo cut_text($new_post->title, 32) ?></a></h2>
								<div class="post-meta"><span>by <a href="#"><?php echo $new_post->pub_name ?></a></span>/<span><i class="fa fa-tasks"></i> <a href="<?php echo cat_url($new_post->cat_sef_url) ?>"><?php echo $new_post->category ?></a></span>/<span><i class="fa fa-comment-o"></i> <a href="#">97 Komentar</a></span></div>
								<p><?php echo character_limiter(strip_tags($new_post->content), 150, "...") ?></p>
								<a href="<?php echo post_url($new_post->sef_url) ?>"><div class="btn-black pull-right">Continue Reading</div></a>
							</div>
						</article>
						<?php endforeach ?>
						<div class="text-center">
							<a class="btn-black" href="<?php echo posts_url() ?>"><!--<div class="btn-black">-->View More Posts<!--</div>--></a>
						</div>
						<?php endif ?>
					</div>
<?php
	$this->load->theme("sidebar");
	$this->load->theme("footer");
?>
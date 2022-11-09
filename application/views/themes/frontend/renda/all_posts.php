<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$this->load->theme("header");
?>
			<section>
				<div class="row">
					<div class="col-md-8">
						<?php
							if ($posts_data->num_rows() > 0) :
								foreach ($posts_data->result() as $post_data) :
									$no_img = assets_url("renda/images/750x500-1.jpg");
									if ($post_data->image !== NULL)
										$img = get_image($post_data->image, $no_img);
									else
										$img = $no_img;
						?>
						<article class="blog-post">
							<div class="blog-post-image">
								<a href="<?php echo post_url($post_data->sef_url) ?>"><img src="<?php echo $img ?>"></a>
							</div>
							<div class="blog-post-body">
								<h2><a href="<?php echo post_url($post_data->sef_url) ?>"><?php echo cut_text($post_data->title, 32) ?></a></h2>
								<div class="post-meta"><span>by <a href="#"><?php echo $post_data->pub_name ?></a></span>/<span><i class="fa fa-tasks"></i> <a href="<?php echo cat_url($post_data->cat_sef_url) ?>"><?php echo $post_data->category ?></a></span>/<span><i class="fa fa-comment-o"></i> <a href="#">343 Komentar</a></span></div>
								<p><?php echo character_limiter(strip_tags($post_data->content), 150, "...") ?></p>
								<a href="<?php echo post_url($post_data->sef_url) ?>"><div class="btn-black pull-right">Continue Reading</div></a>
							</div>
						</article>
						<?php endforeach ?>
						<ul class="pagination pagination-flat">
							<?php echo $this->pagination->create_links() ?>
						</ul>
						<?php else : ?>
						There Are No Post have been Published Here!
						<?php endif ?>
					</div>
<?php
	$this->load->theme("sidebar");
	$this->load->theme("footer");
?>
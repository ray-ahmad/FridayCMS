<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$this->load->view("themes/frontend/{$this->frontend_theme}/header");
?>
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-body">
							<h2><?php echo $pagedata->title ?></h2>
							<div class="blog-post-text">
								<?php echo $pagedata->content ?>
							</div>
						</div>
					</article>
				</div>
<?php
	$this->load->view("themes/frontend/{$this->frontend_theme}/footer");
?>
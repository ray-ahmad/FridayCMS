<?php
	defined("BASEPATH") or exit("No direct script access allowed!");

?>
		<section class="content-header">
			<h1>
				<?php echo $this->lang->line("edit_post") ?>
				<small>FridayCMS</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
				<li class="active"><a href="<?php echo $this->to_post ?>"><i class="fa fa-tasks"></i> <?php echo $this->lang->line("edit_post") ?></a></li>
			</ol>
		</section>

		<section class="content">
			<form action="" method="post" enctype="multipart/form-data" id="form-edit">
				<input type="hidden" id="post_id" value="<?php echo $post->id ?>">
				<div class="row">
					<div class="col-md-8">
						<div class="box box-success">
							<div class="box-header with-border">
								<div class="box-tools pull-right">
									<a href="<?php echo post_url($post->sef_url) ?>" class="btn btn-box-tool" target="_blank" data-toggle="tooltip" title="<?php echo $this->lang->line("view_post") ?>"><i class="fa fa-eye text-green"></i></a>
								</div>
							</div>
							<div class="box-body">
								<?php echo ($categories_data == 0) ? '<div class="form-group"><label class="text-red">' . $this->lang->line("alert_no_cat") . '</label></div>' : "" ?>
								<div class="form-group">
									<label><?php echo $this->lang->line("post_title") ?> *</label>
									<input type="text" title="<?php echo $this->lang->line("post_title") ?>" name="title" id="title" class="form-control" placeholder="<?php echo $this->lang->line("title_placeholder") ?>" value="<?php echo $post->title ?>" required>
								</div>
								<div class="form-group">
									<label><?php echo $this->lang->line("sef_url") ?> </label> <span class="pull-right msg-sef" style="display: none;"></span>
									<?php if (!$this->agent->is_mobile()) : ?><div class="input-group">
										<div class="input-group-addon"><?php echo post_url() ?></div><?php endif ?>
										<input type="text" name="sefurl" id="sefurl" class="form-control" placeholder="<?php echo $this->lang->line("sef_placeholder") ?>" value="<?php echo $post->sef_url ?>">
										<?php if (!$this->agent->is_mobile()) : ?><div class="input-group-addon">/</div>
									</div><?php endif ?>
									<p class="help-block"><?php echo $this->lang->line("sef_url_help") ?></p>
								</div> 
								<div class="form-group">
									<label><?php echo $this->lang->line("content") ?> *</label>
									<textarea class="form-control" id="<?php echo $tinymce_id ?>" name="content" style="height: 350px !important;"><?php echo htmlentities($post->content) ?></textarea>
								</div>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div>
					<div class="col-md-4">
						<div class="box-group" id="accordion">
							<div class="panel box box-primary">
								<div class="box-header with-border">
									<h4 class="box-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
										<?php echo $this->lang->line("post_general_info") ?>
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse in">
									<div class="box-body">
									<?php if ($categories_data == 0) : ?>
										<div class="form-group">
											<label>
											<?php
												$cat_link_help = array("[link]", "[/link]");
												$cat_link_help_2 = array('<a href="' . admin_url("post/category/create/") . '" target="_blank">', '</a>');
												echo str_replace($cat_link_help, $cat_link_help_2, $this->lang->line("post_alert_not_have_cat"));
											?>
											</label>
										</div>
									<?php
										else :
									?>
										<div class="form-group">
											<label><?php echo $this->lang->line("post_category") ?> *</label>
											<select name="category" class="form-control select2" style="width: 100%;" required>
												<option value="" <?php echo (set_value("category") !== NULL) ? "" : "selected" ?>>==== <?php echo $this->lang->line("post_select_cat") ?> ====</option>
									<?php 
											foreach($categories_data as $cat) :
												if ($cat->id == $post->category_id) :
									?>
												<option value="<?php echo $cat->id; ?>" selected><?php echo $cat->name; ?></option>
									<?php 
												else :
									?>
												<option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
									<?php
												endif;
											endforeach;
									?>
											</select>
										</div><!-- /.form-group -->
									<?php  endif ?>
										<div class="form-group">
											<label><?php echo $this->lang->line("post_tag") ?></label>
											<select name="tag_id[]" class="form-control select2" multiple="" data-placeholder="======= <?php echo $this->lang->line("post_select_tag") ?> =======" style="width: 100%;">
									<?php
										$tag_id = explode(", ", $post->tag_id);
										foreach ($tags as $tag) :
									?>
											<option value="<?php echo $tag->id ?>" <?php echo (in_array($tag->id, $tag_id)) ? "selected" : "" ?>><?php echo $tag->title ?></option>
									<?php endforeach ?>
											</select>
										</div><!-- /.form-group -->
										<div class="form-group">
											<label><?php echo $this->lang->line("image") ?></label>
												<div class="input-group">
													<input class="form-control" type="text" name="image" value="<?php echo $post->image ?>" id="input_img">
													<span class="input-group-btn">
														<a class="btn btn-info btn-flat" data-toggle="modal" data-target="#upload_img"><?php echo $this->lang->line("select_upload_img") ?></a>
													</span>
												</div>
											<p class="help-block"><?php echo $this->lang->line("post_image_help") ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="panel box box-primary">
								<div class="box-header with-border">
									<h4 class="box-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
											<?php echo $this->lang->line("meta") ?>
										</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="box-body">
										<div class="form-group">
											<label><?php echo $this->lang->line("meta_keywords") ?></label>
											<input type="text" name="keywords" class="form-control" placeholder="<?php echo $this->lang->line("meta_key_placeholder") ?>" value="<?php echo $post->keywords ?>">
										</div>	
										<div class="form-group">
											<label><?php echo $this->lang->line("meta_description") ?></label>
											<textarea name="description" class="form-control" placeholder="<?php echo $this->lang->line("meta_desc_placeholder") ?>" style="height: 100px;"><?php echo $post->description ?></textarea>
											<p class="help-block"><?php echo $this->lang->line("post_meta_description_help") ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn-edit-sub btn btn-primary btn-flat" <?php echo ($categories_data == 0) ? "disabled" : ""; ?>><?php echo $this->lang->line("edit_post") ?>!</button>
				</div>
			</form>
		</section>
		<div id="upload_img" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">	
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="modal-title"><?php echo $this->lang->line("select_upload_img") ?></h3>
					</div>
					<div class="modal-body">
						<iframe src="<?php echo assets_plug_url("responsive_filemanager/filemanager/dialog.php?type=1&field_id=input_img&img=Y") ?>" style="width: 100%; height: 410px;" frameborder="0"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> Tutup Modal!</button>
					</div>
				</div>
			</div>
		</div>
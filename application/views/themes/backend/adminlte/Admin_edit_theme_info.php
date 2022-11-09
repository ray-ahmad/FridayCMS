<?php
	defined("BASEPATH") or exit("No direct script access allowed!");

?>
		<section class="content-header">
			<h1>
				Edit Post
				<small>PlayCMS</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
				<li class="active"><a href="<?php echo $this->to_post ?>"><i class="fa fa-tasks"></i> Semua Post</a></li>
			</ol>
		</section>

		<section class="content">
			<form action="" method="post" enctype="multipart/form-data" id="form-edit">
				<input type="hidden" id="post_id" value="<?php echo $post->id ?>">
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Edit Post "<?php echo $post->title ?>"</h3>
								<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group">
									<label>Judul *</label>
									<input type="text" title="Judul" name="title" id="title" class="form-control" placeholder="Judul post mu disini..." value="<?php echo $post->title ?>" required>
								</div>
								<?php
									$ex = BASE_URL . "post/";
								?>
								<div class="form-group">
									<label>SEF URL </label> <span class="pull-right msg-sef" style="display: none;"></span>
									<div class="input-group">
										<div class="input-group-addon"><?php echo $ex ?></div>
										<input type="text" name="sefurl" id="sefurl" class="form-control" placeholder="SEF URL untuk post mu disini..." value="<?php echo $post->sef_url ?>">
									</div>
									<p class="help-block">SEF URL biasanya akan terinput otomatis bersamaan ketika kamu memasukkan judul post. Kamu juga dapat merubahnya!</p>
								</div> 
								<div class="form-group">
									<label>Konten *</label>
									<textarea class="form-control" id="<?php echo $tinymce_id ?>" name="content" placeholder="Isi post mu disini..." style="height: 350px;" required><?php echo htmlentities($post->content) ?></textarea>
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
										Informasi Umum
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse in">
									<div class="box-body">
									<?php 
										if ($categories_data == 0) :
									?>
							
										<div class="form-group">
											<label>Ooops, sepertinya kamu belum membuat kategori post! <a href="<?php echo BASE_URL ?>admin/post/category/create">Buat Sekarang!</a>
										</div>

									<?php
										else :
									?>
										<div class="form-group">
											<label>Kategori *</label>
											<select name="category" class="form-control select2" style="width: 100%;" required>
												<option value="" <?php echo (set_value("category") !== NULL) ? "" : "selected" ?>>==== PILIH KATEGORI ====</option>
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
									<?php 
										endif;
									?>
										<div class="form-group">
											<label>Tag</label>
											<select name="tag_id[]" class="form-control select2" multiple="" data-placeholder="======= PILIH TAG =======" style="width: 100%;">
									<?php
										$tag_id = explode(", ", $post->tag_id);
										foreach ($tags as $tag) :
									?>
											<option value="<?php echo $tag->id ?>" <?php echo (in_array($tag->id, $tag_id)) ? "selected" : "" ?>><?php echo $tag->title ?></option>
									<?php
										endforeach;
									?>
											</select>
										</div><!-- /.form-group -->
										<div class="form-group">
											<label>Gambar</label>
												<div class="input-group">
													<input class="form-control" type="text" name="image" value="<?php echo $post->image ?>" id="input_img">
													<span class="input-group-btn">
														<a class="btn btn-info btn-flat" data-toggle="modal" data-target="#upload_img">Pilih/Upload Gambar</a>
													</span>
												</div>
											<p class="help-block">Saat data di submit, hanya nama file nya saja yang dimasukkan ke database, URL menuju folder gambar di website-mu akan diabaikan. (kecuali jika kamu menuliskan URL gambar selain di website mu. Ex : 1bp.blogspot.com, dll)</p>
										</div>
									</div>
								</div>
							</div>
							<div class="panel box box-primary">
								<div class="box-header with-border">
									<h4 class="box-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
											Meta
										</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="box-body">
										<div class="form-group">
											<label>Meta Keywords</label>
											<input type="text" name="keywords" class="form-control" placeholder="Keywords post mu disini..." value="<?php echo $post->keywords ?>">
										</div>	
										<div class="form-group">
											<label>Meta Description</label>
											<textarea name="description" class="form-control" placeholder="Deskripsi post mu disini..." style="height: 100px;"><?php echo $post->description ?></textarea>
											<p class="help-block">Jika dikosongkan, kami akan mengambil meta description beberapa kata di konten post mu.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn-edit-sub btn btn-primary btn-flat" <?php if($categories_data == 0) echo("disabled"); ?>>Edit Post!</button>
					<?php if($categories_data == 0) echo("<p class=\"help-block\">Kamu tidak bisa mengedit post karena kamu tidak memiliki kategori post. Untuk membuat post, pastikan kamu mempunyai minimal 1 kategori!</p>"); ?>
				</div>
			</form>
		</section>

		<div id="upload_img" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">	
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="modal-title">Pilih Foto Utama</h3>
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
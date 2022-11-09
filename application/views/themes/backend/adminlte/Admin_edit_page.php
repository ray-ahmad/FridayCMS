<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("change_page") ?>
            <small>FridayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
            <li class="active"><a href="<?php echo $this->to_page ?>"><i class="fa fa-tasks"></i> <?php echo $this->lang->line("change_page") ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<?php 
			if(validation_errors() != NULL) :
		?>
				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!</h4>
		<?php echo validation_errors() ?>
				</div>
		<?php
			endif;
		?>
          <!-- Default box -->
          <div class="box box-success">
				<div class="box-header with-border">
					<div class="box-tools pull-right">
						<a href="<?php echo page_url($page_data->sef_url) ?>" class="btn btn-box-tool" target="_blank" data-toggle="tooltip" title="<?php echo $this->lang->line("view_page") ?>"><i class="fa fa-eye text-green"></i></a>
					</div>
				</div>
            <div class="box-body">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label><?php echo $this->lang->line("page_title") ?> *</label>
						<input type="text" title="<?php echo $this->lang->line("page_title") ?>" name="title" id="title" class="form-control" placeholder="<?php echo $this->lang->line("title_placeholder") ?>" value="<?php echo $page_data->title ?>" required>
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("sef_url") ?></label>
						<?php if (!$this->agent->is_mobile()) : ?><div class="input-group">
							<div class="input-group-addon"><?php echo page_url() ?></div><?php endif ?>
							<input type="text" name="sefurl" id="sefurl" class="form-control" placeholder="<?php echo $this->lang->line("sef_placeholder") ?>" value="<?php echo $page_data->sef_url ?>">
							<?php if (!$this->agent->is_mobile()) : ?><div class="input-group-addon">/</div>
						</div><?php endif ?>
						<p class="help-block"><?php echo $this->lang->line("sef_url_help") ?></p>
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("meta_keywords") ?></label>
						<input type="text" title="Judul" name="keywords" class="form-control" placeholder="<?php echo $this->lang->line("meta_key_placeholder") ?>" value="<?php echo $page_data->keywords ?>">
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("meta_description") ?></label>
						<textarea rows="3" name="description" class="form-control" placeholder="<?php echo $this->lang->line("meta_desc_placeholder") ?>"><?php echo $page_data->description ?></textarea>
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("content") ?> *</label>
						<div class="row">
							<div class="col-md-12">
								<textarea id="<?php echo $tinymce_id ?>" name="content" class="form-control" style="height: 700px;"><?php echo $page_data->content ?></textarea>
							</div>
						</div>
						<br>
					</div>

                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-flat">Submit</button>
				  </div>
				</form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

		  <!--<div id="upload_img" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">	
						  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						  <h3 id="modal-title">Pilih Foto Utama</h3>
					  </div>
					  <div class="modal-body">
						<iframe src="<?php //echo assets_plug_url("responsive_filemanager/filemanager/dialog.php?type=1&field_id=input_img&img=Y") ?>" style="width: 100%; height: 410px;" frameborder="0"></iframe>
					  </div>
					  <div class="modal-footer">
						  <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> Tutup Modal!</button>
					    </div>
				    </div>
				</div>
			</div>-->
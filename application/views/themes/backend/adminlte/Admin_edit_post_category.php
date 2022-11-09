<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("change_post_category") ?>
            <small>PlayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
            <li><a href="<?php echo $this->to_cat ?>"><i class="ion ion-pricetags"></i> Kategori Post</a></li>
            <li class="active"><a href="<?php echo $this->to_cat ?>edit/<?php echo $cat_data->id;?>/"><i class="fa fa-pencil"></i> Edit Kategori Post!</a></li>
			
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-body with-border">
				<form action="" method="post">
					<input type="hidden" id="cat_id" value="<?php echo $cat_data->id ?>">
					<div class="form-group">
						<label><?php echo $this->lang->line("name") ?>*</label>
						<input type="text" title="<?php echo $this->lang->line("post_category_name") ?>" name="name" id="title" class="form-control" placeholder="<?php echo $this->lang->line("name_placeholder") ?>" value="<?php echo $cat_data->name;?>" required>
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("sef_url") ?></label><span class="pull-right msg-sef" style="display: none;"></span>
						<input type="text" title="<?php echo $this->lang->line("sef_url") ?>" name="sef_url" id="sefurl" class="form-control" placeholder="<?php echo $this->lang->line("sef_url_placeholder") ?>" value="<?php echo $cat_data->sefurl;?>">
						<p class="help-block"><?php echo $this->lang->line("sef_url_help") ?></p>
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("meta_keywords") ?></label>
						<input type="text" title="<?php echo $this->lang->line("meta_keywords") ?>" name="keywords" class="form-control" placeholder="<?php echo $this->lang->line("meta_key_placeholder") ?>" value="<?php echo $cat_data->keywords;?>">
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("meta_description") ?></label>
						<textarea rows="3" name="description" class="form-control" placeholder="<?php echo $this->lang->line("meta_desc_placeholder") ?>"><?php echo $cat_data->description;?></textarea>
					</div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-flat btn-sub"><?php echo $this->lang->line("change_post_category") ?>!</button>
				  </div>
				</form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

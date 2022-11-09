<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("create_new_post_category") ?>
            <small>FridayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
            <li><a href="<?php echo $this->to_cat ?>"><i class="ion ion-pricetags"></i> <?php echo $this->lang->line("app_name") ?></a></li>
            <li class="active"><a href="<?php echo $this->to_cat ?>create/"><i class="fa fa-pencil"></i> <?php echo $this->lang->line("create_new_post_category") ?></a></li>
			
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-body with-border">
			<?php
				if ($this->session->flashdata("warning") !== NULL) : 
			?>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close close-alert" data-alert="alert-warning">&times;</button>
					<h4>	
						<i class="icon fa fa-warning"></i> <?php echo $this->lang->line("alert_error_5_body") ?>
					</h4>
				<?php echo $this->session->flashdata("warning") ?>
			</div>
			<?php 		
				endif;
			?>
				<form action="" method="post">
					<div class="form-group">
						<label><?php echo $this->lang->line("name") ?>*</label>
						<input type="text" title="<?php echo $this->lang->line("post_category_name") ?>" name="name" id="title" class="form-control" placeholder="<?php echo $this->lang->line("name_placeholder") ?>" required>
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("sef_url") ?></label><span class="pull-right msg-sef" style="display: none;"></span>
						<div class="input-group">
							<div class="input-group-addon"><?php echo cat_url() ?></div>
							<input type="text" title="<?php echo $this->lang->line("sef_url") ?>" name="sef_url" id="sefurl" class="form-control" placeholder="<?php echo $this->lang->line("sef_url_placeholder") ?>">
							<div class="input-group-addon">/</div>
						</div>
						<p class="help-block"><?php echo $this->lang->line("sef_url_help") ?></p>
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("meta_keywords") ?></label>
						<input type="text" title="<?php echo $this->lang->line("meta_keywords") ?>" name="keywords" class="form-control" placeholder="<?php echo $this->lang->line("meta_key_placeholder") ?>">
					</div>
					<div class="form-group">
						<label><?php echo $this->lang->line("meta_description") ?></label>
						<textarea rows="3" name="description" class="form-control" placeholder="<?php echo $this->lang->line("meta_desc_placeholder") ?>"></textarea>
					</div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-flat btn-sub"><?php echo $this->lang->line("create_post_category") ?>!</button>
				  </div>
				</form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

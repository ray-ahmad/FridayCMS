<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("change_post_com") ?>
            <small>FridayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
            <li><a><i class="fa fa-comments"></i> <?php echo $this->lang->line("app_name") ?></a></li>
            <li class="active"><a href="<?php echo $this->to_com ?>edit/<?php echo $com->id ?>/"><i class="fa fa-comment"></i> <?php echo $this->lang->line("change_post_com") ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-success">
            <div class="box-body with-border">
		<?php if(validation_errors() != NULL) : ?>
				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!</h4>
					<?php echo validation_errors() ?>
				</div>
		<?php endif ?>
				<form action="" method="post">
					<div class="form-group">
						<label>Nama Pengirim*</label>
						<input type="text" name="comtr_name" class="form-control" placeholder="" value="<?php echo $com->commentator_name ?>">
					</div>
					<div class="form-group">
						<label>Email Pengirim*</label>
						<input type="text" name="comtr_email" class="form-control" placeholder="" value="<?php echo $com->commentator_email ?>">
					</div>
					<div class="form-group">
						<label>Website Pengirim</label>
						<input type="text" name="comtr_web" class="form-control" placeholder="" value="<?php echo ($com->commentator_web === NULL) ? "http://" : $com->commentator_web ?>">
					</div>
					<div class="form-group">
						<label>Komentar*</label>
						<textarea rows="3" name="comment" class="form-control" placeholder=""><?php echo $com->comment ?></textarea>
					</div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-flat">Submit</button>
				  </div>
				</form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

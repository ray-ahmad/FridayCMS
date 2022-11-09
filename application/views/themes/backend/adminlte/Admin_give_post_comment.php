<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Berikan Komentar!
            <small>PlayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
            <li><a><i class="fa fa-comments"></i> Komentar</a></li>
            <li class="active"><a href="<?php echo $this->to_com ?>give/"><i class="fa fa-comment"></i> Berikan Komentar</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Berikan Komentar!</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
		<?php 
			if(validation_errors() != NULL) :
		?>
				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!</h4>
		<?php echo validation_errors() ?>
				</div>
		<?php
			elseif($all_post == "empty") :
		?>
			Ooops! Sebelum Memberi Komentar, Pastikan Kamu Mempunyai Minimal 1 Post! <a href="<?php echo admin_url("post/create") ?>">Buat Sekarang!</a>
		<?php
			else :
		?>
				<form action="" method="post">
                    <div class="form-group">
                      <label>Pilih Post yang Ingin Dikomentari *</label>
                      <select name="id" class="form-control select2" style="width: 100%;" required>
						<option value="" <?php echo (set_value("id") !== NULL) ? "" : "selected" ?>>========= PILIH POST =========</option>
		<?php
				foreach($all_post as $p) : 
		?>
                        <option value="<?php echo $p->id; ?>" <?php echo (set_value("id") !== NULL and set_value("id") == $p->id) ? "selected" : "" ?>><?php echo $p->title; ?></option>
		<?php
				endforeach;
		?>
                      </select>
                    </div><!-- /.form-group -->
					<div class="form-group">
						<label>Komentar-mu! *</label>
						<textarea rows="3" name="comment" class="form-control" placeholder="Kirimkan komentar-mu disini!" required><?php echo set_value("comment") ?></textarea>
					</div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-flat" <?php echo ($all_post == "empty") ? "disabled" : "" ?>>Submit</button>
				  </div>
				</form>
		<?php
			endif;
		?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

<?php
	defined("BASEPATH") or exit("No direct script access allowed!");

?>
		<section class="content-header">
			<h1>
				Upload Tema Baru
				<small>PlayCMS</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
				<li class="active"><a href="<?php echo $this->to_theme ?>"><i class="fa fa-tasks"></i> Semua Post</a></li>
			</ol>
		</section>

		<section class="content">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Buat Post Post</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">

				</div><!-- /.box-body -->
			</div><!-- /.box -->
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
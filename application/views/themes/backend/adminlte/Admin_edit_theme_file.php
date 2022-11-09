<?php
	defined("BASEPATH") or exit("No direct script access allowed!");

?>
		<section class="content-header">
			<h1>
				Edit File Tema "<?php echo $theme->name ?>"
				<small>PlayCMS</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
				<li class="active"><a href="<?php echo $this->to_theme ?>"><i class="fa fa-tasks"></i> Semua Post</a></li>
			</ol>
		</section>

		<section class="content">
			<input type="hidden" id="file_name" value="<?php echo $file_theme ?>">
			<input type="hidden" id="folder_name" value="<?php echo $theme->folder ?>">
                  <div class="alert alert-success alert-dismissable alert-berhasil" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-berhasil">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Berhasil melakukan Aksi!</h4>
                    Aksi yang Kamu Lakukan Berhasil Di Jalankan!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-query-ggl" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-query-ggl">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Gagal Melakukan Aksi!</h4>
                    Mohon maaf, mungkin terjadi kesalahan kueri database MySQL!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-blm-dipilih" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-blm-dipilih">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Sepertinya Kamu Belum Memilih Post yang akan Dihapus!</h4>
                    Sebelum Menghapus, Kamu Harus Memilih Setidaknya Satu Post untuk Dihapus!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-row" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-row">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Data yang kamu cari tidak ada di database</h4>
                    Mohon maaf, mungkin terjadi kesalahan kueri database MySQL, atau mungkin kamu mencari data yang tidak ada didatabase!
                  </div>
                  <div class="alert alert-warning alert-dismissable alert-network" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-network">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Sepertinya koneksi ke server terputus!</h4>
                    Pastikan koneksi internet-mu stabil atau jika kamu di localhost pastikan xamp/wamp server-mu sudah aktif sebelum melakukan aksi ini!
                  </div>
				<div class="progress loading active" style="display: none;">
					<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Edit File "<span class="file-name"><?php echo $file_theme ?></span>"</h3>
								<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body">

								<div class="form-group">
									<span class="codemirror-editor"><textarea id="<?php echo $codemirror_id ?>" class="form-control file_contents" name="content" style="width: 100%; height: 450px;" required><?php echo htmlentities($file_content) ?></textarea></span>
								</div>
								<div class="form-group">
									<button type="button" class="btn btn-primary btn-flat btn-edit-file">Edit File!</button>
								</div>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div>
					<div class="col-md-4">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">File Lainnya</h3>
								<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body">
								<?php
									foreach ($all_file as $file) :
										if ($file != "index.html" or $file != "preview.jpg" or $file != "preview.png") :
											if (!is_dir(APPPATH . "views/themes/frontend/{$theme->folder}/{$file}/")) :
												//$href = ($file_theme == $file) ? 'href=""' : "href=\"" . admin_url("theme/file/edit/{$theme->folder}/{$file}") . "\"";
												//$dis = ($file_theme == $file) ? "none" : "block";
												//$chg = ($file_theme == $file) ? "" : "btn-chg-file";
								?>
									<a class="btn btn-default btn-block btn-flat btn-chg-file file-<?php echo $file ?>" id="<?php echo $file ?>"><?php echo $file ?></a>
								<?php
											endif;
										endif;
									endforeach;
								?>
							</div>
						</div>
					</div>
				</div>
		</section>
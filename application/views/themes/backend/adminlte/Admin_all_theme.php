<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
			Tema
            <small>PlayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
            <li class="active"><a href="<?php echo $this->to_theme ?>"><i class="fa fa-tasks"></i> Semua Tema</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		
			<?php
				if (isset($per)) : 
			?>
                  <div class="alert alert-success alert-dismissable alert-berhasil" style="<?php echo ($per != "success") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-berhasil">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Berhasil melakukan Aksi!</h4>
                    Aksi yang Kamu Lakukan Berhasil Di Jalankan!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-query-ggl" style="<?php echo ($per != "query_ggl") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-query-ggl">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Gagal Melakukan Aksi!</h4>
                    Mohon maaf, mungkin terjadi kesalahan kueri database MySQL!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-blm-dipilih" style="<?php echo ($per != "blm_dipilih") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-blm-dipilih">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Sepertinya Kamu Belum Memilih Post yang akan Dihapus!</h4>
                    Sebelum Menghapus, Kamu Harus Memilih Setidaknya Satu Post untuk Dihapus!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-row" style="<?php echo ($per != "row_0") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-row">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Data yang kamu cari tidak ada di database</h4>
                    Mohon maaf, mungkin terjadi kesalahan kueri database MySQL, atau mungkin kamu mencari data yang tidak ada didatabase!
                  </div>
                  <div class="alert alert-warning alert-dismissable alert-network" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-network">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Sepertinya koneksi ke server terputus!</h4>
                    Pastikan koneksi internet-mu stabil atau jika kamu di localhost pastikan xamp/wamp server-mu sudah aktif sebelum melakukan aksi ini!
                  </div>
			<?php 		
				endif;
			?>
                  <div class="alert alert-warning alert-dismissable alert-form" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-form">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Sepertinya ada yang salah/tidak sesuai!</h4>
                    <span class="error-msg"></span>
                  </div>
				<div class="progress loading active" style="display: none;">
					<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
				</div>
				<div class="box box-primary collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title">Upload Tema Baru!</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Maximize/Minimize!"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
						<form action="<?php echo admin_url("theme/frontend_theme_upload/") ?>" enctype="multipart/form-data" method="post">
							<label>File Tema*</label>
							<input type="file" id="theme-file" name="theme_file">
							<p class="help-block">File Tema Harus Sudah Dikompresi Dengan Format File Kompresi .zip
						</div>
						<div class="form-group">
							<label>Nama Folder</label>
							<input type="text" class="form-control" id="folder-name" name="folder_name">
							<p class="help-block">Jika dikosongkan, kami akan mengambil nama folder dari nama file .zip yang kamu upload</p>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-flat">Upload Tema!</button>
						</div>
						</form>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
				<div class="row">
		<?php
			if ($themes->num_rows() > 0) :
				foreach ($themes->result() as $theme) :
		?>
					<div class="col-md-4">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h4><?php echo $theme->name ?></h4>
							</div>
							<div class="box-body">
								<img src="<?php echo assets_url("{$theme->folder}/preview.png") ?>" class="img-responsive">
							</div>
							<div class="box-footer">
								<div class="btn-group">
									<?php if (file_exists(APPPATH . "views/themes/frontend/{$theme->folder}/home.php")) : ?>
									<a href="<?php echo admin_url("theme/file/edit/{$theme->folder}/home.php") ?>" data-toggle="tooltip" title="Edit File Tema Ini!" class="btn btn-success btn-flat"><i class="fa fa-edit"></i></a>
									<?php
										endif;
										if ($theme->active == "N") :
									?>
									<a href="<?php echo admin_url("theme/activate/{$theme->folder}/") ?>" class="btn bg-olive btn-flat" data-toggle="tooltip" title="Aktifkan Tema!"><i class="fa fa-eye"></i></a>
									<button type="button" id="<?php echo $theme->folder ?>" class="btn btn-danger btn-flat btn-hapus" data-toggle="tooltip" title="Hapus Tema!"><i class="fa fa-trash"></i></button>
									<?php else : ?>
									<a class="btn btn-danger btn-flat" data-toggle="tooltip" title="Tema yang Aktif Tidak Bisa Dihapus!" disabled><i class="fa fa-trash"></i></a>
									<?php endif; ?>
								</div>
								<?php if ($theme->active == "Y") : ?>
									<span class="pull-right"><button type="button" class="btn bg-olive btn-flat" data-toggle="tooltip" title="Aktif!"><i class="fa fa-eye"></i></button></span>
								<?php else :?>
									<span class="pull-right"><button type="button" class="btn bg-maroon btn-flat" data-toggle="tooltip" title="Tidak Aktif!"><i class="fa fa-eye-slash"></i></button></span>
								<?php endif  ?>
							</div>
						</div>
					</div>
		<?php
				endforeach;
			endif;
		?>
				</div>

			<form action="<?php echo $this->to_theme ?>delete/" method="post">
				<div id="modal_del" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> Konfirmasi penghapusan tema</h3>
							</div>
							<div class="modal-body">
								Apakah kamu yakin akan menghapus tema ini? Perintah ini juga AKAN MENGHAPUS FILE-FILE tema!
							</div>
							<div class="modal-footer">
								<input type="hidden" id="del_folder" name="folder">
								<input type="hidden" name="position" value="frontend">
								<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> Tidaaak!</button>
								<button type="submit" class="btn btn-outline btn-flat"><i class="fa fa-trash-o"></i> YA!</button>
							</div>
						</div>
					</div>
				</div>
			</form>